<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Orders;
use App\Models\Users;
use App\Models\JenisTanaman;

class OrdersController extends BaseController
{
    public function index()
    {
        $user = new Users();
        $model = new Orders();
        $jenis = new JenisTanaman();
        if ($this->request->isAJAX() && $this->request->getMethod(true) === 'POST') {
            $data = [
                'id_user'  => $this->request->getPost('id_user'),
                'alamat'   => $this->request->getPost('alamat'),
                'tanggal_db'   => $this->request->getPost('tanggal_db'),
                'nomor_user'   => $this->request->getPost('nomor_user'),
                'luas_sawah'   => $this->request->getPost('luas_sawah'),
                'jenis_tanaman'   => $this->request->getPost('jenis_tanaman'),
                'admin'   => $this->request->getPost('admin'),
                'status'   => $this->request->getPost('status'),
            ];
            if ($model->save($data)) {
                return $this->response->setJSON([
                    'status' => true,
                    'icon' => 'success',
                    'title' => 'Success!',
                    'text' => 'Berhasil menyimpan data order.',
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => false,
                    'icon' => 'error',
                    'title' => 'Warning!',
                    'text' => 'Gagal menyimpan data order.',
                ]);
            }
        } elseif($this->request->getMethod(true) === 'GET') {
            $data = [
                'content' => $model->getOrders(),
                'jenis' => $jenis->findAll(),
                'admin' => $user->getUserWithParams('admin'),
                'page' => 'List Orders'
            ];
            //dd($data);
            return view('pages/ordersDashboard', $data);
        }
    }

    public function getUser()
    {
        $model = new Users();
        return $this->response->setJSON($model->getUserWithParams('user'));
    }

    public function update($id)
    {
        $model = new Orders();
        if ($this->request->isAJAX() && $this->request->getMethod(true) === 'POST') {
            $data = [
                'status'   => $this->request->getPost('status'),
                'updated_at'=> date('Y-m-d H:i:s'),
            ];
            if ($model->update($id, $data)) {
                return $this->response->setJSON([
                    'status' => true,
                    'icon' => 'success',
                    'title' => 'Success!',
                    'text' => 'Berhasil menyimpan data order.',
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => false,
                    'icon' => 'error',
                    'title' => 'Warning!',
                    'text' => 'Gagal menyimpan data order.',
                ]);
            }
        } elseif($this->request->isAJAX() && $this->request->getMethod(true) === 'GET') {
            return $this->response->setJSON([
                'data' => $model->getOrderByIdUser($id),
            ]);
        }
    }

    public function delete($id)
    {
        $model = new Orders();
        if ($this->request->isAJAX()) {
            if ($model->where('id', $id)->delete($id)) {
                return $this->response->setJSON([
                    'status' => true,
                    'icon' => 'success',
                    'title' => 'Success!',
                    'text' => 'Berhasil hapus data order.',
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => false,
                    'icon' => 'error',
                    'title' => 'Warning!',
                    'text' => 'Gagal hapus data order.',
                ]);
            }
        }
    }
}
