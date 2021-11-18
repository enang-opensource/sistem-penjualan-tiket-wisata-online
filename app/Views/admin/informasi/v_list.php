<?= $this->extend('\App\Views\admin\v_master'); ?>

<?= $this->section('content');  ?>

<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Daftar List Informasi Budaya</h4>
      <p class="card-description">
        Daftar list Budaya yang tersedia di website ini
      </p>
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>
                Gambar Informasi
              </th>
              <th>
                Judul Informasi
              </th>
              <th>
                Konten Informasi
              </th>
              <th>
                Aksi
              </th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($wisatas as $value): ?>
              <tr>
                <td>
                  <img src="<?= base_url($value['gambar_informasi']) ?>" alt="">
                </td>
                <td><?= $value['judul_informasi']; ?></td>
                <td class="text-justify"><?=  substr($value['kontent_informasi'], 0, 200); ?>...</td>
                <td>
                  <a href="#" class="btn btn-danger">Hapus</a>
                  <a href="#" class="btn btn-info" style="margin-top:2px;">Ubah&nbsp;&nbsp;&nbsp;</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>
