<?php
    include "koneksi.php";
  $id_pegawai=$_GET['id_pegawai'];
  
  $modal=mysqli_query($conn,"SELECT * FROM pegawai INNER JOIN jabatan ON jabatan.id_jabatan = pegawai.id_jabatan WHERE id_pegawai='$id_pegawai' ");
  while($r=mysqli_fetch_array($modal)){
?>

<div class="modal-dialog" style=" width: 900px; height: 500px">
    <div class="modal-content">

      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Detail Pegawai</h4>
        </div>

        <div class="modal-body">
           <form action="#" name="modal_popup" enctype="multipart/form-data" method="POST">
              <div class="row">
                <div class="form-group col-sm-4" style="padding-bottom: 20px;">
                  <!-- <label for="id_jabatan">ID JABATAN</label> -->
                    <img src="<?php echo'img/'.$r['foto']; ?>" style="width: 300px; height: 300px">
                </div>
                <div class="form-group  col-sm-8" style="padding-left: 20px; font-size: 16px">
                    <table class="table table-bordered">
                        <tr>
                            <td><strong>ID Pegawai</strong></td>
                            <td><?php echo $r['id_pegawai']; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Nama Pegawai</strong></td>
                            <td><?php echo $r['nama_pegawai']; ?></td>
                        </tr>
                        <tr> 
                            <td><strong>Jabatan</strong></td>
                            <td><?php echo $r['jabatan']; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Jenis Kelamin</strong></td>
                            <td><?php echo $r['jenis_kelamin']; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Email</strong></td>
                            <td><?php echo $r['email']; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Alamat</strong></td>
                            <td><?php echo $r['alamat_pegawai']; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Telpon</strong></td>
                            <td><?php echo $r['telpon_pegawai']; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Username</strong></td>
                            <td><?php echo $r['username']; ?></td>
                        </tr>
                    </table>
                </div>
                                  
              </div>
              <div class="modal-footer">
                  <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">Close</button>
              </div>
          </form>

             <?php } ?>

        </div>

           
    </div>
</div>