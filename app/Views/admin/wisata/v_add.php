<?= $this->extend('\App\Views\admin\v_master'); ?>

<?= $this->section('content');  ?>

<div class="col-12 grid-margin stretch-card">
  <a href="<?= base_url('admin/wisata/list'); ?>" class="btn btn-info">Lihat Daftar Wisata</a>
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

      <?php if (isset($id_wisata)): ?>
        <h4 class="card-title">Ubah Data Wisata</h4>
        <p class="card-description">
          Silakan mengisikan form dibawah ini sesuai dengan yang ingin diubah untuk mengubah data.
        </p>
        <form class="forms-sample" action="<?= base_url('admin/wisata/update_proses'); ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputName1">Nama Wisata</label>
            <input type="text" class="form-control" name="n_wisata" placeholder="Nama Wisata" value="<?= $wisata['wisata_name']; ?>" required>
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
            <input type="text" class="form-control" placeholder="Longtitude" name="long" value="<?= $wisata['longtitude']; ?>" required>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword4">Latitude</label>
            <input type="text" class="form-control" placeholder="Latitude" name="lat" value="<?= $wisata['lattitude']; ?>" required>
          </div>
          <div class="form-group">
            <label for="exampleTextarea1">Alamat Wisata</label>
            <textarea class="form-control" rows="4" placeholder="Alamat Wisata" name="alamat" value="<?= $wisata['alamat_wisata']; ?>" required><?= $wisata['alamat_wisata']; ?></textarea>
          </div>
          <div class="form-group">
            <label for="exampleTextarea1">Keterangan</label>
            <textarea class="form-control" rows="4" placeholder="Keterangan" name="keterangan" value="<?= $wisata['keterangan']; ?>" required><?= $wisata['keterangan']; ?></textarea>
          </div>
          <input type="hidden" name="id_wisata" value="<?= $id_wisata; ?>">
          <div class="form-group">
            <label>File upload</label>
            <div class="input-group col-xs-12">
              <input type="file" class="form-control file-upload-info" name="image[]" placeholder="Upload Image" multiple>
            </div>
          </div>
          <div class="row">
            <?php foreach ($image as $value): ?>
              <div class="col-sm-3">
                <img class="card-img-top" src="<?= base_url($value['path']); ?>" height="150">
                <a href="<?= base_url('admin/wisata/delete_img/'.$value['id_gambar']); ?>" class="btn btn-danger col-12">Hapus</a>
              </div>
            <?php endforeach; ?>

          </div>
          <br><br>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <button class="btn btn-light">Cancel</button>
        </form>
      <?php else: ?>
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
            <!-- <input type="file" name="img[]" class="file-upload-default"> -->
            <div class="input-group col-xs-12">
              <input type="file" class="form-control file-upload-info" name="image[]" placeholder="Upload Image" multiple>
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
