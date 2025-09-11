<?php
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="laporan_penjualan_' . $tahun . '_' . $bulan . '.xls"');
header('Cache-Control: max-age=0');
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title><?= $title ?></title>
  <style>
    body {
      font-family: Arial, sans-serif;
      font-size: 12px;
    }

    .header {
      text-align: center;
      margin-bottom: 20px;
    }

    .header h1 {
      margin: 0;
      color: #333;
    }

    .header p {
      margin: 5px 0;
      color: #666;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    th,
    td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #f8f9fa;
      font-weight: bold;
    }

    .text-right {
      text-align: right;
    }

    .text-center {
      text-align: center;
    }

    .summary {
      background-color: #f8f9fa;
      padding: 10px;
      margin-bottom: 20px;
    }
  </style>
</head>

<body>
  <div class="header">
    <h1><?= $title ?></h1>
    <p>Periode: <?= $tahun ?><?= $bulan ? ' - ' . date('F', mktime(0, 0, 0, $bulan, 1)) : '' ?></p>
    <p>Tanggal Cetak: <?= date('d/m/Y H:i:s') ?></p>
  </div>

  <!-- Summary Statistics -->
  <div class="summary">
    <h3>Ringkasan Statistik</h3>
    <table>
      <tr>
        <td><strong>Total Transaksi:</strong></td>
        <td><?= number_format($total_statistik['total_transaksi'] ?? 0) ?></td>
        <td><strong>Total Omset:</strong></td>
        <td>Rp <?= number_format($total_statistik['total_omset'] ?? 0, 0, ',', '.') ?></td>
      </tr>
      <tr>
        <td><strong>Rata-rata Harga:</strong></td>
        <td>Rp <?= number_format($total_statistik['rata_rata_harga'] ?? 0, 0, ',', '.') ?></td>
        <td><strong>Harga Tertinggi:</strong></td>
        <td>Rp <?= number_format($total_statistik['harga_tertinggi'] ?? 0, 0, ',', '.') ?></td>
      </tr>
    </table>
  </div>

  <!-- Detail Penjualan -->
  <h3>Detail Penjualan Properti</h3>
  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Tanggal Penjualan</th>
        <th>Judul Properti</th>
        <th>Kategori</th>
        <th>Alamat</th>
        <th>Kota</th>
        <th>Provinsi</th>
        <th>Pembeli</th>
        <th>Harga Jual</th>
        <th>Agen</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; ?>
      <?php foreach ($laporan_penjualan as $penjualan): ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= date('d/m/Y', strtotime($penjualan['tanggal_penjualan'])) ?></td>
          <td><?= $penjualan['judul_properti'] ?></td>
          <td><?= $penjualan['kategori'] ?></td>
          <td><?= $penjualan['alamat'] ?></td>
          <td><?= $penjualan['kota'] ?></td>
          <td><?= $penjualan['provinsi'] ?></td>
          <td><?= $penjualan['buyer'] ?></td>
          <td><?= $penjualan['harga_jual'] ?></td>
          <td><?= $penjualan['nama_agen'] ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <!-- Laporan By Kategori -->
  <?php if (!empty($laporan_by_kategori)): ?>
    <h3>Penjualan Berdasarkan Kategori</h3>
    <table>
      <thead>
        <tr>
          <th>Kategori</th>
          <th>Total Transaksi</th>
          <th>Total Omset</th>
          <th>Rata-rata Harga</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($laporan_by_kategori as $kategori): ?>
          <tr>
            <td><?= $kategori['nama_kategori'] ?></td>
            <td><?= number_format($kategori['total_transaksi']) ?></td>
            <td><?= $kategori['total_omset'] ?></td>
            <td><?= $kategori['rata_rata_harga'] ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</body>

</html>