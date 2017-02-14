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
   <?php include 'admin/koneksi.php'; ?>
   <div class="container body">
     <div class="main_container">
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                 <?php  
                      $id_pegawai=$_SESSION['id_pegawai'];
                      $q = "SELECT * FROM pegawai WHERE id_pegawai='$id_pegawai'";
                      $a = mysqli_query($conn, $q) or die (mysqli_error($conn));
                      while ($t = mysqli_fetch_assoc($a)) {
                    ?>
                  <div class="x_title">
                    <h2>Form Pengajuan Cuti | Jatah Cuti Anda Tersisa '<strong><?php echo $t['jatah_cuti'];  } ?></strong>' Hari</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" action="proses/tambah_cuti.php" method="POST" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">                      
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">                        
                        <label for="jenis_cuti" class="control-label col-md-3 col-sm-3 col-xs-12">JENIS CUTI </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="id_jcuti" class="form-control">
                          <?php  
                             $sql = "SELECT * FROM jenis_cuti";
                             $s = mysqli_query($conn, $sql) or die (mysqli_error($conn));
                             while ($tmp = mysqli_fetch_assoc($s)) {
                          ?>
                            <option value="<?php echo $tmp['id_jcuti']; ?>"><?php echo $tmp['nama_cuti']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                      <!--   <label for="lama_cuti" class="control-label col-md-3 col-sm-3 col-xs-12">LAMA CUTI</label> -->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="hidden" name="selisih">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">TGL MULAI CUTI <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="date-picker form-control col-md-7 col-xs-12" required="required" type="date" name="tgl_mulai_cuti">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">TGL AKHIR CUTI <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="date-picker form-control col-md-7 col-xs-12" required="required" type="date" name="tgl_akhir_cuti">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="alasan" class="control-label col-md-3 col-sm-3 col-xs-12">ALASAN CUTI</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="form-control col-md-7 col-xs-12" name="alasan"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="hidden" name="status" value="Belum dikonfirmasi">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="index.php">
                          <button type="button" class="btn btn-primary">Cancel</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
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
   
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
    <script>
      $(document).ready(function() {
        $('#birthday').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_4"
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
      });
    </script>
    <script>
      $(document).ready(function() {
        $('#birthday1').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_4"
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
      });
    </script>
    <script>
      $(document).ready(function() {
        $('#birthday2').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_4"
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
      });
    </script>
  </body>
  </html>