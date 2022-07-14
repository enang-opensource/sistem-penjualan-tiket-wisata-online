<?= $this->extend('\App\Views\admin\v_master'); ?>

<?= $this->section('content');  ?>
<div class="col-12 grid-margin stretch-card">
  <a href="<?= base_url('admin/tiket/list'); ?>" class="btn btn-info">Lihat Daftar Tiket</a>
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

      <?php if (isset($id_tiket)): ?>
        <h4 class="card-title">Ubah Data Tiket</h4>
        <p class="card-description">
          Silakan mengisikan form dibawah ini dengan sesuai data yang ingin diubah datanya.
        </p>
        <form class="forms-sample" action="<?= base_url('admin/tiket/update_proses'); ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputName1">Tiket Wisata</label>
            <select class="form-control" name="id_wisata">
              <?php foreach ($wisatas as $value): ?>
                <option value="<?= $value['id_wisata']; ?>"><?= $value['wisata_name']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <input type="hidden" name="id_tiket" value="<?= $id_tiket; ?>">
          <div class="form-group">
            <label for="exampleTextarea1">Tanggal Jual</label>
            <input type="date" class="form-control" name="t_jual" min="<?= date('Y-m-d'); ?>" value="<?= date("Y-m-d", strtotime($tiket['tanggal_buka'])); ?>" placeholder="Nama Wisata" required>
          </div>
          <div class="form-group">
            <label for="exampleTextarea1">Jumlah Jual</label>
            <input type="number" class="form-control" name="j_jual" min="1" placeholder="Jumlah tiket jual" value="<?= $tiket['jumlah_tiket'] ?>" required>
          </div>
          <div class="form-group">
            <label for="exampleTextarea1">Harga Tiket (Rp)</label>
            <input type="number" class="form-control" name="h_jual" min="1" placeholder="Harga tiket jual" value="<?= $tiket['harga_tiket'] ?>" required>
          </div>
          <div class="form-group">
            <label for="exampleTextarea1">Keterangan</label>
            <textarea class="form-control" rows="4" placeholder="Keterangan" name="keterangan" value="<?= $tiket['keterangan'] ?>" required><?= $tiket['keterangan'] ?></textarea>
          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <button class="btn btn-light">Cancel</button>
        </form>
      <?php else: ?>
        <h4 class="card-title">Tambah Data Tiket</h4>
        <p class="card-description">
          Silakan mengisikan form dibawah ini dengan lengkap untuk menambahkan data.
        </p>
        <form class="forms-sample" action="<?= base_url('admin/tiket/insert'); ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputName1">Tiket Wisata</label>
            <select class="form-control" name="id_wisata">
              <?php foreach ($wisatas as $value): ?>
                <option value="<?= $value['id_wisata']; ?>"><?= $value['wisata_name']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleTextarea1">Tanggal Jual</label>
            <input type="date" class="form-control" name="t_jual" min="<?= date('Y-m-d'); ?>" placeholder="Nama Wisata" required>
          </div>
          <div class="form-group">
            <label for="exampleTextarea1">Jumlah Jual</label>
            <input type="number" class="form-control" name="j_jual" min="1" placeholder="Jumlah tiket jual" required>
          </div>
          <div class="form-group">
            <label for="exampleTextarea1">Harga Tiket (Rp)</label>
            <input type="number" class="form-control" name="h_jual" min="1" placeholder="Harga tiket jual" required>
          </div>
          <div class="form-group">
            <label for="exampleTextarea1">Keterangan</label>
            <textarea class="form-control" rows="4" placeholder="Keterangan" name="keterangan" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <button class="btn btn-light">Cancel</button>
        </form>
      <?php endif; ?>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>
