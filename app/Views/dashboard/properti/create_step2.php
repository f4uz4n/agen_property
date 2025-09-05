<div class="card-body">
  <div class="row mb-3">
    <div class="col">
      <h3 class="card-title fw-bold m-0">Detail Properti</h3>
      <p class="card-text text-muted">Berikan spesifikasi lengkap properti.</p>
    </div>
    <div class="col text-end">
      <small class="text-muted">Langkah 2 dari 4</small>
    </div>
  </div>

  <div class="row">
    <div class="col-12 col-md-4">
      <div class="form-group">
        <label for="bedrooms">Kamar Tidur</label>
        <input type="number" id="bedrooms" name="bedrooms" class="form-control" value="<?= old('bedrooms', 1) ?>">
      </div>
    </div>
    <div class="col-12 col-md-4">
      <div class="form-group">
        <label for="bathrooms">Kamar Mandi</label>
        <input type="number" id="bathrooms" name="bathrooms" class="form-control" value="<?= old('bathrooms', 1) ?>">
      </div>
    </div>
    <div class="col-12 col-md-4">
      <div class="form-group">
        <label for="carport">Carport/Garasi</label>
        <input type="number" id="carport" name="carport" class="form-control" value="<?= old('carport', 1) ?>">
      </div>
    </div>
    <div class="col-12 col-md-4">
      <div class="form-group">
        <label for="building_area">Luas Bangunan (m<sup>2</sup>)</label>
        <input type="number" id="building_area" name="building_area" class="form-control"
          value="<?= old('building_area') ?>">
      </div>
    </div>
    <div class="col-12 col-md-4">
      <div class="form-group">
        <label for="land_area">Luas Tanah (m<sup>2</sup>)</label>
        <input type="number" id="land_area" name="land_area" class="form-control" value="<?= old('land_area') ?>">
      </div>
    </div>
    <div class="col-12 col-md-4">
      <div class="form-group">
        <label for="floors">Jumlah Lantai</label>
        <input type="number" id="floors" name="floors" class="form-control" value="<?= old('floors', 1) ?>">
      </div>
    </div>
  </div>
</div>