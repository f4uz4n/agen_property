<div class="row align-items-center justify-content-between mb-5">
  <div class="col">
    <h3><?= $title ?></h3>
    <p class="text-muted"><?= $subtitle ?></p>
  </div>
</div>

<button class="btn btn-info btn-sm btn-validasi" data-bs-toggle="modal" data-bs-target="#myModal"
  data-id="<?= $row['id'] ?>">
  <i class="fas fa-check"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="min-width: 70%;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Validasi Transaksi</h5>
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

<?= $this->section('js') ?>
<script>
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

</script>
<?= $this->endSection() ?>