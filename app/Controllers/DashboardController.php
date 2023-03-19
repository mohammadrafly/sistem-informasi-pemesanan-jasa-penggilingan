<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Orders;
use App\Models\Users;

class DashboardController extends BaseController
{
    public function Logout()
    {
        session()->destroy();
        return $this->response->setJSON([
            'status' => true,
            'icon' => 'success',
            'title' => 'Logout Berhasil.',
        ]);
    }

    public function index()
    {
        $order = new Orders();
        $user = new Users();
        $data = [
            'page' => 'Dashboard',
            'order' => $order->countAllResults(),
            'user' => $user->where('role','user')->countAllResults(),
            'allUser' => $user->countAllResults(),
        ];
        //dd($data);
        return view('pages/indexDashboard', $data);
    }
}
