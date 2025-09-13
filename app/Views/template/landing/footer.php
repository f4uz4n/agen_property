<script src="<?= base_url('public/js/jquery-3.7.1.min.js') ?>"></script>
<script src="<?= base_url('public/js/bootstrap.bundle.js') ?>"></script>
<script src="<?= base_url('public/vendors/sweetalert2/sweetalert2.all.min.js') ?>"></script>
<script src="<?= base_url('public/vendors/typeahead.js/typeahead.bundle.min.js') ?>"></script>
<script src="<?= base_url('public/vendors/owl-carousel/owl.carousel.min.js') ?>"></script>

<script src="<?= base_url('public/js/custom.js') ?>"></script>
<script>
  $(document).ready(function () {

    $(".owl-carousel").owlCarousel({
      navigation: true, // Show next and prev buttons
      slideSpeed: 300,
      paginationSpeed: 400,

      items: 1,
      itemsDesktop: false,
      itemsDesktopSmall: false,
      itemsTablet: false,
      itemsMobile: false
    });

  });
</script>
<?= $this->renderSection('js') ?>
</body>

</html>