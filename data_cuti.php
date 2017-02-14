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
                    </ul>
                    <div class="clearfix"></div>
                    <?php
                      if(isset($_GET['id_pcuti'])){
                      include "cetak_men.php";
                    }?>
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
                       
                        <!-- <th><strong>JENIS CUTI</strong></th> -->
                        <th><strong>TGL PENGAJUAN</strong></th>
                        <!-- <th><strong>LAMA CUTI</strong></th> -->
                        <th><strong>MULAI CUTI</strong></th>
                        <th><strong>AKHIR CUTI</strong></th>
                        <th><strong>ALASAN CUTI</strong></th>
                        <th><strong>STATUS</strong></th>
                        <th colspan="2"><center>ACTION</center></th>
                      </tr>  
                      <?php 
                          
                          $id_pegawai = $_SESSION['id_pegawai'];
                           $limit = 10;  
                          if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
                          $start_from = ($page-1) * $limit; 
                          $sql = "SELECT id_pcuti,status, tgl_pengajuan, tgl_mulai_cuti,tgl_akhir_cuti, alasan 
                                  FROM permohonan_cuti
                                  INNER JOIN pegawai ON pegawai.id_pegawai = permohonan_cuti.id_pegawai
                                  
                                  WHERE pegawai.id_pegawai = '$id_pegawai'
                                  LIMIT $start_from, $limit";
                          $s = mysqli_query($conn, $sql) or die (mysqli_error($conn));
                          $num_rows = mysqli_num_rows($s);
                          if (!empty($num_rows)) {
                          while ($tmp = mysqli_fetch_assoc($s)) {  
                          $no++
                      ?>
                      <tr>
                          <!-- <td><?php echo $no; ?></td> -->
                          <!-- <td><?php echo $tmp['nama_cuti']; ?></td> -->
                          <td><?php echo $tmp['tgl_pengajuan']; ?></td>
                          <!-- <td><?php echo $tmp['lama_cuti']; ?></td> -->
                          <td><?php echo $tmp['tgl_mulai_cuti']; ?></td>
                          <td><?php echo $tmp['tgl_akhir_cuti']; ?></td>
                          <td><?php echo $tmp['alasan']; ?></td>
                          <td><?php echo $tmp['status']; ?></td>
                          <td align='center'><a href='data_cuti.php?&id_pcuti=<?php echo $tmp['id_pcuti']; ?>'><button class='btn btn-primary btn-sm' data-toggle='modal' data-id = '$tmp['id_pcuti']' data-target='#myModal'>Detail</button></a></td>
                      </tr>
                     <?php }}else{ ?>
                      <tr>
                      <td align="center" colspan="9">Data Belum Tersedia</td>
                      </tr>
                      <?php } ?>
                    </table>
                     
                    </div>
                    <?php  
                      $sql = "SELECT COUNT(id_pcuti) FROM permohonan_cuti WHERE id_pegawai = '$id_pegawai'";  
                      $rs_result = mysqli_query($conn,$sql) or die(mysqli_error($conn));  
                      $row = mysqli_fetch_row($rs_result);  
                      $total_records = $row[0];  
                      $total_pages = ceil($total_records / $limit);  
                      $pagLink = "<ul class='pagination'>";  
                      for ($i=1; $i<=$total_pages; $i++) {  
                                   $pagLink .= "<li><a href='data_cuti.php?page=".$i."'>".$i."</a></li>";  
                      };  
                      echo $pagLink . "</ul";  
                      ?>
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
   
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
    
    
  </body>
</html>
