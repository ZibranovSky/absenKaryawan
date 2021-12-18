<?php 

session_start();
include 'sesi.php';
$nama_app = " | Absensi Karyawan";
$modul = (isset($_GET['m']))?$_GET['m']:"awal";
switch ($modul) {
	case 'awal': default: $judul = "Absen $nama_app"; include 'awal.php'; break;
	case 'akun': $judul="Profil Admin $nama_app"; include 'modul/karyawan/akun.php'; break;
	
	
	
}




 ?>