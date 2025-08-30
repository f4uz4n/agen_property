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

  .search-card {
    background: white;
    border-radius: 15px;
    padding: 2rem;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    margin-top: -50px;
    position: relative;
    z-index: 10;
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

  .category-section {
    padding: 60px 0;
    background: white;
  }

  .category-item {
    text-align: center;
    padding: 2rem 1rem;
    border-radius: 15px;
    transition: all 0.3s ease;
    cursor: pointer;
  }

  .category-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
  }

  .category-icon {
    width: 80px;
    height: 80px;
    background: var(--primary-color);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
    color: white;
    font-size: 2rem;
  }

  .category-title {
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 0.5rem;
  }

  .category-desc {
    color: var(--text-muted);
    font-size: 0.9rem;
  }

  .projects-section {
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

  .project-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
  }

  .project-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
  }

  .project-image {
    height: 200px;
    background: linear-gradient(45deg, #e9ecef, #f8f9fa);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--text-muted);
    font-size: 1.2rem;
  }

  .project-content {
    padding: 1.5rem;
  }

  .project-title {
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 0.5rem;
  }

  .project-location {
    color: var(--text-muted);
    font-size: 0.9rem;
    margin-bottom: 1rem;
  }

  .project-price {
    font-weight: 700;
    color: var(--primary-color);
    font-size: 1.1rem;
  }

  .price-range {
    background: white;
    border-radius: 10px;
    padding: 1rem;
    border: 2px solid #e9ecef;
  }

  .range-slider {
    width: 100%;
    height: 6px;
    background: #e9ecef;
    border-radius: 3px;
    outline: none;
    -webkit-appearance: none;
  }

  .range-slider::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 20px;
    height: 20px;
    background: var(--primary-color);
    border-radius: 50%;
    cursor: pointer;
  }

  .range-slider::-moz-range-thumb {
    width: 20px;
    height: 20px;
    background: var(--primary-color);
    border-radius: 50%;
    cursor: pointer;
    border: none;
  }

  .price-display {
    display: flex;
    justify-content: space-between;
    margin-top: 0.5rem;
    font-size: 0.9rem;
    color: var(--text-muted);
  }

  .article-section {
    padding: 60px 0;
    background: white;
  }

  .article-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    height: 100%;
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

  @media (max-width: 768px) {
    .hero-title {
      font-size: 2rem;
    }

    .search-card {
      margin: 0 1rem;
      padding: 1.5rem;
    }

    .section-header {
      flex-direction: column;
      text-align: center;
      gap: 1rem;
    }
  }
</style>

<!-- Hero Section -->
<section class="hero-section">
  <div class="container">
    <h1 class="hero-title">Jual Properti Anda</h1>
    <p class="hero-subtitle">Platform #1 untuk menjual properti di Indonesia</p>
  </div>
</section>

<!-- Search Form -->
<div class="container">
  <div class="search-card">
    <form>
      <div class="row g-3">
        <div class="col-md-3">
          <label class="form-label">
            <i class="fas fa-map-marker-alt text-primary me-2"></i>
            Lokasi
          </label>
          <input type="text" class="form-control" placeholder="cth., Jakarta, Bali">
        </div>
        <div class="col-md-2">
          <label class="form-label">
            <i class="fas fa-home text-primary me-2"></i>
            Tipe Properti
          </label>
          <select class="form-select">
            <option>Semua Tipe</option>
            <option>Rumah</option>
            <option>Apartemen</option>
            <option>Ruko</option>
            <option>Tanah</option>
          </select>
        </div>
        <div class="col-md-2">
          <label class="form-label">
            <i class="fas fa-bed text-primary me-2"></i>
            Kamar Tidur
          </label>
          <select class="form-select">
            <option>Berapapun</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4+</option>
          </select>
        </div>
        <div class="col-md-3">
          <label class="form-label">
            <i class="fas fa-money-bill text-primary me-2"></i>
            Rentang Harga
          </label>
          <div class="price-range">
            <input type="range" class="range-slider" min="0" max="20000000000" value="5000000000">
            <div class="price-display">
              <span>Rp 0</span>
              <span>Rp 20.0 Miliar</span>
            </div>
          </div>
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

<!-- Property Categories -->
<section class="category-section">
  <div class="container">
    <div class="row g-4">
      <div class="col-md-3 col-sm-6">
        <div class="category-item">
          <div class="category-icon">
            <i class="fas fa-home"></i>
          </div>
          <h5 class="category-title">Rumah</h5>
          <p class="category-desc">Jual rumah Anda dengan mudah</p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="category-item">
          <div class="category-icon">
            <i class="fas fa-building"></i>
          </div>
          <h5 class="category-title">Apartemen</h5>
          <p class="category-desc">Unit apartemen premium</p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="category-item">
          <div class="category-icon">
            <i class="fas fa-door-open"></i>
          </div>
          <h5 class="category-title">Open House</h5>
          <p class="category-desc">Jadwalkan open house</p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="category-item">
          <div class="category-icon">
            <i class="fas fa-calculator"></i>
          </div>
          <h5 class="category-title">Simulasi KPR</h5>
          <p class="category-desc">Hitung cicilan properti</p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="category-item">
          <div class="category-icon">
            <i class="fas fa-handshake"></i>
          </div>
          <h5 class="category-title">Titip Jual</h5>
          <p class="category-desc">Serahkan ke agen kami</p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="category-item">
          <div class="category-icon">
            <i class="fas fa-users"></i>
          </div>
          <h5 class="category-title">Cari Agen</h5>
          <p class="category-desc">Temukan agen terpercaya</p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="category-item">
          <div class="category-icon">
            <i class="fas fa-briefcase"></i>
          </div>
          <h5 class="category-title">Join Sampro</h5>
          <p class="category-desc">Bergabung sebagai agen</p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="category-item">
          <div class="category-icon">
            <i class="fas fa-ellipsis-h"></i>
          </div>
          <h5 class="category-title">Lainnya</h5>
          <p class="category-desc">Layanan tambahan</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- New Projects Section -->
<section class="projects-section">
  <div class="container">
    <div class="section-header">
      <div>
        <h2 class="section-title">Proyek Baru</h2>
        <p class="section-subtitle">Rekomendasi terbaik untuk Anda. Dapatkan informasi proyek terkini.</p>
      </div>
      <a href="#" class="btn btn-dark">Lihat Semua</a>
    </div>

    <div class="row g-4">
      <div class="col-lg-4 col-md-6">
        <div class="project-card">
          <div class="project-image">
            600 x 400
          </div>
          <div class="project-content">
            <h5 class="project-title">Green Residence Jakarta</h5>
            <p class="project-location">
              <i class="fas fa-map-marker-alt text-primary me-1"></i>
              Jakarta Selatan
            </p>
            <p class="project-price">Rp 2.5 Miliar</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="project-card">
          <div class="project-image">
            600 x 400
          </div>
          <div class="project-content">
            <h5 class="project-title">Sky Tower Bandung</h5>
            <p class="project-location">
              <i class="fas fa-map-marker-alt text-primary me-1"></i>
              Bandung
            </p>
            <p class="project-price">Rp 1.8 Miliar</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="project-card">
          <div class="project-image">
            600 x 400
          </div>
          <div class="project-content">
            <h5 class="project-title">Ocean View Surabaya</h5>
            <p class="project-location">
              <i class="fas fa-map-marker-alt text-primary me-1"></i>
              Surabaya
            </p>
            <p class="project-price">Rp 3.2 Miliar</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Article Section -->
<section class="article-section">
  <div class="container">
    <div class="section-header">
      <div>
        <h2 class="section-title">Artikel Terbaru</h2>
        <p class="section-subtitle">Tips dan informasi terkini seputar properti dan investasi</p>
      </div>
      <a href="#" class="btn btn-dark">Lihat Semua Artikel</a>
    </div>

    <div class="row g-4">
      <div class="col-lg-4 col-md-6">
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
              Berikut tips memilih lokasi yang strategis...
            </p>
            <a href="#" class="article-link">Baca Selengkapnya <i class="fas fa-arrow-right ms-1"></i></a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
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

      <div class="col-lg-4 col-md-6">
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
    </div>
  </div>
</section>

<?= $this->section('js') ?>
<script>
  // Price range slider functionality
  const rangeSlider = document.querySelector('.range-slider');
  const priceDisplay = document.querySelector('.price-display');

  rangeSlider.addEventListener('input', function () {
    const value = this.value;
    const formattedValue = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0
    }).format(value);

    priceDisplay.querySelector('span:last-child').textContent = formattedValue;
  });
</script>
<?= $this->endSection() ?>