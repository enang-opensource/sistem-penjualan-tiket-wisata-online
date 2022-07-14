<?= $this->extend('\App\Views\admin\v_master'); ?>

<?= $this->section('content');  ?>

<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Daftar List Wisata</h4>
      <p class="card-description">
        Daftar list wisata yang tersedia di website ini
      </p>
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>
                Nama Wisata
              </th>
              <th>
                Longtitude
              </th>
              <th>
                Latitude
              </th>
              <th>
                Alamat Wisata
              </th>
              <th>
                Keterangan
              </th>
              <th>
                Aksi
              </th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($wisatas as $value): ?>
              <tr>
                <td><?= $value['wisata_name']; ?></td>
                <td><?= $value['longtitude']; ?></td>
                <td><?= $value['lattitude']; ?></td>
                <td class="text-justify"><?= $value['alamat_wisata']; ?></td>
                <td class="text-justify"><?=  substr($value['keterangan'], 0, 200); ?>...</td>
                <td>
                  <a href="<?= base_url('admin/wisata/delete/'.$value['id_wisata']); ?>" class="btn btn-danger">Hapus</a>
                  <a href="<?= base_url('admin/wisata/update/'.$value['id_wisata']); ?>" class="btn btn-info" style="margin-top:2px;">Ubah&nbsp;&nbsp;&nbsp;</a>
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
