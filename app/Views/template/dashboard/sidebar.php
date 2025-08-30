<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('dashboard') ?>" data-page="dashboard">
        <i class="fa-solid fa-home menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <?php if (session('role') == 'owner'): ?>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('dashboard/laporan-penjualan') ?>" data-page="laporan-penjualan">
          <i class="fa-solid fa-file-invoice menu-icon"></i>
          <span class="menu-title">Laporan Penjualan</span>
        </a>
      </li>
    <?php endif ?>
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('dashboard/properti') ?>" data-page="properti">
        <i class="fa-solid fa-building menu-icon"></i>
        <span class="menu-title">Properti</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('dashboard/artikel') ?>" data-page="artikel">
        <i class="fa-solid fa-newspaper menu-icon"></i>
        <span class="menu-title">Artikel</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('dashboard/kategori_properti') ?>" data-page="kategori_properti">
        <i class="fa-solid fa-list menu-icon"></i>
        <span class="menu-title">Kategori Properti</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('dashboard/agen') ?>" data-page="agen">
        <i class="fa-solid fa-user-tie menu-icon"></i>
        <span class="menu-title">Agen</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('dashboard/user') ?>" data-page="user">
        <i class="fa-solid fa-users menu-icon"></i>
        <span class="menu-title">User</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('dashboard/setting') ?>" data-page="setting">
        <i class="fa-solid fa-gear menu-icon"></i>
        <span class="menu-title">Setting</span>
      </a>
    </li>
  </ul>
</nav>