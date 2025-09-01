<div class="row align-items-center justify-content-between mb-5">
  <div class="col">
    <h3>Kelola User</h3>
  </div>
  <div class="col text-end">
    <button class="btn btn-primary btn-modal" data-bs-toggle="modal" data-bs-target="#userModal">
      <i class="fas fa-plus"></i> Tambah User
    </button>
  </div>
</div>

<div class="card">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-hover table-striped" id="basic-table">
        <thead>
          <tr>
            <th class="text-center">No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Whatsapp</th>
            <th>Role</th>
            <th>Status</th>
            <th class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1 ?>
          <?php foreach ($data as $row): ?>
            <tr>
              <td class="text-center"><?= $no++ ?></td>
              <td><?= $row['name'] ?></td>
              <td><?= $row['email'] ?></td>
              <td><?= $row['phone'] ?></td>
              <td><?= ucfirst($row['role']) ?></td>
              <td>
                <span class="badge badge-<?= $row['status'] == 'aktif' ? 'success' : 'danger' ?>">
                  <?= ucfirst($row['status']) ?></span>
              </td>
              <td class="text-center">
                <button class="btn btn-light btn-sm btn-modal" data-bs-toggle="modal" data-bs-target="#userModal"
                  data-id="<?= $row['id'] ?>">
                  <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-danger btn-sm btn-disable" data-id="<?= $row['id'] ?>"
                  data-name="<?= $row['name'] ?>">
                  <i class="fas fa-eye-slash"></i>
                </button>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-semibold" id="userModalLabel">Tambah User Baru</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" id="userForm">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="name">Nama Lengkap <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="name" name="name" required>
                <div class="invalid-feedback" id="nameError"></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="email">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control" id="email" name="email" required>
                <div class="invalid-feedback" id="emailError"></div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="password">Password <span class="text-danger password-required">*</span></label>
                <input type="password" class="form-control" id="password" name="password">
                <small class="form-text text-muted password-hint">Minimal 8 karakter</small>
                <div class="invalid-feedback" id="passwordError"></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="phone">Telepon <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="628xxxx">
                <div class="invalid-feedback" id="phoneError"></div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="role">Role <span class="text-danger">*</span></label>
                <select class="form-control" id="role" name="role" required>
                  <option value="agen">Agen</option>
                  <option value="admin">Admin</option>
                </select>
                <div class="invalid-feedback" id="roleError"></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="status">Status <span class="text-danger">*</span></label>
                <select class="form-control" id="status" name="status" required>
                  <option value="aktif">Aktif</option>
                  <option value="nonaktif">Nonaktif</option>
                </select>
                <div class="invalid-feedback" id="statusError"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-inverse-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary" id="submitBtn">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?= $this->section('js') ?>
<script>
  const title = '<?= $title ?>';
  let data = <?= json_encode($data) ?>;

  tableInit('#basic-table');

  $(document).on('click', '.btn-disable', function () {
    const id = $(this).data('id');
    const name = $(this).data('name');
    Swal.fire({
      title: 'Non Aktifkan User',
      text: 'Apakah Anda yakin ingin menonaktifkan ' + name + ' ?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Ya, Nonaktifkan',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: '<?= base_url('dashboard/user/disabled/') ?>' + id,
          type: 'POST',
          data: {},
          success: function (res) {
            console.log(res);
            Swal.fire({
              title: res.title,
              text: res.text,
              icon: res.icon,
            });
            location.reload();
          },
          error: function (xhr, status, error) {
            console.error(error);
          }
        });
      }
    });
  })

  handleModalClick({
    selector: '.btn-modal',
    modalTitle: '<?= $title ?>',
    formActionUrl: id => '<?= base_url('dashboard/user/') ?>' + (id ? 'update/' + id : 'store'),
    findData: id => data.find(item => item.id == id),
    defaultValues: {
    },
    fieldMap: {
      inputs: [{
        name: 'name',
      }, {
        name: 'email',
      }, {
        name: 'phone',
      },],
      selects: [{
        name: 'role',
      }, {
        name: 'status',
      },],
    }
  });

  // Handle form submission
  $('#userForm').on('submit', function (e) {
    e.preventDefault();
    submitForm();
  });

  // Handle edit button click
  $(document).on('click', '.edit-user', function () {
    const id = $(this).data('id');
    const name = $(this).data('name');
    const email = $(this).data('email');
    const phone = $(this).data('phone');
    const role = $(this).data('role');
    const status = $(this).data('status');

    $('#userModalLabel').text('Edit User');
    $('#userId').val(id);
    $('#name').val(name);
    $('#email').val(email);
    $('#phone').val(phone);
    $('#role').val(role);
    $('#status').val(status);
    $('#password').val('').removeAttr('required');
    $('.password-required').text('');
    $('.password-hint').text('Kosongkan jika tidak ingin mengubah password');

    isEditMode = true;
    $('#userModal').modal('show');
  });

  // Handle delete button click
  $(document).on('click', '.delete-user', function () {
    const id = $(this).data('id');
    const name = $(this).data('name');

    Swal.fire({
      title: 'Konfirmasi Hapus',
      text: `Apakah Anda yakin ingin menghapus user "${name}"?`,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Ya, Hapus!',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        deleteUser(id);
      }
    });
  });

  function resetForm() {
    $('#userForm')[0].reset();
    $('#userId').val('');
    $('#userModalLabel').text('Tambah User Baru');
    $('#password').attr('required', 'required');
    $('.password-required').text('*');
    $('.password-hint').text('Minimal 8 karakter');
    clearValidationErrors();
    isEditMode = false;
  }

  function clearValidationErrors() {
    $('.form-control').removeClass('is-invalid');
    $('.invalid-feedback').text('');
  }

  function submitForm() {
    clearValidationErrors();

    const formData = new FormData($('#userForm')[0]);
    const url = isEditMode ?
      `<?= base_url('dashboard/user/update') ?>/${$('#userId').val()}` :
      '<?= base_url('dashboard/user/create') ?>';

    $.ajax({
      url: url,
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        if (response.success) {
          Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: response.message,
            timer: 2000,
            showConfirmButton: false
          });

          $('#userModal').modal('hide');
          userTable.ajax.reload();
        } else {
          if (response.errors) {
            // Tampilkan error validasi
            Object.keys(response.errors).forEach(function (key) {
              $(`#${key}`).addClass('is-invalid');
              $(`#${key}Error`).text(response.errors[key]);
            });
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Gagal!',
              text: response.message
            });
          }
        }
      },
      error: function (xhr, status, error) {
        Swal.fire({
          icon: 'error',
          title: 'Error!',
          text: 'Terjadi kesalahan pada server'
        });
      }
    });
  }

  function deleteUser(id) {
    $.ajax({
      url: `<?= base_url('dashboard/user/delete') ?>/${id}`,
      type: 'POST',
      success: function (response) {
        if (response.success) {
          Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: response.message,
            timer: 2000,
            showConfirmButton: false
          });
          userTable.ajax.reload();
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: response.message
          });
        }
      },
      error: function (xhr, status, error) {
        Swal.fire({
          icon: 'error',
          title: 'Error!',
          text: 'Terjadi kesalahan pada server'
        });
      }
    });
  }
</script>
<?= $this->endSection() ?>