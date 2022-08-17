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
           <h3 class="col-sm-6">Rekap Absen</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Rekap Absen</li>
            </ol>
          </div><!-- /.col -->
            <div class="col-sm-3 ml-3">

           		<form action="" method="POST">
           			 <div class="col-sm">
				    	<label>Bulan : </label>
           			<select name="bulan" class="form-control">
           				<option>--Pilih Bulan--</option>
           				<option value="Januari">Januari</option>
           				<option value="Februari">Februari</option>
           				<option value="Januari">Maret</option>
           				<option value="Januari">April</option>
           				<option value="Januari">Mei</option>
           				<option value="Juni">Juni</option>
           				<option value="Juli">Juli</option>
           				<option value="Agustus">Agustus</option>
           				<option value="September">September</option>
           				<option value="Oktober">Oktober</option>
           				<option value="November">November</option>
           				<option value="Desember">Desember</option>
           			</select>
				    </div>
				    <div class="col-sm">
				    <label>Tahun</label>
           				<input type="text" class="form-control" placeholder="masukkan tahun" name="tahun">
				    </div>
				    <div class="col-sm mt-2">
				  
           				<button type="submit" name="cari" class="btn btn-primary">Proses</button>
				    </div>
           			
           		</form>
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

<?php 
	
	$koneksi = mysqli_connect('localhost','root','','absenkaryawan');
	if (isset($_POST['cari'])) {
		$bulan = $_POST['bulan'];
		$tahun = $_POST['tahun'];

			$query = mysqli_query($koneksi, "SELECT * FROM tb_absen WHERE bulan='$bulan' AND tahun='$tahun'");
		$check = mysqli_num_rows($query);

		if ($check) {
			include 'table_rekap.php';
		}else{
			echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Mohon Maaf!</strong> Data Tidak Ditemukan
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
		}

		
	}

 ?>

		</div>
	</section>

</div>

</div>
<?php include 'comp/footer.php'; ?>