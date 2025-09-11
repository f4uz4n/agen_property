<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="property_id">Properti</label>
                <select class="form-select modal-select" name="property_id" id="property_id">
                  <option value="">Pilih Properti</option>
                  <?php foreach ($data as $property): ?>
                    <option value="<?= $property['id'] ?>"><?= $property['title'] ?></option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="table-responsive" id="property-details"></div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?= $this->section('js') ?>
<script>
  let agens = <?= json_encode($agens) ?>;

  handleModalClick({
    selector: '.btn-modal',
    modalTitle: 'Transaksi',
    formActionUrl: id => '<?= base_url('transaksi/') ?>' + (id ? 'update/' : 'store'),
    findData: id => data.find(item => item.id == id),
    defaultValues: {
      property_id: '',
    },
    fieldMap: {
      inputs: [{
      },],
      selects: [{
        name: 'property_id',
        valueKey: 'id',
      },],
    }
  });

  $(document).on('change', '#property_id', function (e) {
    e.preventDefault();
    let id = $(this).find('option:selected').val();
    let res = data.find(e => e.id == id);
    let html = `
      <table class="table table-bordered">
        <tr>
          <th class="fit-column">Iklan Properti</th>
          <td>${res.title}</td>
        </tr>
        <tr>
          <th>Kategori</th>
          <td>${res.kategori}</td>
        </tr>
        <tr>
          <th>Harga</th>
          <td>${shortNumber(res.price)}</td>
        </tr>
        <tr>
          <th>Provinsi</th>
          <td>${res.province}</td>
        </tr>
        <tr>
          <th>Kota</th>
          <td>${res.city}</td>
        </tr>
        <tr>
          <th>Status</th>
          <td class="text-capitalize">${res.status}</td>
        </tr>
        <tr>
          <th>Agen</th>
          <td>
            <select class="form-select modal-select" id="agen" name="agen">`;

    if (role == 'agen') {
      html += `<option value="<?= session('id') ?>"><?= session('name') ?></option>`;
    } else {
      $.each(agens, function (i, agen) {
        html += `<option value="${agen.id}">${agen.name}</option>`;
      })
    }

    html += `</select>
          </td>
        </tr>
        <tr>
          <th>Pembeli</th>
          <td><input type="text" name="buyer" class="form-control" required></td>
        </tr>
        <tr>
          <th>Whatsapp Pembeli</th>
          <td><input type="text" name="wa_buyer" class="form-control" required></td>
        </tr>
        <tr>
          <th>Harga</th>
          <td><input type="text" name="price" class="form-control currency" required></td>
        </tr>
        <input type="hidden" name="status" value="${res.status}">
        <tr>
          <th>Tanggal Pembelian</th>
          <td><input type="date" name="tanggal_penjualan" class="form-control" required></td>
        </tr>
        <tr>
          <th>Tanggal Serah Terima</th>
          <td><input type="date" name="tanggal_serah_terima" class="form-control" required></td>
        </tr>
      </table>
    `;
    $('#property-details').html(html);
  });
</script>
<?= $this->endSection() ?>