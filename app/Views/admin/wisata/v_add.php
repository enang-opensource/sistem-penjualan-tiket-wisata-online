<?= $this->extend('\App\Views\admin\v_master'); ?>

<?= $this->section('content');  ?>

<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <?php if (!empty(session()->getFlashdata('error'))) : ?>
        <div class="alert alert-danger" role="alert">
          <?= session()->getFlashdata('error'); ?>
        </div>
      <?php endif; ?>

      <?php if (!empty(session()->getFlashdata('msg'))) : ?>
        <div class="alert alert-success" role="alert">
          <?= session()->getFlashdata('msg'); ?>
        </div>
      <?php endif; ?>

      <h4 class="card-title">Tambah Data Wisata</h4>
      <p class="card-description">
        Silakan mengisikan form dibawah ini dengan lengkap untuk menambahkan data.
      </p>
      <form class="forms-sample" action="<?= base_url('admin/wisata/insert'); ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="exampleInputName1">Nama Wisata</label>
          <input type="text" class="form-control" name="n_wisata" placeholder="Nama Wisata" required>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail3">Lokasi Desa</label>
          <select class="form-control" name="id_desa">
            <?php foreach ($desas as $value): ?>
              <option value="<?= $value['id_desa']; ?>"><?= $value['desa_name']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword4">Longtitude</label>
          <input type="text" class="form-control" placeholder="Longtitude" name="long" required>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword4">Latitude</label>
          <input type="text" class="form-control" placeholder="Latitude" name="lat" required>
        </div>
        <div class="form-group">
          <label for="exampleTextarea1">Alamat Wisata</label>
          <textarea class="form-control" rows="4" placeholder="Alamat Wisata" name="alamat" required></textarea>
        </div>
        <div class="form-group">
          <label for="exampleTextarea1">Keterangan</label>
          <textarea class="form-control" rows="4" placeholder="Keterangan" name="keterangan" required></textarea>
        </div>
        <div class="form-group">
          <label>File upload</label>
          <input type="file" name="img[]" class="file-upload-default">
          <div class="input-group col-xs-12">
            <input type="file" class="form-control file-upload-info" name="image[]" placeholder="Upload Image" multiple>
          </div>
        </div>
        <button type="submit" class="btn btn-primary mr-2">Submit</button>
        <button class="btn btn-light">Cancel</button>
      </form>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>
