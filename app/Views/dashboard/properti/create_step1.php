<div class="card-body">
  <div class="row mb-3">
    <div class="col">
      <h3 class="card-title fw-bold m-0">Informasi Dasar</h3>
      <p class="card-text text-muted">Masukkan detail utama properti Anda.</p>
    </div>
    <div class="col text-end">
      <small class="text-muted">Langkah 1 dari 4</small>
    </div>
  </div>

  <div class="row">
    <div class="col-12">
      <div class="form-group">
        <label for="title">Judul Iklan Properti <span class="text-danger">*</span></label>
        <input type="text" id="title" name="title"
          class="form-control <?= ($validation?->hasError('title')) ? 'is-invalid' : '' ?>" value="<?= old('title') ?>"
          placeholder="Contoh: Rumah Mewah 2 Lantai di Jakarta Utara" required>
        <div class="invalid-feedback">
          <?= $validation?->getError('title') ?>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-4">
      <div class="form-group">
        <label for="price">Harga <span class="text-danger">*</span></label>
        <input type="text" id="price" name="price"
          class="form-control currency <?= ($validation?->hasError('price')) ? 'is-invalid' : '' ?>"
          value="<?= old('price') ?>" placeholder="2.000.000.000" required>
        <div class="invalid-feedback">
          <?= $validation?->getError('price') ?>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-4">
      <div class="form-group">
        <label for="type">Tipe Properti</label>
        <input type="hidden" name="tipe" value="<?= reset($kategoris)['name'] ?? '' ?>">
        <select class="form-select steps-select" name="type" id="type">
          <?php foreach ($kategoris as $k): ?>
            <option value="<?= $k['id'] ?>" <?= (old('type') == $k['id']) ? 'selected' : '' ?>><?= $k['name'] ?>
            </option>
          <?php endforeach ?>
        </select>
        <div class="invalid-feedback">
          <?= $validation?->getError('type') ?>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-4">
      <div class="form-group">
        <label for="status">Status</label>
        <select class="form-select steps-select" name="status" id="status">
          <option value="dijual" <?= (old('status') == 'dijual') ? 'selected' : '' ?>>Dijual</option>
          <option value="disewakan" <?= (old('status') == 'disewakan') ? 'selected' : '' ?>>Disewakan</option>
        </select>
        <div class="invalid-feedback">
          <?= $validation?->getError('status') ?>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-6">
      <div class="form-group">
        <label for="provinsi">Provinsi</label>
        <input type="hidden" name="province" id="province">
        <select class="form-select steps-select" name="provinsi" id="provinsi">
          <option value="">--Pilih Provinsi--</option>
          <?php foreach ($provinsi as $p): ?>
            <option value="<?= $p['kode'] ?>" <?= (old('provinsi') == $p['kode']) ? 'selected' : '' ?>>
              <?= $p['name'] ?>
            </option>
          <?php endforeach ?>
        </select>
        <div class="invalid-feedback">
          <?= $validation?->getError('provinsi') ?>
        </div>
      </div>

    </div>
    <div class="col-12 col-md-6">
      <div class="form-group">
        <label for="city">Kabupaten/Kota</label>
        <select class="form-select steps-select" name="city" id="city">
          <option value="">--Pilih Kabupaten/Kota--</option>
        </select>
        <div class="invalid-feedback">
          <?= $validation?->getError('city') ?>
        </div>
      </div>

    </div>
    <div class="col-12 col-md-6">
      <div class="form-group">
        <label for="address">Alamat</label>
        <input type="text" id="address" name="address"
          class="form-control <?= ($validation?->hasError('address')) ? 'is-invalid' : '' ?>" required
          value="<?= old('address') ?>" placeholder="Jl. Jend. Sudirman No. 20, Jakarta Selatan">
        <div class="invalid-feedback">
          <?= $validation?->getError('address') ?>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-6">
      <div class="form-group">
        <label for="certificate">Sertifikat</label>
        <select class="form-select" name="certificate" id="certificate">
          <option value="">-- Pilih Sertifikat --</option>
          <option value="SHM" <?= (old('certificate') == 'SHM') ? 'selected' : '' ?>>SHM (Sertifikat Hak Milik)
          </option>
          <option value="HGB" <?= (old('certificate') == 'HGB') ? 'selected' : '' ?>>HGB (Hak Guna Bangunan)</option>
          <option value="HGU" <?= (old('certificate') == 'HGU') ? 'selected' : '' ?>>HGU (Hak Guna Usaha)</option>
          <option value="AJB" <?= (old('certificate') == 'AJB') ? 'selected' : '' ?>>AJB (Akta Jual Beli)</option>
          <option value="Surat Keterangan" <?= (old('certificate') == 'Surat Keterangan') ? 'selected' : '' ?>>Surat
            Keterangan</option>
          <option value="SHGB" <?= (old('certificate') == 'SHGB') ? 'selected' : '' ?>>SHGB (Sertifikat Hak Guna
            Bangunan)</option>
          <option value="SHSRS" <?= (old('certificate') == 'SHSRS') ? 'selected' : '' ?>>SHSRS (Sertifikat Hak Satuan
            Rumah Susun)</option>
          <option value="HP" <?= (old('certificate') == 'HP') ? 'selected' : '' ?>>HP (Hak Pakai)</option>
          <option value="Girik" <?= (old('certificate') == 'Girik') ? 'selected' : '' ?>>Girik / Letter C</option>
          <option value="Lainnya" <?= (old('certificate') == 'Lainnya') ? 'selected' : '' ?>>Lainnya</option>
        </select>
        <div class="invalid-feedback">
          <?= $validation?->getError('certificate') ?>
        </div>
      </div>
    </div>
  </div>
</div>