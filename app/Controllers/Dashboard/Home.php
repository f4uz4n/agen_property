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
        usort($agents, function ($a, $b) {
            return $b['omset'] <=> $a['omset'];
        });
        $agents = array_slice($agents, 0, 10);
        $agent_id = session('role') == 'agen' ? session('id') : null;
        $data = [
            'title' => 'Laporan Penjualan & Performa Agen',
            'total_statistik' => $this->laporanModel->getTotalStatistikPenjualan(
                $this->request->getGet('tahun') ?? date('Y'),
                null,
                $agent_id
            ),
            'agents' => $agents,
        ];
        return $this->template->display('dashboard/home', $data);
    }
}
