<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Superadmin extends Seeder
{
    public function run()
    {
        $data = [
            'name'=> 'superadmin',
            'username'  => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'password'  => password_hash('superadmin', PASSWORD_DEFAULT),
            'role' => 'superadmin',
        ];
        $this->db->table('users')->insert($data);
    }
}
