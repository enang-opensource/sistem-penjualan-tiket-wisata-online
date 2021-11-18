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
                Nama Pemesan
              </th>
              <th>
                Nama Tiket
              </th>
              <th>
                Jumlah Beli
              </th>
              <th>
                Total Harga
              </th>
              <th>
                Bank
              </th>
              <th>
                Nomor Order
              </th>
              <th>
                Status
              </th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($transaksis as $value): ?>
              <tr>
                <td><?= $value['fname']; ?> <?= $value['lname']; ?></td>
                <td><?= $value['wisata_name']; ?></td>
                <td><?= $value['jumlah_beli']; ?></td>
                <td>Rp. <?= number_format($value['total_harga']); ?></td>
                <td><?=  uppercase($value['bank']); ?></td>
                <td><?=  uppercase($value['no_order']); ?></td>
                <?php if ($value['status']=='1'){ ?>
                  <td><span class="badge badge-success">DIBAYAR</span></td>
                <?php } if ($value['status']=='0'){ ?>
                  <td><span class="badge badge-secondary">PENDING</span></td>
                <?php } else{ ?>
                  <td><span class="badge badge-danger">BATAL</span></td>
                <?php } ?>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>
