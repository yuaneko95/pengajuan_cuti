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
                    <h2><strong>Daftar Jenis Cuti </strong></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <a href="#" class="btn btn-lg btn-primary" data-target="#modaladd" data-toggle="modal">tambah data</a>
                  <div class="x_content">
                    <br />
                    <table class="table table-bordered" >
                      <tr>
                        <th>NO</th>
                        <th>JENIS CUTI</th>
                        <th>ACTION</th>
                      </tr>  
                      <?php $no=0; 
                          $sql = "SELECT * FROM jenis_cuti";
                          $s = mysqli_query($conn, $sql) or die (mysqli_error($conn));
                          while ($tmp = mysqli_fetch_assoc($s)) {  
                            $no++
                      ?>
                      <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $tmp['nama_cuti']; ?></td>
                          <td>
                            <a href="#" class="btn btn-xs btn-warning open_modal" id="<?php echo $tmp['id_jcuti']; ?>" ><i class="glyphicon glyphicon-pencil"></i> edit</a>
                            <a href="#" class="btn btn-xs btn-danger" onclick="confirmdel('proses/hapus_jenis_cuti.php?&id_jcuti=<?php echo $tmp['id_jcuti']; ?>');"><i class="glyphicon glyphicon-trash"></i> hapus</a>
                          </td>
                      </tr>
                      <?php } ?>
                    </table>

                  </div>
                </div>
              </div>
            </div>

        <!-- modal tambah -->
        <div id="modaladd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top: 115px">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title" id="myModalLabel">Tambah Daftar Jabatan</h4>
                        </div>

                        <div class="modal-body">
                            <form action="proses/tambah_jenis_cuti.php" name="modal_popup" enctype="multipart/form-data" method="POST">  
                                <div class="form-group" style="padding-bottom: 20px;">
                                  <label for="jenis cuti">JENIS CUTI</label>
                                  <input type="text" name="nama_cuti"  class="form-control" placeholder="jenis cuti" required/>
                                </div>

                                <div class="modal-footer">
                                  <button class="btn btn-success" type="submit">
                                     Simpan
                                  </button>

                                  <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
                                    Cancel
                                  </button>
                                </div>
                            </form>
                         </div>
                    </div>
                </div>
            </div>
        <!-- end of modal tambah -->

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

    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>

    <script type="text/javascript">
    function confirmdel(delete_url) {
      $('#modal_delete').modal('show', {backdrop:'static'});
      document.getElementById('delete_link').setAttribute('href', delete_url);
    }
  </script>
  <script type="text/javascript">
    $(document).ready(function () {
       $(".open_modal").click(function(e) {
          var m = $(this).attr("id");
          $.ajax({
            url: "modaledit_jeniscuti.php",
            type: "GET",
            data : {id_jcuti: m,},
            success: function (ajaxData){
              $("#ModalEdit").html(ajaxData);
              $("#ModalEdit").modal('show',{backdrop: 'true'});
               }
             });
          });
        });
  </script>
    <!-- Flot -->
    
  </body>
</html>
