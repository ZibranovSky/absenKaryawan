<?php include 'comp/header.php'; ?>
<?php 

 if (isset($_POST['edit'])) {	
 	echo "<meta http-equiv='refresh' content='0'>";

 	edit_admin();

 } 

 ?>
<div class="main-content">
	<div class="section__content section__content--p30">
		
	</div>
	<div class="content-wrapper">
	<div class="content-header">
		 <div class="row mb-2">
          <div class="col-sm-6">
           <h3 class="col-sm-8">Profil <?php echo $adm['nama']; ?></h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">User</li>
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


<!-- Tabel -->
<div class="row">
	<div class="col-sm-12">
		<div class="table-responsive">
			<table class="table-responsive table-borderless table-earning">
				<tbody>
					<tr>
					<td>Nama : </td>
					<td><?=$adm['nama'];?></td>
					</tr>
					<tr>
						<td>Kontak : </td>
						<td><?=$adm['kontak'];?></td>
					</tr>
					<tr>
						<td>Foto : </td>
						<td>
							  <div class="image img-cir img-120">
                       <?php 

							if ($adm['foto'] != "") {
								echo '<img src="img/'.$adm['foto'].'" width="250" data-target="#view_image" data-toggle="modal">';
							}else{
								 echo '<img src="img/user_logo.png" width="150">';
							}

							 ?>
                    </div>
							
							<!-- Modal gambar -->
							 <div class="modal fade" id="view_image" tabindex="-1" role="dialog" aria-labelledby="view_image" aria-hidden="true">
            <div class="modal-dialog" role="document">
           
          <!--       <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <b><p class="modal-title" id="view_image" style="text-align: center; font-size: 18px;">Edit Data Admin</p></b>
                </div> -->
                <!-- Modal Body -->
              <!--   <div class="modal-body"> </div> -->
                <center><img src="img/<?= $adm['foto'];?>" width="400"></center>
               
           
            </div>
						</td>
					</tr>
					<tr>
						<td>

								<div data-toggle="modal" data-target="#edit-profil<?= $adm['id'] ?>">
                  <button type="button" class="btn btn-info datapotensi" data-toggle="tooltip" title="Edit">
                    <i class="fa fa-edit"></i>
                  </button>
                </div>

                <!-- modal edit akun -->

                 <!-- Modal edit -->
                          <div class="modal fade" id="edit-profil<?= $adm['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="edit-profil<?= $adm['id'] ?>" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <b><p class="modal-title" id="edit-profil<?= $adm['id'] ?>" style="text-align: center; font-size: 18px;">Edit Data Admin</p></b>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                 <form action="" method="POST" enctype="multipart/form-data">
                  <input type="hidden" value="<?= $adm['id'] ?>" name="id">

  <div class="form-group">
    <label>Username</label>
    <input type="text" class="form-control" value="<?= $adm['username'];?>" id="exampleInputEmail1" name="username" aria-describedby="emailHelp" placeholder="Masukkan Username">
   
  </div>
    <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" id="exampleInputEmail1" name="password" aria-describedby="emailHelp" required placeholder="Masukkan password">
    
   
  </div>
    <div class="form-group">
    <label>Nama User</label>
    <input type="text" class="form-control" value="<?= $adm['nama'];?>" id="exampleInputEmail1" name="nama" aria-describedby="emailHelp" placeholder="Masukkan nama">
   
  </div>
    <div class="form-group">
    <label>kontak</label>
    <input type="text" class="form-control" value="<?= $adm['kontak'];?>" id="exampleInputEmail1" name="kontak" aria-describedby="emailHelp" placeholder="Masukkan kontak">
   
  </div>

   <div class="form-group">
    <label>Foto Admin</label>
    <br>
    <?php 

							if ($adm['foto'] != "") {
								echo '<img src="img/'.$adm['foto'].'" width="250">';
							}else{
								 echo '<img src="img/user_logo.png" width="150">';
							}

							 ?>

   	 <input type="checkbox" name="ubahfoto" value="true">Klik jika ingin ubah foto <br>
  </div>

      <div class="form-group">
    <label>Masukkan Foto Baru</label>
    <input type="file" name="foto">
   
  </div>
  

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="edit" class="btn btn-primary">Save changes</button>
      </div>
        </form>
                </div>
              </div>
            </div>

						</td>
					</tr>
				</tbody>
			</table>
		</div>
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