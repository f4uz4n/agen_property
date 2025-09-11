<?= $this->extend('template/dashboard') ?>

<?= $this->section('content') ?>
<div class="page-header">
  <h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white me-2">
      <i class="mdi mdi-home-variant"></i>
    </span>
    Laporan Penjualan Properti
  </h3>
  <nav aria-label="breadcrumb">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url('dashboard/laporan') ?>">Laporan</a></li>
      <li class="breadcrumb-item active" aria-current="page">Penjualan Properti</li>
    </ul>
  </nav>
</div>

<!-- Filter Section -->
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Filter Laporan</h4>
        <form method="GET" action="<?= base_url('dashboard/laporan/penjualan') ?>" class="row g-3">
          <div class="col-md-4">
            <label for="tahun" class="form-label">Tahun</label>
            <select class="form-select" id="tahun" name="tahun" onchange="this.form.submit()">
              <option value="">Pilih Tahun</option>
              <?php foreach ($tahun_tersedia as $tahun): ?>
                <option value="<?= $tahun['tahun'] ?>" <?= $tahun['tahun'] == $tahun_terpilih ? 'selected' : '' ?>>
                  <?= $tahun['tahun'] ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="col-md-4">
            <label for="bulan" class="form-label">Bulan</label>
            <select class="form-select" id="bulan" name="bulan" onchange="this.form.submit()">
              <option value="">Semua Bulan</option>
              <?php
              $bulan_names = [
                1 => 'Januari',
                2 => 'Februari',
                3 => 'Maret',
                4 => 'April',
                5 => 'Mei',
                6 => 'Juni',
                7 => 'Juli',
                8 => 'Agustus',
                9 => 'September',
                10 => 'Oktober',
                11 => 'November',
                12 => 'Desember'
              ];
              foreach ($bulan_tersedia as $bulan): ?>
                <option value="<?= $bulan['bulan'] ?>" <?= $bulan['bulan'] == $bulan_terpilih ? 'selected' : '' ?>>
                  <?= $bulan_names[$bulan['bulan']] ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="col-md-4">
            <label class="form-label">&nbsp;</label>
            <div>
              <button type="submit" class="btn btn-primary">Filter</button>
              <a href="<?= base_url('dashboard/laporan/penjualan') ?>" class="btn btn-secondary">Reset</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Statistik Overview -->
<div class="row">
  <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-9">
            <div class="d-flex align-items-center align-self-start">
              <h3 class="mb-0"><?= number_format($total_statistik['total_transaksi'] ?? 0) ?></h3>
            </div>
          </div>
          <div class="col-3">
            <div class="icon icon-box-success">
              <span class="mdi mdi-arrow-top-right icon-item"></span>
            </div>
          </div>
        </div>
        <h6 class="text-muted font-weight-normal">Total Transaksi</h6>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-9">
            <div class="d-flex align-items-center align-self-start">
              <h3 class="mb-0">Rp <?= number_format($total_statistik['total_omset'] ?? 0, 0, ',', '.') ?></h3>
            </div>
          </div>
          <div class="col-3">
            <div class="icon icon-box-success">
              <span class="mdi mdi-arrow-top-right icon-item"></span>
            </div>
          </div>
        </div>
        <h6 class="text-muted font-weight-normal">Total Omset</h6>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-9">
            <div class="d-flex align-items-center align-self-start">
              <h3 class="mb-0">Rp <?= number_format($total_statistik['rata_rata_harga'] ?? 0, 0, ',', '.') ?></h3>
            </div>
          </div>
          <div class="col-3">
            <div class="icon icon-box-success">
              <span class="mdi mdi-arrow-top-right icon-item"></span>
            </div>
          </div>
        </div>
        <h6 class="text-muted font-weight-normal">Rata-rata Harga</h6>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-9">
            <div class="d-flex align-items-center align-self-start">
              <h3 class="mb-0">Rp <?= number_format($total_statistik['harga_tertinggi'] ?? 0, 0, ',', '.') ?></h3>
            </div>
          </div>
          <div class="col-3">
            <div class="icon icon-box-success">
              <span class="mdi mdi-arrow-top-right icon-item"></span>
            </div>
          </div>
        </div>
        <h6 class="text-muted font-weight-normal">Harga Tertinggi</h6>
      </div>
    </div>
  </div>
</div>

<!-- Export Buttons -->
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Export Laporan</h4>
        <div class="btn-group" role="group">
          <a href="<?= base_url('dashboard/laporan/export-penjualan-pdf?tahun=' . $tahun_terpilih . '&bulan=' . $bulan_terpilih) ?>"
            class="btn btn-danger" target="_blank">
            <i class="mdi mdi-file-pdf"></i> Export PDF
          </a>
          <a href="<?= base_url('dashboard/laporan/export-penjualan-excel?tahun=' . $tahun_terpilih . '&bulan=' . $bulan_terpilih) ?>"
            class="btn btn-success" target="_blank">
            <i class="mdi mdi-file-excel"></i> Export Excel
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Laporan Penjualan Detail -->
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Detail Penjualan Properti</h4>
        <div class="table-responsive">
          <table class="table table-striped" id="tablePenjualan">
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal Penjualan</th>
                <th>Judul Properti</th>
                <th>Kategori</th>
                <th>Alamat</th>
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
                  <td><?= $penjualan['alamat'] . ', ' . $penjualan['kota'] . ', ' . $penjualan['provinsi'] ?></td>
                  <td><?= $penjualan['buyer'] ?></td>
                  <td>Rp <?= number_format($penjualan['harga_jual'], 0, ',', '.') ?></td>
                  <td><?= $penjualan['nama_agen'] ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Laporan Penjualan By Kategori -->
<?php if (!empty($laporan_by_kategori)): ?>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Penjualan Berdasarkan Kategori</h4>
          <div class="table-responsive">
            <table class="table table-striped">
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
                    <td>Rp <?= number_format($kategori['total_omset'], 0, ',', '.') ?></td>
                    <td>Rp <?= number_format($kategori['rata_rata_harga'], 0, ',', '.') ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
  $(document).ready(function () {
    $('#tablePenjualan').DataTable({
      "pageLength": 25,
      "order": [[1, "desc"]],
      "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Indonesian.json"
      }
    });
  });
</script>
<?= $this->endSection() ?>