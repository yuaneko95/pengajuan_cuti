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
                    <h2><strong>List Data Pengajuan Pegawai</strong></h2>
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

                  <div class="x_content">
                    <div class="table-responsive">
                      <table class="table table-bordered" >
                      <tr>
                        <th><strong>NO</strong></th>
                        <th><strong>NAMA PEGAWAI</strong></th>
                        <th><strong>TGL PENGAJUAN</strong></th>
                        <!-- <th><strong>LAMA CUTI</strong></th> -->
                        <th><strong>KATEGORI BARANG</strong></th>
                        <th><strong>NAMA BARANG</strong></th>
                        <th><strong>BERKAS</strong></th>
                        
                        <th><strong>ALASAN CUTI</strong></th>
                        <th><strong>STATUS</strong></th>
                        <th colspan="2"><center>ACTION</center></th>
                      </tr>  
                      <?php $no=0; 
                          $sql = "SELECT id_pbarang,status,nama_pegawai,kategori,nama_barang ,tgl_pengajuan,berkas ,alasan 
                                  FROM pengadaan_barang
                                  INNER JOIN pegawai ON pegawai.id_pegawai = pengadaan_barang.id_pegawai
                                  INNER JOIN kategori_barang ON kategori_barang.id_kategori=pengadaan_barang.id_kategori
                                  ";
                          $s = mysqli_query($conn, $sql) or die (mysqli_error($conn));
                          while ($tmp = mysqli_fetch_assoc($s)) {  
                            $no++
                      ?>
                      <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $tmp['nama_pegawai']; ?></td>
                          <td><?php echo $tmp['tgl_pengajuan']; ?></td>
                          <td><?php echo $tmp['kategori']; ?></td>
                          <td><?php echo $tmp['nama_barang'] ?></td>
                          <td><a href="<?php echo'../berkas/'.$tmp['berkas']; ?>" ><?php echo $tmp['berkas'];  ?></a></td>
                          
                          <td><?php echo $tmp['alasan']; ?></td>
                          <td><?php echo $tmp['status']; ?></td>
                          <td align="center">
                            <a href="#" class="btn btn-xs btn-success open_modal" id="<?php echo $tmp['id_pbarang'];?>"><i class="glyphicon glyphicon-check"></i> setujui</a>
                          </td>
                          <td align="center">
                            <a href="#" class="btn btn-xs btn-danger open_jon" id="<?php echo $tmp['id_pbarang'];?>"><i class="glyphicon glyphicon-remove"></i> Tolak</a>
                          </td>
                      </tr>
                      <?php } ?>
                    </table>

                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- modal setuju -->
        <div id="modalsetuju" class="modal fade" role="dialog" style="margin-top:100px;">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-body">
                <div class="fetched-data"></div>
              </div>
            </div>
          </div>
        </div>
        <!-- end of modal setuju -->
        <!-- modal tolak -->
        <div id="modaltolak" class="modal fade" role="dialog" style="margin-top:100px;">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-body">
                <div class="fetched-data"></div>
              </div>
            </div>
          </div>
        </div>
        <!-- end of modal tolak -->
       
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
    
    <script type="text/javascript">
    $(document).ready(function () {
       $(".open_modal").click(function(e) {
          var m = $(this).attr("id");
          $.ajax({
            url: "setuju_brg.php",
            type: "get",
            data : {id_pbarang: m,},
            success: function (ajaxData){
              $("#modalsetuju").html(ajaxData);
              $("#modalsetuju").modal('show',{backdrop: 'true'});
               }
             });
          });
        });
    </script>
    <script type="text/javascript">
    $(document).ready(function () {
       $(".open_jon").click(function(e) {
          var m = $(this).attr("id");
          $.ajax({
            url: "tolak_brg.php",
            type: "get",
            data : {id_pbarang: m,},
            success: function (ajaxData){
              $("#modaltolak").html(ajaxData);
              $("#modaltolak").modal('show',{backdrop: 'true'});
               }
             });
          });
        });
    </script>
  </body>
</html>
