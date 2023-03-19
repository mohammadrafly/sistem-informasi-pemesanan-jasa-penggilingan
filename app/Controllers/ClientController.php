<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JenisTanaman;
use App\Models\Orders;
use App\Models\Users;

class ClientController extends BaseController
{
    public function index($username)
    {
        $userModel = new Users();
        $orderModel = new Orders();
        $jenisModel = new JenisTanaman();
        
        if ($this->request->isAJAX() && $this->request->getMethod(true) === 'POST') {
            $data = [
                'id_user'  => session()->get('id'),
                'alamat_db'   => $this->request->getPost('alamat_db'),
                'tanggal_db'   => $this->request->getPost('tanggal_db'),
                'nomor_user'   => $this->request->getPost('nomor_user'),
                'luas_sawah'   => $this->request->getPost('luas_sawah'),
                'jenis_tanaman'   => $this->request->getPost('jenis_tanaman'),
                'admin'   => $this->request->getPost('admin'),
            ];
            
            $saved = $orderModel->save($data);
            $status = $saved ? 'success' : 'error';
            $text = $saved ? 'Berhasil menyimpan data order.' : 'Gagal menyimpan data order.';
            
            return $this->response->setJSON([
                'status' => $saved,
                'icon' => $status,
                'title' => ucfirst($status) . '!',
                'text' => $text,
            ]);
        }
        
        $content = [];
        $jenis = [];
        $admin = [];
        $page = '';
        
        if ($this->request->getMethod(true) === 'GET') {
            $role = session()->get('role');
            $content = $orderModel->getOrderByIdUser(session()->get('id'));
            $admin = $userModel->getUserWithParams('admin');
            $page = 'My Orders';
            $jenis = $jenisModel->findAll();
        }
        
        $data = compact('content', 'jenis', 'admin', 'page');
        
        return view('pages/clientDashboard', $data);
    }
}
