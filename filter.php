 <!DOCTYPE html>
 <html>
 <head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title></title>
   <link rel="stylesheet" href="">
   <link href="admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
     
    <link href="admin/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="admin/build/css/custom.min.css" rel="stylesheet">
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
                    <form action="filter.php" method="post" accept-charset="utf-8">
                    <h5>view by month</h5>
                    <div class="input-group">
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
                      <span class="input-group-btn">
                      <input type="submit" name="cari" value="cari" class="btn btn-primary">
                      </span>
                    </div>
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
                        if (isset($_POST['cari'])) {
                          $bulan = $_POST['bulan'];
                          $sql = "select * from permohonan_cuti where month(tgl_mulai_cuti)='$bulan' and id_pegawai = '$id_pegawai'";
                          $s = mysqli_query($conn, $sql) or die (mysqli_error($conn));
                        }
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
   <script src="admin/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="admin/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    
    <script src="admin/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="admin/build/js/custom.min.js"></script>
    
    
  </body>
</html>
