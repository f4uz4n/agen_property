<?php

namespace App\Controllers\Dashboard;

use App\Models\UserModel;
use App\Models\LaporanModel;
use App\Controllers\BaseController;

class Home extends BaseController
{
    protected $userModel;
    protected $laporanModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->laporanModel = new LaporanModel();
    }

    public function index()
    {
        $agents = $this->userModel->getAgents();
        usort($agents, function($a, $b) {
            return $b['omset'] <=> $a['omset'];
        });
        $agents = array_slice($agents, 0, 10);

        $data = [
            'title' => 'Laporan Penjualan & Performa Agen',
            'tahun_terpilih' => $this->request->getGet('tahun') ?? date('Y'),
            'bulan_terpilih' => $this->request->getGet('bulan') ?? date('n'),
            'tahun_tersedia' => $this->laporanModel->getTahunTersedia(),
            'bulan_tersedia' => $this->laporanModel->getBulanTersedia($this->request->getGet('tahun') ?? date('Y')),
            'total_statistik' => $this->laporanModel->getTotalStatistikPenjualan(
                $this->request->getGet('tahun') ?? date('Y')
            ),
            'statistik_per_bulan' => $this->laporanModel->getStatistikPenjualanPerBulan(
                $this->request->getGet('tahun') ?? date('Y')
            ),
            'bulan_names' => get_bulan(),
            'agents' => $agents,
        ];
        return $this->template->display('dashboard/home', $data);
    }
}
