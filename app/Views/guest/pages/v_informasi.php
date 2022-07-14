<?= $this->extend('\App\Views\guest\pages\template\layout'); ?>
<?= $this->section('content'); ?>

<section class="hero-wrap hero-wrap-2 js-fullheight"
style="background-image: url('<?= base_url(); ?>/guests/images/bg_1.jpg');">
<div class="overlay"></div>
<div class="container">
  <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
    <div class="col-md-9 ftco-animate pb-5 text-center">
      <h1 class="mb-0 bread">Informasi Budaya</h1>
    </div>
  </div>
</div>
</section>

<section class="ftco-section">
  <div class="container">
    <div class="row">

      <?php foreach ($informasi as $value): ?>
        <div class="col-md-4 ftco-animate">
          <div class="project-wrap">
            <a href="<?= base_url('guest/informasi/informasi_detail/'.$value['id_informasi']); ?>" class="img"
            style="background-image: url(<?= base_url($value['gambar_informasi']); ?>);">
            <span class="price"><?= $value['judul_informasi']; ?></span>
          </a>
          <div class="text p-4">
            <span class="days">Wisata Budaya</span>
            <h3><a href="<?= base_url('guest/informasi/informasi_detail/'.$value['id_informasi']); ?>"><?= $value['judul_informasi']; ?></a></h3>
            <p style="text-align: justify;text-justify: inter-word;"> <?= substr($value['kontent_informasi'], 200); ?><a href="<?= base_url('guest/informasi/informasi_detail/'.$value['id_informasi']); ?>">Baca Selengkapnya...</a></p>
          </div>
        </div>
      </div>
    <?php endforeach; ?>

  </div>
</div>
</section>

<?= $this->endSection(); ?>
