<?php
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="laporan_performa_agen_' . $tahun . '_' . $bulan . '.xls"');
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
        <td><strong>Total Agen Aktif:</strong></td>
        <td><?= count($laporan_performa) ?></td>
        <td><strong>Rata-rata Harga:</strong></td>
        <td>Rp <?= number_format($total_statistik['rata_rata_harga'] ?? 0, 0, ',', '.') ?></td>
      </tr>
    </table>
  </div>

  <!-- Laporan Performa Agen -->
  <h3>Performa Agen</h3>
  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Agen</th>
        <th>Email</th>
        <th>Total Penjualan</th>
        <th>Total Omset</th>
        <th>Rata-rata Harga Jual</th>
        <th>Penjualan Pertama</th>
        <th>Penjualan Terakhir</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; ?>
      <?php foreach ($laporan_performa as $performa): ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $performa['nama_agen'] ?></td>
          <td><?= $performa['email_agen'] ?></td>
          <td><?= number_format($performa['total_penjualan']) ?></td>
          <td><?= $performa['total_omset'] ?></td>
          <td><?= $performa['rata_rata_harga_jual'] ?></td>
          <td><?= $performa['penjualan_pertama'] ? date('d/m/Y', strtotime($performa['penjualan_pertama'])) : '-' ?></td>
          <td><?= $performa['penjualan_terakhir'] ? date('d/m/Y', strtotime($performa['penjualan_terakhir'])) : '-' ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</body>

</html>