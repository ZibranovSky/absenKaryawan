<?php include 'comp/header.php'; ?>
<?php 

if (isset($_POST['simpan'])) {
    echo "<meta http-equiv='refresh' content='0'>";
  simpan_karyawan();
}


if (isset($_POST['hapus'])) {
  hapus_karyawan();
}


 ?>
<div class="main-content">
	<div class="section__content section__content--p30">
		
	</div>
	<div class="content-wrapper">
	<div class="content-header">
		 <div class="row mb-2">
          <div class="col-sm-6">
           <h3 class="col-sm-6">Data Karyawan</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Karyawan</li>
            </ol>
          </div><!-- /.col -->
        </div>
	</div>


	<!-- Main Content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12"><br>
					<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-5" data-toggle="modal" data-target="#exampleModal">
  Tambah Data karyawan
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah data karyawan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body">
      <form action="" method="POST" enctype="multipart/form-data">
      	<div class="form-group">
          <label>NIP</label>
          <input type="text" class="form-control" name="nip">
        </div>
        <div class="form-group">
          <label>Username</label>
          <input type="text" class="form-control" name="username">
        </div>
         <div class="form-group">
          <label>Password</label>
          <input type="text" class="form-control" name="password">
        </div>
         <div class="form-group">
          <label>Nama</label>
          <input type="text" class="form-control" name="nama">
        </div>
         <div class="form-group">
          <label>Tempat Lahir</label>
          <input type="text" class="form-control" name="tempat_lahir">
        </div>
           <div class="form-group">
          <label>Tanggal Lahir</label>
          <input type="date" class="form-control" name="tanggal_lahir">
        </div>
           <div class="form-group">
          <label>Alamat</label>
         <textarea name="alamat" class="form-control"></textarea>
        </div>
           <div class="form-group">
          <label>Kontak</label>
          <input type="text" class="form-control" name="kontak">
        </div>

         <div class="form-group">
          <label>Foto</label>
          <input type="file" class="form-control" name="foto">
        </div>
        <div class="modal-footer">
        <button type="submit" name="simpan" class="btn btn-primary">Save changes</button>
        <button type="cancel" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>
     
    </div>
      
    </div>
  </div>
</div>

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
                                                <th>Tempat Lahir</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Alamat</th>
                                                <th>Kontak</th>
                                                <th>Foto</th>
                                                <th>aksi</th>
                                                
                                            </tr>
                                        </thead>
                      
                                        <tbody>
                                          <?php
                                            $i = 1;
                                           include 'paging.php'; ?>
                                        </tbody>
                                    </table>
</div>
	</div>
    <center><ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php if($halaman > 1){ echo "href='?m=karyawan&halaman=$previous'"; } ?>>Previous</a>
                </li>
                <?php 
                for($x=1;$x<=$total_halaman;$x++){
                    ?> 
                    <li class="page-item"><a class="page-link" href="?m=karyawan&halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                    <?php
                }
                ?>              
                <li class="page-item">
                    <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?m=karyawan&halaman=$next'"; } ?>>Next</a>
                </li>
            </ul>
              </center> 
	 
<!-- end table -->
  
				</div>	
			</div>
		</div>
	</section>

</div>

</div>
<?php include 'comp/footer.php'; ?>
