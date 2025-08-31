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

  .navbar-brand {
    font-weight: 700;
    color: var(--primary-color) !important;
  }

  .navbar-brand i {
    color: var(--primary-color);
    margin-right: 8px;
  }

  .nav-link {
    color: var(--text-dark) !important;
    font-weight: 500;
    transition: color 0.3s ease;
  }

  .nav-link:hover {
    color: var(--primary-color) !important;
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

  .hero-section {
    background: linear-gradient(135deg, var(--primary-color) 0%, #5a8bc0 100%);
    color: white;
    padding: 80px 0 60px;
    text-align: center;
  }

  .hero-title {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 1rem;
  }

  .hero-subtitle {
    font-size: 1.25rem;
    opacity: 0.9;
    margin-bottom: 3rem;
  }

  .search-section {
    background: white;
    padding: 40px 0;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
  }

  .search-form {
    background: white;
    border-radius: 15px;
    padding: 2rem;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
  }

  .form-control {
    border-radius: 10px;
    border: 2px solid #e9ecef;
    padding: 12px 15px;
    transition: all 0.3s ease;
  }

  .form-control:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.2rem rgba(76, 128, 174, 0.25);
  }

  .form-select {
    border-radius: 10px;
    border: 2px solid #e9ecef;
    padding: 12px 15px;
  }

  .form-select:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.2rem rgba(76, 128, 174, 0.25);
  }

  .search-btn {
    background: linear-gradient(135deg, var(--primary-color) 0%, #5a8bc0 100%);
    border: none;
    border-radius: 10px;
    padding: 12px 30px;
    font-weight: 600;
    transition: all 0.3s ease;
  }

  .search-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(76, 128, 174, 0.4);
  }

  .category-filters {
    background: white;
    padding: 30px 0;
    border-bottom: 1px solid #e9ecef;
  }

  .filter-btn {
    background: transparent;
    border: 2px solid #e9ecef;
    color: var(--text-muted);
    padding: 8px 20px;
    border-radius: 25px;
    margin: 5px;
    transition: all 0.3s ease;
    font-weight: 500;
  }

  .filter-btn:hover,
  .filter-btn.active {
    background: var(--primary-color);
    border-color: var(--primary-color);
    color: white;
  }

  .articles-section {
    padding: 60px 0;
    background: var(--light-blue);
  }

  .section-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
  }

  .section-title {
    font-size: 2rem;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 0.5rem;
  }

  .section-subtitle {
    color: var(--text-muted);
    font-size: 1rem;
  }

  .article-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    height: 100%;
    margin-bottom: 2rem;
  }

  .article-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
  }

  .article-image {
    height: 200px;
    background: linear-gradient(135deg, var(--primary-color) 0%, #5a8bc0 100%);
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .article-category {
    position: absolute;
    top: 15px;
    left: 15px;
    background: rgba(255, 255, 255, 0.9);
    color: var(--primary-color);
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    backdrop-filter: blur(10px);
  }

  .article-content {
    padding: 1.5rem;
  }

  .article-meta {
    display: flex;
    justify-content: space-between;
    margin-bottom: 1rem;
    font-size: 0.8rem;
    color: var(--text-muted);
    flex-wrap: wrap;
    gap: 0.5rem;
  }

  .article-title {
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 1rem;
    font-size: 1.1rem;
    line-height: 1.4;
  }

  .article-excerpt {
    color: var(--text-muted);
    font-size: 0.9rem;
    line-height: 1.6;
    margin-bottom: 1.5rem;
  }

  .article-link {
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 600;
    font-size: 0.9rem;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
  }

  .article-link:hover {
    color: #3d6b95;
    transform: translateX(5px);
  }

  .article-link i {
    transition: transform 0.3s ease;
  }

  .article-link:hover i {
    transform: translateX(3px);
  }

  .sidebar {
    background: white;
    border-radius: 15px;
    padding: 2rem;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    height: fit-content;
  }

  .sidebar-title {
    font-size: 1.25rem;
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 1.5rem;
    padding-bottom: 1rem;
    border-bottom: 2px solid #e9ecef;
  }

  .popular-article {
    display: flex;
    align-items: center;
    padding: 1rem 0;
    border-bottom: 1px solid #f8f9fa;
  }

  .popular-article:last-child {
    border-bottom: none;
  }

  .popular-article-image {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, var(--primary-color) 0%, #5a8bc0 100%);
    border-radius: 10px;
    margin-right: 1rem;
    flex-shrink: 0;
  }

  .popular-article-content h6 {
    font-size: 0.9rem;
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 0.25rem;
    line-height: 1.3;
  }

  .popular-article-content p {
    font-size: 0.8rem;
    color: var(--text-muted);
    margin: 0;
  }

  .pagination {
    justify-content: center;
    margin-top: 3rem;
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

  .stats-badge {
    background: var(--primary-color);
    color: white;
    padding: 0.25rem 0.75rem;
    border-radius: 15px;
    font-size: 0.8rem;
    font-weight: 600;
  }

  @media (max-width: 768px) {
    .hero-title {
      font-size: 2rem;
    }

    .search-form {
      padding: 1.5rem;
    }

    .section-header {
      flex-direction: column;
      text-align: center;
      gap: 1rem;
    }

    .filter-btn {
      margin: 2px;
      font-size: 0.9rem;
    }
  }
</style>

<!-- Hero Section -->
<section class="hero-section">
  <div class="container">
    <h1 class="hero-title">Artikel Properti</h1>
    <p class="hero-subtitle">Tips, informasi, dan analisis terkini seputar properti dan investasi</p>
  </div>
</section>

<!-- Search Section -->
<section class="search-section">
  <div class="container">
    <div class="search-form">
      <form>
        <div class="row g-3">
          <div class="col-md-4">
            <label class="form-label">
              <i class="fas fa-search text-primary me-2"></i>
              Cari Artikel
            </label>
            <input type="text" class="form-control" placeholder="Kata kunci artikel...">
          </div>
          <div class="col-md-3">
            <label class="form-label">
              <i class="fas fa-tag text-primary me-2"></i>
              Kategori
            </label>
            <select class="form-select">
              <option>Semua Kategori</option>
              <option>Tips Properti</option>
              <option>Investasi</option>
              <option>Market Update</option>
              <option>Legal</option>
              <option>Finansial</option>
            </select>
          </div>
          <div class="col-md-3">
            <label class="form-label">
              <i class="fas fa-calendar text-primary me-2"></i>
              Periode
            </label>
            <select class="form-select">
              <option>Semua Waktu</option>
              <option>Hari Ini</option>
              <option>Minggu Ini</option>
              <option>Bulan Ini</option>
              <option>3 Bulan Terakhir</option>
            </select>
          </div>
          <div class="col-md-2 d-flex align-items-end">
            <button type="submit" class="btn search-btn w-100">
              <i class="fas fa-search me-2"></i>
              Cari
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>

<!-- Category Filters -->
<section class="category-filters">
  <div class="container">
    <div class="text-center">
      <h5 class="mb-3">Filter Kategori:</h5>
      <button class="btn filter-btn active">Semua</button>
      <button class="btn filter-btn">Tips Properti</button>
      <button class="btn filter-btn">Investasi</button>
      <button class="btn filter-btn">Market Update</button>
      <button class="btn filter-btn">Legal</button>
      <button class="btn filter-btn">Finansial</button>
      <button class="btn filter-btn">KPR</button>
      <button class="btn filter-btn">Pajak</button>
    </div>
  </div>
</section>

<!-- Articles Section -->
<section class="articles-section">
  <div class="container">
    <div class="row">
      <!-- Main Content -->
      <div class="col-lg-8">
        <div class="section-header">
          <div>
            <h2 class="section-title">Artikel Terbaru</h2>
            <p class="section-subtitle">Ditemukan <span class="stats-badge">24 artikel</span> untuk Anda</p>
          </div>
          <div class="d-flex align-items-center">
            <label class="me-2">Urutkan:</label>
            <select class="form-select form-select-sm" style="width: auto;">
              <option>Terbaru</option>
              <option>Terpopuler</option>
              <option>A-Z</option>
              <option>Z-A</option>
            </select>
          </div>
        </div>

        <!-- Article Cards -->
        <div class="row">
          <div class="col-md-6">
            <div class="article-card">
              <div class="article-image">
                <div class="article-category">Tips Properti</div>
              </div>
              <div class="article-content">
                <div class="article-meta">
                  <span class="article-date">
                    <i class="fas fa-calendar-alt text-primary me-1"></i>
                    15 Desember 2024
                  </span>
                  <span class="article-author">
                    <i class="fas fa-user text-primary me-1"></i>
                    Admin Sampro
                  </span>
                </div>
                <h5 class="article-title">Cara Memilih Lokasi Properti yang Tepat</h5>
                <p class="article-excerpt">
                  Memilih lokasi properti adalah salah satu keputusan terpenting dalam investasi properti.
                  Berikut tips memilih lokasi yang strategis dan menguntungkan...
                </p>
                <a href="#" class="article-link">Baca Selengkapnya <i class="fas fa-arrow-right ms-1"></i></a>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="article-card">
              <div class="article-image">
                <div class="article-category">Investasi</div>
              </div>
              <div class="article-content">
                <div class="article-meta">
                  <span class="article-date">
                    <i class="fas fa-calendar-alt text-primary me-1"></i>
                    12 Desember 2024
                  </span>
                  <span class="article-author">
                    <i class="fas fa-user text-primary me-1"></i>
                    Tim Investasi
                  </span>
                </div>
                <h5 class="article-title">Strategi Investasi Properti di Era Digital</h5>
                <p class="article-excerpt">
                  Teknologi digital telah mengubah cara kita berinvestasi properti.
                  Pelajari strategi terbaru untuk memaksimalkan return investasi...
                </p>
                <a href="#" class="article-link">Baca Selengkapnya <i class="fas fa-arrow-right ms-1"></i></a>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="article-card">
              <div class="article-image">
                <div class="article-category">Market Update</div>
              </div>
              <div class="article-content">
                <div class="article-meta">
                  <span class="article-date">
                    <i class="fas fa-calendar-alt text-primary me-1"></i>
                    10 Desember 2024
                  </span>
                  <span class="article-author">
                    <i class="fas fa-user text-primary me-1"></i>
                    Analis Pasar
                  </span>
                </div>
                <h5 class="article-title">Tren Harga Properti Jakarta 2024</h5>
                <p class="article-excerpt">
                  Analisis mendalam tentang pergerakan harga properti di Jakarta sepanjang tahun 2024.
                  Temukan peluang investasi terbaik...
                </p>
                <a href="#" class="article-link">Baca Selengkapnya <i class="fas fa-arrow-right ms-1"></i></a>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="article-card">
              <div class="article-image">
                <div class="article-category">Legal</div>
              </div>
              <div class="article-content">
                <div class="article-meta">
                  <span class="article-date">
                    <i class="fas fa-calendar-alt text-primary me-1"></i>
                    8 Desember 2024
                  </span>
                  <span class="article-author">
                    <i class="fas fa-user text-primary me-1"></i>
                    Tim Legal
                  </span>
                </div>
                <h5 class="article-title">Perubahan Regulasi Properti 2024</h5>
                <p class="article-excerpt">
                  Update terbaru tentang perubahan regulasi properti yang berlaku di tahun 2024.
                  Penting untuk diketahui investor...
                </p>
                <a href="#" class="article-link">Baca Selengkapnya <i class="fas fa-arrow-right ms-1"></i></a>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="article-card">
              <div class="article-image">
                <div class="article-category">KPR</div>
              </div>
              <div class="article-content">
                <div class="article-meta">
                  <span class="article-date">
                    <i class="fas fa-calendar-alt text-primary me-1"></i>
                    5 Desember 2024
                  </span>
                  <span class="article-author">
                    <i class="fas fa-user text-primary me-1"></i>
                    Tim Finansial
                  </span>
                </div>
                <h5 class="article-title">Tips Mengajukan KPR yang Disetujui</h5>
                <p class="article-excerpt">
                  Panduan lengkap cara mengajukan KPR agar cepat disetujui bank.
                  Simak tips dan triknya di sini...
                </p>
                <a href="#" class="article-link">Baca Selengkapnya <i class="fas fa-arrow-right ms-1"></i></a>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="article-card">
              <div class="article-image">
                <div class="article-category">Finansial</div>
              </div>
              <div class="article-content">
                <div class="article-meta">
                  <span class="article-date">
                    <i class="fas fa-calendar-alt text-primary me-1"></i>
                    3 Desember 2024
                  </span>
                  <span class="article-author">
                    <i class="fas fa-user text-primary me-1"></i>
                    Konsultan Finansial
                  </span>
                </div>
                <h5 class="article-title">Cara Menghitung ROI Properti</h5>
                <p class="article-excerpt">
                  Pelajari cara menghitung Return on Investment (ROI) properti dengan benar.
                  Metode yang akurat untuk analisis investasi...
                </p>
                <a href="#" class="article-link">Baca Selengkapnya <i class="fas fa-arrow-right ms-1"></i></a>
              </div>
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

      <!-- Sidebar -->
      <div class="col-lg-4">
        <div class="sidebar">
          <h5 class="sidebar-title">Artikel Populer</h5>

          <div class="popular-article">
            <div class="popular-article-image"></div>
            <div class="popular-article-content">
              <h6>Cara Memilih Lokasi Properti yang Tepat</h6>
              <p>15 Desember 2024</p>
            </div>
          </div>

          <div class="popular-article">
            <div class="popular-article-image"></div>
            <div class="popular-article-content">
              <h6>Strategi Investasi Properti di Era Digital</h6>
              <p>12 Desember 2024</p>
            </div>
          </div>

          <div class="popular-article">
            <div class="popular-article-image"></div>
            <div class="popular-article-content">
              <h6>Tren Harga Properti Jakarta 2024</h6>
              <p>10 Desember 2024</p>
            </div>
          </div>

          <div class="popular-article">
            <div class="popular-article-image"></div>
            <div class="popular-article-content">
              <h6>Tips Mengajukan KPR yang Disetujui</h6>
              <p>5 Desember 2024</p>
            </div>
          </div>

          <div class="popular-article">
            <div class="popular-article-image"></div>
            <div class="popular-article-content">
              <h6>Cara Menghitung ROI Properti</h6>
              <p>3 Desember 2024</p>
            </div>
          </div>
        </div>

        <div class="sidebar mt-4">
          <h5 class="sidebar-title">Kategori</h5>
          <div class="d-grid gap-2">
            <a href="#" class="btn btn-outline-primary text-start">
              Tips Properti <span class="badge bg-primary ms-2">8</span>
            </a>
            <a href="#" class="btn btn-outline-primary text-start">
              Investasi <span class="badge bg-primary ms-2">6</span>
            </a>
            <a href="#" class="btn btn-outline-primary text-start">
              Market Update <span class="badge bg-primary ms-2">5</span>
            </a>
            <a href="#" class="btn btn-outline-primary text-start">
              Legal <span class="badge bg-primary ms-2">4</span>
            </a>
            <a href="#" class="btn btn-outline-primary text-start">
              KPR <span class="badge bg-primary ms-2">3</span>
            </a>
            <a href="#" class="btn btn-outline-primary text-start">
              Finansial <span class="badge bg-primary ms-2">3</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?= $this->section('js') ?>
<script>
  // Category filter functionality
  document.querySelectorAll('.filter-btn').forEach(btn => {
    btn.addEventListener('click', function () {
      // Remove active class from all buttons
      document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
      // Add active class to clicked button
      this.classList.add('active');
    });
  });

  // Search form functionality
  document.querySelector('.search-form form').addEventListener('submit', function (e) {
    e.preventDefault();
    // Add your search logic here
    console.log('Search submitted');
  });
</script>
<?= $this->endSection() ?>