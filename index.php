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
 <!-- page content -->
 <div class="container body">
   <div class="main_container">
      <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row tile_count">
            <div class="col-md-3 col-sm-4 col-xs-4 tile_stats_count" align="center">
              <span class="count_top"><i class="fa fa-user"></i> Total Pegawai</span>
              <?php 
                $sql = "SELECT * FROM pegawai";
                $s = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                $data = array();
                while ($row = mysqli_fetch_array($s)) {
                    $data[] = $row;
                }
                  $count = count($data);
              ?>
              <div class="count"><?php echo $count; ?></div>
              
            </div>
            
            <div class="col-md-3 col-sm-4 col-xs-4 tile_stats_count" align="center">
              <span class="count_top"><i class="fa fa-user"></i> Total Pegawai Pria</span>
              <?php 
                $sql = "SELECT * FROM pegawai WHERE jenis_kelamin ='laki-laki'";
                $s = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                $data = array();
                while ($row = mysqli_fetch_array($s)) {
                    $data[] = $row;
                }
                  $count = count($data);
              ?>
              <div class="count"><?php echo $count; ?></div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-4 tile_stats_count" align="center">
              <span class="count_top"><i class="fa fa-user"></i>Total Pegawai Perempuan</span>
              <?php 
                $sql = "SELECT * FROM pegawai where jenis_kelamin = 'perempuan'";
                $s = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                $data = array();
                while ($row = mysqli_fetch_array($s)) {
                    $data[] = $row;
                }
                  $count = count($data);
              ?>
              <div class="count"><?php echo $count; ?></div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-4 tile_stats_count" align="center">
              <span class="count_top"><i class="fa fa-user"></i> Sisa Cuti <?php echo $_SESSION['username']; ?> </span>
              <?php 
                $id_pegawai = $_SESSION['id_pegawai'];
                $sql = "SELECT * FROM pegawai where id_pegawai = '$id_pegawai'";
                $s = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                while ($row = mysqli_fetch_assoc($s)) {
              ?>
              <div class="count"><?php echo $row['jatah_cuti']; ?></div>
              <?php } ?>

            </div>
          </div>
          <!-- /top tiles -->

            <div class="row">
              <div class="col-md-12 col-sm-9 col-xs-8">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><strong>Pengajuan Cuti Anda Yang Belum Dikonfirmasi</strong></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="table-responsive">
                      <table class="table table-bordered" >
                      <tr>
                        <th><strong>NO</strong></th>
                        <th><strong>NAMA PEGAWAI</strong></th>
                        <!-- <th><strong>JENIS CUTI</strong></th> -->
                        <th><strong>TGL PENGAJUAN</strong></th>
                        <!-- <th><strong>LAMA CUTI</strong></th> -->
                        <th><strong>MULAI CUTI</strong></th>
                        <th><strong>AKHIR CUTI</strong></th>
                        <th><strong>ALASAN CUTI</strong></th>
                        <th><strong>JENIS CUTI</strong></th>
                        <th><strong>JATAH CUTI</strong></th>
                        <th><strong>STATUS</strong></th>
                      </tr>  
                      <?php $no=0; 
                          $id_pegawai = $_SESSION['id_pegawai'];
                          $sql = "SELECT id_pcuti,nama_pegawai, nama_cuti, tgl_pengajuan, lama_cuti,status, tgl_mulai_cuti,tgl_akhir_cuti, alasan , jatah_cuti
                                  FROM permohonan_cuti
                                  INNER JOIN pegawai ON pegawai.id_pegawai = permohonan_cuti.id_pegawai
                                  INNER JOIN jenis_cuti ON jenis_cuti.id_jcuti = permohonan_cuti.id_jcuti
                                  WHERE permohonan_cuti.id_pegawai = '$id_pegawai' AND status = 'Belum dikonfirmasi'";
                          $s = mysqli_query($conn, $sql) or die (mysqli_error($conn));
                          if (empty($s)) {
                            echo 'data kosong';
                            die();
                          } else {
                            while ($tmp = mysqli_fetch_assoc($s)) {  
                              $no++
                      ?>
                      <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $tmp['nama_pegawai']; ?></td>
                          <!-- <td><?php echo $tmp['nama_cuti']; ?></td> -->
                          <td><?php echo $tmp['tgl_pengajuan']; ?></td>
                          <!-- <td><?php echo $tmp['lama_cuti']; ?></td> -->
                          <td><?php echo $tmp['tgl_mulai_cuti']; ?></td>
                          <td><?php echo $tmp['tgl_akhir_cuti']; ?></td>
                          <td><?php echo $tmp['alasan']; ?></td>
                          <td><?php echo $tmp['nama_cuti']; ?></td>
                          <td><?php echo $tmp['jatah_cuti']; ?></td>
                          <td><?php echo $tmp['status']; ?></td>
                      </tr>
                      <?php 
                            } 
                          }
                      ?>
                    </table>

                    </div>
                  </div>
                </div>
              </div>
            </div>

             <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><strong>Pengajuan Barang Anda Yang Belum Dikonfirmasi</strong></h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <div class="table-responsive">
                      <table class="table table-bordered" >
                      <tr>
                        <th><strong>NO</strong></th>
                        <th><strong>NAMA PEGAWAI</strong></th>
                        <!-- <th><strong>JENIS CUTI</strong></th> -->
                        <th><strong>TGL PENGAJUAN</strong></th>
                        <!-- <th><strong>LAMA CUTI</strong></th> -->
                        <th><strong>KATEGORI BARANG</strong></th>
                        <th><strong>NAMA BARANG</strong></th>
                        <th><strong>BERKAS</strong></th>
                        <th><strong>ALASAN CUTI</strong></th>
                        <th><strong>STATUS</strong></th>
                      </tr>  
                      <?php $no=0; 
                          $id_pegawai = $_SESSION['id_pegawai'];
                          $sql = "SELECT id_pbarang,status,kategori,nama_barang ,tgl_pengajuan,berkas ,alasan, nama_pegawai 
                                  FROM pengadaan_barang
                                  INNER JOIN pegawai ON pegawai.id_pegawai = pengadaan_barang.id_pegawai
                                  INNER JOIN kategori_barang ON kategori_barang.id_kategori=pengadaan_barang.id_kategori
                                  WHERE pengadaan_barang.id_pegawai= '$id_pegawai' AND status = 'Belum dikonfirmasi'";
                          $s = mysqli_query($conn, $sql) or die (mysqli_error($conn));
                           if (empty($s)) {
                            echo 'data kosong';
                            die();
                          } else {
                              while ($tmp = mysqli_fetch_assoc($s)) {  
                                $no++
                      ?>
                      <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $tmp['nama_pegawai']; ?></td>
                          <td><?php echo $tmp['tgl_pengajuan']; ?></td>
                          <td><?php echo $tmp['kategori']; ?></td>
                          <td><?php echo $tmp['nama_barang'] ?></td>
                          <td><?php echo $tmp['berkas']; ?></td>
                          <td><?php echo $tmp['alasan']; ?></td>
                          <td><?php echo $tmp['status']; ?></td>
                      </tr>
                      <?php 
                             } 
                         }       
                      ?>
                    </table>

                    </div>
                  </div>
                </div>
              </div>
            </div>
      
      </div>
    </div>
  </div>
      
        <!-- /page content -->
      
 
  <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
  

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
