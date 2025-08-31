<?= $this->include('template/dashboard/header') ?>
<?= $this->include('template/dashboard/navbar') ?>

<!-- partial -->
<div class="container-fluid page-body-wrapper">
  <?= $this->include('template/dashboard/sidebar') ?>
  <!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">
      <?= $pagecontent ?>
    </div>
    <!-- content-wrapper ends -->
    <?= $this->include('template/dashboard/watermark') ?>
    <!-- partial -->
  </div>
  <!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
<?= $this->include('template/dashboard/footer') ?>