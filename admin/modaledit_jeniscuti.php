<?php
    include "koneksi.php";
  $id_jcuti=$_GET['id_jcuti'];
  
  $modal=mysqli_query($conn,"SELECT * FROM jenis_cuti WHERE id_jcuti='$id_jcuti'");
  while($r=mysqli_fetch_array($modal)){
?>

<div class="modal-dialog" style="margin-top: 150px">
    <div class="modal-content">

      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Edit Data Jenis Cuti</h4>
        </div>

        <div class="modal-body">
          <form action="proses/edit_jenis_cuti.php" name="modal_popup" enctype="multipart/form-data" method="POST">
            
                <div class="form-group" style="padding-bottom: 20px;">
                  <!-- <label for="id_jabatan">ID JABATAN</label> -->
                    <input type="hidden" name="id_jcuti"  class="form-control" value="<?php echo $r['id_jcuti']; ?>" />
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="nama cuti">JENIS CUTI</label>
                  <input type="text" name="nama_cuti" value="<?php echo $r['nama_cuti']; ?>" class="form-control">
                </div>

                
              <div class="modal-footer">
                  <button class="btn btn-success" type="submit">
                      Confirm
                  </button>

                  <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
                    Cancel
                  </button>
              </div>

              </form>

             <?php } ?>

            </div>

           
        </div>
    </div>