<style>
  :root {
    --primary-color: #28a745;
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
    background-color: #218838;
    border-color: #1e7e34;
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
    background: linear-gradient(135deg, var(--primary-color) 0%, #34ce57 100%);
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
    box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
  }

  .form-select {
    border-radius: 10px;
    border: 2px solid #e9ecef;
    padding: 12px 15px;
  }

  .form-select:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
  }

  .search-btn {
    background: linear-gradient(135deg, var(--primary-color) 0%, #34ce57 100%);
    border: none;
    border-radius: 10px;
    padding: 12px 30px;
    font-weight: 600;
    transition: all 0.3s ease;
  }

  .search-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(40, 167, 69, 0.4);
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
    position: relative;
    overflow: hidden;
  }

  .project-badge {
    position: absolute;
    top: 15px;
    left: 15px;
  }

  .project-details {
    margin: 1rem 0;
    padding: 1rem;
    background: #f8f9fa;
    border-radius: 8px;
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
  }

  .article-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
  }

  .article-image {
    height: 200px;
    background: linear-gradient(45deg, #e9ecef, #f8f9fa);
    position: relative;
    overflow: hidden;
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
    color: #218838;
    transform: translateX(5px);
  }

  .article-link i {
    transition: transform 0.3s ease;
  }

  .article-link:hover i {
    transform: translateX(3px);
  }

  .rental-badge {
    background: linear-gradient(135deg, #28a745, #34ce57);
    color: white;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
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
    <h1 class="hero-title">Sewa Properti Impian</h1>
    <p class="hero-subtitle">Temukan properti sewa terbaik dengan harga terjangkau</p>
  </div>
</section>

<!-- Search Form -->
<div class="container">
  <div class="search-card">
    <form method="GET" action="<?= base_url('sewa/search') ?>">
      <div class="row g-3">
        <div class="col-md-3">
          <label class="form-label">
            <i class="fas fa-map-marker-alt text-primary me-2"></i>
            Lokasi
          </label>
          <input type="text" class="form-control" name="location" placeholder="cth., Jakarta, Bali"
            value="<?= $filters['location'] ?? '' ?>">
        </div>
        <div class="col-md-2">
          <label class="form-label">
            <i class="fas fa-home text-primary me-2"></i>
            Tipe Properti
          </label>
          <select class="form-select" name="type">
            <option value="">Semua Tipe</option>
            <?php foreach ($categories as $category): ?>
              <option value="<?= $category['id'] ?>" <?= ($filters['type'] ?? '') == $category['id'] ? 'selected' : '' ?>>
                <?= $category['name'] ?> (<?= $category['property_count'] ?>)
              </option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="col-md-2">
          <label class="form-label">
            <i class="fas fa-bed text-primary me-2"></i>
            Kamar Tidur
          </label>
          <select class="form-select" name="bedrooms">
            <option value="">Berapapun</option>
            <option value="1" <?= ($filters['bedrooms'] ?? '') == '1' ? 'selected' : '' ?>>1</option>
            <option value="2" <?= ($filters['bedrooms'] ?? '') == '2' ? 'selected' : '' ?>>2</option>
            <option value="3" <?= ($filters['bedrooms'] ?? '') == '3' ? 'selected' : '' ?>>3</option>
            <option value="4+" <?= ($filters['bedrooms'] ?? '') == '4+' ? 'selected' : '' ?>>4+</option>
          </select>
        </div>
        <div class="col-md-3">
          <label class="form-label">
            <i class="fas fa-money-bill text-primary me-2"></i>
            Rentang Harga Sewa
          </label>
          <div class="price-range">
            <input type="range" class="range-slider" min="0" max="<?= $stats['max_price'] ?? 50000000 ?>"
              value="<?= $filters['max_price'] ?? ($stats['max_price'] ?? 50000000) / 2 ?>" id="priceRange"
              name="max_price">
            <div class="price-display">
              <span>Rp 0</span>
              <span id="maxPriceDisplay">Rp <?= number_format($stats['max_price'] ?? 50000000, 0, ',', '.') ?></span>
            </div>
            <input type="hidden" name="min_price" value="0">
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
      <?php
      $category_icons = [
        'Rumah' => 'fas fa-home',
        'Apartemen' => 'fas fa-building',
        'Ruko' => 'fas fa-store',
        'Tanah' => 'fas fa-map',
        'Villa' => 'fas fa-home',
        'Kontrakan' => 'fas fa-door-open'
      ];
      ?>
      <?php foreach ($categories as $category): ?>
        <div class="col-md-3 col-sm-6">
          <div class="category-item" onclick="filterByCategory(<?= $category['id'] ?>)">
            <div class="category-icon">
              <i class="<?= $category_icons[$category['name']] ?? 'fas fa-home' ?>"></i>
            </div>
            <h5 class="category-title"><?= $category['name'] ?></h5>
            <p class="category-desc"><?= $category['property_count'] ?> properti tersedia</p>
          </div>
        </div>
      <?php endforeach; ?>

      <!-- Layanan Tambahan -->
      <div class="col-md-3 col-sm-6">
        <div class="category-item">
          <div class="category-icon">
            <i class="fas fa-calculator"></i>
          </div>
          <h5 class="category-title">Simulasi Sewa</h5>
          <p class="category-desc">Hitung biaya sewa bulanan</p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="category-item">
          <div class="category-icon">
            <i class="fas fa-handshake"></i>
          </div>
          <h5 class="category-title">Titip Sewa</h5>
          <p class="category-desc">Serahkan ke agen kami</p>
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
        <h2 class="section-title"><?= isset($search_results) ? 'Hasil Pencarian' : 'Properti Sewa Terbaru' ?></h2>
        <p class="section-subtitle">
          <?= isset($search_results) ? 'Ditemukan ' . count($properties) . ' properti sewa sesuai kriteria Anda' : 'Temukan properti sewa terbaik dengan harga terjangkau.' ?>
        </p>
      </div>
      <?php if (!isset($search_results)): ?>
        <a href="<?= base_url('sewa/search') ?>" class="btn btn-dark">Lihat Semua</a>
      <?php endif; ?>
    </div>

    <div class="row g-4" id="propertiesContainer">
      <?php if (!empty($properties)): ?>
        <?php foreach ($properties as $property): ?>
          <div class="col-lg-4 col-md-6">
            <div class="project-card">
              <div class="project-image">
                <?php if ($property['primary_image'] && $property['primary_image'] != 'default.jpg'): ?>
                  <img src="<?= base_url('public/uploads/properties/' . $property['primary_image']) ?>"
                    alt="<?= $property['title'] ?>" style="width: 100%; height: 250px; object-fit: cover;">
                <?php else: ?>
                  <div
                    style="width: 100%; height: 250px; background: linear-gradient(135deg, #28a745 0%, #34ce57 100%); display: flex; align-items: center; justify-content: center; color: white; font-size: 1.2rem;">
                    <i class="fas fa-home"></i>
                  </div>
                <?php endif; ?>
                <div class="project-badge">
                  <span class="rental-badge">Sewa</span>
                </div>
              </div>
              <div class="project-content">
                <h5 class="project-title"><?= $property['title'] ?></h5>
                <p class="project-location">
                  <i class="fas fa-map-marker-alt text-primary me-1"></i>
                  <?= $property['city'] . ', ' . $property['province'] ?>
                </p>
                <div class="project-details">
                  <div class="row text-center">
                    <div class="col-4">
                      <small class="text-muted">Kamar Tidur</small>
                      <div><i class="fas fa-bed text-primary"></i> <?= $property['bedrooms'] ?></div>
                    </div>
                    <div class="col-4">
                      <small class="text-muted">Kamar Mandi</small>
                      <div><i class="fas fa-bath text-primary"></i> <?= $property['bathrooms'] ?></div>
                    </div>
                    <div class="col-4">
                      <small class="text-muted">Luas Tanah</small>
                      <div><i class="fas fa-expand-arrows-alt text-primary"></i> <?= $property['land_area'] ?> m²</div>
                    </div>
                  </div>
                </div>
                <p class="project-price">Rp <?= number_format($property['price'], 0, ',', '.') ?>/bulan</p>
                <a href="<?= base_url('properti/detail/' . $property['id']) ?>"
                  class="btn btn-outline-primary btn-sm w-100">
                  Lihat Detail
                </a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="col-12 text-center">
          <div class="py-5">
            <i class="fas fa-search fa-3x text-muted mb-3"></i>
            <h4 class="text-muted">Tidak ada properti sewa ditemukan</h4>
            <p class="text-muted">Coba ubah kriteria pencarian Anda</p>
            <a href="<?= base_url('sewa') ?>" class="btn btn-primary">Lihat Semua Properti Sewa</a>
          </div>
        </div>
      <?php endif; ?>
    </div>

    <?php if (!isset($search_results) && !empty($properties)): ?>
      <div class="text-center mt-4">
        <button class="btn btn-outline-primary" id="loadMoreBtn" onclick="loadMoreProperties()">
          <i class="fas fa-plus me-2"></i>Muat Lebih Banyak
        </button>
      </div>
    <?php endif; ?>
  </div>
</section>

<!-- Article Section -->
<section class="article-section">
  <div class="container">
    <div class="section-header">
      <div>
        <h2 class="section-title">Tips Sewa Properti</h2>
        <p class="section-subtitle">Panduan lengkap untuk menyewa properti yang tepat</p>
      </div>
      <a href="#" class="btn btn-dark">Lihat Semua Tips</a>
    </div>

    <div class="row g-4">
      <div class="col-lg-4 col-md-6">
        <div class="article-card">
          <div class="article-image">
            <div class="article-category">Tips Sewa</div>
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
            <h5 class="article-title">Cara Memilih Lokasi Sewa yang Strategis</h5>
            <p class="article-excerpt">
              Memilih lokasi sewa yang strategis sangat penting untuk kenyamanan dan aksesibilitas.
              Berikut tips memilih lokasi sewa yang tepat...
            </p>
            <a href="#" class="article-link">Baca Selengkapnya <i class="fas fa-arrow-right ms-1"></i></a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="article-card">
          <div class="article-image">
            <div class="article-category">Budget</div>
          </div>
          <div class="article-content">
            <div class="article-meta">
              <span class="article-date">
                <i class="fas fa-calendar-alt text-primary me-1"></i>
                12 Desember 2024
              </span>
              <span class="article-author">
                <i class="fas fa-user text-primary me-1"></i>
                Tim Finance
              </span>
            </div>
            <h5 class="article-title">Mengatur Budget Sewa Properti</h5>
            <p class="article-excerpt">
              Mengatur budget sewa yang tepat sangat penting untuk keuangan yang sehat.
              Pelajari cara mengalokasikan budget sewa yang ideal...
            </p>
            <a href="#" class="article-link">Baca Selengkapnya <i class="fas fa-arrow-right ms-1"></i></a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="article-card">
          <div class="article-image">
            <div class="article-category">Legal</div>
          </div>
          <div class="article-content">
            <div class="article-meta">
              <span class="article-date">
                <i class="fas fa-calendar-alt text-primary me-1"></i>
                10 Desember 2024
              </span>
              <span class="article-author">
                <i class="fas fa-user text-primary me-1"></i>
                Tim Legal
              </span>
            </div>
            <h5 class="article-title">Aspek Legal dalam Sewa Properti</h5>
            <p class="article-excerpt">
              Memahami aspek legal dalam sewa properti sangat penting untuk melindungi hak Anda.
              Pelajari dokumen dan perjanjian yang perlu diperhatikan...
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
  let currentPage = 1;
  const limit = 6;

  // Price range slider functionality
  const rangeSlider = document.querySelector('.range-slider');
  const priceDisplay = document.querySelector('.price-display');
  const maxPriceDisplay = document.getElementById('maxPriceDisplay');

  if (rangeSlider) {
    rangeSlider.addEventListener('input', function () {
      const value = this.value;
      const formattedValue = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0,
        maximumFractionDigits: 0
      }).format(value);

      if (priceDisplay) {
        priceDisplay.querySelector('span:last-child').textContent = formattedValue;
      }
    });

    // Initialize price display
    rangeSlider.dispatchEvent(new Event('input'));
  }

  // Filter by category
  function filterByCategory(categoryId) {
    const form = document.querySelector('form');
    const typeSelect = form.querySelector('select[name="type"]');
    typeSelect.value = categoryId;
    form.submit();
  }

  // Load more properties
  function loadMoreProperties() {
    currentPage++;
    const loadMoreBtn = document.getElementById('loadMoreBtn');

    if (loadMoreBtn) {
      loadMoreBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Memuat...';
      loadMoreBtn.disabled = true;
    }

    // Get current filters
    const form = document.querySelector('form');
    const formData = new FormData(form);
    const params = new URLSearchParams();

    for (let [key, value] of formData.entries()) {
      if (value) params.append(key, value);
    }
    params.append('page', currentPage);

    fetch(`<?= base_url('sewa/get_ajax') ?>?${params.toString()}`)
      .then(response => response.json())
      .then(data => {
        if (data.success && data.data.length > 0) {
          const container = document.getElementById('propertiesContainer');
          data.data.forEach(property => {
            const propertyCard = createPropertyCard(property);
            container.insertAdjacentHTML('beforeend', propertyCard);
          });

          if (!data.has_more) {
            loadMoreBtn.style.display = 'none';
          } else {
            loadMoreBtn.innerHTML = '<i class="fas fa-plus me-2"></i>Muat Lebih Banyak';
            loadMoreBtn.disabled = false;
          }
        } else {
          if (loadMoreBtn) {
            loadMoreBtn.style.display = 'none';
          }
        }
      })
      .catch(error => {
        console.error('Error loading more properties:', error);
        if (loadMoreBtn) {
          loadMoreBtn.innerHTML = '<i class="fas fa-plus me-2"></i>Muat Lebih Banyak';
          loadMoreBtn.disabled = false;
        }
      });
  }

  // Create property card HTML
  function createPropertyCard(property) {
    const imageUrl = property.primary_image && property.primary_image !== 'default.jpg'
      ? `<?= base_url('public/uploads/properties/') ?>${property.primary_image}`
      : null;

    const imageHtml = imageUrl
      ? `<img src="${imageUrl}" alt="${property.title}" style="width: 100%; height: 250px; object-fit: cover;">`
      : `<div style="width: 100%; height: 250px; background: linear-gradient(135deg, #28a745 0%, #34ce57 100%); display: flex; align-items: center; justify-content: center; color: white; font-size: 1.2rem;"><i class="fas fa-home"></i></div>`;

    return `
      <div class="col-lg-4 col-md-6">
        <div class="project-card">
          <div class="project-image">
            ${imageHtml}
            <div class="project-badge">
              <span class="rental-badge">Sewa</span>
            </div>
          </div>
          <div class="project-content">
            <h5 class="project-title">${property.title}</h5>
            <p class="project-location">
              <i class="fas fa-map-marker-alt text-primary me-1"></i>
              ${property.city}, ${property.province}
            </p>
            <div class="project-details">
              <div class="row text-center">
                <div class="col-4">
                  <small class="text-muted">Kamar Tidur</small>
                  <div><i class="fas fa-bed text-primary"></i> ${property.bedrooms}</div>
                </div>
                <div class="col-4">
                  <small class="text-muted">Kamar Mandi</small>
                  <div><i class="fas fa-bath text-primary"></i> ${property.bathrooms}</div>
                </div>
                <div class="col-4">
                  <small class="text-muted">Luas Tanah</small>
                  <div><i class="fas fa-expand-arrows-alt text-primary"></i> ${property.land_area} m²</div>
                </div>
              </div>
            </div>
            <p class="project-price">Rp ${new Intl.NumberFormat('id-ID').format(property.price)}/bulan</p>
            <a href="<?= base_url('properti/detail/') ?>${property.id}" class="btn btn-outline-primary btn-sm w-100">
              Lihat Detail
            </a>
          </div>
        </div>
      </div>
    `;
  }
</script>
<?= $this->endSection() ?>