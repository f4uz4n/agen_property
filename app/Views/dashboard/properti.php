<div class="row align-items-center justify-content-between mb-5">
  <div class="col">
    <h3><?= $title ?></h3>
    <p class="text-muted"><?= $subtitle ?></p>
  </div>
  <div class="col text-end">
    <a href="<?= base_url('dashboard/properti/tambah') ?>" class="btn btn-primary btn-modal" data-bs-toggle="modal"
      data-bs-target="#myModal">
      <i class="fas fa-plus"></i> Tambah Data
    </a>
  </div>
</div>

<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-sm-2">
        <div class="form-group">
          <label for="status">Status</label>
          <select class="form-select" id="status" name="status">
            <option value="">Semua</option>
            <option value="available">Available</option>
            <option value="rented">Rented</option>
            <option value="sold">Sold</option>
          </select>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="form-group">
          <label for="kategori">Kategori</label>
          <select class="form-select multi-select" id="kategori" name="kategori">
            <option value="">Semua</option>
            <?php foreach ($kategori as $row): ?>
              <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
            <?php endforeach ?>
          </select>
        </div>
      </div>
      <div class="col-sm-4">
        <button type="submit" class="btn btn-primary mt-4" id="btn-cari">Cari</button>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-hover table-striped" id="basic-table">
        <thead>
          <tr>
            <th class="text-center">No</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Provinsi</th>
            <th>Kota</th>
            <th>Status</th>
            <th>Publikasi</th>
            <th class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1 ?>
          <?php foreach ($data as $row): ?>
            <tr>
              <td class="text-center"><?= $no++ ?></td>
              <td><?= $row['title'] ?></td>
              <td><?= $row['kategori'] ?></td>
              <td><?= shortNumber($row['price']) ?></td>
              <td><?= $row['province'] ?></td>
              <td><?= $row['city'] ?></td>
              <td><?= ucfirst($row['status']) ?></td>
              <td>
                <span class="badge badge-<?= $row['publish'] == 1 ? 'success' : 'danger' ?>">
                  <?= $row['publish'] == 1 ? 'Publikasi' : 'Belum Publikasi' ?></span>
              </td>
              <td class="text-center">
                <a href="<?= base_url('dashboard/properti/' . $row['id']) ?>" class="btn btn-light btn-sm">
                  <i class="fas fa-edit"></i>
                </a>
                <button class="btn btn-danger btn-sm btn-disable" data-id="<?= $row['id'] ?>"
                  data-name="<?= $row['kategori'] ?>">
                  <i class="fas fa-eye-slash"></i>
                </button>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?= $this->section('js') ?>
<script>
  tableInit('#basic-table');

  function getData(kategori, status, agen, provinsi, kota) {
    $.ajax({
      url: '<?= base_url('dashboard/properti/get_ajax') ?>',
      type: 'POST',
      data: {
        kategori: kategori,
        status: status,
        agen: agen,
        provinsi: provinsi,
        kota: kota,
      },
      success: function (res) {
        console.log(res);
        tableInit('#basic-table');
      },
      error: function (err) {
        console.error(err);
      }
    });
  }
</script>
<?= $this->endSection() ?>