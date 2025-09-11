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
      border-left: 4px solid #007bff;
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
      <span class="summary-label">Rata-rata Harga:</span>
      <span>Rp <?= number_format($total_statistik['rata_rata_harga'] ?? 0, 0, ',', '.') ?></span>
    </div>
    <div class="summary-row">
      <span class="summary-label">Harga Terendah:</span>
      <span>Rp <?= number_format($total_statistik['harga_terendah'] ?? 0, 0, ',', '.') ?></span>
    </div>
    <div class="summary-row">
      <span class="summary-label">Harga Tertinggi:</span>
      <span>Rp <?= number_format($total_statistik['harga_tertinggi'] ?? 0, 0, ',', '.') ?></span>
    </div>
  </div>

  <!-- Detail Penjualan -->
  <div class="info-section">
    <h3>Detail Penjualan Properti</h3>
    <table>
      <thead>
        <tr>
          <th style="width: 5%;">No</th>
          <th style="width: 12%;">Tanggal Penjualan</th>
          <th style="width: 20%;">Judul Properti</th>
          <th style="width: 12%;">Kategori</th>
          <th style="width: 20%;">Alamat</th>
          <th style="width: 15%;">Pembeli</th>
          <th style="width: 16%;" class="text-right">Harga Jual</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; ?>
        <?php foreach ($laporan_penjualan as $penjualan): ?>
          <tr>
            <td class="text-center"><?= $no++ ?></td>
            <td><?= date('d/m/Y', strtotime($penjualan['tanggal_penjualan'])) ?></td>
            <td><?= $penjualan['judul_properti'] ?></td>
            <td><?= $penjualan['kategori'] ?></td>
            <td><?= $penjualan['alamat'] . ', ' . $penjualan['kota'] . ', ' . $penjualan['provinsi'] ?></td>
            <td><?= $penjualan['buyer'] ?></td>
            <td class="text-right">Rp <?= number_format($penjualan['harga_jual'], 0, ',', '.') ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <!-- Laporan By Kategori -->
  <?php if (!empty($laporan_by_kategori)): ?>
    <div class="info-section">
      <h3>Penjualan Berdasarkan Kategori</h3>
      <table>
        <thead>
          <tr>
            <th style="width: 40%;">Kategori</th>
            <th style="width: 20%;" class="text-center">Total Transaksi</th>
            <th style="width: 20%;" class="text-right">Total Omset</th>
            <th style="width: 20%;" class="text-right">Rata-rata Harga</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($laporan_by_kategori as $kategori): ?>
            <tr>
              <td><?= $kategori['nama_kategori'] ?></td>
              <td class="text-center"><?= number_format($kategori['total_transaksi']) ?></td>
              <td class="text-right">Rp <?= number_format($kategori['total_omset'], 0, ',', '.') ?></td>
              <td class="text-right">Rp <?= number_format($kategori['rata_rata_harga'], 0, ',', '.') ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php endif; ?>

  <div class="footer">
    <p>Laporan ini dibuat secara otomatis pada <?= date('d/m/Y H:i:s') ?></p>
  </div>
</body>

</html>