<!-- partial:partials/_navbar.html -->
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
    <a class="navbar-brand brand-logo fw-semibold me-5" href="<?= base_url() ?>">Sampro Indonesia</a>
    <!-- <img src="<?= base_url('public/images/logo.svg') ?>" class="me-2" alt="logo" /> -->
    <a class="navbar-brand brand-logo-mini fw-semibold" href="<?= base_url() ?>">
      <!-- <img src="<?= ''//base_url('public/images/logo-mini.svg') ?>" alt="logo" /> -->
      <i class="fa-solid fa-gauge"></i>
    </a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="icon-menu"></span>
    </button>
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
          <img src="<?= base_url('public/images/faces/face28.jpg') ?>" alt="profile" />
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
          <a href="<?= base_url('logout') ?>" class="dropdown-item"><i class="ti-power-off text-primary"></i> Logout
          </a>
        </div>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
      data-toggle="offcanvas">
      <span class="icon-menu"></span>
    </button>
  </div>
</nav>