<!DOCTYPE html>
<html lang="en">

<head>
  <title><?= $title ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Arizonia&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url('guests/css/animate.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('guests/css/owl.carousel.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('guests/css/owl.theme.default.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('guests/css/magnific-popup.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('guests/css/bootstrap-datepicker.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('guests/css/jquery.timepicker.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('guests/css/flaticon.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('guests/css/style.css'); ?>">

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"></script>
  <style type="text/css">
  #map {
    width: 100%;
    height: 400px;
    padding: 0px;
  }
</style>

<!-- midtrans -->
<script type="text/javascript"
src="https://app.sandbox.midtrans.com/snap/snap.js"
data-client-key="SB-Mid-client-hYOiObiHe5t0lKHE"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>

<body>
  <!-- nav -->
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
      aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="oi oi-menu"></span> Menu
    </button>

    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a href="<?= base_url('guest/wisata'); ?>" class="nav-link">Destinasi
          Wisata</a></li>
          <li class="nav-item"><a href="<?= base_url('guest/informasi'); ?>" class="nav-link">Informasi
            Budaya</a></li>
            <li class="nav-item"><a href="<?= base_url('guest/about'); ?>" class="nav-link">Tentang Kami</a>
            </li>
            <li class="nav-item"><a href="<?= base_url('guest/kontak'); ?>" class="nav-link">Kontak</a></li>
            <?php if (session()->get('id_user')==null): ?>
              <li class="nav-item"><a href="<?= base_url('login'); ?>" class="nav-link">Login</a></li>
              <li class="nav-item"><a href="<?= base_url('register'); ?>" class="nav-link">Register</a>
              <?php else: ?>
                <li class="nav-item"><a href="<?= base_url('guest/transaksi'); ?>" class="nav-link">Riwayat Beli</a></li>
                <li class="nav-item"><a href="<?= base_url('logout'); ?>" class="nav-link">Logout</a></li>
              <?php endif; ?>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- end nav -->

    <?= $this->renderSection('content'); ?>

    <!-- footer -->
    <footer class="ftco-footer bg-bottom ftco-no-pt"
    style="background-image: url(<?= base_url('guests/images/bg_3.jpg'); ?>);">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-12 pt-5">
          <div class="ftco-footer-widget pt-md-5 mb-4">
            <h2 class="ftco-heading-2">Tentang Kami</h2>
            <p>Kecamatan Balong adalah sebuah kecamatan di Kabupaten Ponorogo, Provinsi Jawa Timur, Indonesia. Kecamatan ini berjarak sekitar 18 kilometer dari ibu kota Kabupaten Ponorogo ke arah barat daya. Pusat pemerintahannya berada di desa Balong.
              Kecamatan Balong memiliki beragam Potensi wisata
              antara lain wisata budaya, alam, makanan, maupun industri kerajinan yang tersebar di
              berbagai tempat.Potensi tersebut perlu ditingkatkan
              sebagai salah satu upaya menjaga kelestarian budaya, pelestarian lingkungan
              hidup dan sebagai alternatif meningkatkan ekonomi masyarakat.</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright &copy;<script>
              document.write(new Date().getFullYear());
              </script> Developed with love by Digisoft

              <!-- This template is created by <a href="https://colorlib.com"
              target="_blank">Colorlib</a> -->
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
        </div>
      </div>
    </footer>

    <!-- end footer -->


    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen">
      <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
        stroke="#F96D00" />
      </svg>
    </div>

    <!-- midtrans -->
    <script type="text/javascript">
    $('#pay-button').click(function (event) {
      event.preventDefault();
      $(this).attr("disabled", "disabled");

      // data transaksi
      var id_tiket = $("#id_tiket").val();
      var id_user = $("#id_user").val();
      var jumlah = $("#jumlah").val();
      var nama = $("#nama").val();

      $.ajax({
        url: '<?=site_url()?>guest/midtrans',
        cache: false,
        data:{
          id_tiket:id_tiket,
          id_user:id_user,
          jumlah:jumlah,
          nama:nama
        },
        success: function(data) {
          //location = data;

          console.log('token = '+data);

          var resultType = document.getElementById('result-type');
          var resultData = document.getElementById('result-data');

          function changeResult(type,data){
            $("#result-type").val(type);
            $("#result-data").val(JSON.stringify(data));
            //resultType.innerHTML = type;
            //resultData.innerHTML = JSON.stringify(data);
          }

          snap.pay(data, {

            onSuccess: function(result){
              changeResult('success', result);
              console.log(result.status_message);
              console.log(result);
              $("#payment-form").submit();
            },
            onPending: function(result){
              changeResult('pending', result);
              console.log(result.status_message);
              $("#payment-form").submit();
            },
            onError: function(result){
              changeResult('error', result);
              console.log(result.status_message);
              $("#payment-form").submit();
            }
          });
        }
      });
    });
    </script>

    <?php if (!empty(session()->getFlashdata('error'))) : ?>
      <script type="text/javascript">
      alert("BERHASIL LOGIN!");
      </script>
    <?php endif; ?>

    <script src="<?= base_url('guests/js/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('guests/js/jquery-migrate-3.0.1.min.js'); ?>"></script>
    <script src="<?= base_url('guests/js/popper.min.js'); ?>"></script>
    <script src="<?= base_url('guests/js/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('guests/js/jquery.easing.1.3.js'); ?>"></script>
    <script src="<?= base_url('guests/js/jquery.waypoints.min.js'); ?>"></script>
    <script src="<?= base_url('guests/js/jquery.stellar.min.js'); ?>"></script>
    <script src="<?= base_url('guests/js/owl.carousel.min.js'); ?>"></script>
    <script src="<?= base_url('guests/js/jquery.magnific-popup.min.js'); ?>"></script>
    <script src="<?= base_url('guests/js/jquery.animateNumber.min.js'); ?>"></script>
    <script src="<?= base_url('guests/js/bootstrap-datepicker.js') ?>"></script>
    <script src="<?= base_url('guests/js/scrollax.min.js'); ?>"></script>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
  </script> -->
  <!-- <script src="<?= base_url('guests/js/google-map.js'); ?>"></script> -->
  <script src="<?= base_url('guests/js/main.js'); ?>"></script>

</body>

</html>
