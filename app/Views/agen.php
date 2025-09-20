<?php
// In a real app, this data would come from the controller.
$agents = isset($agents) ? $agents : [
  ["id" => "9", "name" => "Agus Setiawan", "email" => "agen6@example.com", "phone" => "628888990011", "location" => "Balikpapan, Kalimantan Timur", "role" => "agen", "status" => "aktif", "terjual" => 0, "tersewakan" => 0],
  ["id" => "4", "name" => "Dewi Lestari", "email" => "agen1@example.com", "phone" => "628333445566", "location" => "Semarang, Jawa Tengah", "role" => "agen", "status" => "aktif", "Terjual" => "1", "Tersewakan" => "1"],
  ["id" => "7", "name" => "Fajar Nugroho", "email" => "agen4@example.com", "phone" => "628666778899", "location" => "Makassar, Sulawesi Selatan", "role" => "agen", "status" => "aktif", "terjual" => 0, "tersewakan" => 0],
  ["id" => "8", "name" => "Lina Marlina", "email" => "agen5@example.com", "phone" => "628777889900", "location" => "Yogyakarta, DI Yogyakarta", "role" => "agen", "status" => "aktif", "terjual" => 0, "tersewakan" => 0],
  ["id" => "10", "name" => "Nurul Aisyah", "email" => "agen7@example.com", "phone" => "628999100122", "location" => "Palembang, Sumatera Selatan", "role" => "agen", "status" => "aktif", "terjual" => 0, "tersewakan" => 0],
  ["id" => "6", "name" => "Putri Ayu", "email" => "agen3@example.com", "phone" => "628555667788", "location" => "Denpasar, Bali", "role" => "agen", "status" => "aktif", "terjual" => 0, "tersewakan" => 0],
  ["id" => "5", "name" => "Rahmat Hidayat", "email" => "agen2@example.com", "phone" => "628444556677", "location" => "Medan, Sumatera Utara", "role" => "agen", "status" => "aktif", "terjual" => 0, "tersewakan" => 0],
];
?>

<style>
  .hero-section {
    background: linear-gradient(135deg, #4c80ae 0%, #5a8bc0 100%);
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

  .agent-card {
    border: 1px solid #e0e0e0;
    border-radius: 12px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    background-color: #fff;
  }

  .agent-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
  }

  .agent-card .card-header {
    background-color: #4c80ae;
    color: white;
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
    padding: 1rem;
    text-align: center;
  }

  .agent-card .card-title {
    font-weight: 700;
    color: #333;
  }

  .agent-card .card-body {
    padding: 1.5rem;
  }

  .agent-card .location {
    color: #6c757d;
    margin-bottom: 1rem;
  }

  .agent-stats {
    display: flex;
    justify-content: space-around;
    margin-bottom: 1.5rem;
    padding: 1rem;
    background-color: #f8f9fa;
    border-radius: 8px;
  }

  .agent-stats .stat {
    text-align: center;
    font-size: 0.9rem;
    color: #555;
  }

  .agent-stats .stat .value {
    display: block;
    font-weight: 700;
    font-size: 1.2rem;
    color: #4c80ae;
  }

  .btn-whatsapp {
    background-color: #25D366;
    border-color: #25D366;
    color: white;
    font-weight: 600;
    width: 100%;
    padding: 0.75rem;
  }

  .btn-whatsapp:hover {
    background-color: #1EAE54;
    border-color: #1EAE54;
    color: white;
  }
</style>

<!-- Hero Section -->
<section class="hero-section">
  <div class="container">
    <h1 class="hero-title">Agen Properti Kami</h1>
    <p class="hero-subtitle">Temukan agen properti profesional yang siap membantu Anda.</p>
  </div>
</section>

<div class="container my-5">
  <div class="row">
    <?php foreach ($agents as $agent): ?>
      <?php
      // Handle inconsistent capitalization for sales and rental counts
      $sold = isset($agent['terjual']) ? $agent['terjual'] : (isset($agent['Terjual']) ? $agent['Terjual'] : 0);
      $rented = isset($agent['tersewakan']) ? $agent['tersewakan'] : (isset($agent['Tersewakan']) ? $agent['Tersewakan'] : 0);
      ?>
      <div class="col-md-6 col-lg-4 mb-4">
        <div class="card agent-card shadow-sm">
          <div class="card-body text-center">
            <i class="fas fa-user-tie fa-3x mb-3" style="color: #4c80ae;"></i>
            <h5 class="card-title"><?= esc($agent['name']) ?></h5>
            <p class="location"><i class="fas fa-map-marker-alt me-2"></i><?= esc($agent['location']) ?></p>

            <div class="agent-stats">
              <div class="stat">
                <span class="value"><?= esc($sold) ?></span>
                <span>Terjual</span>
              </div>
              <div class="stat">
                <span class="value"><?= esc($rented) ?></span>
                <span>Tersewa</span>
              </div>
            </div>

            <a href="https://wa.me/<?= esc($agent['phone']) ?>" target="_blank" class="btn btn-whatsapp">
              <i class="fab fa-whatsapp me-2"></i> Hubungi WhatsApp
            </a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<!-- Footer konten -->
<section class="pt-5 pb-4 bg-dark text-white footer-mini">
  <div class="container">
    <div class="row g-4">
      <div class="col-md-6 col-lg-4">
        <h5 class="fw-semibold">Sampro Indonesia</h5>
        <p class="text-white-50 mb-3">Partner terpercaya untuk jual-beli dan sewa properti di seluruh Indonesia.</p>
        <div class="d-flex gap-3">
          <a href="<?= $contact['facebook'] ?>"><i class="fab fa-facebook"></i></a>
          <a href="<?= $contact['instagram'] ?>"><i class="fab fa-instagram"></i></a>
        </div>
      </div>
      <div class="col-6 col-lg-2">
        <h6 class="fw-semibold">Perusahaan</h6>
        <ul class="list-unstyled text-white-50 mb-0">
          <li><a href="#tentang">Tentang</a></li>
          <li><a href="<?= base_url('artikel') ?>">Artikel</a></li>
        </ul>
      </div>
      <div class="col-6 col-lg-2">
        <h6 class="fw-semibold">Layanan</h6>
        <ul class="list-unstyled text-white-50 mb-0">
          <li><a href="<?= base_url('jual') ?>">Jual Properti</a></li>
          <li><a href="<?= base_url('sewa') ?>">Sewa Properti</a></li>
        </ul>
      </div>
      <div class="col-lg-4">
        <h6 class="fw-semibold">Kontak Cepat</h6>
        <ul class="list-unstyled text-white-50 mb-3">
          <li class="mb-1"><i class="fas fa-phone me-2 text-primary"></i><?= $contact['telepon'] ?></li>
          <li class="mb-1"><i class="fas fa-envelope me-2 text-primary"></i><?= $contact['email'] ?></li>
          <li><i class="fas fa-clock me-2 text-primary"></i>Senin - Jumat, 09.00 - 17.00</li>
        </ul>
        <a href="wa.me/<?= $contact['whatsapp'] ?>" target="_blank" rel="noopener" class="btn btn-primary w-100">
          <i class="fab fa-whatsapp me-2"></i>Chat via WhatsApp
        </a>
      </div>
    </div>
    <hr class="border-secondary my-4">
    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center text-white-50 small">
      <span>© <?= date('Y') ?> Sampro Indonesia. All rights reserved.</span>
      <div class="d-flex gap-3">
        <a href="<?= base_url('kebijakan') ?>">Kebijakan Privasi</a>
        <a href="<?= base_url('syarat') ?>">Syarat & Ketentuan</a>
      </div>
    </div>
  </div>
</section>