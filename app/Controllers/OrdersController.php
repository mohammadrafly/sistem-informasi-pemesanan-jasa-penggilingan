<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Orders;
use App\Models\Users;
use App\Models\JenisTanaman;
use PhpOffice\PhpSpreadsheet\Spreadsheet as PhpSpreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class OrdersController extends BaseController
{
    public function index()
    {
        $userModel = new Users();
        $orderModel = new Orders();
        $jenisModel = new JenisTanaman();
        
        if ($this->request->isAJAX() && $this->request->getMethod(true) === 'POST') {
            $data = [
                'id_user'  => $this->request->getPost('id_user'),
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
            
            if ($role == 'admin') {
                $content = $orderModel->getOrdersByAdmin(session()->get('id'));
                $admin = $userModel->getUserWithParams('admin');
                $page = 'List Assigned Orders';
            } else {
                $content = $orderModel->getOrders();
                $admin = $userModel->getUserWithParams('admin');
                $page = 'List All Orders';
            }
            
            $jenis = $jenisModel->findAll();
        }
        
        $data = compact('content', 'jenis', 'admin', 'page');
        
        return view('pages/ordersDashboard', $data);
    }

    public function getUser()
    {
        $model = new Users();
        return $this->response->setJSON($model->getUserWithParams('user'));
    }

    public function update($id)
    {
        $model = new Orders();

        if (!$this->request->isAJAX()) {
            return;
        }

        $method = $this->request->getMethod(true);

        if ($method === 'POST') {
            if (!session()->get('role') == 'user') {
                $data = [
                    'alamat_db'   => $this->request->getPost('alamat_db'),
                    'tanggal_db'   => $this->request->getPost('tanggal_db'),
                    'nomor_user'   => $this->request->getPost('nomor_user'),
                    'luas_sawah'   => $this->request->getPost('luas_sawah'),
                    'jenis_tanaman'   => $this->request->getPost('jenis_tanaman'),
                    'admin'   => $this->request->getPost('admin'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
            } else {
                $data = [
                    'alamat_db'   => $this->request->getPost('alamat_db'),
                    'tanggal_db'   => $this->request->getPost('tanggal_db'),
                    'nomor_user'   => $this->request->getPost('nomor_user'),
                    'luas_sawah'   => $this->request->getPost('luas_sawah'),
                    'jenis_tanaman'   => $this->request->getPost('jenis_tanaman'),
                    'admin'   => $this->request->getPost('admin'),
                    'status'   => $this->request->getPost('status'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
            }

            $status = $model->update($id, $data);

            $response = [
                'status' => $status,
                'icon' => $status ? 'success' : 'error',
                'title' => $status ? 'Success!' : 'Warning!',
                'text' => $status ? 'Berhasil menyimpan data order.' : 'Gagal menyimpan data order.',
            ];
        } elseif ($method === 'GET') {
            $response = [
                'data' => $model->getOrderById($id),
            ];
        }
        return $this->response->setJSON($response);
    }

    public function delete($id)
    {
        $model = new Orders();
        if (!$this->request->isAJAX()) {
            return;
        }
    
        $deleted = $model->where('id', $id)->delete($id);
    
        $response = [
            'status' => $deleted,
            'icon' => $deleted ? 'success' : 'error',
            'title' => $deleted ? 'Success!' : 'Warning!',
            'text' => $deleted ? 'Berhasil hapus data order.' : 'Gagal hapus data order.',
        ];
    
        return $this->response->setJSON($response);
    }

    public function export($start, $end, $id)
    {
        $model = new Orders();
        $modelUser = new Users();
        $dataUser = $model->findDataInBetweenByUsersId($start, $end, $id);
        $admin = $modelUser->where('id', $id)->first();
        //dd($dataUser);
        $spreadsheet = new PhpSpreadsheet();
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No.')
            ->setCellValue('B1', 'Nama Pelanggan')
            ->setCellValue('C1', 'Nomor User')
            ->setCellValue('D1', 'Luas Sawah')
            ->setCellValue('E1', 'Jenis Tanaman')
            ->setCellValue('F1', 'Tanggal DB');

        $column = 2;
        $no = 1;

        // tulis data mobil ke cell
        foreach($dataUser as $data) {
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A' . $column, $no++)
            ->setCellValue('B' . $column, $data['name'])
            ->setCellValue('C' . $column, $data['nomor_user'])
            ->setCellValue('D' . $column, $data['luas_sawah'])
            ->setCellValue('E' . $column, $data['jenis'])
            ->setCellValue('F' . $column, $data['tanggal_db']);
    
        $column++;
        }

        // tulis dalam format .xlsx
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Laporan Admin_'. $admin['name'] .' | ' . $start . ' - ' . $end ;

        // Redirect hasil generate xlsx ke web client
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename='.$fileName.'.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
