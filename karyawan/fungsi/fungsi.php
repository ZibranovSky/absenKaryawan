<?php 

$koneksi = mysqli_connect('localhost','root','','absenkaryawan');

// --------------------------------------------ADMIN SECTION-----------------------------------------------------------------------------
function panggil_karyawan()
{
	global $koneksi;
	$id  = $_SESSION['idabsen2'];
	return mysqli_query($koneksi, "SELECT * FROM tb_karyawan WHERE id='$id'");
}

function select_admin()
{
	global $koneksi;
	return mysqli_query($koneksi, "SELECT * FROM tb_admin ORDER BY id DESC");
}

function select_admin_2()
{
	global $koneksi;
	$select = mysqli_query($koneksi, "SELECT count(id) AS jadmin FROM tb_admin");
	$r = mysqli_fetch_array($select);
	echo $r['jadmin'];
}

function simpan_admin()
{
	global $koneksi;
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$nama = $_POST['nama'];
	$kontak = $_POST['kontak'];
	$foto = $_FILES['foto']['name'];

	if ($foto!= "") {
		$allowed_ext = array('png','jpg');
		$x = explode(".", $foto);
		$ext = strtolower(end($x));
		$file_tmp = $_FILES['foto']['tmp_name'];
		$angka_acak = rand(1,999);
		$nama_file_baru = $angka_acak.'-'.$foto;
		if (in_array($ext, $allowed_ext)===true) {
			move_uploaded_file($file_tmp, 'img/'.$nama_file_baru);
			$res = mysqli_query($koneksi, "INSERT INTO tb_admin SET username='$username', password='$password', nama='$nama', kontak='$kontak', foto='$nama_file_baru'");

		}
	}else if (empty($_POST['foto'])) {
		$res = mysqli_query($koneksi, "INSERT INTO tb_admin SET username='$username', password='$password', nama='$nama', kontak='$kontak'");
	}
	
}

function hapus_admin()
{
	global $koneksi;
	$id = $_POST['id'];
	$select = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE id='$id'");
	$array = mysqli_fetch_array($select);
	$foto = $array['foto'];

	if ($array['foto'] == "") {
		return mysqli_query($koneksi, "DELETE FROM tb_admin WHERE id='$id'");
	}else{
		unlink("img/$foto");
		return mysqli_query($koneksi, "DELETE FROM tb_admin WHERE id='$id'");
	}
}

function edit_karyawan()
{
	global $koneksi;
	$id = $_POST['id'];
	$nip = $_POST['nip'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$nama = $_POST['nama'];
	$tempat_lahir = $_POST['tempat_lahir'];
	$tanggal_lahir = $_POST['tanggal_lahir'];
	$alamat = $_POST['alamat'];
	$kontak = $_POST['kontak'];
	$foto = $_FILES['foto']['name'];

	// unlink 
	$sql = mysqli_query($koneksi, "SELECT * FROM tb_karyawan WHERE id='$id'");
	$r = mysqli_fetch_array($sql);

	$hapus_foto = $r['foto'];

		if(isset($_POST['ubahfoto']))
	{
		if ($r['foto']=="") 
		{
				if ($foto != "") {
				$allowed_ext = array('png','jpg');
				$x = explode(".", $foto);
				$ekstensi = strtolower(end($x));
				$file_tmp = $_FILES['foto']['tmp_name'];
				$angka_acak = rand(1,999);
		   		$nama_file_baru = $angka_acak.'-'.$foto;
		   		    if (in_array($ekstensi, $allowed_ext) === true) {
		      			move_uploaded_file($file_tmp, '../admin/img/karyawan/'.$nama_file_baru);
		      			$result =  mysqli_query($koneksi, "UPDATE tb_karyawan SET nip='$nip', username='$username', password='$password', nama='$nama', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', alamat='$alamat', kontak='$kontak', foto='$nama_file_baru' WHERE id='$id'");
		      			
		      			
		    }



			}
		}else if ($r['foto']!="") {
			if ($foto != "") {
				$allowed_ext = array('png','jpg');
				$x = explode(".", $foto);
				$ekstensi = strtolower(end($x));
				$file_tmp = $_FILES['foto']['tmp_name'];
				$angka_acak = rand(1,999);
		   		$nama_file_baru = $angka_acak.'-'.$foto;
		   		    if (in_array($ekstensi, $allowed_ext) === true) {
		      			move_uploaded_file($file_tmp, '../admin/img/karyawan/'.$nama_file_baru);
		      			$result =  mysqli_query($koneksi, "UPDATE tb_karyawan SET nip='$nip', username='$username', password='$password', nama='$nama', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', alamat='$alamat', kontak='$kontak', foto='$nama_file_baru' WHERE id='$id'");
		      			if ($result) {
		      				unlink("../admin/img/karyawan/$hapus_foto");
		      			}

		      			
		    }



			}
		}	
	}

	if (empty($_POST['foto'])) {
		return  mysqli_query($koneksi, "UPDATE tb_karyawan SET nip='$nip', username='$username', password='$password', nama='$nama', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', alamat='$alamat', kontak='$kontak' WHERE id='$id'");
	}


}

// -------------------------------------------------ABSEN SECTION----------------------------------------------------------------\\
function simpan_absen()
{
	global $koneksi;
	$nip = $_POST['nip'];
	$nama = $_POST['nama'];
	$tanggal = $_POST['tanggal'];
	$jam = $_POST['jam'];
	$jam2 = $_POST['jam2'];

	// bulan
	$bulan = $_POST['bulan'];
	$tahun = $_POST['tahun'];

	// convert bulan

	if ($bulan == 1) {
		$newBulan = "Januari";
	}else if($bulan == 2){
		$newBulan = "Februari";
	}else if($bulan == 3){
		$newBulan = "Maret";
	}else if($bulan == 4){
		$newBulan = "April";
	}else if($bulan == 5){
		$newBulan = "Mei";
		}else if($bulan == 6){
			$newBulan = "Juni";
		}else if($bulan == 7){
		$newBulan = "Juli";
	}else if($bulan == 8){
		$newBulan = "Agustus";
	}else if($bulan == 9){
		$newBulan = "September";
	}else if($bulan == 10){
		$newBulan = "Oktober";
	}else if($bulan == 11){
		$newBulan = "November";
	}else if($bulan == 12){
		$newBulan = "Desember";
	}

	// Validasi tanggal
	$select = mysqli_query($koneksi, "SELECT * FROM tb_absen WHERE nip='$nip' AND tanggal='$tanggal'");
	$row = mysqli_num_rows($select);

	if ($row) {
		echo '<script>alert("anda sudah absen untuk hari ini, absen lagi besok!")</script>';
	}else{
		echo '<script>alert("terima kasih")</script>';
		$res =  mysqli_query($koneksi, "INSERT INTO tb_absen SET nip='$nip', nama='$nama', tanggal='$tanggal', bulan='$newBulan', tahun='$tahun', keterangan='null', kehadiran='Hadir', alasan='null', foto='null', jam='$jam', jam2='$jam2'");
	}
}

function simpan_keterangan()
{
	global $koneksi;
	$nip = $_POST['nip'];
	$nama = $_POST['nama'];
	$keterangan = $_POST['keterangan'];
	$alasan = $_POST['alasan'];
	$tanggal = $_POST['tanggal'];
	// Bulan dan tahun

	// bulan
	$bulan = $_POST['bulan'];
	$tahun = $_POST['tahun'];

	// convert bulan

	if ($bulan == 1) {
		$newBulan = "Januari";
	}else if($bulan == 2){
		$newBulan = "Februari";
	}else if($bulan == 3){
		$newBulan = "Maret";
	}else if($bulan == 4){
		$newBulan = "April";
	}else if($bulan == 5){
		$newBulan = "Mei";
		}else if($bulan == 6){
			$newBulan = "Juni";
		}else if($bulan == 7){
		$newBulan = "Juli";
	}else if($bulan == 8){
		$newBulan = "Agustus";
	}else if($bulan == 9){
		$newBulan = "September";
	}else if($bulan == 10){
		$newBulan = "Oktober";
	}else if($bulan == 11){
		$newBulan = "November";
	}else if($bulan == 12){
		$newBulan = "Desember";
	}

	// end bulan dan tahun

	$jam = $_POST['jam'];
	$jam2 = $_POST['jam2'];
	$foto = $_FILES['foto']['name'];

	if ($foto!= "") {
		$allowed_ext = array('png','jpg');
		$x = explode(".", $foto);
		$ext = strtolower(end($x));
		$file_tmp = $_FILES['foto']['tmp_name'];
		$angka_acak = rand(1,999);
		$nama_file_baru = $angka_acak.'-'.$foto;
		if (in_array($ext, $allowed_ext)===true) {
			move_uploaded_file($file_tmp, '../admin/img/karyawan/'.$nama_file_baru);
			$select_ket = mysqli_query($koneksi, "SELECT * FROM tb_absen WHERE nip = '$nip' AND tanggal='$tanggal'");
			$check_ket = mysqli_num_rows($select_ket);
			if ($check_ket) {
				echo '<script>alert("mohon maaf, anda sudah memberi keterangan tidak hadir untuk hari ini!")</script>';
			}else{
				$res = mysqli_query($koneksi, "INSERT INTO tb_absen SET nip='$nip', nama='$nama', tanggal='$tanggal', bulan='$newBulan', tahun='$tahun', keterangan='$keterangan', alasan='$alasan', foto='$nama_file_baru', jam='$jam', jam2='$jam2'");
			}
			

		}
	}
}
// ----------------------------------------FUNCTION URL, KEEP IT BELOW!!------------------------------------------------------------------
function url()
{
	return $url = "//localhost/absenKaryawan-master/assets/";

}

 ?>