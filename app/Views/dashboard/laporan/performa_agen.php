<div class="page-header">
  <h3 class="page-title">
    <span class="text-center bg-gradient-success text-white rounded p-1 me-2">
      <i class="fas fa-users ps-1"></i>
    </span>Laporan Performa Agen
  </h3>
  <nav class="mt-2" aria-label="breadcrumb">
    <ul class="breadcrumb ps-0">
      <li class="breadcrumb-item"><a href="<?= base_url('dashboard/laporan') ?>">Laporan</a></li>
      <li class="breadcrumb-item active" aria-current="page">Performa Agen</li>
    </ul>
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
<div class="row mt-3">
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

<?= $this->section('js') ?>
<script>
  $(document).ready(function () {
    $('#tablePerformaAgen').DataTable({
      "pageLength": 25,
      "order": [[4, "desc"]], // Sort by Total Omset
    });
  });
</script>
<?= $this->endSection() ?>