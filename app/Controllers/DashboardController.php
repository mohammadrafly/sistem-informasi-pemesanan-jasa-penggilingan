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
        return response()->setJSON([
            'status' => true,
            'icon' => 'success',
            'title' => 'Logout Berhasil.',
        ]);
    }

    public function index()
    {
        $orderCount = model('Orders')->countAllResults();
        $userCount = model('Users')->countAllResults();
        $userCountByRole = model('Users')->where('role', 'user')->countAllResults();
        $data = [
            'page' => 'Dashboard',
            'order' => $orderCount,
            'user' => $userCountByRole,
            'allUser' => $userCount,
        ];
        //dd($data);
        return view('pages/indexDashboard', $data);
    }
    
}
