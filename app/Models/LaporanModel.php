<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanModel extends Model
{
  protected $table = 'transactions';
  protected $primaryKey = 'id';
  protected $useAutoIncrement = true;
  protected $returnType = 'array';
  protected $protectFields = false;

  /**
   * Mendapatkan laporan penjualan properti berdasarkan filter tahun dan bulan
   */
  public function getLaporanPenjualan($tahun = null, $bulan = null)
  {
    $builder = $this->db->table('transactions t');
    $builder->select('
            t.id as transaksi_id,
            t.property_id,
            t.buyer,
            t.wa_buyer,
            t.price as harga_jual,
            t.tanggal_penjualan,
            t.tanggal_serah_terima,
            t.status as status_transaksi,
            p.title as judul_properti,
            p.type as tipe_properti,
            p.address as alamat,
            p.city as kota,
            p.province as provinsi,
            c.name as kategori,
            u.name as nama_agen,
            u.email as email_agen
        ');
    $builder->join('properties p', 't.property_id = p.id', 'left');
    $builder->join('categories c', 'p.type = c.id', 'left');
    $builder->join('agents a', 't.property_id = a.property_id', 'left');
    $builder->join('users u', 'a.agent_id = u.id', 'left');
    $builder->where('t.status', 'selesai');

    // Filter berdasarkan tahun
    if ($tahun) {
      $builder->where('YEAR(t.tanggal_penjualan)', $tahun);
    }

    // Filter berdasarkan bulan
    if ($bulan) {
      $builder->where('MONTH(t.tanggal_penjualan)', $bulan);
    }

    $builder->orderBy('t.tanggal_penjualan', 'DESC');

    return $builder->get()->getResultArray();
  }

  /**
   * Mendapatkan statistik penjualan per bulan
   */
  public function getStatistikPenjualanPerBulan($tahun = null)
  {
    $builder = $this->db->table('transactions t');
    $builder->select('
            MONTH(t.tanggal_penjualan) as bulan,
            COUNT(t.id) as total_transaksi,
            SUM(t.price) as total_penjualan,
            AVG(t.price) as rata_rata_harga
        ');
    $builder->where('t.status', 'selesai');

    if ($tahun) {
      $builder->where('YEAR(t.tanggal_penjualan)', $tahun);
    }

    $builder->groupBy('MONTH(t.tanggal_penjualan)');
    $builder->orderBy('bulan', 'ASC');

    return $builder->get()->getResultArray();
  }

  /**
   * Mendapatkan laporan performa agen
   */
  public function getLaporanPerformaAgen($tahun = null, $bulan = null)
  {
    $builder = $this->db->table('agents a');
    $builder->select('
            u.id as agent_id,
            u.name as nama_agen,
            u.email as email_agen,
            COUNT(DISTINCT t.id) as total_penjualan,
            SUM(t.price) as total_omset,
            AVG(t.price) as rata_rata_harga_jual,
            MIN(t.tanggal_penjualan) as penjualan_pertama,
            MAX(t.tanggal_penjualan) as penjualan_terakhir
        ');
    $builder->join('users u', 'a.agent_id = u.id', 'left');
    $builder->join('transactions t', 'a.property_id = t.property_id', 'left');
    $builder->where('t.status', 'selesai');

    // Filter berdasarkan tahun
    if ($tahun) {
      $builder->where('YEAR(t.tanggal_penjualan)', $tahun);
    }

    // Filter berdasarkan bulan
    if ($bulan) {
      $builder->where('MONTH(t.tanggal_penjualan)', $bulan);
    }

    $builder->groupBy('u.id, u.name, u.email');
    $builder->orderBy('total_omset', 'DESC');

    return $builder->get()->getResultArray();
  }

  /**
   * Mendapatkan detail penjualan per agen
   */
  public function getDetailPenjualanAgen($agent_id, $tahun = null, $bulan = null)
  {
    $builder = $this->db->table('transactions t');
    $builder->select('
            t.id as transaksi_id,
            t.property_id,
            t.buyer,
            t.price as harga_jual,
            t.tanggal_penjualan,
            t.status as status_transaksi,
            p.title as judul_properti,
            p.address as alamat,
            c.name as kategori
        ');
    $builder->join('properties p', 't.property_id = p.id', 'left');
    $builder->join('categories c', 'p.type = c.id', 'left');
    $builder->join('agents a', 't.property_id = a.property_id', 'left');
    $builder->where('a.agent_id', $agent_id);
    $builder->where('t.status', 'selesai');

    // Filter berdasarkan tahun
    if ($tahun) {
      $builder->where('YEAR(t.tanggal_penjualan)', $tahun);
    }

    // Filter berdasarkan bulan
    if ($bulan) {
      $builder->where('MONTH(t.tanggal_penjualan)', $bulan);
    }

    $builder->orderBy('t.tanggal_penjualan', 'DESC');

    return $builder->get()->getResultArray();
  }

  /**
   * Mendapatkan total statistik penjualan
   */
  public function getTotalStatistikPenjualan($tahun = null, $bulan = null)
  {
    $builder = $this->db->table('transactions t');
    $builder->select('
            COUNT(t.id) as total_transaksi,
            SUM(t.price) as total_omset,
            AVG(t.price) as rata_rata_harga,
            MIN(t.price) as harga_terendah,
            MAX(t.price) as harga_tertinggi
        ');
    $builder->where('t.status', 'selesai');

    // Filter berdasarkan tahun
    if ($tahun) {
      $builder->where('YEAR(t.tanggal_penjualan)', $tahun);
    }

    // Filter berdasarkan bulan
    if ($bulan) {
      $builder->where('MONTH(t.tanggal_penjualan)', $bulan);
    }

    return $builder->get()->getRowArray();
  }

  /**
   * Mendapatkan laporan penjualan berdasarkan kategori properti
   */
  public function getLaporanPenjualanByKategori($tahun = null, $bulan = null)
  {
    $builder = $this->db->table('transactions t');
    $builder->select('
            c.id as kategori_id,
            c.name as nama_kategori,
            COUNT(t.id) as total_transaksi,
            SUM(t.price) as total_omset,
            AVG(t.price) as rata_rata_harga
        ');
    $builder->join('properties p', 't.property_id = p.id', 'left');
    $builder->join('categories c', 'p.type = c.id', 'left');
    $builder->where('t.status', 'selesai');

    // Filter berdasarkan tahun
    if ($tahun) {
      $builder->where('YEAR(t.tanggal_penjualan)', $tahun);
    }

    // Filter berdasarkan bulan
    if ($bulan) {
      $builder->where('MONTH(t.tanggal_penjualan)', $bulan);
    }

    $builder->groupBy('c.id, c.name');
    $builder->orderBy('total_omset', 'DESC');

    return $builder->get()->getResultArray();
  }

  /**
   * Mendapatkan daftar tahun yang tersedia untuk filter
   */
  public function getTahunTersedia()
  {
    $builder = $this->db->table('transactions t');
    $builder->select('DISTINCT YEAR(t.tanggal_penjualan) as tahun');
    $builder->where('t.status', 'selesai');
    $builder->where('t.tanggal_penjualan IS NOT NULL');
    $builder->orderBy('tahun', 'DESC');

    return $builder->get()->getResultArray();
  }

  /**
   * Mendapatkan daftar bulan yang tersedia untuk filter
   */
  public function getBulanTersedia($tahun = null)
  {
    $builder = $this->db->table('transactions t');
    $builder->select('DISTINCT MONTH(t.tanggal_penjualan) as bulan');
    $builder->where('t.status', 'selesai');
    $builder->where('t.tanggal_penjualan IS NOT NULL');

    if ($tahun) {
      $builder->where('YEAR(t.tanggal_penjualan)', $tahun);
    }

    $builder->orderBy('bulan', 'ASC');

    return $builder->get()->getResultArray();
  }
}
