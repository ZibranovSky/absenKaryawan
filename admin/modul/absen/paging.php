<?php 
$koneksi = mysqli_connect('localhost', 'root', '', 'absenkaryawan');

    $batas = 5;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;

$previous = $halaman - 1;
$next = $halaman + 1;

$data = mysqli_query($koneksi, "SELECT * FROM tb_absen");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);


$nomor = $halaman_awal+1;


// cari
if (isset($_POST['go'])) {
  $cari = $_POST['cari'];
  $karyawan = mysqli_query($koneksi, "SELECT * FROM tb_absen WHERE nama LIKE '%".$cari."%'");
}else{
  $karyawan = mysqli_query($koneksi, "SELECT * FROM tb_absen LIMIT $halaman_awal, $batas");
}


foreach ($karyawan as $pro):
  ?>
    



<tr>
                              <td><?= $i++;  ?></td>
                              <td><?=  $pro['nip'];?></td>
                              <td><?=  $pro['nama'];?></td>
                              <td><?= $pro['tanggal'];?></td>
                              <td><?=  $pro['jam'];?></td>
                              <td>
                                <?php 
                                if ($pro['kehadiran']=="Hadir") {
                                  echo '<b style="color: blue;">Hadir</b>';
                                }else{
          
                                ?>
                                <strong><a href="?m=absen&s=keterangan1&nip=<?= $pro['nip']; ?>&tanggal=<?=$pro['tanggal'];?>&nama=<?=$pro['nama'];?>"style="color: red;">Tidak Hadir</a></strong>

                              <?php } ?>
                              </td>
                              <td><?= $pro['latitude']; ?></td>
                              <td><?= $pro['longitude']; ?></td>
                              
                              <td>
                                <?php 
                                // $jam_masuk = "0800";
                                $select_jam = mysqli_query($koneksi, "SELECT * FROM jam_masuk");
                                $jam_masuk = mysqli_fetch_array($select_jam);
                                if ($pro['jam2'] > $jam_masuk['jam_masuk']) {
                                  echo '<b style="color: red;">telat</b>';
                                }else if($pro['keterangan'] != "null"){
                                  echo '<b style="color: red;">-</b>';
                                }else{
                                  echo '<b style="color: green;">tepat waktu</b>';
                                }

                                 ?>
                              </td>
                              <td>
                                <?php 

                                $query_check_absen_keluar = mysqli_query($koneksi, "SELECT * FROM tb_absen WHERE absen_masuk = '1' AND absen_keluar = '1'");
                                $row_check = mysqli_num_rows($query_check_absen_keluar);
                                if ($row_check) {
                                  echo '<b style="color: green;">Sudah absen keluar</b>';
                                }else{
                                 echo '<b style="color: red;">Belum absen keluar</b>'; 
                                }

                                 ?>
                                
                              </td>

                              <td><?php 
                                  $check_jam_keluar = mysqli_query($koneksi, "SELECT * FROM tb_absen WHERE absen_masuk = '1' AND absen_keluar = '1'");
                                  $fetch = mysqli_fetch_array($check_jam_keluar);
                                  $row_check = mysqli_num_rows($check_jam_keluar);
                                  if ($row_check) {
                                    echo $fetch['jam_keluar'];
                                  }else{
                                    echo '<b style="color: red;">Belum absen keluar</b>';
                                  }
                                 ?></td>
                           
                             

                              
                              <td><button class="btn btn-danger" data-toggle="modal" data-target="#hapus_karyawan<?=$pro['id'];?>">hapus</button>
                            <div class="modal fade" id="hapus_karyawan<?=$pro['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                   <form action="" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" hidden name="id" value="<?=$pro['id'];?>" >
                                     <label>NIP : </label>
                                     <b><?=$pro['nip'];?></b><br>
                                     <label>Nama : </label>
                                     <b><?=$pro['nama'];?></b><br>
                                     <label>Tanggal : </label>
                                     <b><?=$pro['tanggal'];?></b><br>
                                     <label>Jam : </label>
                                     <b><?=$pro['jam'];?></b><br>
                                     <label>Status : </label>
                                     <b>
                                      <?php 

                                        $select_jam = mysqli_query($koneksi, "SELECT * FROM jam_masuk");
                                      $jam_masuk = mysqli_fetch_array($select_jam);
                                 if ($pro['jam2'] > $jam_masuk['jam_masuk']) {
                                  echo '<b style="color: red;">telat</b>';
                                }else if($pro['keterangan'] != "null"){
                                  echo '<b style="color: red;">tidak hadir</b>';
                                }else{
                                  echo '<b style="color: green;">tepat waktu</b>';
                                }

                                       ?>
                                        
                                      </b><br>
                                    
                                       <div class="modal-footer">
                                    <button type="submit" name="hapus" class="btn btn-danger">Hapus</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                  </div>
                                   </form>
                                  </div>
                                
                                </div>
                              </div>
                            </div>

                              <button class="btn btn-primary" data-toggle="modal" data-target="#show_maps<?=$pro['id'];?>">Tampilkan Lokasi Absen</button>

                              <div class="modal fade" id="show_maps<?=$pro['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">


                                      
                                    <input type="text" id="latitude" hidden value="<?= $pro['latitude'];?>" name="">
                                    <input type="text" id="longitude" hidden value="<?= $pro['longitude'];?>" name="">
                                    <input type="text" id="namas" value="<?= $pro['nama']?>" hidden name="">
                                  <div class="col-6">
                                    <button class="btn btn-primary" onclick="getLocation()">
                                              Tampilkan Lokasi Absen
                                            </button>
                                      <div id="mapid" class="mt-2" style="width: 450px; height: 400px"></div>
                                      <br />
                                      <p id="demo"></p>
                                    </div>
                                  </div>
                                
                                </div>
                              </div>
                            </div>


                          </td>
                 
                              </tr> 


                              <!-- maps section -->
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
                                  position.coords.latitude +
                                  "<br>Longitude: " +
                                  position.coords.longitude;
                              }
                              </script>
                              
                              <?php endforeach; ?>
