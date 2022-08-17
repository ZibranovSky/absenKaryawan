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
			
			
			$_SESSION['idabsenAdmin'] = $r['idadmin'];
			
			header("location: index.php?m=awal");
		}else{
			echo '<script>alert("Maaf, coba lagi")</script>';
		}
	}
}

$pro = new login_web();
$pro->koneksi = mysqli_connect('localhost','root','','absenKaryawan');

 ?>