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
              <?php endforeach ?>
            </select>
          </div>
          <div class="col-md-4">
            <label for="bulan" class="form-label">Bulan</label>
            <select class="form-select" id="bulan" name="bulan" onchange="this.form.submit()">
              <option value="">Semua Bulan</option>
              <?php foreach ($bulan_tersedia as $bulan): ?>
                <option value="<?= $bulan['bulan'] ?>" <?= $bulan['bulan'] == $bulan_terpilih ? 'selected' : '' ?>>
                  <?= $bulan_names[$bulan['bulan']] ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="col-md-4">
            <label class="form-label"></label>
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
<div class="row mt-3">
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
            <div class="icon">
              <i class="fas fa-home icon-item"></i>
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
              <h3 class="mb-0"><?= shortNumber($total_statistik['total_omset'] ?? 0) ?></h3>
            </div>
          </div>
          <div class="col-3">
            <div class="icon">
              <i class="fas fa-dollar-sign icon-item"></i>
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
              <h3 class="mb-0"><?= shortNumber($total_statistik['rata_rata_harga'] ?? 0) ?></h3>
            </div>
          </div>
          <div class="col-3">
            <div class="icon">
              <i class="fa-solid fa-money-bill icon-item"></i>
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
              <h3 class="mb-0"><?= shortNumber($total_statistik['harga_tertinggi'] ?? 0) ?></h3>
            </div>
          </div>
          <div class="col-3">
            <div class="icon">
              <i class="fa-solid fa-money-bill-trend-up icon-item"></i>
            </div>
          </div>
        </div>
        <h6 class="text-muted font-weight-normal">Harga Tertinggi</h6>
      </div>
    </div>
  </div>
</div>