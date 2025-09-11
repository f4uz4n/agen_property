<?= $this->extend('template/dashboard') ?>

<?= $this->section('content') ?>
<div class="page-header">
  <h3 class="page-title">
    <span class="page-title-icon bg-gradient-success text-white me-2">
      <i class="mdi mdi-account-group"></i>
    </span>
    Laporan Performa Agen
  </h3>
  <nav aria-label="breadcrumb">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url('dashboard/laporan') ?>">Laporan</a></li>
      <li class="breadcrumb-item active" aria-current="page">Performa Agen</li>
    </ul>
  </nav>
</div>

<!-- Filter Section -->
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Filter Laporan</h4>
        <form method="GET" action="<?= base_url('dashboard/laporan/performa-agen') ?>" class="row g-3">
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
              <a href="<?= base_url('dashboard/laporan/performa-agen') ?>" class="btn btn-secondary">Reset</a>
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
              <h3 class="mb-0"><?= count($laporan_performa) ?></h3>
            </div>
          </div>
          <div class="col-3">
            <div class="icon icon-box-success">
              <span class="mdi mdi-arrow-top-right icon-item"></span>
            </div>
          </div>
        </div>
        <h6 class="text-muted font-weight-normal">Total Agen Aktif</h6>
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
</div>

<!-- Export Buttons -->
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Export Laporan</h4>
        <div class="btn-group" role="group">
          <a href="<?= base_url('dashboard/laporan/export-performa-agen-pdf?tahun=' . $tahun_terpilih . '&bulan=' . $bulan_terpilih) ?>"
            class="btn btn-danger" target="_blank">
            <i class="mdi mdi-file-pdf"></i> Export PDF
          </a>
          <a href="<?= base_url('dashboard/laporan/export-performa-agen-excel?tahun=' . $tahun_terpilih . '&bulan=' . $bulan_terpilih) ?>"
            class="btn btn-success" target="_blank">
            <i class="mdi mdi-file-excel"></i> Export Excel
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Laporan Performa Agen -->
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Performa Agen</h4>
        <div class="table-responsive">
          <table class="table table-striped" id="tablePerformaAgen">
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
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              <?php foreach ($laporan_performa as $performa): ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $performa['nama_agen'] ?></td>
                  <td><?= $performa['email_agen'] ?></td>
                  <td>
                    <span class="badge badge-primary"><?= number_format($performa['total_penjualan']) ?></span>
                  </td>
                  <td>Rp <?= number_format($performa['total_omset'], 0, ',', '.') ?></td>
                  <td>Rp <?= number_format($performa['rata_rata_harga_jual'], 0, ',', '.') ?></td>
                  <td>
                    <?= $performa['penjualan_pertama'] ? date('d/m/Y', strtotime($performa['penjualan_pertama'])) : '-' ?>
                  </td>
                  <td>
                    <?= $performa['penjualan_terakhir'] ? date('d/m/Y', strtotime($performa['penjualan_terakhir'])) : '-' ?>
                  </td>
                  <td>
                    <a href="<?= base_url('dashboard/laporan/detail-agen/' . $performa['agent_id'] . '?tahun=' . $tahun_terpilih . '&bulan=' . $bulan_terpilih) ?>"
                      class="btn btn-sm btn-info">
                      <i class="mdi mdi-eye"></i> Detail
                    </a>
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

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
  $(document).ready(function () {
    $('#tablePerformaAgen').DataTable({
      "pageLength": 25,
      "order": [[4, "desc"]], // Sort by Total Omset
      "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Indonesian.json"
      }
    });
  });
</script>
<?= $this->endSection() ?>