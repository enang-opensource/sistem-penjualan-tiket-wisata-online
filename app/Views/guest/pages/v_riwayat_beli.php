<?= $this->extend('\App\Views\guest\pages\template\layout'); ?>
<?= $this->section('content'); ?>


<section class="hero-wrap hero-wrap-2 js-fullheight"
style="background-image: url('<?= base_url(); ?>/guests/images/bg_1.jpg');">
<div class="overlay"></div>
<div class="container">
  <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
    <div class="col-md-9 ftco-animate pb-5 text-center">
      <p class="breadcrumbs">
        <span class="mr-2">
          <a href="<?= base_url(); ?>">Home
            <i class="fa fa-chevron-right"></i>
          </a>
        </span>
        <span>Riwayat Transaksi <i class="fa fa-chevron-right"></i></span>
      </p>
      <h1 class="mb-0 bread">Riwayat Transaksi</h1>
    </div>
  </div>
</div>
</section>

<section class="ftco-section services-section">
  <div class="container">
    <div class="row d-flex">
      <div class="col-md-12 order-md-last heading-section pl-md-5 ftco-animate d-flex align-items-center">
        <div class="w-100">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nomor Order</th>
                <th scope="col">Nama Pembelian</th>
                <th scope="col">Jumlah Beli</th>
                <th scope="col">Total Bayar</th>
                <th scope="col">Bank</th>
                <th scope="col">Nomor Virtual</th>
                <th scope="col">Tanggal Beli</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($transaksi as $value): ?>
                <tr>
                  <th scope="row">1</th>
                  <td><?= $value['no_order']; ?></td>
                  <td>Tiket <?= $value['wisata_name']; ?></td>
                  <td><?= $value['jumlah_beli']; ?> Tiket</td>
                  <td>Rp. <?= number_format($value['total_harga']); ?>;-</td>
                  <td><?= strtoupper($value['bank']); ?></td>
                  <td><?= $value['no_virtual']; ?></td>
                  <td><?= date("d F Y", strtotime($value['tanggal_transaksi'])); ?></td>
                  <td>
                    <?php if ($value['status']=='1'): ?>
                      <span class="badge badge-success">Sudah dibayar</span>
                    <?php elseif($value['status']=='2'): ?>
                      <span class="badge badge-danger">Transaksi Batal</span>
                    <?php else: ?>
                      <span class="badge badge-secondary">Menunggu Pembayaran</span>
                    <?php endif; ?>

                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection(); ?>
