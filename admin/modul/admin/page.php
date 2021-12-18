<?php include 'comp/header.php'; ?>
<?php 

if (isset($_POST['simpan'])) {
  simpan_admin();
}

if (isset($_POST['hapus'])) {
  hapus_admin();
}

 ?>
<div class="main-content">
	<div class="section__content section__content--p30">
		
	</div>
	<div class="content-wrapper">
	<div class="content-header">
		 <div class="row mb-2">
          <div class="col-sm-6">
           <h3 class="col-sm-6">Data Admin</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
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
<button type="button" class="btn btn-primary mb-5" data-toggle="modal" data-target="#exampleModal">
  Tambah Data Admin
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah data admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body">
      <form action="" method="POST" enctype="multipart/form-data">
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
	  	<table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Kontak</th>
                                                <th>Foto</th>
                                                <th>aksi</th>
                                                
                                            </tr>
                                        </thead>
                                        <?php 
                           

                                            $no = 1;
                                            
                                               foreach (select_admin() as $row):

                                            
                                         ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $row['nama']; ?></td>
                                                <td><?php echo $row['kontak']; ?></td>
                                                <td>
                                                  <?php 

                                                  if ($row['foto'] != "") {
                                                    echo '<img src="img/'.$row['foto'].'" width="150">';
                                                  }else{
                                                    echo '<img src="img/user_logo.png" width="150">';
                                                  }

                                                   ?>
                                                </td>
                                                
                                                    

                                                </td>
                                                <td> 
                                                     <!-- Trigger Modal Hapus -->
                              <div data-toggle="modal" data-target="#hapus-admin<?= $row['id'] ?>">
                              <button type="button" class="btn btn-danger datapotensi" data-toggle="tooltip" title="Hapus">
                              <i class="fa fa-trash"></i>
                              </button>
                              </div>

                              <!-- Modal Hapus -->
                            <form action="" method="POST">
                      <div class="modal fade" id="hapus-admin<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <b><p class="modal-title" id="hapus-admin<?= $row['id'] ?>" style="text-align: center; font-size: 18px;">Apakah anda yakin?</p></b>
                        </div>
                        <div class="modal-body">
                          <div class="modal-body">
                   
                        <p>Nama User</p>
                        <b><p><?= $row['nama']; ?></p></b>

                        <p>Level User</p>
                        <b><p><?= $row['kontak']; ?></p></b>

                        <p>Foto Admin</p>
                                                        <?php 

                                if ($row['foto']!='') {
                                  echo '<img src="img/'.$row['foto'].'" width="150">';
                                  
                                }else{
                                  echo '<img src="img/user_logo.png" width="150">';
                                }



                                 ?>
                        
                       
                        
                       
                          <input type="hidden" name="id" value="<?= $row['id'] ?>" class="form-control" hidden>
                          </div>
                         
                        </div>
                        <div class="modal-footer">
                          <button type="submit" name="hapus" class="btn btn-danger">Hapus</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        </div>
                      </div>
                    </div>
                  </div>
                    </form>


                                                </td>


                                                
                                            </tr>
                                           <?php 
                                          endforeach;
                                            ?>
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