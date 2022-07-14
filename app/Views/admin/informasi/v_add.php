<?= $this->extend('\App\Views\admin\v_master'); ?>

<?= $this->section('content');  ?>

<div class="col-12 grid-margin stretch-card">
  <a href="<?= base_url('admin/informasi/list'); ?>" class="btn btn-info">Lihat Daftar Informasi</a>
</div>

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

      <?php if (isset($id_informasi)): ?>
        <h4 class="card-title">Ubah Data Informasi</h4>
        <p class="card-description">
          Silakan mengisikan form dibawah ini dengan lengkap untuk menambahkan data.
        </p>
        <form class="forms-sample" action="<?= base_url('admin/informasi/update_proses'); ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputName1">Judul Informasi Budaya</label>
            <input type="text" class="form-control" name="n_budaya" placeholder="Nama Wisata" value="<?= $informasi['judul_informasi'] ?>" required>
          </div>
          <input type="hidden" name="id_informasi" value="<?= $id_informasi; ?>">
          <div class="form-group">
            <label for="exampleTextarea1">Kontent Informasi Budaya</label>
            <textarea class="form-control" rows="15" placeholder="Kontent Budaya" name="c_budaya" value="<?= $informasi['kontent_informasi'] ?>" required><?= $informasi['kontent_informasi'] ?></textarea>
          </div>
          <div class="form-group">
            <img src="<?= base_url($informasi['gambar_informasi']); ?>" width="250" alt="">
            <br>
            <br>
            <label>File upload</label>
            <div class="input-group col-xs-12">
              <input type="file" class="form-control file-upload-info" name="image" placeholder="Upload Image">
            </div>
          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <button class="btn btn-light">Cancel</button>
        </form>
      <?php else: ?>
        <h4 class="card-title">Tambah Data Informasi</h4>
        <p class="card-description">
          Silakan mengisikan form dibawah ini sesuai dengan yang ingin diubah untuk mengubah data.
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
      <?php endif; ?>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>
