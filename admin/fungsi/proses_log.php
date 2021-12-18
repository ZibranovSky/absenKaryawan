<?php 

class login_web
{
	public $koneksi;
	public function login()
	{
		$this->koneksi;
		$user = $_POST['user'];
		$pass = md5($_POST['pass']);

		// proses masuk
		$login = mysqli_query($this->koneksi, "SELECT * FROM tb_admin WHERE username = '$user' AND password = '$pass'");
		$cek = mysqli_num_rows($login);
		$r = mysqli_fetch_array($login);
		// jika ketemu

		if ($cek > 0) {
			
			session_start();
			$_SESSION['idabsen'] = $r['id'];
			$_SESSION['userabsen'] = $r['username'];
			$_SESSION['passabsen'] = $r['password'];
			$_SESSION['namaabsen'] = $r['nama'];
			$_SESSION['kontakabsen'] = $r['kontak'];
			$_SESSION['fotoabsen'] = $r['foto'];
			header("location: index.php?m=awal");
		}else{
			echo '<script>alert("Maaf, coba lagi")</script>';
		}
	}
}

$pro = new login_web();
$pro->koneksi = mysqli_connect('localhost', 'root', '', 'absenKaryawan');

 ?>