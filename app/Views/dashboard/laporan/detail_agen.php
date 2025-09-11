<?= $this->extend('template/dashboard') ?>

<?= $this->section('content') ?>
<div class="page-header">
  <h3 class="page-title">
    <span class="page-title-icon bg-gradient-info text-white me-2">
      <i class="mdi mdi-account"></i>
    </span>
    Detail Penjualan Agen - <?= $agen['name'] ?>
  </h3>
  <nav aria-label="breadcrumb">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url('dashboard/laporan') ?>">Laporan</a></li>
      <li class="breadcrumb-item"><a href="<?= base_url('dashboard/laporan/performa-agen') ?>">Performa Agen</a></li>
      <li class="breadcrumb-item active" aria-current="page">Detail Agen</li>
    </ul>
  </nav>
</div>

<!-- Filter Section -->
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Filter Laporan</h4>
        <form method="GET" action="<?= base_url('dashboard/laporan/detail-agen/' . $agen['id']) ?>" class="row g-3">
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
              <a href="<?= base_url('dashboard/laporan/detail-agen/' . $agen['id']) ?>"
                class="btn btn-secondary">Reset</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Info Agen -->
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Informasi Agen</h4>
        <div class="row">
          <div class="col-md-6">
            <table class="table table-borderless">
              <tr>
                <td><strong>Nama:</strong></td>
                <td><?= $agen['name'] ?></td>
              </tr>
              <tr>
                <td><strong>Email:</strong></td>
                <td><?= $agen['email'] ?></td>
              </tr>
              <tr>
                <td><strong>Periode:</strong></td>
                <td>
                  <?= $tahun_terpilih ?>
                  <?php if ($bulan_terpilih): ?>
                    <?php
                    $nama_bulan = '';
                    switch ($bulan_terpilih) {
                      case 1:
                        $nama_bulan = 'Januari';
                        break;
                      case 2:
                        $nama_bulan = 'Februari';
                        break;
                      case 3:
                        $nama_bulan = 'Maret';
                        break;
                      case 4:
                        $nama_bulan = 'April';
                        break;
                      case 5:
                        $nama_bulan = 'Mei';
                        break;
                      case 6:
                        $nama_bulan = 'Juni';
                        break;
                      case 7:
                        $nama_bulan = 'Juli';
                        break;
                      case 8:
                        $nama_bulan = 'Agustus';
                        break;
                      case 9:
                        $nama_bulan = 'September';
                        break;
                      case 10:
                        $nama_bulan = 'Oktober';
                        break;
                      case 11:
                        $nama_bulan = 'November';
                        break;
                      case 12:
                        $nama_bulan = 'Desember';
                        break;
                    }
                    if ($nama_bulan) {
                      echo ' - ' . $nama_bulan;
                    }
                    ?>
                  <?php endif; ?>
                </td>
              </tr>
            </table>
          </div>
          <div class="col-md-6">
            <table class="table table-borderless">
              <tr>
                <td><strong>Total Penjualan:</strong></td>
                <td><span class="badge badge-primary"><?= count($detail_penjualan) ?></span></td>
              </tr>
              <tr>
                <td><strong>Total Omset:</strong></td>
                <td>Rp <?= number_format(array_sum(array_column($detail_penjualan, 'harga_jual')), 0, ',', '.') ?></td>
              </tr>
              <tr>
                <td><strong>Rata-rata Harga:</strong></td>
                <td>Rp
                  <?= count($detail_penjualan) > 0 ? number_format(array_sum(array_column($detail_penjualan, 'harga_jual')) / count($detail_penjualan), 0, ',', '.') : '0' ?>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Detail Penjualan -->
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Detail Penjualan</h4>
        <div class="table-responsive">
          <table class="table table-striped" id="tableDetailPenjualan">
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal Penjualan</th>
                <th>Judul Properti</th>
                <th>Kategori</th>
                <th>Alamat</th>
                <th>Pembeli</th>
                <th>Harga Jual</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              <?php foreach ($detail_penjualan as $penjualan): ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= date('d/m/Y', strtotime($penjualan['tanggal_penjualan'])) ?></td>
                  <td><?= $penjualan['judul_properti'] ?></td>
                  <td><?= $penjualan['kategori'] ?></td>
                  <td><?= $penjualan['alamat'] ?></td>
                  <td><?= $penjualan['buyer'] ?></td>
                  <td>Rp <?= number_format($penjualan['harga_jual'], 0, ',', '.') ?></td>
                  <td>
                    <span class="badge badge-success"><?= ucfirst($penjualan['status_transaksi']) ?></span>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Back Button -->
<div class="row">
  <div class="col-12">
    <a href="<?= base_url('dashboard/laporan/performa-agen?tahun=' . $tahun_terpilih . '&bulan=' . $bulan_terpilih) ?>"
      class="btn btn-secondary">
      <i class="mdi mdi-arrow-left"></i> Kembali ke Performa Agen
    </a>
  </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
  $(document).ready(function () {
    $('#tableDetailPenjualan').DataTable({
      "pageLength": 25,
      "order": [[1, "desc"]], // Sort by Tanggal Penjualan
      "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Indonesian.json"
      }
    });
  });
</script>
<?= $this->endSection() ?>