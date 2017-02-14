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
                    <h2>Form Tambah Pegawai</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" action="proses/edit_profil.php" method="POST" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                      <?php 
                        $id_pegawai = $_SESSION['id_pegawai'];
                        $sql = "SELECT * FROM pegawai WHERE pegawai.id_pegawai = '$id_pegawai'";
                        $s = mysqli_query($conn, $sql) or die (mysqli_error($conn));
                        while ($temp = mysqli_fetch_assoc($s)) {  
                      ?>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="hidden" name="id_pegawai" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $temp['id_pegawai']; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name" >NAMA PEGAWAI <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="nama_pegawai" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $temp['nama_pegawai']; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name" >USERNAME<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="username" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $temp['username']; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">JENIS KELAMIN</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="gender" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="jenis_kelamin" value="Laki-Laki" <?php if ($temp['jenis_kelamin']=='Laki-Laki') {echo 'checked';} ?> /> &nbsp; Laki-laki &nbsp;
                            </label>
                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="jenis_kelamin" value="Perempuan" <?php if ($temp['jenis_kelamin']=='Perempuan') {echo 'checked';} ?>/> Perempuan
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">EMAIL</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="email" name="email" value="<?php echo $temp['email']; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">ALAMAT PEGAWAI</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" name="alamat_pegawai" value="<?php echo $temp['alamat_pegawai']; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">TELPON PEGAWAI</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="tel" name="telpon_pegawai" value="<?php echo $temp['telpon_pegawai']; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">FOTO (Max:1mb)</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="file" name="foto" id="image-source" onchange="previewImage();">
                          <br>
                          <br>
                          <br>
                          <img id="image-preview" class="form-control" style="width: 200px; height: 200px;" src="<?php echo'admin/img/'.$temp['foto']; ?>">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="profil.php">
                          <button type="reset" class="btn btn-primary">Cancel</button>
                          <button type="submit" class="btn btn-success">Edit</button>
                        </div>
                      </div>
                      <?php } ?>
                    </form>
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
    <script>
    function previewImage() {
        document.getElementById("image-preview").style.display = "block";
        var oFReader = new FileReader();
         oFReader.readAsDataURL(document.getElementById("image-source").files[0]);

        oFReader.onload = function(oFREvent) {
          document.getElementById("image-preview").src = oFREvent.target.result;
        };
      };
    </script>
  </body>
</html>
