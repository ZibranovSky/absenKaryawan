<?php 
$koneksi = mysqli_connect('localhost', 'root', '', 'absenkaryawan');

    $batas = 5;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;

$previous = $halaman - 1;
$next = $halaman + 1;

$data = mysqli_query($koneksi, "SELECT * FROM tb_keterangan");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);


$nomor = $halaman_awal+1;


// cari
if (isset($_POST['go'])) {
  $cari = $_POST['cari'];
  $karyawan = mysqli_query($koneksi, "SELECT * FROM tb_keterangan WHERE id LIKE '%".$cari."%'");
}else{
  $karyawan = mysqli_query($koneksi, "SELECT * FROM tb_keterangan LIMIT $halaman_awal, $batas");
}


foreach ($karyawan as $pro):
  ?>
    



<tr>
                              <td><?= $i++;  ?></td>
                              <td><?=  $pro['nip'];?></td>
                              <td><?=  $pro['nama'];?></td>
                              <td>
                                <?php 

                                if ($pro['keterangan'] == "Sakit") {
                                  echo '<b style="color: red;">Sakit</b>';
                                }else if($pro['keterangan'] == "Ijin"){
                                  echo '<b style="color: yellow;">Ijin</b>';
                                }

                                 ?>
                              </td>
                              <td><?=  $pro['alasan'];?></td>
                              <td><?=$pro['tanggal'];?></td>
                              <td><?=$pro['jam']?></td>
                              <td>
                                <img src="img/keterangan/<?=$pro['foto'];?>" data-target="#view_image" data-toggle="modal">
                                
                                         <div class="modal fade" id="view_image" tabindex="-1" role="dialog" aria-labelledby="view_image" aria-hidden="true">
            <div class="modal-dialog" role="document">
           
       
                <center><img src="img/keterangan/<?= $pro['foto'];?>" width="1080"></center>
               
           
            </div>
          </div>
                              </td>
                           
                             

                              
                              <td><button class="btn btn-danger" data-toggle="modal" data-target="#hapus_ket<?=$pro['id'];?>">hapus</button>
                            <div class="modal fade" id="hapus_ket<?=$pro['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <input type="hidden" name="id" value="<?=$pro['id'];?>" hidden>
                                     <label>NIP : </label>
                                     <b><?=$pro['nip'];?></b><br>
                                     <label>Nama : </label>
                                     <b><?=$pro['nama'];?></b><br>
                                     <label>Keterangan : </label>
                                     <b>
                                       <?php 

                                if ($pro['keterangan'] == "Sakit") {
                                  echo '<b style="color: red;">Sakit</b>';
                                }else if($pro['keterangan'] == "Ijin"){
                                  echo '<b style="color: yellow;">Ijin</b>';
                                }

                                 ?>
                                     </b><br>
                                     <label>Alasan : </label>
                                     <b>
                                       <?=$pro['alasan'];?>
                                     </b><br>
                                     <label>Tanggal : </label>
                                     <b><?=$pro['tanggal'];?></b><br>
                                     <label>Jam : </label>
                                     <b><?=$pro['jam'];?></b><br>
                                     <label>Foto : </label>
                                                                   <img src="img/keterangan/<?=$pro['foto'];?>" data-target="#view_image" data-toggle="modal" width="250">
                                       <div class="modal-footer">
                                    <button type="submit" name="hapus" class="btn btn-danger">Hapus</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                  </div>
                                   </form>
                                  </div>
                                
                                </div>
                              </div>
                            </div></td>
                              </tr> 
                              <?php endforeach; ?>
