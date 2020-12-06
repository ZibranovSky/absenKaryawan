<?php 
session_start();
unset($_SESSION['idabsen']);
unset($_SESSION['userabsen']);
unset($_SESSION['passabsen']);
unset($_SESSION['namaabsen']);
unset($_SESSION['kontakabsen']);
unset($_SESSION['fotoabsen']);
header("location: ../");

 ?>