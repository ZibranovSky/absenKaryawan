<?php require 'fungsi/fungsi.php'; ?>
<?php foreach (panggil_karyawan() as $adm): ?>
    <?php 

    date_default_timezone_set("Asia/Jakarta");
  $tanggalSekarang = date("d-m-Y");
  $jamSekarang = date("h:i a")

     ?>
    

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title><?=$judul;?></title>

    <!-- Fontfaces CSS-->
    <link href="<?=url()?>css/w3.css" rel="stylesheet" media="all">
    <link href="<?=url()?>css/font-face.css" rel="stylesheet" media="all">
    <link href="<?=url()?>vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?=url()?>vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?=url()?>vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- ICON -->
    <link rel="icon" href="<?=url()?>images/logo_absensi.png" type="image/png">
    <!-- Bootstrap CSS-->
    <link href="<?=url()?>vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- <?=url()?>Vendor CSS-->
    <link href="<?=url()?>vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?=url()?>vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?=url()?>vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?=url()?>vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?=url()?>vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="<?=url()?>vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?=url()?>vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link href="<?=url()?>vendor/vector-map/jqvmap.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?=url()?>css/theme.css" rel="stylesheet" media="all">

    <style type="text/css">
     

.clock, .tanggal {
  
    color: #3632a8;
    font-size: 15pt;
    font-family: consolas;
    letter-spacing: 7px;
    /*margin-bottom: -1px;*/
    


}
    </style>

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar2">
            <div class="logo">
                <a href="#">
                      <img src="<?=url()?>images/icon/logo-white.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                  
                    <div class="tanggal"><?=$tanggalSekarang;?></div>
                    <div class="image img-cir img-120">
                        <?php 

                        if ($adm['foto']!='') {
                            echo '<img src="../admin/img/karyawan/'.$adm['foto'].'">';
                        }else{
                             echo '<img src="../admin/img/user_logo.png">';
                        }

                         ?>
                      
                    </div>
                    <h4 class="name"><?=$adm['nama'];?></h4>
                    <a href="logout.php"><button class="btn btn-danger">Sign out</button></a><br>
                      <div id="MyClockDisplay" class="clock col-sm-20" onload="showTime()"></div>
                </div>
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="index.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard
                             <!--    <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span> -->
                            </a>
                           <!--  <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="index.html">
                                        <i class="fas fa-tachometer-alt"></i>Dashboard 1</a>
                                </li>
                                <li>
                                    <a href="index2.html">
                                        <i class="fas fa-tachometer-alt"></i>Dashboard 2</a>
                                </li>
                                <li>
                                    <a href="index3.html">
                                        <i class="fas fa-tachometer-alt"></i>Dashboard 3</a>
                                </li>
                                <li>
                                    <a href="index4.html">
                                        <i class="fas fa-tachometer-alt"></i>Dashboard 4</a>
                                </li>
                            </ul> -->
                        </li>
                          
                      
                            </ul>
                        </li>
                    </ds>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop2">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap2">
                            <div class="logo d-block d-lg-none">
                                <a href="#">
                                    <img src="<?=url()?>images/icon/logo-white.png" alt="CoolAdmin" />
                                </a>
                            </div>
                            <div class="header-button2">
                 
                                <div class="header-button-item has-noti js-item-menu">
                                    
                                    
                                </div>
                                <div class="header-button-item mr-0 js-sidebar-btn">
                                    <i class="zmdi zmdi-menu"></i>
                                </div>
                                <div class="setting-menu js-right-sidebar d-none d-lg-block">
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="index.php?m=akun">
                                                <i class="zmdi zmdi-account"></i>Account</a>
                                        </div>
                                       
                                        
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <aside class="menu-sidebar2 js-right-sidebar d-block d-lg-none">
                <div class="logo">
                    <a href="#">
                    

                    </a>
                </div>
                <div class="menu-sidebar2__content js-scrollbar2">
                    <div class="account2">

                          <div class="tanggal"><?=$tanggalSekarang;?></div> 
                          <div id="MyClockDisplay2" class="clock col-sm-20" onload="showTime2()"></div>
                        <div class="image img-cir img-120">
                                 <?php 

                        if ($adm['foto']!='') {
                            echo '<img src="../admin/img/karyawan/'.$adm['foto'].'">';
                        }else{
                             echo '<img src="../admin/img/user_logo.png">';
                        }

                         ?>
                        </div>
                        <h4 class="name"><?= $adm['nama']; ?></h4>
                    <a href="logout.php"><button class="btn btn-danger">Sign out</button></a> 

                    </div>
                    <nav class="navbar-sidebar2">
                        <ul class="list-unstyled navbar__list">
                            <li class="active has-sub">
                                <a class="js-arrow" href="index.php">
                                    <i class="fas fa-tachometer-alt"></i>Dashboard
                                
                                </a>
                                <div class="account-dropdown__item">
                                            <a href="index.php?m=akun">
                                                <i class="zmdi zmdi-account"></i>Account</a>
                                        </div>
                               <!--  <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="index.html">
                                            <i class="fas fa-tachometer-alt"></i>Dashboard 1</a>
                                    </li>
                                    <li>
                                        <a href="index2.html">
                                            <i class="fas fa-tachometer-alt"></i>Dashboard 2</a>
                                    </li>
                                    <li>
                                        <a href="index3.html">
                                            <i class="fas fa-tachometer-alt"></i>Dashboard 3</a>
                                    </li>
                                    <li>
                                        <a href="index4.html">
                                            <i class="fas fa-tachometer-alt"></i>Dashboard 4</a>
                                    </li>
                                </ul> -->
                            </li>
                           
                         
                           
               
                        </ul>
                    </nav>
                </div>
            </aside>
            <!-- END HEADER DESKTOP-->
            <?php endforeach; ?>