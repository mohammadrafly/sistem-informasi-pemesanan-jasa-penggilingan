<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JenisTanaman;

class JenisController extends BaseController
{
    public function index()
    {
        $model = new JenisTanaman();
        if ($this->request->isAJAX() && $this->request->getMethod(true) === 'POST') {
            $data = [
                'nama_tanaman' => $this->request->getPost('nama_tanaman')
            ];
            if ($model->save($data)) {
                return $this->response->setJSON([
                    'status' => true,
                    'icon' => 'success',
                    'title' => 'Success!',
                    'text' => 'Berhasil menyimpan data jenis.',
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => true,
                    'icon' => 'error',
                    'title' => 'Warning!',
                    'text' => 'Gagal menyimpan data jenis.',
                ]);
            }
        }
        $data = [
            'content' => $model->findAll(),
            'page' => 'List Jenis'
        ];
        return view('pages/jenisDashboard', $data);
    }

    public function update($id)
    {
        $model = new JenisTanaman();
        if ($this->request->isAJAX() && $this->request->getMethod(true) === 'POST') {
            $data = [
                'nama_tanaman' => $this->request->getPost('nama_tanaman'),
                'updated_at'=> date('Y-m-d H:i:s'),
            ];
            if ($model->update($id, $data)) {
                return $this->response->setJSON([
                    'status' => true,
                    'icon' => 'success',
                    'title' => 'Success!',
                    'text' => 'Berhasil menyimpan data jenis.',
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => false,
                    'icon' => 'error',
                    'title' => 'Warning!',
                    'text' => 'Gagal menyimpan data jenis.',
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
        $model = new JenisTanaman();
        if ($this->request->isAJAX()) {
            if ($model->where('id', $id)->delete($id)) {
                return $this->response->setJSON([
                    'status' => true,
                    'icon' => 'success',
                    'title' => 'Success!',
                    'text' => 'Berhasil hapus data jenis.',
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => false,
                    'icon' => 'error',
                    'title' => 'Warning!',
                    'text' => 'Gagal hapus data jenis.',
                ]);
            }
        }
    }
}
