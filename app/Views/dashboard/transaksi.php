<div class="row align-items-center justify-content-between mb-5">
  <div class="col">
    <h3><?= $title ?></h3>
    <p class="text-muted"><?= $subtitle ?></p>
  </div>
</div>

<button class="btn btn-info btn-sm btn-validasi" data-bs-toggle="modal" data-bs-target="#myModal" data-id="">
  <i class="fas fa-check"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="validasiModal" tabindex="-1" aria-labelledby="validasiModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="min-width: 70%;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="validasiModalLabel">Validasi Transaksi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="post" id="validateForm">
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table table-striped table-hover">
              <tbody id="tbody-validasi"></tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Validasi</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?= $this->include('dashboard/properti/modal_sell') ?>

<?= $this->section('js') ?>
<script>
  let data = {};

  let status = $('#status').find('option:selected').val();
  let agen = $('#agen').find('option:selected').val();
  let kategori = $('#kategori').find('option:selected').val();
  getData(kategori, status, agen);

  $(document).on('click', '#btn-cari', function () {
    status = $('#status').find('option:selected').val();
    agen = $('#agen').find('option:selected').val();
    kategori = $('#kategori').find('option:selected').val();
    getData(kategori, status, agen);
  })

  $(document).on('click', '.btn-validasi', function () {
    let id = $(this).data('id');
    let res = data.find(e => e.id == id);
    $('#myModalLabel').html(`Validasi Transaksi ${res.kategori}`);
    $('#validateForm').attr('action', `<?= base_url('dashboard/properti/validation/') ?>${id}`);
    let isiTable = {
      'Judul Iklan': res.title,
      'Harga Asli': res.price,
      'Harga Terjual': res.jual,
      'Agen': res.agen,
      'Pembeli': res.buyer,
      'Whatsapp Pembeli': res.wa_buyer,
      'Tanggal Pembelian': res.tanggal_penjualan,
      'Tanggal Serah Terima Kunci': res.tanggal_serah_terima,
    };
    let html = '';
    $.each(isiTable, function (key, value) {
      html += `
        <tr>
          <td>${key}</td>
          <td>:</td>
          <td>${value}</td>
        </tr>
      `
    })
    html += `
        <tr>
          <td>Catatan</td>
          <td>:</td>
          <td>
            <input type="hidden" name="validation" value="${id}">
            <textarea class="form-control" name="note" rows="3" placeholder="Catatan untuk transaksi ini..."></textarea>
          </td>
        </tr>
      `;
    $('#tbody-validasi').html(html);
    $('#myModal').modal('show');
  })
  
  function getData(kategori, status, agen) {
    $.ajax({
      url: '<?= base_url('dashboard/properti/get_ajax') ?>',
      type: 'POST',
      data: {
        kategori: kategori,
        status: status,
        agen: agen,
      },
      success: function (res) {
        // console.log(res);
        data = res;
        generateTable(res);
      },
      error: function (err) {
        console.error(err);
      }
    });
  }

  let role = '<?= session('role') ?>';
  function generateTable(res) {
    let html = `
    <table class="table table-hover table-striped" id="basic-table">
        <thead>
          <tr>
            <th class="text-center">No</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Provinsi</th>
            <th>Kota</th>
            <th>Status</th>
            <th>Publikasi</th>
            ${role != 'agen' ? '<th>Favorit</th>' : ''}
            <th class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>`;

    let no = 1;
    $.each(res, function (key, row) {
      html += `<tr>
      <td class="text-center">${no++}</td>
      <td>${row.title}</td>
      <td>${row.kategori}</td>
      <td>${shortNumber(row.price)}</td>
      <td>${row.province}</td>
      <td>${row.city}</td>
      <td class="text-capitalize">${row.status}</td>
      <td>
        <span class="badge badge-${row.publish == 1 ? 'success' : 'danger'}">
          ${row.publish == 1 ? 'Publikasi' : 'Draft'}</span>
      </td>`;
      if (role != 'agen') {
        html += `<td>
          <i class="${row.favorite == 1 ? 'fa-solid' : 'fa-regular'} fa-star text-warning"></i>
        </td>`;
      }

      html += `<td class="d-flex text-center gap-1">
        <a href="<?= base_url('dashboard/properti/') ?>${row.id}" class="btn btn-light btn-sm">
          <i class="fas fa-edit"></i>
        </a>`;

      if (role != 'agen') {
        html += `<button button class="btn btn-${row.publish == 0 ? 'success' : 'danger'} btn-sm btn-disable"
          data-id="${row.id}" data-value="${row.publish}" ><i class="fas fa-eye${row.publish == 0 ? '' : '-slash'}"></i>
          </button>`;
        // } else {
        html += `<button button class="btn btn-info btn-sm btn-modal" data-bs-toggle="modal" data-bs-target="#myModal"
          data-id="${row.id}" ><i class="fas fa-dollar"></i>
          </button>`
      }
      html += `</td></tr>`;
    });

    html += `</tbody ></table >`;

    $('#fetch-data').html(html);
    tableInit('#basic-table');
  }
</script>
<?= $this->endSection() ?>