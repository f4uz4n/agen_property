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

<!-- Dashboard Header -->
<div class="dashboard-header">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6">
        <h1 class="page-title">Kelola Artikel</h1>
        <p class="page-subtitle">Manajemen artikel dan konten website</p>
      </div>
      <div class="col-md-6 text-md-end">
        <button class="btn btn-primary" onclick="openArticleForm()">
          <i class="fas fa-plus me-2"></i>
          Tambah Artikel Baru
        </button>
      </div>
    </div>
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
<div class="container">
  <div class="card">
    <div class="card-header">
      <div class="row align-items-center">
        <div class="col-md-6">
          <h5 class="card-title">Daftar Artikel</h5>
        </div>
        <div class="col-md-6">
          <div class="search-box">
            <i class="fas fa-search search-icon"></i>
            <input type="text" class="form-control" placeholder="Cari artikel...">
          </div>
        </div>
      </div>
    </div>
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-hover mb-0">
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

  <!-- Pagination -->
  <nav aria-label="Article pagination">
    <ul class="pagination">
      <li class="page-item disabled">
        <a class="page-link" href="#" tabindex="-1">Previous</a>
      </li>
      <li class="page-item active"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item">
        <a class="page-link" href="#">Next</a>
      </li>
    </ul>
  </nav>
</div>

<!-- Article Form Modal -->
<div class="modal fade" id="articleModal" tabindex="-1" aria-labelledby="articleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="articleModalLabel">Tambah Artikel Baru</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="articleForm">
          <div class="row">
            <div class="col-md-8">
              <div class="mb-3">
                <label for="articleTitle" class="form-label">Judul Artikel *</label>
                <input type="text" class="form-control" id="articleTitle" name="title" required>
              </div>

              <div class="mb-3">
                <label for="articleExcerpt" class="form-label">Ringkasan Artikel</label>
                <textarea class="form-control" id="articleExcerpt" name="excerpt" rows="3"
                  placeholder="Ringkasan singkat artikel..."></textarea>
              </div>

              <div class="mb-3">
                <label for="articleContent" class="form-label">Konten Artikel *</label>
                <textarea class="form-control" id="articleContent" name="content" rows="10" required
                  placeholder="Tulis konten artikel lengkap..."></textarea>
              </div>
            </div>

            <div class="col-md-4">
              <div class="mb-3">
                <label for="articleCategory" class="form-label">Kategori *</label>
                <select class="form-select" id="articleCategory" name="category" required>
                  <option value="">Pilih Kategori</option>
                  <option value="tips-properti">Tips Properti</option>
                  <option value="investasi">Investasi</option>
                  <option value="market-update">Market Update</option>
                  <option value="legal">Legal</option>
                  <option value="kpr">KPR</option>
                  <option value="finansial">Finansial</option>
                  <option value="pajak">Pajak</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="articleAuthor" class="form-label">Penulis *</label>
                <input type="text" class="form-control" id="articleAuthor" name="author" required>
              </div>

              <div class="mb-3">
                <label for="articleStatus" class="form-label">Status *</label>
                <select class="form-select" id="articleStatus" name="status" required>
                  <option value="draft">Draft</option>
                  <option value="pending">Menunggu Review</option>
                  <option value="published">Dipublikasi</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="articleImage" class="form-label">Gambar Artikel</label>
                <input type="file" class="form-control" id="articleImage" name="image" accept="image/*">
                <small class="text-muted">Format: JPG, PNG, GIF. Maksimal 2MB</small>
              </div>

              <div class="mb-3">
                <label for="articleTags" class="form-label">Tag</label>
                <input type="text" class="form-control" id="articleTags" name="tags"
                  placeholder="properti, investasi, jakarta">
                <small class="text-muted">Pisahkan tag dengan koma</small>
              </div>

              <div class="mb-3">
                <label for="articlePublishDate" class="form-label">Tanggal Publikasi</label>
                <input type="datetime-local" class="form-control" id="articlePublishDate" name="publish_date">
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" onclick="saveArticle()">Simpan Artikel</button>
      </div>
    </div>
  </div>
</div>

<?= $this->section('js') ?>
<script>
  let currentArticleId = null;
  let isEditMode = false;

  // Open article form modal
  function openArticleForm(articleId = null) {
    currentArticleId = articleId;
    isEditMode = articleId !== null;

    const modal = new bootstrap.Modal(document.getElementById('articleModal'));
    const modalTitle = document.getElementById('articleModalLabel');
    const form = document.getElementById('articleForm');

    if (isEditMode) {
      modalTitle.textContent = 'Edit Artikel';
      // Load article data for editing
      loadArticleData(articleId);
    } else {
      modalTitle.textContent = 'Tambah Artikel Baru';
      form.reset();
    }

    modal.show();
  }

  // Load article data for editing
  function loadArticleData(articleId) {
    // Simulate loading article data
    // In real implementation, this would fetch data from server
    const sampleData = {
      title: 'Cara Memilih Lokasi Properti yang Tepat',
      excerpt: 'Memilih lokasi properti adalah salah satu keputusan terpenting dalam investasi properti.',
      content: 'Konten artikel lengkap akan dimuat di sini...',
      category: 'tips-properti',
      author: 'Admin Sampro',
      status: 'published',
      tags: 'properti, investasi, lokasi',
      publish_date: '2024-12-15T10:00'
    };

    // Populate form fields
    document.getElementById('articleTitle').value = sampleData.title;
    document.getElementById('articleExcerpt').value = sampleData.excerpt;
    document.getElementById('articleContent').value = sampleData.content;
    document.getElementById('articleCategory').value = sampleData.category;
    document.getElementById('articleAuthor').value = sampleData.author;
    document.getElementById('articleStatus').value = sampleData.status;
    document.getElementById('articleTags').value = sampleData.tags;
    document.getElementById('articlePublishDate').value = sampleData.publish_date;
  }

  // Save article (create or update)
  function saveArticle() {
    const form = document.getElementById('articleForm');
    const formData = new FormData(form);

    if (!form.checkValidity()) {
      form.reportValidity();
      return;
    }

    // Add article ID if editing
    if (isEditMode) {
      formData.append('id', currentArticleId);
    }

    // Simulate API call
    console.log('Saving article:', Object.fromEntries(formData));

    // Show success message
    alert(isEditMode ? 'Artikel berhasil diperbarui!' : 'Artikel berhasil ditambahkan!');

    // Close modal
    const modal = bootstrap.Modal.getInstance(document.getElementById('articleModal'));
    modal.hide();

    // Reload page or update table
    location.reload();
  }

  // Edit article
  function editArticle(articleId) {
    openArticleForm(articleId);
  }

  // View article
  function viewArticle(articleId) {
    // Redirect to article view page
    window.open(`/artikel/${articleId}`, '_blank');
  }

  // Delete article
  function deleteArticle(articleId) {
    if (confirm('Apakah Anda yakin ingin menghapus artikel ini?')) {
      // Simulate API call
      console.log('Deleting article:', articleId);

      // Show success message
      alert('Artikel berhasil dihapus!');

      // Reload page or update table
      location.reload();
    }
  }

  // Search functionality
  document.querySelector('.search-box input').addEventListener('input', function (e) {
    const searchTerm = e.target.value.toLowerCase();
    const tableRows = document.querySelectorAll('tbody tr');

    tableRows.forEach(row => {
      const title = row.querySelector('td:first-child strong').textContent.toLowerCase();
      const excerpt = row.querySelector('td:first-child small').textContent.toLowerCase();

      if (title.includes(searchTerm) || excerpt.includes(searchTerm)) {
        row.style.display = '';
      } else {
        row.style.display = 'none';
      }
    });
  });
</script>
<?= $this->endSection() ?>