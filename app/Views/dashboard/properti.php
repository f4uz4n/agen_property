<div class="row align-items-center justify-content-between mb-5">
  <div class="col">
    <h3><?= $title ?></h3>
    <p class="text-muted"><?= $subtitle ?></p>
  </div>
  <div class="col text-end">
    <a href="<?= base_url('dashboard/properti/create') ?>" class="btn btn-primary" target="_blank">
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
            <option value="dijual">Dijual</option>
            <option value="disewakan">Disewakan</option>
          </select>
        </div>
      </div>
      <?php if (session('role') != 'agen'): ?>
        <div class="col-sm-2">
          <div class="form-group">
            <label for="agen">Agen</label>
            <select class="form-select multi-select" id="agen" name="agen">
              <option value="">Semua</option>
              <?php foreach ($agens as $agen): ?>
                <option value="<?= $agen['id'] ?>"><?= $agen['name'] ?></option>
              <?php endforeach ?>
            </select>
          </div>
        </div>
      <?php endif ?>
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
            <?php if (session('role') != 'agen'): ?>
              <th>Favorit</th>
            <?php endif ?>
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
                  <?= $row['publish'] == 1 ? 'Publikasi' : 'Draft' ?></span>
              </td>
              <?php if (session('role') != 'agen'): ?>
                <td class="text-center fs-4 favorite" data-id="<?= $row['id'] ?>">
                  <i class="<?= $row['favorite'] == 1 ? 'fa-solid' : 'fa-regular' ?> fa-star text-warning"></i>
                </td>
              <?php endif ?>
              <td class="text-center">
                <a href="<?= base_url('dashboard/properti/' . $row['id']) ?>" class="btn btn-light btn-sm">
                  <i class="fas fa-edit"></i>
                </a>
                <?php if (session('role') != 'agen'): ?>
                  <button class="btn btn-<?= $row['publish'] == 0 ? 'success' : 'danger' ?> btn-sm btn-disable"
                    data-id="<?= $row['id'] ?>" data-value="<?= $row['publish'] ?>">
                    <i class="fas fa-eye<?= $row['publish'] == 0 ? '' : '-slash' ?>"></i>
                  </button>
                <?php else: ?>
                  <button class="btn btn-info btn-sm btn-jual" data-bs-toggle="modal" data-bs-target="#myModal"
                    data-id="<?= $row['id'] ?>">
                    <i class="fas fa-dollar"></i>
                  </button>
                <?php endif ?>
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
  $('.favorite').css('cursor', 'pointer');
  tableInit('#basic-table');

  let data = {};

  let status = $('#status').find('option:selected').val();
  let agen = $('#agen').find('option:selected').val();
  let kategori = $('#kategori').find('option:selected').val();
  getData(kategori, status, agen);

  $(document).on('click', '#btn-cari', function () {
    status = $('#status').find('option:selected').val();
    agen = $('#agen').find('option:selected').val();
    kategori = $('#kategori').find('option:selected').val();
    getData(kategori, status, agen);
  })

  $(document).on('click', '.favorite', function () {
    let $this = $(this).find('i');
    let id = $(this).data('id');
    let value = $this.hasClass('fa-regular') ? 1 : 0;
    $.ajax({
      url: `<?= base_url('dashboard/properti/favorite/') ?>${id}`,
      type: 'POST',
      data: {
        value: value,
      },
      success: function (res) {
        if (value == 1) {
          $this.removeClass('fa-regular');
          $this.addClass('fa-solid');
        } else {
          $this.removeClass('fa-solid');
          $this.addClass('fa-regular');
        }
      },
      error: function (err) {
        console.error(err);
      }
    });
  })

  $(document).on('click', '.btn-disable', function () {
    let id = $(this).data('id');
    let value = $(this).data('value');
    if (value == 1) {
      Swal.fire({
        title: 'Konfirmasi',
        text: 'Apakah Anda yakin ingin menonaktifkan?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, nonaktifkan!',
        cancelButtonText: 'Tidak, batalkan!'
      }).then((result) => {
        if (result.isConfirmed) {
          setPublish(id, 0);
        }
      });
    } else {
      setPublish(id, 1);
    }
  });

  function setPublish(id, value) {
    $.ajax({
      url: `<?= base_url('dashboard/properti/disabled/') ?>${id}`,
      type: 'POST',
      data: {
        value: value,
      },
      success: function (res) {
        location.reload();
      },
      error: function (err) {
        console.error(err);
      }
    });
  }

  function getData(kategori, status, agen) {
    $.ajax({
      url: '<?= base_url('dashboard/properti/get_ajax') ?>',
      type: 'POST',
      data: {
        kategori: kategori,
        status: status,
        agen: agen,
      },
      success: function (res) {
        console.log(res);
        data = res;
        tableInit('#basic-table');
      },
      error: function (err) {
        console.error(err);
      }
    });
  }
</script>
<?= $this->endSection() ?>