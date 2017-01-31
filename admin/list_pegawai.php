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
                    <h2><strong>Daftar pegawai </strong></h2>
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
                  <a href="tambah_pegawai.php" class="btn btn-lg btn-primary" >Tambah Pegawai</a>
                  <div class="x_content">
                  <div class="table-responsive">
                    <table class="table table-bordered" >
                      <tr>
                        <!-- <th>NO</th> -->
                        <th>ID PEGAWAI</th>
                        <th>NAMA PEGAWAI</th>
                        <th>JABATAN</th>
                        <th>JENIS KELAMIN</th>
                        <th>EMAIL</th>
                        <th>ALAMAT PEGAWAI</th>
                        <th>TELPON PEGAWAI</th>
                        <th>FOTO</th>
                        <th>USERNAME</th>
                        <th>PASSWORD</th>
                        <th>JATAH CUTI</th>
                        <th>ACTION</th>
                      </tr>  
                      <?php 
                          $no=0; 
                          $limit = 4;  
                          if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
                          $start_from = ($page-1) * $limit; 
                          $sql = "SELECT * FROM pegawai LIMIT $start_from, $limit";
                          $s = mysqli_query($conn, $sql) or die (mysqli_error($conn));
                          while ($tmp = mysqli_fetch_assoc($s)) {  
                            $no++
                      ?>
                      <tr>
                          <!-- <td><?php echo $no; ?></td> -->
                          <td><?php echo $tmp['id_pegawai']; ?></td>
                          <td><?php echo $tmp['nama_pegawai']; ?></td>
                          <td><?php echo $tmp['id_jabatan']; ?></td>
                          <td><?php echo $tmp['jenis_kelamin']; ?></td>
                          <td><?php echo $tmp['email']; ?></td>
                          <td><?php echo $tmp['alamat_pegawai']; ?></td>
                          <td><?php echo $tmp['telpon_pegawai']; ?></td>
                          <td><img src="<?php echo'img/'.$tmp['foto']; ?>" alt="" style="width: 40px; height: 60px;"></td>
                          <td><?php echo $tmp['username']; ?></td>
                          <td><?php echo $tmp['password']; ?></td>
                          <td><?php echo $tmp['jatah_cuti']; ?></td>
                          <td>
                            <a href="edit_pegawai.php?&id_pegawai=<?php echo $tmp['id_pegawai']; ?>" class="btn btn-xs btn-warning" ><i class="glyphicon glyphicon-pencil"></i> edit</a>
                           <a href="#" class="btn btn-xs btn-danger" onclick="confirmdel('proses/hapus_pegawai.php?&id_pegawai=<?php echo $tmp['id_pegawai']; ?>');"><i class="glyphicon glyphicon-trash"></i> hapus</a>
                          </td>
                      </tr>
                      <?php  }
                        
                      ?>
                    </table>
                   <?php  
                      $sql = "SELECT COUNT(id_pegawai) FROM pegawai";  
                      $rs_result = mysqli_query($conn,$sql) or die(mysqli_error($conn));  
                      $row = mysqli_fetch_row($rs_result);  
                      $total_records = $row[0];  
                      $total_pages = ceil($total_records / $limit);  
                      $pagLink = "<ul class='pagination'>";  
                      for ($i=1; $i<=$total_pages; $i++) {  
                                   $pagLink .= "<li><a href='list_pegawai.php?page=".$i."'>".$i."</a></li>";  
                      };  
                      echo $pagLink . "</ul";  
                      ?>
                  </div>
                    <br />
                    
                  </div>
                </div>
              </div>
            </div>

          <!-- confirm modal hapus -->
            <div class="modal fade" id="modal_delete" style="margin-top: 150px">
                <div class="modal-dialog">
                    <div class="modal-content" style="margin-top:100px;">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" style="text-align:center;">Are you sure to delete this information ?</h4>
                      </div>
                                
                      <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                        <a href="#" class="btn btn-danger" id="delete_link">Delete</a>
                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                      </div>
                    </div>
                </div>
            </div>
            <!-- end of confirm modal hapus -->

          <div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

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
    <script src="vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>

    <script type="text/javascript">
    function confirmdel(delete_url) {
      $('#modal_delete').modal('show', {backdrop:'static'});
      document.getElementById('delete_link').setAttribute('href', delete_url);
    }
  </script>
 
  
  </body>
</html>
