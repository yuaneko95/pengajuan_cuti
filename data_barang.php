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
                    <h2><strong>List Data Pengajuan Pegawai</strong></h2>
                    
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <div class="table-responsive">
                      <table class="table table-bordered" >
                      <tr>
                        <th><strong>NO</strong></th>
                        <!-- <th><strong>JENIS CUTI</strong></th> -->
                        <th><strong>TGL PENGAJUAN</strong></th>
                        <!-- <th><strong>LAMA CUTI</strong></th> -->
                        <th><strong>KATEGORI BARANG</strong></th>
                        <th><strong>NAMA BARANG</strong></th>
                        <th><strong>BERKAS</strong></th>
                        
                        <th><strong>ALASAN</strong></th>
                        <th><strong>STATUS</strong></th>
                       
                      </tr>  
                      <?php $no=0; 
                          $id_pegawai = $_SESSION['id_pegawai'];
                          $sql = "SELECT id_pbarang,status,kategori,nama_barang ,tgl_pengajuan,berkas ,alasan 
                                  FROM pengadaan_barang
                                  INNER JOIN pegawai ON pegawai.id_pegawai = pengadaan_barang.id_pegawai
                                  INNER JOIN kategori_barang ON kategori_barang.id_kategori=pengadaan_barang.id_kategori
                                  WHERE pengadaan_barang.id_pegawai = '$id_pegawai'";
                          $s = mysqli_query($conn, $sql) or die (mysqli_error($conn));
                          $num_rows = mysqli_num_rows($s);
                          if (!empty($num_rows)) {
                          while ($tmp = mysqli_fetch_assoc($s)) {  
                          $no++
                      ?>
                      <tr>
                          <td align="center"><?php echo $no; ?></td>
                          <td><?php echo $tmp['tgl_pengajuan']; ?></td>
                          <td><?php echo $tmp['kategori']; ?></td>
                          <td><?php echo $tmp['nama_barang'] ?></td>
                          <td><?php echo $tmp['berkas']; ?></td>
                          <td><?php echo $tmp['alasan']; ?></td>
                          <td><?php echo $tmp['status']; ?></td>
                         
                      </tr>
                      <?php }}else{ ?>
                      <tr>
                      <td align="center" colspan="9">Data Belum Tersedia</td>
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
  
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
    
    
  </body>
</html>
