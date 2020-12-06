<?php 

include 'sesi.php';
$nama_app = " | Absensi Karyawan";
$modul = (isset($_GET['s']))?$_GET['s']:"awal";
switch ($modul) {
	case 'page': default: $judul=" Data Karyawan $nama_app"; include 'page.php'; break;
	case 'delete': include 'delete.php'; break;
	
}


 ?>