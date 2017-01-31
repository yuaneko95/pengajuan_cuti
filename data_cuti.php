 <!DOCTYPE html>
 <html>
 <head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title></title>
   <link rel="stylesheet" href="">
   <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
 </head>
 <body>
   <?php include 'header.php'; ?>
   <?php include 'koneksi.php'; ?>

   <div class="container body">
      <div class=" main_container">
        <div class="right_col" role="main">
           <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><strong>List Data Cuti Pegawai</strong></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>

                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="col-md-2 col-sm-3 col-xs-3">
                    <form action="filter.php" method="post" accept-charset="utf-8">
                    <h5>view by month</h5>
                    <select name="bulan" class="form-control">
                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="12">November</option>
                        <option value="12">Desember</option>
                      </select>
                      <input type="submit" name="cari" value="cari" class="btn btn-primary">
                    </form>
                  </div>
                    
                  <div class="x_content">
                    <div class="table-responsive">
                      <table class="table table-bordered" >
                      <tr>
                        <th><strong>NO</strong></th>
                        <!-- <th><strong>JENIS CUTI</strong></th> -->
                        <th><strong>TGL PENGAJUAN</strong></th>
                        <!-- <th><strong>LAMA CUTI</strong></th> -->
                        <th><strong>MULAI CUTI</strong></th>
                        <th><strong>AKHIR CUTI</strong></th>
                        <th><strong>ALASAN CUTI</strong></th>
                        <th><strong>STATUS</strong></th>
                        <th>ACTION</th>
                      </tr>  
                      <?php $no=0; 
                          $id_pegawai = $_SESSION['id_pegawai'];
                          $sql = "SELECT id_pcuti,status, tgl_pengajuan, tgl_mulai_cuti,tgl_akhir_cuti, alasan 
                                  FROM permohonan_cuti
                                  INNER JOIN pegawai ON pegawai.id_pegawai = permohonan_cuti.id_pegawai
                                  
                                  WHERE pegawai.id_pegawai = '$id_pegawai'";
                          $s = mysqli_query($conn, $sql) or die (mysqli_error($conn));
                          while ($tmp = mysqli_fetch_assoc($s)) {  
                            $no++
                      ?>
                      <tr>
                          <td><?php echo $no; ?></td>
                          <!-- <td><?php echo $tmp['nama_cuti']; ?></td> -->
                          <td><?php echo $tmp['tgl_pengajuan']; ?></td>
                          <!-- <td><?php echo $tmp['lama_cuti']; ?></td> -->
                          <td><?php echo $tmp['tgl_mulai_cuti']; ?></td>
                          <td><?php echo $tmp['tgl_akhir_cuti']; ?></td>
                          <td><?php echo $tmp['alasan']; ?></td>
                          <td><?php echo $tmp['status']; ?></td>
                          <td>
                            <a href="cetak_cuti.php?&id_pcuti=<?php echo $tmp['id_pcuti']; ?>" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-print"></i> cetak</a>
                          </td>
                      </tr>
                      <?php } ?>
                    </table>

                    </div>
                  </div>
                </div>
              </div>
            </div>

       
          </div>  
        </div>
      </div>
   </div>
   <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="vendors/Flot/jquery.flot.js"></script>
    <script src="vendors/Flot/jquery.flot.pie.js"></script>
    <script src="vendors/Flot/jquery.flot.time.js"></script>
    <script src="vendors/Flot/jquery.flot.stack.js"></script>
    <script src="vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
   <!--  <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script> -->
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
    
    
  </body>
</html>
