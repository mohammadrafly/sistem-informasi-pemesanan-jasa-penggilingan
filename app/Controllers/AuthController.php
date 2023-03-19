<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Users;

class AuthController extends BaseController
{
    private function setSession($data)
    {
        session()->set([
            'LoginTrue' => TRUE,
            'id'        => $data[0]['id'],
            'name'      => $data[0]['name'],
            'username'  => $data[0]['username'],
            'email'     => $data[0]['email'],
            'role'      => $data[0]['role'],
            'created_at'=> $data[0]['created_at'],
        ]);
        return true;
    }

    public function index()
    {
        $data = [
            'page' => 'Home'
        ];
        return view('pages/indexHome', $data);
    }

    public function Login()
    {
        $model = new Users();
        if ($this->request->isAJAX() && $this->request->getMethod(true) === 'POST') {
            $checkpointData = $model->usernameOrEmail($this->request->getPost('username'));
            if (!empty($checkpointData)) {
                if (password_verify($this->request->getPost('password'), $checkpointData[0]['password'])) {
                    $this->setSession($checkpointData);
                    return $this->response->setJSON([
                        'status' => true,
                        'icon' => 'success',
                        'title' => 'Berhasil login!',
                        'text' => 'Anda akan diarahkan dalam 3 detik.',
                    ]);
                } else {
                    return $this->response->setJSON([
                        'status' => false,
                        'icon' => 'error',
                        'title' => 'Peringatan!',
                        'text' => 'Password salah.',
                    ]);
                }
            } else {
                return $this->response->setJSON([
                    'status' => false,
                    'icon' => 'error',
                    'title' => 'Peringatan!',
                    'text' => 'Username atau email tidak ada.',
                ]);
            }
        }
        $data = [
            'page' => 'Login'
        ];
        return view('pages/auth/signInAuth', $data);
    }

    public function Register()
    {
        $model = new Users();
        if ($this->request->isAJAX() && $this->request->getMethod(true) === 'POST') {
            $data = [
                'username' => $this->request->getPost('username'),
                'email'    => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'name'     => $this->request->getPost('name'),
            ];
            $checkpointUsername = $model->where('username', $data['username'])->first();
            $checkpointEmail = $model->where('email', $data['email'])->first();
            if ($checkpointUsername) {
                return $this->response->setJSON([
                    'status' => false,
                    'icon' => 'error',
                    'title' => 'Error!',
                    'text' => 'Username telah digunakan.',
                ]);
            } elseif ($checkpointEmail) {
                return $this->response->setJSON([
                    'status' => false,
                    'icon' => 'error',
                    'title' => 'Error!',
                    'text' => 'Email telah digunakan.',
                ]);
            } else {
                if ($model->insert($data)) {
                    $this->setSession($model->usernameOrEmail($data['username']));
                    return $this->response->setJSON([
                        'status' => true,
                        'icon' => 'success',
                        'title' => 'Success!',
                        'text' => 'Berhasil daftar.',
                    ]);
                }
            }
        }
        $data = [
            'page' => 'Register'
        ];
        return view('pages/auth/signUpAuth', $data);
    }
}
