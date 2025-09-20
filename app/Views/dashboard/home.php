<!-- Statistik Overview -->
<div class="row mt-3">
  <div class="col-12">
    <h3>Statistik Penjualan <?= date('Y') ?></h3>
  </div>
  <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-tale">
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
        <h6 class="font-weight-normal">Total Transaksi</h6>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-dark-blue">
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
        <h6 class="font-weight-normal">Total Omset</h6>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-light-blue">
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
        <h6 class="font-weight-normal">Rata-rata Harga</h6>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-light-danger">
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
        <h6 class="font-weight-normal">Harga Tertinggi</h6>
      </div>
    </div>
  </div>
</div>

<!-- Leaderboard Agen -->
<div class="row mt-4">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Leaderboard Agen</h4>
        <p class="card-description">Peringkat agen berdasarkan total omset penjualan di tahun <?= date('Y') ?>.</p>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th class="text-center">Peringkat</th>
                <th>Agen</th>
                <th class="text-end">Total Omset</th>
                <th class="text-center">Properti Terjual</th>
                <th class="text-center">Properti Tersewakan</th>
              </tr>
            </thead>
            <tbody>
              <?php if (isset($agents) && !empty($agents)): ?>
                <?php foreach ($agents as $index => $agen): ?>
                  <tr>
                    <td class="text-center align-middle">
                      <span class="fw-bold fs-5"><?= $index + 1 ?></span>
                    </td>
                    <td class="align-middle">
                      <div class="d-flex align-items-center">
                        <img src="<?= base_url($agen['photo'] ?? 'images/faces/face1.jpg') ?>" alt="image" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;"/>
                        <div class="ms-3">
                          <p class="fw-bold mb-1"><?= $agen['name'] ?></p>
                          <p class="text-muted mb-0"><?= $agen['email'] ?></p>
                        </div>
                      </div>
                    </td>
                    <td class="text-end align-middle">
                      <span class="fw-semibold">Rp <?= number_format($agen['omset'] ?? 0, 0, ',', '.') ?></span>
                    </td>
                    <td class="text-center align-middle">
                      <span class="badge rounded-pill bg-success p-2"><?= $agen['Terjual'] ?? 0 ?></span>
                    </td>
                    <td class="text-center align-middle">
                      <span class="badge rounded-pill bg-info p-2"><?= $agen['Tersewakan'] ?? 0 ?></span>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="5" class="text-center py-4">
                    <p class="text-muted mb-0">Data leaderboard belum tersedia.</p>
                  </td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>