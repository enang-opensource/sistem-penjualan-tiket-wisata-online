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
        <span>About us <i class="fa fa-chevron-right"></i></span>
      </p>
      <h1 class="mb-0 bread">About Us</h1>
    </div>
  </div>
</div>
</section>

<section class="ftco-section services-section">
  <div class="container">
    <div class="row d-flex">
      <div class="col-md-6 order-md-last heading-section pl-md-5 ftco-animate d-flex align-items-center">
        <div class="w-100">
          <span class="subheading">Welcome to Kecamatan Balong</span>
          <h2 class="mb-4">Waktunya berjelajah di wilayah kami!</h2>
          <p>Kecamatan Balong adalah sebuah kecamatan di Kabupaten Ponorogo, Provinsi Jawa Timur, Indonesia. Kecamatan ini berjarak sekitar 18 kilometer dari ibu kota Kabupaten Ponorogo ke arah barat daya. Pusat pemerintahannya berada di desa Balong.
            Kecamatan Balong memiliki beragam Potensi wisata
            antara lain wisata budaya, alam, makanan, maupun industri kerajinan yang tersebar di
            berbagai tempat.Potensi tersebut perlu ditingkatkan
            sebagai salah satu upaya menjaga kelestarian budaya, pelestarian lingkungan
            hidup dan sebagai alternatif meningkatkan ekonomi masyarakat.</p>
            <p><a href="#" class="btn btn-primary py-3 px-4">Search Destination</a></p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
              <div class="services services-1 color-1 d-block img"
              style="background-image: url(<?= base_url(); ?>/guests/images/services-1.jpg);">
              <div class="icon d-flex align-items-center justify-content-center"><span
                class="flaticon-paragliding"></span></div>
                <div class="media-body">
                  <h3 class="heading mb-3">Aktivitas</h3>
                  <p>Menjelajahi berbagai macam wisata yang ada di kecamatan Balong</p>
                </div>
              </div>
            </div>
            <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
              <div class="services services-1 color-2 d-block img"
              style="background-image: url(<?= base_url(); ?>/guests/images/services-2.jpg);">
              <div class="icon d-flex align-items-center justify-content-center"><span
                class="flaticon-route"></span></div>
                <div class="media-body">
                  <h3 class="heading mb-3">Jenis Wisata</h3>
                  <p>Banyak sekali wisata yang dapat anda temui dengan berbagai macam jenis, seperti bukti, air terjun, dan lainnya</p>
                </div>
              </div>
            </div>
            <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
              <div class="services services-1 color-3 d-block img"
              style="background-image: url(<?= base_url(); ?>/guests/images/services-3.jpg);">
              <div class="icon d-flex align-items-center justify-content-center"><span
                class="flaticon-tour-guide"></span></div>
                <div class="media-body">
                  <h3 class="heading mb-3">Panduan</h3>
                  <p>Dengan website kami, maka kami akan menginformasikan segalanya untuk anda</p>
                </div>
              </div>
            </div>
            <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
              <div class="services services-1 color-4 d-block img"
              style="background-image: url(<?= base_url(); ?>/guests/images/services-4.jpg);">
              <div class="icon d-flex align-items-center justify-content-center"><span
                class="flaticon-map"></span></div>
                <div class="media-body">
                  <h3 class="heading mb-3">Location Detail</h3>
                  <p>Website dengan detail data lokasi di kecamatan Balong yang sudah terpercaya</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="ftco-section ftco-about img" style="background-image: url(<?= base_url(); ?>/guests/images/bg_4.jpg);">
    <div class="overlay"></div>
    <div class="container py-md-5">
      <div class="row py-md-5">
        <div class="col-md d-flex align-items-center justify-content-center">

        </div>
      </div>
    </div>
  </section>

  <?= $this->endSection(); ?>
