<?php 
require 'fungsi.php';
if (isset($_POST['login'])) {
	$user = $_POST['user'];
	$pass = md5($_POST['pass']);

	$query = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE username = '$user' AND password = '$pass'");
	$fr = mysqli_fetch_array($query);
	$cek = mysqli_num_rows($query);

	if ($cek>0) {
	  	session_start();
	  	$_SESSION['idabsensiadmin'] = $fr['id'];
	  	header('location: ../index.php?m=awal');

	  }else{
	  	 echo 'password salah';
	  }
}


 ?>