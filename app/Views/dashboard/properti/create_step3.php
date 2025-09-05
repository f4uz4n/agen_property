<div class="card-body">
  <div class="row mb-3">
    <div class="col">
      <h3 class="card-title fw-bold m-0">Fasilitas & Foto</h3>
      <p class="card-text text-muted">Pilih fasilitas yang tersedia dan unggah foto.</p>
    </div>
    <div class="col text-end">
      <small class="text-muted">Langkah 3 dari 4</small>
    </div>
  </div>

  <div class="row">
    <div class="col-12">
      <h6 class="m-0">Fasilitas</h6>
      <p class="text-muted">Pilih semua fasilitas yang berlaku.</p>
    </div>
    <?php foreach ($fasilitas as $item): ?>
      <div class="col-6 col-md-4">
        <div class="form-group m-0">
          <div class="form-check mt-0">
            <label class="form-check-label" for="<?= $item['name'] ?>">
              <input class="form-check-input" type="checkbox" name="fasilitas[]" id="<?= $item['name'] ?>"
                value="<?= $item['name'] ?>">
              <?= $item['name'] ?>
            </label>
          </div>
        </div>
      </div>
    <?php endforeach ?>
  </div>
  <hr>

  <div class="row mb-3">
    <div class="col-12">
      <h6 class="m-0">Foto Properti</h6>
      <p class="text-muted">Unggah foto-foto properti Anda. Foto pertama akan ditampilkan sebagai banner iklan. Kami sarankan unggah foto yang jelas dan menarik untuk menarik minat calon pembeli.</p>
    </div>
  </div>
  <div class="row" id="upload-container">
    <div class="col-3">
      <div class="form-group">
        <input type="file" class="dropify-step" name="images[]" data-allowed-file-extensions="jpg jpeg png"
          data-max-file-size="3M">
      </div>
    </div>
  </div>
</div>