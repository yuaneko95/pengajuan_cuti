<!DOCTYPE html>
 <html>
 <head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title></title>
   <!-- <link rel="stylesheet" href=""> -->
   <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <!-- <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet"> -->
    <!-- NProgress -->
    <!-- <link href="vendors/nprogress/nprogress.css" rel="stylesheet"> -->
    <!-- iCheck -->
    <!-- <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet"> -->
    <!-- bootstrap-progressbar -->
    <!-- <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet"> -->
    <!-- JQVMap -->
    <!-- <link href="vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/> -->
    <!-- bootstrap-daterangepicker -->
    <!-- <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet"> -->

    <!-- Custom Theme Style -->
<!--     <link href="build/css/custom.min.css" rel="stylesheet"> -->
 </head>
 <body onload="window.print()">
  
                    <br />
                    <?php  
                        include 'admin/koneksi.php';
                        $id_pcuti=$_GET['id_pcuti'];
                        $sql = "SELECT permohonan_cuti.id_pcuti,pegawai.nama_pegawai, jabatan.jabatan ,jenis_cuti.nama_cuti, permohonan_cuti.tgl_pengajuan ,permohonan_cuti.lama_cuti, permohonan_cuti.tgl_mulai_cuti, permohonan_cuti.tgl_akhir_cuti, permohonan_cuti.alasan, permohonan_cuti.tgl_sah 
                          FROM pegawai, permohonan_cuti, jabatan, jenis_cuti
                          WHERE pegawai.id_pegawai = permohonan_cuti.id_pegawai
                          AND pegawai.id_jabatan= jabatan.id_jabatan
                          AND jenis_cuti.id_jcuti = permohonan_cuti.id_jcuti
                          AND permohonan_cuti.id_pcuti = '$id_pcuti'";
                          $s = mysqli_query($conn, $sql) or die (mysqli_error($conn));
                        $temp=mysqli_fetch_array($s);
                    ?>
                  <!--   <div class="table-responsive"> -->
                  <!-- div class="row">
                  <div class="col-sm-4"></div>
                  <div class="col-sm-4"> -->
                  <div>
                    <h2 align="center">FORM PENGAJUAN CUTI</h2>
                    <h3 align="center">KARYAWAN GNFI</h3>
                  <img src="img/gnfi.png" alt="" style="width: 100px; height: 100px; margin-left: 600px; margin-top: -100px">
                  </div>
                      <table style="margin-top: 80px">
                        <tr>
                          <td style="padding-left: 200px">NAMA</td>
                          <td style="padding-left: 10px">:</td>
                          <td style="padding-left: 10px"><?php echo $temp['nama_pegawai']; ?></td>
                        </tr>
                        <tr >
                          <td style="padding-left: 200px">DIVISI</td>
                          <td style="padding-left: 10px">:</td>
                          <td style="padding-left: 10px"><?php echo $temp['jabatan']; ?></td>
                        </tr>
                        <tr>
                          <td style="padding-left: 200px">TGL MULAI CUTI</td>
                          <td style="padding-left: 10px">:</td>
                          <td style="padding-left: 10px"><?php echo $temp['tgl_mulai_cuti']; ?></td>
                        </tr>
                        <tr>
                          <td style="padding-left: 200px">TGL AKHIR CUTI</td>
                          <td style="padding-left: 10px">:</td>
                          <td style="padding-left: 10px"><?php echo $temp['tgl_akhir_cuti']; ?></td>
                        </tr>
                        <tr>
                          <td style="padding-left: 200px">PERIHAL CUTI</td>
                          <td style="padding-left: 10px">:</td>
                          <td style="padding-left: 10px"><?php echo $temp['alasan']; ?></td>
                        </tr>
                      </table>

                           <table>
                             <tr>
                               <td style="padding-top: 100px; padding-left: 100px;">SURABAYA, <?php echo date("d-m-Y"); ?></td>
                             </tr>
                             <tr>
                               <td style="padding-left: 100px">Yang Mengajukan Cuti</td>
                             </tr>
                             <tr>
                               <td style="padding-left: 150px; padding-top: 100px"><?php echo $temp['nama_pegawai']; ?></td>
                             </tr>
                           </table>
                         
               <!--    </div>
                  </div> -->
                <!-- </div>
              </div>
            </div>


     </div>
   </div> -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <!-- <script src="vendors/fastclick/lib/fastclick.js"></script> -->
    <!-- NProgress -->
<!--     <script src="vendors/nprogress/nprogress.js"></script> -->
    <!-- Chart.js -->
    <!-- <script src="vendors/Chart.js/dist/Chart.min.js"></script> -->
    <!-- gauge.js -->
    <!-- <script src="vendors/gauge.js/dist/gauge.min.js"></script> -->
    <!-- bootstrap-progressbar -->
    <!-- <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script> -->
    <!-- iCheck -->
    <!-- <script src="vendors/iCheck/icheck.min.js"></script> -->
    <!-- Skycons -->
    <!-- <script src="vendors/skycons/skycons.js"></script> -->
    <!-- Flot -->
    <!-- <script src="vendors/Flot/jquery.flot.js"></script>
    <script src="vendors/Flot/jquery.flot.pie.js"></script>
    <script src="vendors/Flot/jquery.flot.time.js"></script>
    <script src="vendors/Flot/jquery.flot.stack.js"></script>
    <script src="vendors/Flot/jquery.flot.resize.js"></script> -->
    <!-- Flot plugins -->
    <!-- <script src="vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="vendors/flot.curvedlines/curvedLines.js"></script> -->
    <!-- DateJS -->
    <!-- <script src="vendors/DateJS/build/date.js"></script> -->
    <!-- JQVMap -->
    <!-- <script src="vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script> -->
    <!-- bootstrap-daterangepicker -->
    <!-- <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script> -->

    <!-- Custom Theme Scripts -->
<!--     <script src="../build/js/custom.min.js"></script> -->
    <script>
    
    </script>
  </body>
  </html>