<?php 

include 'fungsi/fungsi.php';

global $koneksi;
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM tb_absen WHERE id='$id'");
$row = mysqli_fetch_array($query);

 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <!--CSS LeafletJS-->
    <link
      rel="stylesheet"
      href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
      integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
      crossorigin=""
    />
    <!--JavaScript LeafletJS-->
    <script
      src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
      integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
      crossorigin=""
    ></script>
  </head>
  <body>
    <div class="container my-5">
      <div class="row">
        <div class="col-6">
          <input hidden type="text" id="namas" value="<?= $row['nama'];?>" name="">
          <input hidden type="text" id="latitude" value="<?= $row['latitude'];?>" name="">
          <input hidden type="text" id="longitude" value="<?= $row['longitude'];?>" name="">
         
          <p>Nama : <?= $row['nama'];?></p>

          <button class="btn btn-primary" onclick="getLocation()">
            Tampilkan Lokasi Absen
          </button>
        </div>
        <div class="col-6">
          <div id="mapid" style="width: 600px; height: 400px"></div>
          <br />
          <p id="demo"></p>
        </div>
      </div>
    </div>

    <script>
      var latitude = document.getElementById('latitude').value;
      var longitude = document.getElementById('longitude').value;
      var namas = document.getElementById('namas').value;

      function getLocation() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(showPosition);
        } else {
          x.innerHTML = "Browser mu tidak support.";
        }
      }

      function showPosition(position) {
        //untuk map masukkan lat dan lng ke dalam variabelnya
        var mymap = L.map("mapid").setView(
          [latitude, longitude],
          13
        );
        //ini untuk deskripsi map
        L.tileLayer(
          "https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw",
          {
            maxZoom: 18,
            attribution:
              'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
              '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
              'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: "mapbox/streets-v11",
            tileSize: 512,
            zoomOffset: -1,
          }
        ).addTo(mymap);
      //menambahkan marker letak posisi dengan lat dan lng yang telah didapat sebelumnya
        L.marker([latitude, longitude])
          .addTo(mymap)
          .bindPopup(namas);
        //digunakan unuk menampilkan text posisi saat ini
        x.innerHTML =
          "Latitude: " +
          latitude +
          "<br>Longitude: " +
          longitude;
      }
    </script>
    <script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>
  </body>
</html> 