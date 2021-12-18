<?php 
session_start();
include_once 'sesi.php';
$nama_app = " | Absensi Karyawan";
$modul =  (isset($_GET['m']))?$_GET['m']:"awal";
switch ($modul) {
	case 'awal': default: $judul = "Dashboard $nama_app"; include 'awal.php'; break;
	case 'admin': include 'modul/admin/index.php'; break;
	case 'akun': $judul="Profil Admin $nama_app"; include 'modul/admin/akun.php'; break;
	case 'karyawan': $judul = "Data Karyawan $nama_app"; include 'modul/karyawan/index.php'; break;
	case 'absen': $judul = "Data Absen $nama_app"; include 'modul/absen/index.php'; break;
	case 'setting': $judul = "Pengaturan $nama_app;"; include 'modul/pengaturan/page.php'; break;
	case 'keterangan': $judul = "Data keterangan $nama_app"; include 'modul/keterangan/page.php'; break;
	
}

 ?>