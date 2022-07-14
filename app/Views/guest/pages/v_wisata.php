<?= $this->extend('\App\Views\guest\pages\template\layout'); ?>
<?= $this->section('content'); ?>

<section class="hero-wrap hero-wrap-2 js-fullheight"
style="background-image: url('<?= base_url(); ?>/guests/images/bg_1.jpg');">
<div class="overlay"></div>
<div class="container">
  <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
    <div class="col-md-9 ftco-animate pb-5 text-center">
      <h1 class="mb-0 bread">Wisata List</h1>
    </div>
  </div>
</div>
</section>

<section class="ftco-section">
  <div class="container">
    <div class="row">

      <?php foreach ($wisata as $value): ?>
        <div class="col-md-4 ftco-animate">
          <div class="project-wrap">
            <?php $path = explode(",", $value['image']); ?>
            <a href="<?= base_url('guest/wisata/wisata_detail/'.$value['id_wisata']); ?>" class="img"
            style="background-image: url(<?= base_url($path[0]); ?>);">
            <span class="price"><?= $value['wisata_name']; ?></span>
          </a>
          <div class="text p-4">
            <span class="days">Destinasi Wisata</span>
            <h3><a href="<?= base_url('guest/wisata/wisata_detail/'.$value['id_wisata']); ?>"><?= $value['wisata_name']; ?></a></h3>
            <p class="location"><span class="fa fa-map-marker"></span> <?= $value['alamat_wisata']; ?></p>
            <ul>
              <a target="_blank" href="https://www.google.com/maps/search/?api=1&amp;query=<?= $value['longtitude']; ?>,<?= $value['lattitude']; ?>" class="btn btn-info text-white">Ke lokasi</a>
            </ul>
          </div>
        </div>
      </div>
    <?php endforeach; ?>

  </div>
</div>
</section>

<?= $this->endSection(); ?>
