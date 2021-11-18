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
    </div>
  </div>
</div>

<?= $this->endSection(); ?>
