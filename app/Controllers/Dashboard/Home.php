<?php

namespace App\Controllers\Dashboard;

use App\Models\LaporanModel;
use App\Controllers\BaseController;

class Home extends BaseController
{
    protected $laporanModel;

    public function __construct()
    {
        $this->laporanModel = new LaporanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Laporan Penjualan & Performa Agen',
            'tahun_terpilih' => $this->request->getGet('tahun') ?? date('Y'),
            'bulan_terpilih' => $this->request->getGet('bulan') ?? date('n'),
            'tahun_tersedia' => $this->laporanModel->getTahunTersedia(),
            'bulan_tersedia' => $this->laporanModel->getBulanTersedia($this->request->getGet('tahun') ?? date('Y')),
            'total_statistik' => $this->laporanModel->getTotalStatistikPenjualan(
                $this->request->getGet('tahun') ?? date('Y'),
                $this->request->getGet('bulan') ?? date('n')
            ),
            'statistik_per_bulan' => $this->laporanModel->getStatistikPenjualanPerBulan(
                $this->request->getGet('tahun') ?? date('Y')
            ),
            'bulan_names' => get_bulan(),
        ];
        return $this->template->display('dashboard/home', $data);
    }
}
