<?php

namespace App\Controllers\Dashboard;

use App\Models\TransactionModel;
use App\Controllers\BaseController;

class Transaksi extends BaseController
{
    protected $transactionModel;

    public function __construct()
    {
        $this->transactionModel = new TransactionModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Transaksi',
            'subtitle' => 'Kelola semua daftar transaksi Anda di Sini.',
        ];
        return $this->template->display('dashboard/transaksi', $data);
    }

    public function store()
    {
        $property_id = $this->request->getPost('property_id');
        $agent_id = $this->request->getPost('agent_id');
        $price = str_replace('.', '', $this->request->getPost('price'));
        $buyer = $this->request->getPost('buyer');
        $wa_buyer = $this->request->getPost('wa_buyer');
        $tanggal_penjualan = $this->request->getPost('tanggal_penjualan');
        $tanggal_serah_terima = $this->request->getPost('tanggal_serah_terima');

        $data = [
            'property_id' => $property_id,
            'agent_id' => $agent_id,
            'price' => $price,
            'buyer' => $buyer,
            'wa_buyer' => $wa_buyer,
            'tanggal_penjualan' => $tanggal_penjualan,
            'tanggal_serah_terima' => $tanggal_serah_terima,
        ];

        $validation = \Config\Services::validation();
        $validation->setRules([
            'property_id' => 'required|numeric',
            'agent_id' => 'required|numeric',
            'buyer' => 'required|min_length[3]|max_length[50]',
            'wa_buyer' => 'required|numeric',
            'tanggal_penjualan' => 'required|valid_date',
            'tanggal_serah_terima' => 'required|valid_date',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON([
                'title' => 'Gagal',
                'icon' => 'Validasi gagal',
                'text' => $validation->getErrors()
            ]);
        }

        try {
            $this->transactionModel->insert($data);
            $id = $this->transactionModel->insertID();
            session()->setFlashdata([
                'title' => 'Berhasil',
                'icon' => 'success',
                'text' => 'Transaksi berhasil disimpan'
            ]);
        } catch (\Exception $e) {
            session()->setFlashdata([
                'title' => 'Gagal',
                'icon' => 'error',
                'text' => $e->getMessage()
            ]);
        }
        return redirect()->to(base_url('dashboard/transaksi'));
    }

}
