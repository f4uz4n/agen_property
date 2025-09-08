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

  .btn-primary {
    background-color: var(--primary-color);
    border-color: var(--primary-color);
  }

  .btn-primary:hover {
    background-color: #3d6b95;
    border-color: #3d6b95;
  }

  .btn-outline-primary {
    color: var(--primary-color);
    border-color: var(--primary-color);
  }

  .btn-outline-primary:hover {
    background-color: var(--primary-color);
    border-color: var(--primary-color);
  }

  .card {
    border: none;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
  }

  .card-header {
    background: white;
    border-bottom: 1px solid #e9ecef;
    border-radius: 15px 15px 0 0 !important;
    padding: 1.5rem;
  }

  .card-title {
    font-weight: 600;
    color: var(--text-dark);
    margin: 0;
  }

  .table {
    margin: 0;
  }

  .table th {
    border-top: none;
    border-bottom: 2px solid #e9ecef;
    font-weight: 600;
    color: var(--text-dark);
    padding: 1rem;
  }

  .table td {
    padding: 1rem;
    vertical-align: middle;
    border-top: 1px solid #f8f9fa;
  }

  .table tbody tr:hover {
    background-color: #f8f9fa;
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

  .btn-sm {
    padding: 0.25rem 0.5rem;
    font-size: 0.875rem;
  }

  .search-box {
    position: relative;
  }

  .search-box .form-control {
    padding-left: 2.5rem;
    border-radius: 25px;
    border: 2px solid #e9ecef;
  }

  .search-box .form-control:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.2rem rgba(76, 128, 174, 0.25);
  }

  .search-icon {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: var(--text-muted);
  }

  .stats-card {
    background: linear-gradient(135deg, var(--primary-color) 0%, #5a8bc0 100%);
    color: white;
    border-radius: 15px;
    padding: 1.5rem;
    margin-bottom: 1rem;
  }

  .stats-number {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
  }

  .stats-label {
    font-size: 0.9rem;
    opacity: 0.9;
  }

  .pagination {
    justify-content: center;
    margin-top: 2rem;
  }

  .page-link {
    color: var(--primary-color);
    border-color: #e9ecef;
    border-radius: 10px;
    margin: 0 2px;
    padding: 10px 15px;
  }

  .page-link:hover {
    background-color: var(--primary-color);
    border-color: var(--primary-color);
    color: white;
  }

  .page-item.active .page-link {
    background-color: var(--primary-color);
    border-color: var(--primary-color);
  }

  @media (max-width: 768px) {
    .action-buttons {
      flex-direction: column;
    }

    .table-responsive {
      font-size: 0.9rem;
    }
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

<!-- Stats Cards -->
<div class="container mb-4">
  <div class="row">
    <div class="col-md-3">
      <div class="stats-card">
        <div class="stats-number">24</div>
        <div class="stats-label">Total Artikel</div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="stats-card">
        <div class="stats-number">18</div>
        <div class="stats-label">Artikel Dipublikasi</div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="stats-card">
        <div class="stats-number">4</div>
        <div class="stats-label">Artikel Draft</div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="stats-card">
        <div class="stats-number">2</div>
        <div class="stats-label">Menunggu Review</div>
      </div>
    </div>
  </div>
</div>

<!-- Articles Table -->
<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-sm-2">
        <div class="form-group">
          <label for="status">Status</label>
          <select class="form-select" id="status" name="status">
            <option value="">Semua</option>
            <option value="publikasi">Publikasi</option>
            <option value="draft">Draft</option>
            <option value="arsip">Arsip</option>
          </select>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="form-group">
          <label for="user">Penulis</label>
          <select class="form-select multi-select" id="user" name="user">
            <option value="">Semua</option>
            <?php foreach ($users as $user): ?>
              <option value="<?= $user['id'] ?>"><?= $user['name'] ?></option>
            <?php endforeach ?>
          </select>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="form-group">
          <label for="tag">Tag</label>
          <select class="form-select multiple-select" id="tag" name="tag">
          </select>
        </div>
      </div>
      <div class="col-sm-4">
        <button type="submit" class="btn btn-primary mt-4" id="btn-cari">Cari</button>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped table-hover" id="basic-table">
        <thead>
          <tr>
            <th>Judul Artikel</th>
            <th>Kategori</th>
            <th>Penulis</th>
            <th>Status</th>
            <th>Tanggal</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <div>
                <strong>Cara Memilih Lokasi Properti yang Tepat</strong>
                <br>
                <small class="text-muted">Memilih lokasi properti adalah salah satu keputusan terpenting...</small>
              </div>
            </td>
            <td><span class="category-badge">Tips Properti</span></td>
            <td>Admin Sampro</td>
            <td><span class="status-badge status-published">Dipublikasi</span></td>
            <td>15 Des 2024</td>
            <td>
              <div class="action-buttons">
                <button class="btn btn-outline-primary btn-sm" onclick="editArticle(1)">
                  <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-outline-primary btn-sm" onclick="viewArticle(1)">
                  <i class="fas fa-eye"></i>
                </button>
                <button class="btn btn-outline-danger btn-sm" onclick="deleteArticle(1)">
                  <i class="fas fa-trash"></i>
                </button>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div>
                <strong>Strategi Investasi Properti di Era Digital</strong>
                <br>
                <small class="text-muted">Teknologi digital telah mengubah cara kita berinvestasi properti...</small>
              </div>
            </td>
            <td><span class="category-badge">Investasi</span></td>
            <td>Tim Investasi</td>
            <td><span class="status-badge status-published">Dipublikasi</span></td>
            <td>12 Des 2024</td>
            <td>
              <div class="action-buttons">
                <button class="btn btn-outline-primary btn-sm" onclick="editArticle(2)">
                  <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-outline-primary btn-sm" onclick="viewArticle(2)">
                  <i class="fas fa-eye"></i>
                </button>
                <button class="btn btn-outline-danger btn-sm" onclick="deleteArticle(2)">
                  <i class="fas fa-trash"></i>
                </button>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div>
                <strong>Tren Harga Properti Jakarta 2024</strong>
                <br>
                <small class="text-muted">Analisis mendalam tentang pergerakan harga properti di Jakarta...</small>
              </div>
            </td>
            <td><span class="category-badge">Market Update</span></td>
            <td>Analis Pasar</td>
            <td><span class="status-badge status-published">Dipublikasi</span></td>
            <td>10 Des 2024</td>
            <td>
              <div class="action-buttons">
                <button class="btn btn-outline-primary btn-sm" onclick="editArticle(3)">
                  <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-outline-primary btn-sm" onclick="viewArticle(3)">
                  <i class="fas fa-eye"></i>
                </button>
                <button class="btn btn-outline-danger btn-sm" onclick="deleteArticle(3)">
                  <i class="fas fa-trash"></i>
                </button>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div>
                <strong>Perubahan Regulasi Properti 2024</strong>
                <br>
                <small class="text-muted">Update terbaru tentang perubahan regulasi properti yang berlaku...</small>
              </div>
            </td>
            <td><span class="category-badge">Legal</span></td>
            <td>Tim Legal</td>
            <td><span class="status-badge status-draft">Draft</span></td>
            <td>8 Des 2024</td>
            <td>
              <div class="action-buttons">
                <button class="btn btn-outline-primary btn-sm" onclick="editArticle(4)">
                  <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-outline-primary btn-sm" onclick="viewArticle(4)">
                  <i class="fas fa-eye"></i>
                </button>
                <button class="btn btn-outline-danger btn-sm" onclick="deleteArticle(4)">
                  <i class="fas fa-trash"></i>
                </button>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div>
                <strong>Tips Mengajukan KPR yang Disetujui</strong>
                <br>
                <small class="text-muted">Panduan lengkap cara mengajukan KPR agar cepat disetujui bank...</small>
              </div>
            </td>
            <td><span class="category-badge">KPR</span></td>
            <td>Tim Finansial</td>
            <td><span class="status-badge status-pending">Menunggu Review</span></td>
            <td>5 Des 2024</td>
            <td>
              <div class="action-buttons">
                <button class="btn btn-outline-primary btn-sm" onclick="editArticle(5)">
                  <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-outline-primary btn-sm" onclick="viewArticle(5)">
                  <i class="fas fa-eye"></i>
                </button>
                <button class="btn btn-outline-danger btn-sm" onclick="deleteArticle(5)">
                  <i class="fas fa-trash"></i>
                </button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>


<?= $this->section('js') ?>
<script>
  let data = {};

  let status = $('#status').find('option:selected').val();
  let user = $('#user').find('option:selected').val();
  let tag = $('#tag').find('option:selected').val();
  getData(status, user, tag);

  $(document).on('click', '#btn-cari', function () {
    status = $('#status').find('option:selected').val();
    user = $('#user').find('option:selected').val();
    tag = $('#tag').find('option:selected').val();
    getData(status, user, tag);
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

  function getData(status, user, tag) {
    $.ajax({
      url: '<?= base_url('dashboard/properti/get_ajax') ?>',
      type: 'POST',
      data: {
        status: status,
        user: user,
        tag: tag,
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