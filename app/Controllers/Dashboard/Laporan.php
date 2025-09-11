<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\LaporanModel;
use App\Models\CategoryModel;
use App\Models\UserModel;

class Laporan extends BaseController
{
  protected $laporanModel;
  protected $categoryModel;
  protected $userModel;

  public function __construct()
  {
    $this->laporanModel = new LaporanModel();
    $this->categoryModel = new CategoryModel();
    $this->userModel = new UserModel();
  }

  /**
   * Halaman utama laporan
   */
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
      )
    ];

    return view('dashboard/laporan/index', $data);
  }

  /**
   * Laporan penjualan properti
   */
  public function penjualan()
  {
    $tahun = $this->request->getGet('tahun') ?? date('Y');
    $bulan = $this->request->getGet('bulan') ?? date('n');

    $data = [
      'title' => 'Laporan Penjualan Properti',
      'tahun_terpilih' => $tahun,
      'bulan_terpilih' => $bulan,
      'tahun_tersedia' => $this->laporanModel->getTahunTersedia(),
      'bulan_tersedia' => $this->laporanModel->getBulanTersedia($tahun),
      'laporan_penjualan' => $this->laporanModel->getLaporanPenjualan($tahun, $bulan),
      'laporan_by_kategori' => $this->laporanModel->getLaporanPenjualanByKategori($tahun, $bulan),
      'total_statistik' => $this->laporanModel->getTotalStatistikPenjualan($tahun, $bulan)
    ];

    return view('dashboard/laporan/penjualan', $data);
  }

  /**
   * Laporan performa agen
   */
  public function performaAgen()
  {
    $tahun = $this->request->getGet('tahun') ?? date('Y');
    $bulan = $this->request->getGet('bulan') ?? date('n');

    $data = [
      'title' => 'Laporan Performa Agen',
      'tahun_terpilih' => $tahun,
      'bulan_terpilih' => $bulan,
      'tahun_tersedia' => $this->laporanModel->getTahunTersedia(),
      'bulan_tersedia' => $this->laporanModel->getBulanTersedia($tahun),
      'laporan_performa' => $this->laporanModel->getLaporanPerformaAgen($tahun, $bulan),
      'total_statistik' => $this->laporanModel->getTotalStatistikPenjualan($tahun, $bulan)
    ];

    return view('dashboard/laporan/performa_agen', $data);
  }

  /**
   * Detail penjualan agen
   */
  public function detailAgen($agent_id)
  {
    $tahun = $this->request->getGet('tahun') ?? date('Y');
    $bulan = $this->request->getGet('bulan') ?? date('n');

    // Ambil data agen
    $agen = $this->userModel->find($agent_id);
    if (!$agen) {
      return redirect()->to('dashboard/laporan/performa-agen')->with('error', 'Agen tidak ditemukan');
    }

    $data = [
      'title' => 'Detail Penjualan Agen - ' . $agen['name'],
      'tahun_terpilih' => $tahun,
      'bulan_terpilih' => $bulan,
      'tahun_tersedia' => $this->laporanModel->getTahunTersedia(),
      'bulan_tersedia' => $this->laporanModel->getBulanTersedia($tahun),
      'agen' => $agen,
      'detail_penjualan' => $this->laporanModel->getDetailPenjualanAgen($agent_id, $tahun, $bulan)
    ];

    return view('dashboard/laporan/detail_agen', $data);
  }

  /**
   * Export laporan penjualan ke PDF
   */
  public function exportPenjualanPdf()
  {
    $tahun = $this->request->getGet('tahun') ?? date('Y');
    $bulan = $this->request->getGet('bulan') ?? date('n');

    $data = [
      'title' => 'Laporan Penjualan Properti',
      'tahun' => $tahun,
      'bulan' => $bulan,
      'laporan_penjualan' => $this->laporanModel->getLaporanPenjualan($tahun, $bulan),
      'laporan_by_kategori' => $this->laporanModel->getLaporanPenjualanByKategori($tahun, $bulan),
      'total_statistik' => $this->laporanModel->getTotalStatistikPenjualan($tahun, $bulan)
    ];

    // Load library dompdf
    $dompdf = new \Dompdf\Dompdf();
    $html = view('dashboard/laporan/export_penjualan_pdf', $data);
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    $dompdf->stream('laporan_penjualan_' . $tahun . '_' . $bulan . '.pdf', ['Attachment' => false]);
  }

  /**
   * Export laporan performa agen ke PDF
   */
  public function exportPerformaAgenPdf()
  {
    $tahun = $this->request->getGet('tahun') ?? date('Y');
    $bulan = $this->request->getGet('bulan') ?? date('n');

    $data = [
      'title' => 'Laporan Performa Agen',
      'tahun' => $tahun,
      'bulan' => $bulan,
      'laporan_performa' => $this->laporanModel->getLaporanPerformaAgen($tahun, $bulan),
      'total_statistik' => $this->laporanModel->getTotalStatistikPenjualan($tahun, $bulan)
    ];

    // Load library dompdf
    $dompdf = new \Dompdf\Dompdf();
    $html = view('dashboard/laporan/export_performa_agen_pdf', $data);
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    $dompdf->stream('laporan_performa_agen_' . $tahun . '_' . $bulan . '.pdf', ['Attachment' => false]);
  }

  /**
   * Export laporan penjualan ke Excel
   */
  public function exportPenjualanExcel()
  {
    $tahun = $this->request->getGet('tahun') ?? date('Y');
    $bulan = $this->request->getGet('bulan') ?? date('n');

    $data = [
      'title' => 'Laporan Penjualan Properti',
      'tahun' => $tahun,
      'bulan' => $bulan,
      'laporan_penjualan' => $this->laporanModel->getLaporanPenjualan($tahun, $bulan),
      'laporan_by_kategori' => $this->laporanModel->getLaporanPenjualanByKategori($tahun, $bulan),
      'total_statistik' => $this->laporanModel->getTotalStatistikPenjualan($tahun, $bulan)
    ];

    return view('dashboard/laporan/export_penjualan_excel', $data);
  }

  /**
   * Export laporan performa agen ke Excel
   */
  public function exportPerformaAgenExcel()
  {
    $tahun = $this->request->getGet('tahun') ?? date('Y');
    $bulan = $this->request->getGet('bulan') ?? date('n');

    $data = [
      'title' => 'Laporan Performa Agen',
      'tahun' => $tahun,
      'bulan' => $bulan,
      'laporan_performa' => $this->laporanModel->getLaporanPerformaAgen($tahun, $bulan),
      'total_statistik' => $this->laporanModel->getTotalStatistikPenjualan($tahun, $bulan)
    ];

    return view('dashboard/laporan/export_performa_agen_excel', $data);
  }

  /**
   * API untuk mendapatkan data laporan penjualan (untuk AJAX)
   */
  public function getDataPenjualan()
  {
    $tahun = $this->request->getGet('tahun') ?? date('Y');
    $bulan = $this->request->getGet('bulan') ?? date('n');

    $data = $this->laporanModel->getLaporanPenjualan($tahun, $bulan);

    return $this->response->setJSON([
      'success' => true,
      'data' => $data
    ]);
  }

  /**
   * API untuk mendapatkan data performa agen (untuk AJAX)
   */
  public function getDataPerformaAgen()
  {
    $tahun = $this->request->getGet('tahun') ?? date('Y');
    $bulan = $this->request->getGet('bulan') ?? date('n');

    $data = $this->laporanModel->getLaporanPerformaAgen($tahun, $bulan);

    return $this->response->setJSON([
      'success' => true,
      'data' => $data
    ]);
  }
}
