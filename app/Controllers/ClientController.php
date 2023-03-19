<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Orders;
use App\Models\Users;

class ClientController extends BaseController
{
    public function index($username)
    {
        $model = new Orders();
        $user = new Users();
        $id = $user->where('username', $username)->first();
        $data = [
            'content' => $model->getOrderByIdUser($id['id']),
            'page' => 'My Orders'
        ];
        //dd($data);
        return view('pages/clientDashboard', $data);
    }
}
