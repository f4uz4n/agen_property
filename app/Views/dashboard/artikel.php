<style>
  :root {
    --primary-color: #4c80ae;
    --secondary-color: #2c3e50;
    --light-blue: #f8f9fa;
    --text-dark: #2c3e50;
    --text-muted: #6c757d;
  }

  body {
    font-family: 'Nunito', sans-serif;
    background-color: var(--light-blue);
  }

  .dashboard-header {
    background: white;
    padding: 2rem 0;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 2rem;
  }

  .page-title {
    font-size: 2rem;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 0.5rem;
  }

  .page-subtitle {
    color: var(--text-muted);
    font-size: 1rem;
  }

  .status-badge {
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
  }

  .status-published {
    background-color: #d4edda;
    color: #155724;
  }

  .status-draft {
    background-color: #fff3cd;
    color: #856404;
  }

  .status-pending {
    background-color: #cce5ff;
    color: #004085;
  }

  .status-archived {
    background-color: #f8d7da;
    color: #721c24;
  }

  .category-badge {
    background-color: var(--primary-color);
    color: white;
    padding: 0.25rem 0.75rem;
    border-radius: 15px;
    font-size: 0.8rem;
    font-weight: 600;
  }

  .action-buttons {
    display: flex;
    gap: 0.5rem;
  }
</style>

<div class="row align-items-center justify-content-between mb-5">
  <div class="col">
    <h3><?= $title ?></h3>
    <p class="text-muted"><?= $subtitle ?></p>
  </div>
  <div class="col text-end">
    <a href="<?= base_url('dashboard/artikel/create') ?>" class="btn btn-primary" target="_blank">
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
            <option value="published">Publikasi</option>
            <option value="draft">Draft</option>
            <option value="archived">Arsip</option>
          </select>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="form-group">
          <label for="category">Kategori</label>
          <select class="form-select multi-select" id="category" name="category">
            <option value="">Semua</option>
            <?php foreach ($categories as $item): ?>
              <option value="<?= $item ?>"><?= $item ?></option>
            <?php endforeach ?>
          </select>
        </div>
      </div>
      <div class="col-sm-4">
        <button type="button" class="btn btn-primary mt-4" id="btn-cari">Cari</button>
      </div>
    </div>
    <div class="table-responsive" id="fetch-data"></div>
  </div>
</div>


<?= $this->section('js') ?>
<script>
  let data = {};

  let status = $('#status').find('option:selected').val();
  let category = $('#category').find('option:selected').val();
  getData(status, category);

  $(document).on('click', '#btn-cari', function () {
    status = $('#status').find('option:selected').val();
    category = $('#category').find('option:selected').val();
    getData(status, category);
  });

  $(document).on('click', '.btn-delete', function () {
    let id = $(this).data('id');
    Swal.fire({
      title: 'Konfirmasi',
      text: 'Apakah Anda yakin ingin menghapus artikel ini?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Ya, hapus!',
      cancelButtonText: 'Tidak, batalkan!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: `<?= base_url('dashboard/artikel/delete/') ?>${id}`,
          type: 'POST',
          data: {},
          success: function (res) {
            console.log(res);
            Swal.fire({
              title: res.title,
              icon: res.icon,
              text: res.text,
            }).then((result) => {
              window.location.href = '<?= base_url('dashboard/artikel') ?>';
            });
          },
          error: function (err) {
            console.error(err);
          }
        });
      }
    });
  });

  function getData(status, category) {
    $.ajax({
      url: '<?= base_url('dashboard/artikel/get_ajax') ?>',
      type: 'POST',
      data: {
        status: status,
        category: category,
      },
      success: function (res) {
        console.log(res);
        data = res;
        generateTable(res);
      },
      error: function (err) {
        console.error(err);
      }
    });
  }

  function generateTable(res) {
    let html = `<table class="table table-striped table-hover" id="basic-table">
    <thead><tr>
        <th>Judul Artikel</th>
        <th>Kategori</th>
        <th>Penulis</th>
        <th>Status</th>
        <th>Tanggal</th>
        <th class="text-center">Aksi</th>
    </tr></thead><tbody>`;

    let no = 1;
    $.each(res, function (i, v) {
      html += `<tr>
        <td>
          <div>
            <strong>${v.title}</strong>
            <br>
            <small class="text-muted">${v.excerpt || '...'}</small>
          </div>
        </td>
        <td><span class="category-badge">${v.category}</span></td>
        <td>${v.author_name}</td>
        <td class="text-capitalize">
          <span class="status-badge status-${v.status}">${v.status}</span>
        </td>
        <td>${formatDate(v.created_at)}</td>
        <td class="text-center">
          <a href="<?= base_url('/dashboard/artikel/') ?>${v.id}" class="btn btn-light btn-sm">
              <i class="fas fa-edit"></i>
          </a>
          <button class="btn btn-danger btn-sm btn-delete" data-id="${v.id}">
              <i class="fas fa-trash"></i>
          </button>
        </td>
        </tr>`;
    });

    html += `</tbody></table>`;
    $('#fetch-data').html(html);
    tableInit('#basic-table');
  }
</script>
<?= $this->endSection() ?>