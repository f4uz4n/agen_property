</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="<?= base_url('public/vendors/js/vendor.bundle.base.js') ?>"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="<?= base_url('public/vendors/chart.js/Chart.min.js') ?>"></script>
<script src="<?= base_url('public/vendors/datatables/js/datatables.min.js') ?>"></script>
<!-- <script src="<?= base_url('public/js/dataTables.select.min.js') ?>"></script> -->

<script src="<?= base_url('public/vendors/select2/select2.min.js') ?>"></script>
<script src="<?= base_url('public/vendors/sweetalert2/sweetalert2.all.min.js') ?>"></script>
<script src="<?= base_url('public/vendors/jquery-steps/jquery.steps.min.js') ?>"></script>

<script src="<?= base_url('public/vendors/dropify/js/dropify.min.js') ?>"></script>

<!-- <script src="<?= base_url('public/vendors/datetimepicker/bootstrap-material-datetimepicker.js') ?>"></script>
<script src="<?= base_url('public/vendors/datetimepicker/moment-with-locales.min.js') ?>"></script> -->
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="<?= base_url('public/js/off-canvas.js') ?>"></script>
<script src="<?= base_url('public/js/template.js') ?>"></script>
<!-- <script src="<?= base_url('public/js/settings.js') ?>"></script>
<script src="<?= base_url('public/js/todolist.js') ?>"></script> -->
<!-- endinject -->
<!-- Custom js for this page-->
<script src="<?= base_url('public/js/jquery.cookie.js') ?>" type="text/javascript"></script>
<script src="<?= base_url('public/js/dashboard.js') ?>"></script>
<!-- <script src="public/js/Chart.roundedBarCharts.js"></script> -->
<script src="<?= base_url('public/js/custom.js') ?>"></script>
<!-- End custom js for this page-->
<script>
  $(document).ready(function () {
    $('.multi-select').css('width', '100%').select2()
    $('.modal-select').select2({
      width: '100%',
      dropdownParent: $('#myModal'),
    });

    $('.dropify').dropify();

    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
  })

  <?php if (session()->has('title')): ?>
    Swal.fire({
      title: "<?= session('title') ?>",
      icon: "<?= session('icon') ?>",
      text: "<?= session('text') ?>"
    }).then(() => {
      <?php if (session('icon') === 'error' && session()->has('open_modal')): ?>
        // var modalId = "<?= session('open_modal') ?>";
        // $('#' + modalId).modal('show');
      <?php endif ?>
    });
  <?php endif ?>

  // ~inisiasi datetimepicker
  // $('.datetimepicker').DateTimePicker({
  //   time: false,
  //   lang: 'id',
  //   format: 'yyyy-MM-DD'
  // });

  // ~file upload
  $(document).on("click", ".file-upload-browse", function () {
    const file = $(this).parent().parent().parent().find(".file-upload-default");
    file.trigger("click");
  });
  $(document).on("change", ".file-upload-default", function () {
    const fileName = $(this)
      .val()
      .replace(/C:\\fakepath\\/i, "");
    $(this).closest(".form-group").find(".file-upload-info").val(fileName);
  });

  $(document).on('show.tab', 'a[data-toggle="tab"]', function (e) {
    localStorage.setItem('activeTab', $(e.target).attr('href'));
  });

  $(document).on('click', '.toggleReadMore', function (e) {
    e.preventDefault();
    let shortText = $(this).siblings('.str-limit');
    let fullText = $(this).siblings('.str-full');

    let expanded = shortText.hasClass('d-none');
    if (expanded) {
      fullText.addClass('d-none');
      fullText.removeClass('d-block');
      shortText.removeClass('d-none');
      $(this).removeClass('badge-secondary');
      $(this).addClass('badge-primary');
      $(this).text('Read more');
    } else {
      shortText.addClass('d-none');
      fullText.removeClass('d-none');
      fullText.addClass('d-block');
      $(this).removeClass('badge-primary');
      $(this).addClass('badge-secondary');
      $(this).text('Read less');
    }
  });

  // ~format angka
  $(document).on('keyup', '.currency', function () {
    let value = $(this).val().replace(/[^0-9]/g, '');
    console.log(value);

    $(this).val(value ? parseInt(value).toLocaleString('id-ID') : '');
  });

</script>

<?= $this->renderSection('js') ?>

</body>

</html>