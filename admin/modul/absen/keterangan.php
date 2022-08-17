<?php include 'comp/header.php'; ?>
<?php 
    
    if (isset($_POST['hapus'])) {
        hapus_absen();
    }



 ?>
<div class="main-content">
	<div class="section__content section__content--p30">
		
	</div>
	<div class="content-wrapper">
	<div class="content-header">
		 <div class="row mb-2">
          <div class="col-sm-6">
           <h3 class="col-sm-6">Data Keterangan Tidak Hadir <b class="text-primary"><?php echo $nama = $_GET['nama']; ?></b></h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Keterangan</li>
            </ol>
          </div><!-- /.col -->
            <div class="col-sm-6">
           
          </div><!-- /.col -->
        </div>
	</div>


	<!-- Main Content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12"><br>
					<!-- Button trigger modal -->




<!-- Tabel -->
<div class="row">
 <div class="table-responsive table--no-card m-b-30">
	  	<!-- <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIP</th>
                                                <th>Nama</th>
                                                <th>Tempat Lahir</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Alamat</th>
                                                <th>Kontak</th>
                                                <th>Foto</th>
                                                <th>aksi</th>
                                                
                                            </tr>
                                        </thead>
                                        <?php 
                           

                                            $i = 1;
                                            
                                         ?>
                                        <tbody>
                                            <?php include 'paging.php'; ?>
										</tbody>
                                    </table> -->
                                        <table class="table table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIP</th>
                                                <th>Nama</th>
                                                <th>Keterangan</th>
                                                <th>Alasan</th>
                                                <th>Tanggal</th>
                                                <th>Jam</th>
                                                <th>Poto</th>
                                              
                                               
                                                
                                            </tr>
                                        </thead>
                                            
                                            <?php $no = 1; ?>
                                        <tbody>
                                            <?php foreach (select_keterangan1() as $key): ?>
                                                
                                            
                                            <tr>
                                                <td><?=$no++;?></td>
                                                <td><?=  $key['nip'];?></td>
                                                  <td><?=  $key['nama'];?></td>
                                                  <td>
                                                    <?php 

                                                    if ($key['keterangan'] == "Sakit") {
                                                      echo '<b style="color: red;">Sakit</b>';
                                                    }else if($key['keterangan'] == "Ijin"){
                                                      echo '<b style="color: purple;">Ijin</b>';
                                                    }

                                                     ?>
                                                  </td>
                                                  <td><?=  $key['alasan'];?></td>
                                                  <td><?=$key['tanggal'];?></td>
                                                  <td><?=$key['jam']?></td>
                                                  <td>
                                                    <img src="img/karyawan/<?=$key['foto'];?>" data-target="#view_image<?=$key['foto']?>" data-toggle="modal">
                                                    
                                                             <div class="modal fade" id="view_image<?=$key['foto']?>" tabindex="-1" role="dialog" aria-labelledby="view_image" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                               
                           
                                    <center><img src="img/karyawan/<?= $key['foto'];?>" width="1080"></center>
                                   
                               
                                </div>
                              </div>
                                                  </td>
                                            </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
</div>
	</div>
	   
<!-- end table -->
  
				</div>	
			</div>
		</div>
	</section>

</div>

</div>
<?php include 'comp/footer.php'; ?>