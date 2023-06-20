<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Users;

class AuthController extends BaseController
{
    function generateToken($length = 150) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $token = '';
        
        for ($i = 0; $i < $length; $i++) {
            $randomCharacter = $characters[mt_rand(0, strlen($characters) - 1)];
            $token .= $randomCharacter;
        }
        
        return $token;
    }
    private function setSession(array $userData): bool
    {
        $sessionData = [
            'LoginTrue' => true,
            'id' => $userData[0]['id'],
            'name' => $userData[0]['name'],
            'username' => $userData[0]['username'],
            'email' => $userData[0]['email'],
            'role' => $userData[0]['role'],
            'created_at' => $userData[0]['created_at'],
        ];
    
        session()->set($sessionData);
    
        return true;
    }

    public function index()
    {
        return view('pages/indexHome', ['page' => 'Home']);
    }
    

    public function login()
    {
        $model = new Users();
        
        if (!$this->request->isAJAX() || $this->request->getMethod(true) !== 'POST') {
            return view('pages/auth/signInAuth', ['page' => 'Login']);
        }

        $username = $this->request->getVar('username');
        $checkpointData = $model->usernameOrEmail($username);

        if (empty($checkpointData)) {
            return $this->response->setJSON([
                'status' => false,
                'icon' => 'error',
                'title' => 'Peringatan!',
                'text' => 'Username atau email tidak ada.',
            ]);
        }
        $password = $this->request->getVar('password');
        $isValidPassword = password_verify($password, $checkpointData[0]['password']);

        if (!$isValidPassword) {
            return $this->response->setJSON([
                'status' => false,
                'icon' => 'error',
                'title' => 'Peringatan!',
                'text' => 'Password salah.',
            ]);
        }

        $this->setSession($checkpointData);

        return $this->response->setJSON([
            'status' => true,
            'icon' => 'success',
            'title' => 'Berhasil login!',
            'text' => 'Anda akan diarahkan dalam 3 detik.',
        ]);
    }


    public function register()
    {
        $model = new Users();
        if ($this->request->isAJAX() && $this->request->getMethod(true) === 'POST') {
            $data = $this->request->getVar([
                'username',
                'email',
                'password',
                'name'
            ]);

            $existingUser = $model->whereIn('username', [$data['username'], $data['email']])
                                ->orWhereIn('email', [$data['username'], $data['email']])
                                ->first();

            if ($existingUser) {
                return $this->response->setJSON([
                    'status' => false,
                    'icon' => 'error',
                    'title' => 'Error!',
                    'text' => ($existingUser['username'] == $data['username']) ? 'Username telah digunakan.' : 'Email telah digunakan.'
                ]);
            }

            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            $data['token'] = $this->generateToken(150);
            $model->insert($data);

            $this->setSession($model->usernameOrEmail($data['username']));

            return $this->response->setJSON([
                'status' => true,
                'icon' => 'success',
                'title' => 'Success!',
                'text' => 'Berhasil daftar.'
            ]);
        }

        return view('pages/auth/signUpAuth', ['page' => 'Register']);
    }

    public function LupaPassword()
    {
        if ($this->request->isAJAX() && $this->request->getMethod(true) === 'POST') {
            $email = $this->request->getVar('email');
            $model = new Users();
            $dataUser = $model->getUserByEmail($email);

            if (empty($dataUser)) {
                return $this->response->setJSON([
                    'status' => false,
                    'icon' => 'error',
                    'title' => 'Gagal!',
                    'text' => 'Email anda tidak ada di database.'
                ]);
            }

            $tokenUpdatedAt = $model->updatedAt($dataUser['token']);

            if (!$tokenUpdatedAt) {
                return $this->response->setJSON([
                    'status' => false,
                    'icon' => 'error',
                    'title' => 'Gagal!',
                    'text' => 'Whoops, terjadi error saat update token.'
                ]);
            }

            $data = [
                'email' => $email,
                'nama'  => $dataUser['name'],
                'token' => $dataUser['token'],
            ];

            $emailSent = $this->sendResetPasswordEmail($email, $data);

            if ($emailSent) {
                return $this->response->setJSON([
                    'status' => true,
                    'icon' => 'success',
                    'title' => 'Success!',
                    'text' => 'Berhasil mengirim email permintaan reset password, silahkan cek email anda!.'
                ]);
            } else {
                $email = \Config\Services::email();
                $data = $email->printDebugger(['headers']);
                print_r($data);
            }
        } else {
            return view('pages/auth/resetPasswordAuth', ['page' => 'Reset Password']);
        }
    }

    private function sendResetPasswordEmail($to, $data)
    {
        $email = \Config\Services::email();
        $email->setMailType('html')
            ->setTo($to)
            ->setFrom('sipejag@gmail.com', 'SIPEJAG')
            ->setSubject('Reset Password')
            ->setMessage(view('email/email_rpw.php', $data))
            ->setNewLine("\r\n");

        return $email->send("X-Priority: 1 (Highest)\n");
    }

    public function ResetPassword($email, $token)
    {
        $model = new Users();
        $dataUser = $model->where('email', $email)->first();
    
        // Using the request object instead of $_POST and $_SERVER variables
        if ($this->request->isAJAX() && $this->request->getMethod() === 'post') {
            $password = $this->request->getVar('password');
    
            if ($model->update($dataUser['id'], ['password' => password_hash($password, PASSWORD_DEFAULT)])) {
    
                // Used a ternary operator to simplify the logic
                $status = $model->update($dataUser['id'], ['token' => $this->generateToken(150)]) ? true : false;
    
                return $this->response->setJSON([
                    'status' => $status,
                    'icon' => $status ? 'success' : 'error',
                    'title' => ucfirst($status ? 'Berhasil!' : 'Error!'),
                    'text' => ($status ? 'Berhasil' : 'Gagal') . ' reset password.'
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => false,
                    'icon' => 'error',
                    'title' => 'Error!',
                    'text' => 'Gagal reset password.'
                ]);
            }
        }
    
        // Using elseif instead of multiple if statements for better performance
        elseif ($this->request->getMethod() === 'get') {
            if ($dataUser['token'] === $token) {
                $data = [
                    'email' => $email,
                    'token' => $token,
                    'page' => 'Reset Password'
                ];
                // Using view() helper method instead of calling the View class directly
                return view('pages/auth/newPasswordAuth', $data);
            } else {
                return redirect()->to('reset-password');
            }
        }
    }    
}
