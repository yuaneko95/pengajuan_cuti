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
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <div class="table-responsive">
                      <table class="table table-bordered" >
                      <tr>
                        <th><strong>NAMA PEGAWAI</strong></th>
                        <!-- <th><strong>JENIS CUTI</strong></th> -->
                        <th><strong>TGL PENGAJUAN</strong></th>
                        <!-- <th><strong>LAMA CUTI</strong></th> -->
                        <th><strong>MULAI CUTI</strong></th>
                        <th><strong>AKHIR CUTI</strong></th>
                        <th><strong>LAMA CUTI</strong></th>
                        <th><strong>ALASAN CUTI</strong></th>
                        <th><strong>JENIS CUTI</strong></th>
                        <th><strong>JATAH CUTI</strong></th>
                        <th><strong>STATUS</strong></th>
                        <th colspan="2"><center>ACTION</center></th>
                      </tr>  
                      <?php 
                           $limit = 10;  
                          if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
                          $start_from = ($page-1) * $limit; 
                          $sql = "SELECT id_pcuti,nama_pegawai, nama_cuti, tgl_pengajuan, lama_cuti,status, tgl_mulai_cuti,tgl_akhir_cuti, alasan , jatah_cuti, lama_cuti
                                  FROM permohonan_cuti
                                  INNER JOIN pegawai ON pegawai.id_pegawai = permohonan_cuti.id_pegawai
                                  INNER JOIN jenis_cuti ON jenis_cuti.id_jcuti = permohonan_cuti.id_jcuti
                                  LIMIT $start_from, $limit";
                          $s = mysqli_query($conn, $sql) or die (mysqli_error($conn));
                          $num_rows = mysqli_num_rows($s);
                          if (!empty($num_rows)) {
                          while ($tmp = mysqli_fetch_assoc($s)) {  
                          $no++
                      ?>
                      <tr>
                          
                          <td><?php echo $tmp['nama_pegawai']; ?></td>
                          <!-- <td><?php echo $tmp['nama_cuti']; ?></td> -->
                          <td><?php echo $tmp['tgl_pengajuan']; ?></td>
                          <!-- <td><?php echo $tmp['lama_cuti']; ?></td> -->
                          <td><?php echo $tmp['tgl_mulai_cuti']; ?></td>
                          <td><?php echo $tmp['tgl_akhir_cuti']; ?></td>
                          <td align="center"><?php echo $tmp['lama_cuti']; ?></td>
                          <td><?php echo $tmp['alasan']; ?></td>
                          <td><?php echo $tmp['nama_cuti']; ?></td>
                          <td align="center"><?php echo $tmp['jatah_cuti']; ?></td>
                          <!-- <td><?php echo $tmp['status']; ?></td> -->
                          <td>
                            <?php if ($tmp['status']=='disetujui'){ ?>
                                <span class="label label-success" style="font-size: 12px;">disetujui</span>
                            <?php } elseif ($tmp['status'] == 'ditolak') { ?>
                                <span class="label label-danger" style="font-size: 12px;">ditolak</span>
                            <?php } elseif ($tmp['status'] == 'Belum dikonfirmasi') { ?>
                                <span class="label label-warning" style="font-size: 12px;">Belum dikonfirmasi</span>
                            <?php } ?>
                          </td>
                          <td align="center">
                            <a href="#" class="btn btn-xs btn-success open_modal <?=$tmp['status'] != 'disetujui' && $tmp['status'] != 'ditolak' ? '' : 'disabled'?>" id="<?php echo $tmp['id_pcuti'];?>"><i class="glyphicon glyphicon-check"></i> setujui</a>
                          </td>
                          <td align="center">
                            <a href="#" class="btn btn-xs btn-danger open_jon <?=$tmp['status'] != 'disetujui' && $tmp['status'] != 'ditolak' ? '' : 'disabled'?>" id="<?php echo $tmp['id_pcuti'];?>"><i class="glyphicon glyphicon-remove"></i> Tolak</a>
                          </td>
                          
                      </tr>
                      <?php }}else{ ?>
                      <tr>
                      <td align="center" colspan="10">Data Belum Tersedia</td>
                      </tr>
                      <?php } ?>
                    </table>
                       <?php  
                      $sql = "SELECT COUNT(id_pcuti) FROM permohonan_cuti ";  
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
   <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
 
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function () {
       $(".open_modal").click(function(e) {
          var m = $(this).attr("id");
          $.ajax({
            url: "setuju.php",
            type: "get",
            data : {id_pcuti: m,},
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
            url: "tolak.php",
            type: "get",
            data : {id_pcuti: m,},
            success: function (ajaxData){
              $("#modaltolak").html(ajaxData);
              $("#modaltolak").modal('show',{backdrop: 'true'});
               }
             });
          });
        });
    </script>
    <!-- Flot -->
    
  </body>
</html>
