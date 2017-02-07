<script>
  function printContent(el){
    var restorepage = document.body.innerHTML;
    var printcontent = document.getElementById(el).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
  }
  </script>
<?php

$id_pcuti=$_GET['id_pcuti'];
$sql = "SELECT permohonan_cuti.id_pcuti,pegawai.nama_pegawai, jabatan.jabatan ,jenis_cuti.nama_cuti, permohonan_cuti.tgl_pengajuan ,permohonan_cuti.lama_cuti, permohonan_cuti.tgl_mulai_cuti, permohonan_cuti.tgl_akhir_cuti, permohonan_cuti.alasan ,permohonan_cuti.status
        FROM pegawai, permohonan_cuti, jabatan, jenis_cuti
        WHERE pegawai.id_pegawai = permohonan_cuti.id_pegawai
        AND pegawai.id_jabatan= jabatan.id_jabatan
        AND jenis_cuti.id_jcuti = permohonan_cuti.id_jcuti
        AND permohonan_cuti.id_pcuti = '$id_pcuti'";
$s = mysqli_query($conn, $sql) or die (mysqli_error($conn));
$temp=mysqli_fetch_array($s);
?>
<div id="p1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Form Pengajuan Cuti</h4>
                                        </div>
                                        <div class="modal-body">
                                           <table>
                                               <tr>
                                                   <td><b>Nama : </b><?php echo $temp['nama_pegawai']; ?></td>
                                               </tr>
                                               <tr>
                                                   <td><b>Divisi : </b><?php echo $temp['jabatan']; ?></td>
                                               </tr>
                                               <tr>
                                                   <td><b>Keperluan&nbsp;&nbsp;:&nbsp;&nbsp;</b><?php echo $temp['alasan']; ?></td>                                                   
                                                   <td></td>
                                               </tr>
                                               <tr>
                                                   <td><b>Tanggal Mulai Cuti&nbsp;&nbsp;:&nbsp;&nbsp;</b><?php echo $temp['tgl_mulai_cuti']; ?></td>
                                                   <td><b>s/d </b>&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $temp['tgl_akhir_cuti']; ?></td>
                                                   <td><b></b></td>
                                               </tr>
                                               <tr>
                                                   <td><b>Keperluan&nbsp;&nbsp;:&nbsp;&nbsp;</b></td>
                                                   <td><b>/</b></td>
                                                   <td><b>Tanggal Kembali&nbsp;&nbsp;:&nbsp;&nbsp;</b></td>
                                               </tr>
                                           </table>
                                           <table class="table table-striped table-bordered table-hover">
                                               <tr>
                                                   <th>No</th>
                                                   <th>Kode Film</th>
                                                   <th>Judul</th>
                                                   <th>Harga</th>
                                               </tr>
                                               <?php while ($f = mysqli_fetch_array($e)){ 
                                              
                                                ?>
                                               
                                               <tr>
                                                   <td><?php echo "$no"; ?></td>
                                                   <td><?php echo "$f[2]"; ?></td>
                                                   <td><?php echo "$f[1]"; ?></td>
                                                   <td>Rp<?php echo number_format($f[2],0,',','.'); ?></td>
                                               </tr>
                                               <tr>
                                                   <td colspan="3" align="right"><b><i>TOTAL</i></b></td>
                                                   <td><b>Rp<?php echo number_format(0,',','.'); ?></b></td>
                                               </tr>
                                              <?php } ?>
                                           </table>
                                           </div>
                                        </div>
                                        </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="data_cuti.php"><button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button></a>
                                           <button type="button" onclick="printContent('p1')" class="btn btn-primary">Print</button>
                                        
                                    
                                </div>
                            <script>
  function printContent(el){
    var restorepage = document.body.innerHTML;
    var printcontent = document.getElementById(el).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
  }
  </script>
                          