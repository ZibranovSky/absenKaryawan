<?php include 'comp/header.php'; ?>
<?php 

if (isset($_POST['ubah'])) {
	ubah_jam_masuk();
}

if (isset($_POST['ubah_jam_keluar'])) {
	ubah_jam_keluar();
}


 ?>
<div class="main-content">
	<div class="section__content section__content--p30">
		
	</div>
	<div class="content-wrapper">
	<div class="content-header">
		 <div class="row mb-2">
          <div class="col-sm-6">
           <h3 class="col-sm-8">Pengaturan Aplikasi</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Pengaturan</li>
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
<?php 

global $koneksi;
$select = mysqli_query($koneksi, "SELECT * FROM jam_masuk");
foreach ($select as $jammasuk):

 ?>

<!-- Tabel -->
<div class="row">
	<div class="col-sm-12">
		<div class="table-responsive">
			<table class="table-responsive table-borderless table-earning">
				<form action="" method="POST">
				<tbody>
					<tr>
					<td><b>Jam Masuk</b></td>
					<td>
						<input type="text" name="id" value="<?=$jammasuk['id'];?>" hidden>
						<input type="text" name="jam_masuk" class="form-control" placeholder="Contoh : 0900" value="<?='0'.number_format($jammasuk['jam_masuk'], 2, '.', '' );?>">
					</td>
					</tr>
				
	
					<tr>
						<td>

								
			                  <button type="submit" class="btn btn-info datapotensi" name="ubah" data-toggle="tooltip" title="Edit">
			                    <i class="fa fa-edit"></i>
			                  </button>
			                </form>
			            <?php endforeach; ?>

                <!-- modal edit akun -->

                 <!-- Modal edit -->


						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="row">
				<div class="col-sm-12"><br>
					<!-- Button trigger modal -->
<?php 

global $koneksi;
$select = mysqli_query($koneksi, "SELECT * FROM jam_keluar");
foreach ($select as $jamkeluar):

 ?>

<!-- Tabel -->
<div class="row">
	<div class="col-sm-12">
		<div class="table-responsive">
			<table class="table-responsive table-borderless table-earning">
				<form action="" method="POST">
				<tbody>
					<tr>
					<td><b>Jam Keluar</b></td>
					<td>
						<input type="text" name="id" value="<?=$jamkeluar['id'];?>" hidden>
						<input type="text" name="jam" class="form-control" placeholder="Contoh : 0900" value="<?= '0'.number_format($jamkeluar['jam'],2,'.','');?>">
					</td>
					</tr>
				
	
					<tr>
						<td>

								
			                  <button type="submit" class="btn btn-info datapotensi" name="ubah_jam_keluar" data-toggle="tooltip" title="Edit">
			                    <i class="fa fa-edit"></i>
			                  </button>
			                </form>
			            <?php endforeach; ?>

                <!-- modal edit akun -->

                 <!-- Modal edit -->


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
