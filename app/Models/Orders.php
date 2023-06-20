<?php

namespace App\Models;

use CodeIgniter\Model;

class Orders extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'orders';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_user',
        'alamat_db',
        'tanggal_db',
        'nomor_user',
        'luas_sawah',
        'jenis_tanaman',
        'admin',
        'status',
        'updated_at'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    function getOrders()
    {
        return $this->db->table('orders')
            ->select('
                users.name,
                jenis_tanaman.nama_tanaman as jenis,
                orders.*
            ')
            ->join('users', 'orders.id_user = users.id')
            ->join('jenis_tanaman', 'orders.jenis_tanaman = jenis_tanaman.id')
            ->get()->getResult();
    }

    function getOrdersByAdmin($id)
    {
        return $this->db->table('orders')
            ->select('
                users.name,
                jenis_tanaman.nama_tanaman as jenis,
                orders.*
            ')
            ->join('users', 'orders.id_user = users.id')
            ->join('jenis_tanaman', 'orders.jenis_tanaman = jenis_tanaman.id')
            ->where('orders.admin', $id)
            ->get()->getResult();
    }
    
    function getOrderByID($id) 
    {
        return $this->db
            ->table('orders')
            ->select('users.name, jenis_tanaman.nama_tanaman as jenis, orders.*')
            ->join('users', 'orders.id_user = users.id')
            ->join('jenis_tanaman', 'orders.jenis_tanaman = jenis_tanaman.id')
            ->where('orders.id', $id)
            ->get()
            ->getResult();
    }
    

    function getOrderByIdUser($id)
    {
        return $this->db->table('orders')
            ->select('
                users.name,
                jenis_tanaman.nama_tanaman as jenis,
                orders.*
            ')
            ->join('users', 'orders.id_user = users.id')
            ->join('jenis_tanaman', 'orders.jenis_tanaman = jenis_tanaman.id')
            ->where('orders.id_user', $id)
            ->get()->getResult();
    }

    function findDataInBetweenByUsersId($start, $end, $id)
    {
        return $this->db->table('orders')
            ->select('
                users.name,
                jenis_tanaman.nama_tanaman as jenis,
                orders.*
            ')
            ->join('users', 'orders.id_user = users.id')
            ->join('jenis_tanaman', 'orders.jenis_tanaman = jenis_tanaman.id')
            ->where('orders.admin', $id)
            ->where("orders.tanggal_db BETWEEN '$start' AND '$end'")
            ->get()
            ->getResultArray();
    }
}
