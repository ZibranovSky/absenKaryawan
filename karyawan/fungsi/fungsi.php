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

	// Validasi tanggal
	$select = mysqli_query($koneksi, "SELECT * FROM tb_absen WHERE nip='$nip' AND tanggal='$tanggal'");
	$row = mysqli_num_rows($select);

	if ($row) {
		echo '<script>alert("anda sudah absen untuk hari ini, absen lagi besok!")</script>';
	}else{
		echo '<script>alert("terima kasih")</script>';
		$res =  mysqli_query($koneksi, "INSERT INTO tb_absen SET nip='$nip', nama='$nama', tanggal='$tanggal', jam='$jam', jam2='$jam2'");
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
	$jam = $_POST['jam'];
	$foto = $_FILES['foto']['name'];

	if ($foto!= "") {
		$allowed_ext = array('png','jpg');
		$x = explode(".", $foto);
		$ext = strtolower(end($x));
		$file_tmp = $_FILES['foto']['tmp_name'];
		$angka_acak = rand(1,999);
		$nama_file_baru = $angka_acak.'-'.$foto;
		if (in_array($ext, $allowed_ext)===true) {
			move_uploaded_file($file_tmp, '../admin/img/keterangan/'.$nama_file_baru);
			echo '<script>alert("terima kasih, anda sudah memberi keterangan")</script>';
			$res = mysqli_query($koneksi, "INSERT INTO tb_keterangan SET nip='$nip', nama='$nama', keterangan='$keterangan', alasan='$alasan', tanggal='$tanggal', jam='$jam', foto='$nama_file_baru'");

		}
	}
}
// ----------------------------------------FUNCTION URL, KEEP IT BELOW!!------------------------------------------------------------------
function url()
{
	return $url = "//localhost/absenKaryawan-master/assets/";

}

 ?>