<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title><?= $title ?></title>
  <style>
    body {
      font-family: Arial, sans-serif;
      font-size: 12px;
      margin: 0;
      padding: 20px;
    }

    .header {
      text-align: center;
      margin-bottom: 30px;
      border-bottom: 2px solid #333;
      padding-bottom: 20px;
    }

    .header h1 {
      margin: 0;
      color: #333;
    }

    .header p {
      margin: 5px 0;
      color: #666;
    }

    .info-section {
      margin-bottom: 20px;
    }

    .info-section h3 {
      background-color: #f5f5f5;
      padding: 10px;
      margin: 0 0 10px 0;
      border-left: 4px solid #28a745;
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
      padding: 15px;
      border-radius: 5px;
      margin-bottom: 20px;
    }

    .summary h4 {
      margin: 0 0 10px 0;
      color: #333;
    }

    .summary-row {
      display: flex;
      justify-content: space-between;
      margin-bottom: 5px;
    }

    .summary-label {
      font-weight: bold;
    }

    .footer {
      margin-top: 30px;
      text-align: center;
      font-size: 10px;
      color: #666;
      border-top: 1px solid #ddd;
      padding-top: 10px;
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
    <h4>Ringkasan Statistik</h4>
    <div class="summary-row">
      <span class="summary-label">Total Transaksi:</span>
      <span><?= number_format($total_statistik['total_transaksi'] ?? 0) ?></span>
    </div>
    <div class="summary-row">
      <span class="summary-label">Total Omset:</span>
      <span>Rp <?= number_format($total_statistik['total_omset'] ?? 0, 0, ',', '.') ?></span>
    </div>
    <div class="summary-row">
      <span class="summary-label">Total Agen Aktif:</span>
      <span><?= count($laporan_performa) ?></span>
    </div>
    <div class="summary-row">
      <span class="summary-label">Rata-rata Harga:</span>
      <span>Rp <?= number_format($total_statistik['rata_rata_harga'] ?? 0, 0, ',', '.') ?></span>
    </div>
  </div>

  <!-- Laporan Performa Agen -->
  <div class="info-section">
    <h3>Performa Agen</h3>
    <table>
      <thead>
        <tr>
          <th style="width: 5%;">No</th>
          <th style="width: 20%;">Nama Agen</th>
          <th style="width: 20%;">Email</th>
          <th style="width: 10%;" class="text-center">Total Penjualan</th>
          <th style="width: 15%;" class="text-right">Total Omset</th>
          <th style="width: 15%;" class="text-right">Rata-rata Harga Jual</th>
          <th style="width: 15%;" class="text-center">Penjualan Pertama</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; ?>
        <?php foreach ($laporan_performa as $performa): ?>
          <tr>
            <td class="text-center"><?= $no++ ?></td>
            <td><?= $performa['nama_agen'] ?></td>
            <td><?= $performa['email_agen'] ?></td>
            <td class="text-center"><?= number_format($performa['total_penjualan']) ?></td>
            <td class="text-right">Rp <?= number_format($performa['total_omset'], 0, ',', '.') ?></td>
            <td class="text-right">Rp <?= number_format($performa['rata_rata_harga_jual'], 0, ',', '.') ?></td>
            <td class="text-center">
              <?= $performa['penjualan_pertama'] ? date('d/m/Y', strtotime($performa['penjualan_pertama'])) : '-' ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <div class="footer">
    <p>Laporan ini dibuat secara otomatis pada <?= date('d/m/Y H:i:s') ?></p>
  </div>
</body>

</html>