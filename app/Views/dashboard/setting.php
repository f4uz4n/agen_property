<h3><?= $title ?></h3>
<p class="text-muted">Kelola informasi profil dan pengaturan keamanan Anda.</p>

<div class="card mt-5">
  <div class="card-body">
    <h4>Informasi Profil</h4>
    <p class="text-muted">Perbarui nama, email, dan nomor telepon Anda.</p>
    <form action="<?= base_url('dashboard/setting/update/' . $data['id']) ?>" method="post">
      <div class="row mt-3">
        <div class="col-md-6">
          <div class="mb-3">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= $data['name'] ?? '' ?>">
          </div>
        </div>
        <div class="col-md-6">
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $data['email'] ?? '' ?>">
          </div>
        </div>
        <div class="col-md-6">
          <div class="mb-3">
            <label for="whatsapp" class="form-label">Nomor Whatsapp</label>
            <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="<?= $data['phone'] ?? '' ?>">
            <small class="text-muted">Format: 628xxxxx</small>
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
  </div>
</div>

<div class="card mt-5">
  <div class="card-body">
    <h4>Kata Sandi</h4>
    <p class="text-muted">Ubah kata sandi Anda. Disarankan untuk menggunakan kata sandi yang kuat.</p>
    <form action="<?= base_url('dashboard/setting/password/' . $data['id']) ?>" method="post">
      <div class="row mt-3">
        <div class="col-md-12">
          <div class="mb-3">
            <label for="password_old" class="form-label">Kata Sandi Saat Ini</label>
            <input type="password" class="form-control" id="password_old" name="password_old" required>
          </div>
        </div>
        <div class="col-md-6">
          <div class="mb-3">
            <label for="password" class="form-label">Kata Sandi Baru</label>
            <input type="password" class="form-control" id="password" name="password" required>
            <small class="text-muted">Minimal 8 karakter</small>
          </div>
        </div>
        <div class="col-md-6">
          <div class="mb-3">
            <label for="password_confirm" class="form-label">Konfirmasi Kata Sandi Baru</label>
            <input type="password" class="form-control" id="password_confirm" name="password_confirm" required>
            <small id="password_confirmError"></small>
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Ubah Kata Sandi</button>
    </form>
  </div>
</div>

<?= $this->section('js') ?>
<script>
  $('#password_confirm').on('keyup', function () {
    if ($('#password').val() !== $('#password_confirm').val()) {
      $('#password_confirmError').removeClass('text-success');
      $('#password_confirmError').addClass('text-danger');
      $('#password_confirmError').text('Kata sandi tidak sama.');
    } else {
      $('#password_confirmError').removeClass('text-danger');
      $('#password_confirmError').addClass('text-success');
      $('#password_confirmError').text('Kata sandi sudah sesuai.');
    }
  })
</script>
<?= $this->endSection() ?>