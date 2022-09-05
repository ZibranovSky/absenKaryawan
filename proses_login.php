<?php 

include 'admin/fungsi/fungsi.php';

if (isset($_POST['login'])) {
	global $koneksi;
	$user = $_POST['username'];
	$pass = md5($_POST['password']);
	$typeuser = $_POST['typeuser'];

	if ($typeuser == "admin") {
		$select_a = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE username='$user' AND password='$pass'");
		$fr = mysqli_fetch_array($select_a);
		$cek_a = mysqli_num_rows($select_a);

		if ($cek_a>0) {
			session_start();
	  		$_SESSION['idabsensiadmin'] = $fr['id'];
	  		header('location: admin/index.php?m=awal');
		}else{
			echo "password salah";
		}
	}else if ($typeuser == "karyawan"){
		global $koneksi;
		$select_k = mysqli_query($koneksi, "SELECT * FROM tb_karyawan WHERE username='$user' AND password = '$pass'");
		$fk = mysqli_fetch_array($select_k);
		$cek_k = mysqli_num_rows($select_k);

		if ($cek_k>0) {
			session_start();
			$_SESSION['idabsensikaryawan'] = $fk['id'];
			header("location: karyawan/index.php?awal");
		}else{
			echo "password salah";
		}
	}
}

 ?>