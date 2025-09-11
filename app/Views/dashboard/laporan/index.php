<?= $this->extend('template/dashboard') ?>

<?= $this->section('content') ?>
<div class="page-header">
  <h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white me-2">
      <i class="mdi mdi-chart-line"></i>
    </span>
    Laporan Penjualan & Performa Agen
  </h3>
</div>

<!-- Filter Section -->
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Filter Laporan</h4>
        <form method="GET" action="<?= base_url('dashboard/laporan') ?>" class="row g-3">
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
              <a href="<?= base_url('dashboard/laporan') ?>" class="btn btn-secondary">Reset</a>
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

<!-- Menu Laporan -->
<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-body text-center">
        <i class="mdi mdi-home-variant mdi-48px text-primary mb-3"></i>
        <h4 class="card-title">Laporan Penjualan Properti</h4>
        <p class="card-text">Lihat detail laporan penjualan properti berdasarkan periode yang dipilih</p>
        <a href="<?= base_url('dashboard/laporan/penjualan?tahun=' . $tahun_terpilih . '&bulan=' . $bulan_terpilih) ?>"
          class="btn btn-primary">Lihat Laporan</a>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card">
      <div class="card-body text-center">
        <i class="mdi mdi-account-group mdi-48px text-success mb-3"></i>
        <h4 class="card-title">Laporan Performa Agen</h4>
        <p class="card-text">Lihat performa penjualan setiap agen berdasarkan periode yang dipilih</p>
        <a href="<?= base_url('dashboard/laporan/performa-agen?tahun=' . $tahun_terpilih . '&bulan=' . $bulan_terpilih) ?>"
          class="btn btn-success">Lihat Laporan</a>
      </div>
    </div>
  </div>
</div>

<!-- Grafik Statistik Per Bulan -->
<?php if (!empty($statistik_per_bulan)): ?>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Grafik Penjualan Per Bulan (<?= $tahun_terpilih ?>)</h4>
          <canvas id="chartPenjualanPerBulan" height="100"></canvas>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  <?php if (!empty($statistik_per_bulan)): ?>
    // Grafik Penjualan Per Bulan
    const ctx = document.getElementById('chartPenjualanPerBulan').getContext('2d');
    const chartPenjualanPerBulan = new Chart(ctx, {
      type: 'line',
      data: {
        labels: [
          <?php foreach ($statistik_per_bulan as $stat): ?>
                        '<?= date('M', mktime(0, 0, 0, $stat['bulan'], 1)) ?>',
          <?php endforeach; ?>
        ],
        datasets: [{
          label: 'Total Transaksi',
          data: [
            <?php foreach ($statistik_per_bulan as $stat): ?>
                            <?= $stat['total_transaksi'] ?>,
            <?php endforeach; ?>
          ],
          borderColor: 'rgb(75, 192, 192)',
          backgroundColor: 'rgba(75, 192, 192, 0.2)',
          tension: 0.1
        }, {
          label: 'Total Omset (Juta)',
          data: [
            <?php foreach ($statistik_per_bulan as $stat): ?>
                            <?= round($stat['total_penjualan'] / 1000000, 2) ?>,
            <?php endforeach; ?>
          ],
          borderColor: 'rgb(255, 99, 132)',
          backgroundColor: 'rgba(255, 99, 132, 0.2)',
          tension: 0.1,
          yAxisID: 'y1'
        }]
      },
      options: {
        responsive: true,
        interaction: {
          mode: 'index',
          intersect: false,
        },
        scales: {
          y: {
            type: 'linear',
            display: true,
            position: 'left',
          },
          y1: {
            type: 'linear',
            display: true,
            position: 'right',
            grid: {
              drawOnChartArea: false,
            },
          }
        }
      }
    });
  <?php endif; ?>
</script>
<?= $this->endSection() ?>