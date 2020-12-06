<?php 

$koneksi = mysqli_connect('localhost','root','','absenkaryawan');

// --------------------------------------------ADMIN SECTION-----------------------------------------------------------------------------
function panggil_admin()
{
	global $koneksi;
	$id  = $_SESSION['idabsen'];
	return mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE id='$id'");
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

function edit_admin()
{
	global $koneksi;
	$id = $_POST['id'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$nama = $_POST['nama'];
	$kontak = $_POST['kontak'];
	$foto = $_FILES['foto']['name'];

	// unlink 
	$sql = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE id='$id'");
	$r = mysqli_fetch_array($sql);

	$hapus_foto = $r['foto'];

		if(isset($_POST['ubahfoto']))
	{
		if ($row['foto']=="") 
		{
				if ($foto != "") {
				$allowed_ext = array('png','jpg');
				$x = explode(".", $foto);
				$ekstensi = strtolower(end($x));
				$file_tmp = $_FILES['foto']['tmp_name'];
				$angka_acak = rand(1,999);
		   		$nama_file_baru = $angka_acak.'-'.$foto;
		   		    if (in_array($ekstensi, $allowed_ext) === true) {
		      			move_uploaded_file($file_tmp, 'img/'.$nama_file_baru);
		      			$result =  mysqli_query($koneksi, "UPDATE tb_admin SET username='$username', password='$password', nama='$nama', kontak='$kontak', foto='$nama_file_baru' WHERE id='$id'");
		      			
		      			
		    }



			}
		}else if ($row['foto']!="") {
			if ($foto != "") {
				$allowed_ext = array('png','jpg');
				$x = explode(".", $foto);
				$ekstensi = strtolower(end($x));
				$file_tmp = $_FILES['foto']['tmp_name'];
				$angka_acak = rand(1,999);
		   		$nama_file_baru = $angka_acak.'-'.$foto;
		   		    if (in_array($ekstensi, $allowed_ext) === true) {
		      			move_uploaded_file($file_tmp, 'img/'.$nama_file_baru);
		      			$result =  mysqli_query($koneksi, "UPDATE tb_admin SET username='$username', password='$password', nama='$nama', kontak='$kontak', foto='$nama_file_baru' WHERE id='$id'");
		      			if ($result) {
		      				unlink("img/$hapus_foto");
		      			}

		      			
		    }



			}
		}	
	}

	if (empty($_POST['foto'])) {
		return  mysqli_query($koneksi, "UPDATE tb_admin SET username='$username', password='$password', nama='$nama', kontak='$kontak' WHERE id='$id'");
	}


}

// ---------------------------------------------KARYAWAN SECTION------------------------------------------------------------

function simpan_karyawan()
{
	global $koneksi;
	$nip = $_POST['nip'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$nama = $_POST['nama'];
	$tempat_lahir = $_POST['tempat_lahir'];
	$tanggal_lahir = $_POST['tanggal_lahir'];
	$alamat = $_POST['alamat'];
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
			move_uploaded_file($file_tmp, 'img/karyawan/'.$nama_file_baru);
			$res = mysqli_query($koneksi, "INSERT INTO tb_karyawan SET nip='$nip', username='$username', password='$password', nama='$nama', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', alamat='$alamat', kontak='$kontak', foto='$nama_file_baru'");

		}
	}else if (empty($_POST['foto'])) {
		$res = mysqli_query($koneksi, "INSERT INTO tb_karyawan SET nip='$nip', username='$username', password='$password', nama='$nama', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', alamat='$alamat', kontak='$kontak'");
	}
}

function hapus_karyawan()
{
	error_reporting(0);
	global $koneksi;
	$id = $_POST['id'];

	// proses unlink foto
	$select = mysqli_query($koneksi, "SELECT * FROM tb_karyawan WHERE id='$id'");
	$r = mysqli_fetch_array($select);
	$hapus_foto = $r['foto'];

	if ($r['foto'] != "") {
		unlink("img/karyawan/$hapus_foto");
		return mysqli_query($koneksi, "DELETE FROM tb_karyawan WHERE id='$id'");
	}else{
		return mysqli_query($koneksi, "DELETE FROM tb_karyawan WHERE id='$id'");
	}
}

function select_karyawan()
{
	global $koneksi;
	return mysqli_query($koneksi, "SELECT * FROM tb_karyawan");
}

function select_karyawan_2()
{
	global $koneksi;
	$select = mysqli_query($koneksi, "SELECT count(id) AS jkaryawan FROM tb_karyawan");
	$r = mysqli_fetch_array($select);
	echo $r['jkaryawan'];

}
// ----------------------------------------SETTING SECTION-------------------------------------------------------------------------------\\
function ubah_jam_masuk()
{
	global $koneksi;
	$id = $_POST['id'];
	$jam_masuk = $_POST['jam_masuk'];

	$update = mysqli_query($koneksi, "UPDATE jam_masuk SET jam_masuk = '$jam_masuk' WHERE id='$id'");
	if ($update) {
		echo '<script>alert("ubah jam masuk berhasil!")</script>';
	}
}

// ------------------------------------------------------------ABSEN SECTION------------------------------------------------------------\\
function select_absen()
{
	global $koneksi;
	date_default_timezone_set("Asia/Jakarta");
  	$tanggalSekarang = date("d-m-Y");
 
	$select = mysqli_query($koneksi, "SELECT count(id) AS jabsen FROM tb_absen WHERE tanggal = '$tanggalSekarang'");
	$r = mysqli_fetch_array($select);
	echo $r['jabsen'];
}

function hapus_absen()
{
	global $koneksi;
	$id = $_POST['id'];
	return mysqli_query($koneksi, "DELETE FROM tb_absen WHERE id='$id'");
}

// ----------------------------------------KETERANGAN SECTION---------------------------------------------------------------------------\\
function select_keterangan()
{
	global $koneksi;
	$select = mysqli_query($koneksi, "SELECT count(id) AS jket FROM tb_keterangan");
	$row = mysqli_fetch_array($select);
	echo $row['jket'];
}

function hapus_keterangan()
{
	global $koneksi;
	$id = $_POST['id'];

	// hapus foto
	$select = mysqli_query($koneksi, "SELECT * FROM tb_keterangan WHERE id='$id'");
	$r = mysqli_fetch_array($select);
	$hapus_foto = $r['foto'];

	unlink("img/keterangan/$hapus_foto");
	$delete = mysqli_query($koneksi, "DELETE FROM tb_keterangan WHERE id='$id'");

	if ($delete) {
		echo '<script>alert("data sudah dihapus!")</script>';
	}


}
// ----------------------------------------FUNCTION URL, KEEP IT BELOW!!------------------------------------------------------------------
function url()
{
	return $url = "//localhost/absenKaryawan-master/assets/";

}

 ?>