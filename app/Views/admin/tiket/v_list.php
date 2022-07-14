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
                Tanggal Jual
              </th>
              <th>
                Jumlah Jual
              </th>
              <th>
                Harga Jual
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
            <?php foreach ($tikets as $value): ?>
              <tr>
                <td><?= $value['wisata_name']; ?></td>
                <td><?= date("d F Y", strtotime($value['tanggal_buka'])); ?></td>
                <td><?= $value['jumlah_tiket']; ?></td>
                <td>Rp. <?= number_format($value['harga_tiket']); ?></td>
                <td class="text-justify"><?=  substr($value['keterangan'], 0, 200); ?>...</td>
                <td>
                  <a href="<?= base_url('admin/tiket/delete/'.$value['id_tiket']);  ?>" class="btn btn-danger">Hapus</a>
                  <a href="<?= base_url('admin/tiket/update/'.$value['id_tiket']); ?>" class="btn btn-info" style="margin-top:2px;">Ubah&nbsp;&nbsp;&nbsp;</a>
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
