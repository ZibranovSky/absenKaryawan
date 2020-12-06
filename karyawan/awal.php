<?php include 'comp/header.php'; ?>
<?php 

date_default_timezone_set("Asia/Jakarta");
  $tanggalSekarang = date("d-m-Y");
  $jam2 = date("hi");
  $jamSekarang = date("h:i a");

if (isset($_POST['simpan'])) {

	simpan_absen();

}

if (isset($_POST['simpan_ket'])) {
	simpan_keterangan();
}
 ?>
<div class="main-content">
	<div class="section__content section__content--p30">
		
	</div>
	<div class="content-wrapper">
	<div class="content-header">
		 <div class="row mb-2">
          <div class="col-sm-6">
           <h3 class="col-sm-10">Silahkan Absen, <?php echo $adm['nama']; ?>!</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Absen</li>
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
			<table class="table-responsive table-borderless table-earning" border="10">
				<form action="" method="POST">
					<tr>
						<td>NIP : </td>
						<td><?=$adm['nip'];?>
							<input type="text" hidden name="nip" value="<?=$adm['nip'];?>">
							
						</td>

						
					</tr>
					<tr>
						<td>Nama : </td>
						<td><?=$adm['nama'];?>
							<input type="text" name="nama" hidden value="<?=$adm['nama'];?>">
							<input type="text" name="tanggal" hidden value="<?=$tanggalSekarang;?>">
							<input type="text" name="jam" hidden value="<?=$jamSekarang;?>">
              <input type="text" value="<?=$jam2;?>" hidden name="jam2">
						</td>
					</tr>

					<tr>
						<td><button type="submit" name="simpan" class="btn btn-success" onclick="return confirm('ingin absen?')">Absen</button></td>

					</tr>

				</form>
				<tbody>
					</tbody>
			</table>
		</div><br>
		<div class="mt-10">
			<button class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">Klik tombol ini jika tidak hadir / absen</button>
			<!-- Modal keterangan -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Masukkan Keterangan Anda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body">
      <form action="" method="POST" enctype="multipart/form-data">
      	<div class="form-group">
          <label><b>NIP : </b></label><br>
          <?=$adm['nip'];?>
          <input type="text" class="form-control" hidden value="<?=$adm['nip'];?>" name="nip">
        </div>
      
         <div class="form-group">
          <label><b>Nama : </b></label><br>
          <?=$adm['nama'];?>
          <input type="text" class="form-control" hidden value="<?=$adm['nama'];?>" name="nama">
        </div>
         <div class="form-group">
          <label>Keterangan</label>
          <select name="keterangan" class="form-control">
          	<option>Ijin</option>
          	<option>Sakit</option>
          </select>
        </div>
           <div class="form-group">
          <label>Alasan</label>
          <textarea name="alasan" class="form-control"></textarea>
        </div>

          <input type="text" hidden name="tanggal" value="<?=$tanggalSekarang;?>">
          <input type="text" hidden name="jam" value="<?=$jamSekarang;?>">

         <div class="form-group">
          <label>Foto Bukti / Surat Keterangan</label>
          <input type="file" class="form-control" name="foto">
        </div>
        <div class="modal-footer">
        <button type="submit" name="simpan_ket" class="btn btn-primary">Save changes</button>
        <button type="cancel" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>
     
    </div>
      
    </div>
  </div>
</div>
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