<?= $this->extend('\App\Views\guest\pages\template\layout'); ?>
<?= $this->section('content'); ?>

<section class="hero-wrap hero-wrap-2 js-fullheight"
style="background-image: url('<?= base_url(); ?>/guests/images/bg_1.jpg');">
<div class="overlay"></div>
<div class="container">
  <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
    <div class="col-md-9 ftco-animate pb-5 text-center">
      <p class="breadcrumbs"><span class="mr-2"><a href="<?= base_url(); ?>">Home <i
        class="fa fa-chevron-right"></i></a></span> <span>Detail Wisata<i
          class="fa fa-chevron-right"></i></span></p>
          <h1 class="mb-0 bread"><?= $wisata['wisata_name']; ?></h1>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section ftco-no-pb contact-section mb-12" style="padding: 2em 0;">
    <div class="container">
      <div class="row d-flex">
        <div class="col-md-12 d-flex">
          <div class="align-self-stretch box text-center">
            <h3>Detail Maps Location</h3>
            <div class="col-12">
              <div id="map"></div>
              <!-- ############################################################################################ -->
              <input type="hidden" name="long" class="form-control" readonly id="lat" value="<?= $wisata['lattitude']; ?>">
              <input type="hidden" name="lat" class="form-control" readonly id="lon" value="<?= $wisata['longtitude']; ?>">
              <br>
              <div class="days">
                <a target="_blank" href="https://www.google.com/maps/search/?api=1&amp;query=<?= $wisata['longtitude']; ?>,<?= $wisata['lattitude']; ?>" style="color:white;" class="btn btn-info">Pergi ke lokasi</a>
              </div>
              <br>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section ftco-no-pb contact-section mb-8" style="padding: 2em 0;">
    <div class="container">
      <div class="row d-flex contact-info">
        <div class="col-md-8 d-flex">
          <div class="align-self-stretch box p-5 text-center">
            <?php $path = explode(",", $wisata['image']); ?>
            <div class="d-flex col-12">
              <img src="<?= base_url($path[0]); ?>" class="d-flex col-12">
            </div>
            <h3 class="mb-2"><?= $wisata['wisata_name']; ?></h3>
            <span>Desa : <?= $wisata['desa_name']; ?></span>
            <p><b><?= $wisata['alamat_wisata']; ?></b></p>
            <p><?= $wisata['keterangan']; ?></p>
          </div>
        </div>
        <div class="col-md-4 d-flex">
          <div class="align-self-stretch box p-4 text-center">
            <h3 class="mb-2">Beli Tiket Masuk</h3>

            <form id="payment-form" method="post" action="<?=site_url()?>guest/midtrans/finish">
              <input type="hidden" name="result_type" id="result-type" value="">
              <input type="hidden" name="result_data" id="result-data" value="">

              <div class="form-group">
                <label for="exampleFormControlSelect1">Pilih Tanggal Tiket</label>
                <select class="form-control" style="border:none;" name="id_tiket" id="id_tiket">
                  <?php foreach ($tiket as $value): ?>
                    <option value="<?= $value['id_tiket']; ?>"><?= date("d F Y", strtotime($value['tanggal_buka'])); ?> - Rp.<?= number_format($value['harga_tiket']); ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <input type="hidden" name="nama" id="nama" value="<?= $wisata['wisata_name']; ?>">
              <input type="hidden" name="id_user" id="id_user" value="<?= session()->get('id_user') ?>">
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Jumlah Beli</label>
                <input type="number" class="form-control" style="border:none;" name="jumlah" id="jumlah" value="1">
              </div>
              <?php if (session()->get('id_user')==null): ?>
                <a href="<?= base_url('login'); ?>" class="btn btn-info">Beli Tiket</a>
              <?php else: ?>
                <button id="pay-button" class="btn btn-info">Beli Tiket</button>
              <?php endif; ?>
            </form>
          </div>
        </div>

      </div>
    </section>

    <script type="text/javascript">
    window.cb = function cb(json) {
      //do what you want with the json
      console.log(json.address);
      document.getElementById('address').value = json.address.village + ',' + json.address.county;
      myMarker.bindPopup("Latitude: " + json.lat + "<br />Longtitude: " + json.lon + "<br />Alamat : "+ json.address.village).openPopup();
    }

    var startlon = <?=  $wisata['lattitude']; ?>;
    var startlat = <?= $wisata['longtitude']; ?>;

    console.log(startlon);
    console.log(startlat);

    var options = {
      center: [startlat, startlon],
      zoom: 20
    }

    document.getElementById('lat').value = startlat;
    document.getElementById('lon').value = startlon;

    var map = L.map('map', options);
    var nzoom = 15;

    L.tileLayer('https://tile.thunderforest.com/cycle/{z}/{x}/{y}.png?apikey=04adc8bfec4f4ebcac57b9fedffb5842').addTo(map);

    // L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
    //   maxZoom: 15,
    //   subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    // }).addTo(map);

    setTimeout(function(){ map.invalidateSize()}, 150);


    var myMarker = L.marker([startlat, startlon], {title: "Coordinates", alt: "Coordinates", draggable: true}).addTo(map).on('dragend', function() {
      var s = document.createElement('script');
      var lat = myMarker.getLatLng().lat.toFixed(8);
      var lon = myMarker.getLatLng().lng.toFixed(8);
      var czoom = map.getZoom();
      if(czoom < 18) { nzoom = czoom + 2; }
      if(nzoom > 18) { nzoom = 18; }
      if(czoom != 18) { map.setView([lat,lon], nzoom); } else { map.setView([lat,lon]); }
      document.getElementById('lat').value = lat;
      document.getElementById('lon').value = lon;
      //get addres
      s.src = "http://nominatim.openstreetmap.org/reverse?json_callback=cb&format=json&lat="+lat+"&lon="+lon+"";
      document.getElementsByTagName('head')[0].appendChild(s);
    });

    function chooseAddr(lat1, lng1, address1)
    {
      myMarker.closePopup();
      map.setView([lat1, lng1],18);
      myMarker.setLatLng([lat1, lng1]);
      lat = lat1.toFixed(8);
      lon = lng1.toFixed(8);
      address = address1;

      document.getElementById('lat').value = lat;
      document.getElementById('lon').value = lon;
      document.getElementById('address').value = address;

      myMarker.bindPopup("Lat " + lat + "<br />Lon " + lon + "<br />" + address).openPopup();
    }

    function myFunction(arr)
    {
      var out = "<br />";
      var i;

      if(arr.length > 0)
      {
        for(i = 0; i < arr.length; i++)
        {
          var lat = arr[i].lat;
          var long = arr[i].lon;
          var address = arr[i].display_name;

          out += '<li class="list-group-item" onclick="chooseAddr('+lat+', '+long+', \''+address+'\')"><a href="#" >' + address + '</a></li>';

        }
        document.getElementById('results').innerHTML = out;
      }
      else
      {
        document.getElementById('results').innerHTML = "<b>Maaf, alamat tidak ditemukan..</b>";
      }

    }

    function addr_search()
    {
      var inp = document.getElementById("addr");
      var xmlhttp = new XMLHttpRequest();
      var url = "https://nominatim.openstreetmap.org/search?format=json&limit=3&q=" + inp.value;
      xmlhttp.onreadystatechange = function()
      {
        if (this.readyState == 4 && this.status == 200)
        {
          var myArr = JSON.parse(this.responseText);
          myFunction(myArr);
        }
      };
      xmlhttp.open("GET", url, true);
      xmlhttp.send();
    }

    </script>
    <?= $this->endSection(); ?>
