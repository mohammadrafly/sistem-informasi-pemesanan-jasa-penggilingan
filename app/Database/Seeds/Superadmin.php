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
            'password'  => '$2a$12$9itAdyuzRwG7eDW/UmLl6OV1qGEGGWG1Hj75ZW7oP7jzojjoPrjKS',
            'role' => 'superadmin',
        ];
        $this->db->query('INSERT INTO users (name, username, email, password, role) VALUES(:name:,:username:, :email:, :password:, :role:)', $data);
        $this->db->table('users')->insert($data);
    }
}
