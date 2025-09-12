<div class="page-header">
  <h3 class="page-title">
    <span class="text-center bg-gradient-danger text-white rounded p-1 me-2">
      <i class="fa-solid fa-home ps-1"></i>
    </span>
    Laporan Penjualan Properti
  </h3>
  <nav class="mt-2" aria-label="breadcrumb">
    <ol class="breadcrumb ps-0">
      <li class="breadcrumb-item"><a href="<?= base_url('dashboard/laporan') ?>">Laporan</a></li>
      <li class="breadcrumb-item active" aria-current="page">Penjualan Properti</li>
    </ol>
  </nav>
</div>

<?= $this->include('dashboard/laporan/header') ?>

<!-- Export Buttons -->
<div class="row mt-3">
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
<div class="row mt-3">
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
              <?php $no = 1 ?>
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
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Laporan Penjualan By Kategori -->
<?php if (!empty($laporan_by_kategori)): ?>
  <div class="row mt-3">
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
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif ?>

<?= $this->section('js') ?>
<script>
  $(document).ready(function () {
    $('#tablePenjualan').DataTable({
      "pageLength": 25,
      "order": [[1, "desc"]],
    });
  });
</script>
<?= $this->endSection() ?>