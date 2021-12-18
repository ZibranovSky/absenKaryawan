<div class="row">
    <a href="?m=absen&s=excel&bulan=<?=$bulan;?>&tahun=<?=$tahun;?>" class="btn btn-success mb-2 ml-2 mt-2">Convert to Excel</a>
     <a href="?m=absen&s=word&bulan=<?=$bulan;?>&tahun=<?=$tahun;?>" class="btn btn-primary mb-2 ml-2 mt-2">Convert to Word</a>

 <a href="?m=absen&s=print_rekap&bulan=<?=$bulan;?>&tahun=<?=$tahun;?>" class="btn btn-warning mb-2 ml-2 mt-2">Print</a>

 <div class="table-responsive table--no-card m-b-30 ml-3 mr-3">
 	<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>NIP</th>    
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Bulan</th>
                <th>Kehadiran</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
             foreach ($query as $key): ?>
            <tr>
                <td><?=$no++;?></td>
                <td><?=$key['nip'];?></td>
                <td><?=$key['nama'];?></td>
                <td><?=$key['tanggal'];?></td>
                <td><?=$key['bulan']?></td>
                <td>
                    <?php 
                                if ($key['kehadiran']=="Hadir") {
                                  echo '<b style="color: blue;">Hadir</b>';
                                }else{
          
                                ?>
                                <strong><a href="?m=absen&s=keterangan1&nip=<?= $key['nip']; ?>&tanggal=<?=$key['tanggal'];?>&nama=<?=$key['nama'];?>"style="color: red;">Tidak Hadir</a></strong>

                              <?php } ?>
                </td>
                <td>
                      <?php 
                                // $jam_masuk = "0800";
                                $select_jam = mysqli_query($koneksi, "SELECT * FROM jam_masuk");
                                $jam_masuk = mysqli_fetch_array($select_jam);
                                if ($key['jam2'] > $jam_masuk['jam_masuk']) {
                                  echo '<b style="color: red;">telat</b>';
                                }else if($key['keterangan'] != "null"){
                                  echo '<b style="color: red;">-</b>';
                                }else{
                                  echo '<b style="color: green;">tepat waktu</b>';
                                }

                                 ?>
                </td>
            </tr>
                  <?php endforeach; ?>
           
           
    </table>
   
				</div>	
			</div>