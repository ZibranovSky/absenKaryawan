<?php 

include 'sesi.php';
$modul =  (isset($_GET['s']))?$_GET['s']:"awal";
$nama_app = " | Absensi Karyawan";
switch ($modul) {
	case 'page': default; $judul="Data admin $nama_app"; include 'page.php'; break;

}



 ?>