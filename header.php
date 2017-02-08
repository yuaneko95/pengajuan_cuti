<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
    <script type="text/javascript" src="dist/sweetalert.min.js"></script>

    <!-- Bootstrap -->
  <!--   <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- Font Awesome -->
    <!-- <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet"> -->
    <!-- NProgress -->
    <!-- <link href="vendors/nprogress/nprogress.css" rel="stylesheet"> -->
    <!-- iCheck -->
<!--     <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet"> -->
    <!-- bootstrap-progressbar -->
    <!-- <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet"> -->
    <!-- JQVMap -->
    <!-- <link href="vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/> -->
    <!-- bootstrap-daterangepicker -->
    <!-- <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet"> -->

    <!-- Custom Theme Style -->
<!--     <link href="build/css/custom.min.css" rel="stylesheet"> -->
  </head>

  <body class="nav-md">
 <?php 
    session_start();
    include 'admin/koneksi.php';
    if ($_SESSION['status_pegawai'] != 'pegawai') {
      header('location:login.php');
    } else {
  ?>
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><img src="admin/img/gnfi_logo.png" style="width: 30px; height: 30px; padding-left: 5px;" alt=""> <span>GNFI Dashboard</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
              <?php  
               $id_pegawai = $_SESSION['id_pegawai'];
               $sql = mysqli_query($conn,"SELECT * FROM pegawai WHERE id_pegawai = '$id_pegawai'") or die(mysqli_error($conn));
               while ($b = mysqli_fetch_assoc($sql)) {
              ?>
                <img src="<?php echo"admin/img/".$b['foto']; ?>" alt="..." class="img-circle profile_img">
                <?php } ?>
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php session_start(); echo $_SESSION['username']; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Home </span></a>
                  </li>
                  <li><a><i class="fa fa-tasks"></i> Master Data <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="ajukan_cuti.php" title="">Ajukan Cuti</a></li>
                      <li><a href="ajukan_barang.php" title="">Ajukan Barang</a></li>
                      <li><a href="data_cuti.php" title="">Data Cuti</a></li>
                      <li><a href="data_barang.php" title="">Data Barang</a></li>
                      <li><a href="profil.php" title="">Profile</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                   <?php session_start(); echo $_SESSION['username']; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="ubah_password.php?&id_pegawai=<?php echo $_SESSION['id_pegawai']; ?>">Ganti Password</a></li>
                    <li><a href="proses/logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

       

      </div>
    </div>

  <script>
  function normal () {
  alert("Normal Alert!");
  }
  function sweet (){
  swal("Maaf men jatah cuti anda sudah habis!", "You clicked the button!", "success");
  }
  </script>
  </body>
  <?php }?>
</html>
