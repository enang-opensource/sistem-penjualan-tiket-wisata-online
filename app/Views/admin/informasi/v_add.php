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

      <h4 class="card-title">Tambah Data Informasi</h4>
      <p class="card-description">
        Silakan mengisikan form dibawah ini dengan lengkap untuk menambahkan data.
      </p>
      <form class="forms-sample" action="<?= base_url('admin/informasi/insert'); ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="exampleInputName1">Judul Informasi Budaya</label>
          <input type="text" class="form-control" name="n_budaya" placeholder="Nama Wisata" required>
        </div>
        <div class="form-group">
          <label for="exampleTextarea1">Kontent Informasi Budaya</label>
          <textarea class="form-control" rows="15" placeholder="Kontent Budaya" name="c_budaya" required></textarea>
        </div>
        <div class="form-group">
          <label>File upload</label>
          <input type="file" name="img[]" class="file-upload-default">
          <div class="input-group col-xs-12">
            <input type="file" class="form-control file-upload-info" name="image" placeholder="Upload Image">
          </div>
        </div>
        <button type="submit" class="btn btn-primary mr-2">Submit</button>
        <button class="btn btn-light">Cancel</button>
      </form>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>
