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
                Nama Pengguna
              </th>
              <th>
                Email
              </th>
              <th>
                Telephone
              </th>
              <th>
                Status
              </th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($users as $value): ?>
              <tr>
                <td><?= $value['fname']; ?> <?= $value['lname']; ?></td>
                <td><?= $value['email']; ?></td>
                <td><?= $value['telephone']; ?></td>
                <?php if ($value['status']==1): ?>
                  <td><span class="badge badge-success">Costumer</span></td>
                <?php else: ?>
                  <td><span class="badge badge-danger">Admin</span></td>
                <?php endif; ?>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>
