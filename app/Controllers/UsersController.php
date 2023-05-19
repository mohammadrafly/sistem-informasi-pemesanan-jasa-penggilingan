<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Users;

class UsersController extends BaseController
{
    public function index()
    {
        $model = new Users();
        if ($this->request->isAJAX() && $this->request->getMethod(true) === 'POST') {
            $data = [
                'username' => $this->request->getVar('username'),
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'name'     => $this->request->getVar('name'),
                'role'     => $this->request->getVar('role'),
            ];
            if ($model->save($data)) {
                return $this->response->setJSON([
                    'status' => true,
                    'icon' => 'success',
                    'title' => 'Success!',
                    'text' => 'Berhasil menyimpan data user.',
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => false,
                    'icon' => 'error',
                    'title' => 'Warning!',
                    'text' => 'Gagal menyimpan data user.',
                ]);
            }
        } elseif($this->request->getMethod(true) === 'GET') {
            $data = [
                'content' => $model->getUserWithoutParams('superadmin'),
                'page' => 'List Users'
            ];
            //dd($data);
            return view('pages/usersDashboard', $data);
        }
    }

    public function update($id)
    {
        $model = new Users();
        if ($this->request->isAJAX() && $this->request->getMethod(true) === 'POST') {
            $data = [
                'username' => $this->request->getVar('username'),
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'name'     => $this->request->getVar('name'),
                'updated_at'=> date('Y-m-d H:i:s'),
            ];
            if ($model->update($id, $data)) {
                return $this->response->setJSON([
                    'status' => true,
                    'icon' => 'success',
                    'title' => 'Success!',
                    'text' => 'Berhasil menyimpan data user.',
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => false,
                    'icon' => 'error',
                    'title' => 'Warning!',
                    'text' => 'Gagal menyimpan data user.',
                ]);
            }
        } elseif($this->request->isAJAX() && $this->request->getMethod(true) === 'GET') {
            return $this->response->setJSON([
                'data' => $model->where('id', $id)->first(),
            ]);
        }
    }

    public function delete($id)
    {
        $model = new Users();
        if ($this->request->isAJAX()) {
            if ($model->where('id', $id)->delete($id)) {
                return $this->response->setJSON([
                    'status' => true,
                    'icon' => 'success',
                    'title' => 'Success!',
                    'text' => 'Berhasil hapus data user.',
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => false,
                    'icon' => 'error',
                    'title' => 'Warning!',
                    'text' => 'Gagal hapus data user.',
                ]);
            }
        }
    }
}
