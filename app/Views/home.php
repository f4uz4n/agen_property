<style>
  /* .text-primary-custom {
    color: #4c80ae !important;
  }

  .bg-primary-custom {
    background-color: #4c80ae !important;
  }

  .btn-primary-custom {
    background-color: #4c80ae;
    border-color: #4c80ae;
  }

  .btn-primary-custom:hover {
    background-color: #3a6790;
    border-color: #3a6790;
  } */

  .hero-section {
    background: linear-gradient(135deg, #4c80ae 0%, #3a6790 100%);
    color: #fff;
    padding: 96px 0;
    border-radius: 0 0 24px 24px;
  }

  .feature-icon {
    width: 56px;
    height: 56px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 12px;
  }

  .property-card img {
    object-fit: cover;
    height: 200px;
  }

  .section-title {
    font-weight: 700;
  }

  .section-subtitle {
    color: #64748b;
  }

  .footer-mini a {
    color: #cbd5e1;
    text-decoration: none;
  }

  .footer-mini a:hover {
    text-decoration: underline;
  }

  @media (min-width: 992px) {
    .hero-section {
      padding: 128px 0;
    }

    .property-card img {
      height: 220px;
    }
  }
</style>

<!-- Hero -->
<section class="hero-section mb-5">
  <div class="container">
    <div class="row align-items-center g-4">
      <div class="col-lg-7">
        <h1 class="display-5 fw-bold mb-3">Solusi Properti Modern untuk Hunian dan Investasi Anda</h1>
        <p class="lead mb-4">Temukan rumah, apartemen, dan kavling terbaik dengan proses mudah, aman, dan transparan.
          Tim profesional kami siap mendampingi setiap langkah Anda.</p>
        <div class="d-flex gap-3">
          <a href="#tentang" class="btn btn-lg btn-light text-primary">Pelajari Lebih Lanjut</a>
          <a href="#kontak" class="btn btn-lg btn-outline-light">Konsultasi Gratis</a>
        </div>
      </div>
      <div class="col-lg-5">
        <div class="card shadow border-0">
          <div class="card-body p-4">
            <h5 class="fw-semibold mb-3">Statistik Kami</h5>
            <div class="row g-3 text-center">
              <div class="col-6">
                <div class="h3 fw-bold text-primary"><?= $stat['transaksi'] ?></div>
                <div class="small text-muted">Properti Terjual</div>
              </div>
              <div class="col-6">
                <div class="h3 fw-bold text-primary"><?= $stat['klien'] ?></div>
                <div class="small text-muted">Klien Puas</div>
              </div>
              <div class="col-6">
                <div class="h3 fw-bold text-primary"><?= $stat['tahun'] ?></div>
                <div class="small text-muted">Tahun Pengalaman</div>
              </div>
              <div class="col-6">
                <div class="h3 fw-bold text-primary"><?= $stat['kota'] ?></div>
                <div class="small text-muted">Kota Terjangkau</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Fitur -->
<section class="py-5">
  <div class="container">
    <div class="text-center mb-4">
      <h2 class="section-title">Mengapa Memilih Kami</h2>
      <p class="section-subtitle">Nilai tambah yang kami hadirkan untuk kebutuhan properti Anda</p>
    </div>
    <div class="row g-4">
      <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
          <div class="card-body">
            <div class="feature-icon bg-primary mb-3">
              <i class="fa-solid fa-house-chimney text-white"></i>
            </div>
            <h5 class="fw-semibold mb-2">Pilihan Lengkap</h5>
            <p class="mb-0 text-muted">Ribuan listing terbaru yang diverifikasi untuk hunian impian Anda.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
          <div class="card-body">
            <div class="feature-icon bg-primary mb-3">
              <i class="fa-solid fa-user-shield text-white"></i>
            </div>
            <h5 class="fw-semibold mb-2">Transaksi Aman</h5>
            <p class="mb-0 text-muted">Pendampingan legalitas dan proses yang transparan dari awal hingga akhir.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
          <div class="card-body">
            <div class="feature-icon bg-primary mb-3">
              <i class="fa-solid fa-handshake angle text-white"></i>
            </div>
            <h5 class="fw-semibold mb-2">Konsultasi Profesional</h5>
            <p class="mb-0 text-muted">Tim berpengalaman membantu Anda memilih properti paling tepat.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
          <div class="card-body">
            <div class="feature-icon bg-primary mb-3">
              <i class="fa-solid fa-tags text-white"></i>
            </div>
            <h5 class="fw-semibold mb-2">Harga Kompetitif</h5>
            <p class="mb-0 text-muted">Penawaran terbaik dengan negosiasi yang menguntungkan kedua belah pihak.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Tentang Kami -->
<section id="tentang" class="py-5 bg-light">
  <div class="container">
    <div class="row align-items-center g-4">
      <div class="col-lg-6">
        <h2 class="section-title mb-3">Tentang Perusahaan Properti</h2>
        <p class="section-subtitle mb-4">Kami adalah perusahaan properti terpercaya yang telah melayani ribuan klien di
          seluruh Indonesia sejak 2008.</p>
        <div class="row g-3">
          <div class="col-6">
            <div class="d-flex align-items-center">
              <div class="feature-icon bg-primary me-3">
                <i class="fas fa-award text-white"></i>
              </div>
              <div>
                <div class="fw-semibold">Terpercaya</div>
                <div class="small text-muted"><?= $stat['tahun'] ?> tahun pengalaman</div>
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-center">
              <div class="feature-icon bg-primary me-3">
                <i class="fas fa-certificate text-white"></i>
              </div>
              <div>
                <div class="fw-semibold">Bersertifikat</div>
                <div class="small text-muted">Lisensi resmi</div>
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-center">
              <div class="feature-icon bg-primary me-3">
                <i class="fas fa-users text-white"></i>
              </div>
              <div>
                <div class="fw-semibold">Tim Profesional</div>
                <div class="small text-muted">50+ agen berpengalaman</div>
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-center">
              <div class="feature-icon bg-primary me-3">
                <i class="fas fa-shield-alt text-white"></i>
              </div>
              <div>
                <div class="fw-semibold">Garansi</div>
                <div class="small text-muted">100% aman transaksi</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="position-relative">
          <img src="<?= base_url('public/images/1.jpg') ?>" class="img-fluid rounded-3 shadow" alt="Kantor Kami">
          <div class="position-absolute top-0 start-0 bg-primary text-white p-3 rounded-3 m-3">
            <div class="h4 mb-0">15+</div>
            <div class="small">Tahun Pengalaman</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="py-5">
  <div class="container">
    <div
      class="p-4 p-lg-5 bg-primary text-white rounded-3 d-flex flex-column flex-lg-row align-items-lg-center justify-content-between">
      <div class="mb-3 mb-lg-0">
        <h3 class="mb-2">Butuh Konsultasi Properti?</h3>
        <p class="mb-0">Tim profesional kami siap membantu Anda memahami seluk beluk dunia properti.</p>
      </div>
      <a href="#kontak" class="btn btn-outline-light btn-lg">Hubungi Kami</a>
    </div>
  </div>
</section>

<!-- Testimoni -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="text-center mb-4">
      <h2 class="section-title">Apa Kata Klien</h2>
      <p class="section-subtitle">Pengalaman nyata dari mereka yang telah menemukan propertinya</p>
    </div>
    <div class="row g-4">
      <?php foreach ($testimoni as $key => $item): ?>
        <div class="col-md-6 col-lg-4">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body">
              <div class="d-flex align-items-center mb-3">
                <img src="<?= base_url('public/images/faces/face' . (10 + $key) . '.jpg') ?>" class="rounded-circle me-3"
                  width="48" height="48" alt="Klien">
                <div>
                  <div class="fw-semibold"><?= $item['name'] ?></div>
                  <div class="text-muted small"><?= $item['alamat'] ?></div>
                </div>
              </div>
              <p class="mb-0"><?= $item['text'] ?></p>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</section>

<!-- Kontak -->
<section id="kontak" class="py-5">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-6">
        <h2 class="section-title mb-3">Hubungi Kami</h2>
        <p class="section-subtitle mb-4">Tinggalkan pesan Anda, kami akan menghubungi kembali secepatnya.</p>
        <form>
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Nama</label>
              <input type="text" class="form-control" placeholder="Nama lengkap">
            </div>
            <div class="col-md-6">
              <label class="form-label">Email</label>
              <input type="email" class="form-control" placeholder="nama@email.com">
            </div>
            <div class="col-12">
              <label class="form-label">No. Telepon</label>
              <input type="text" class="form-control" placeholder="08xxxxxxxxxx">
            </div>
            <div class="col-12">
              <label class="form-label">Pesan</label>
              <textarea rows="4" class="form-control" placeholder="Ceritakan kebutuhan properti Anda"></textarea>
            </div>
            <div class="col-12 d-grid d-sm-flex gap-2">
              <button type="button" class="btn btn-primary">Kirim Pesan</button>
              <button type="reset" class="btn btn-outline-primary">Reset</button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-lg-6">
        <div class="h-100 p-4 bg-light rounded-3">
          <h5 class="fw-semibold mb-3">Kantor Pusat</h5>
          <p class="mb-1"><i class="fas fa-map-marker-alt me-2 text-primary"></i><?= $contact['alamat'] ?></p>
          <p class="mb-1"><i class="fas fa-phone me-2 text-primary"></i><?= $contact['telepon'] ?></p>
          <p class="mb-3"><i class="fas fa-envelope me-2 text-primary"></i><?= $contact['email'] ?></p>
          <div class="ratio ratio-16x9 rounded-3 overflow-hidden">
            <?= $contact['maps'] ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

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
      <span>© <?= date('Y') ?> Perusahaan Properti. All rights reserved.</span>
      <div class="d-flex gap-3">
        <a href="<?= base_url('kebijakan') ?>">Kebijakan Privasi</a>
        <a href="<?= base_url('syarat') ?>">Syarat & Ketentuan</a>
      </div>
    </div>
  </div>
</section>