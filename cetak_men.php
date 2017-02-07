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
                                            <h2 class="modal-title" id="myModalLabel" style="padding-left: 100px ">Form Pengajuan Cuti<img src="img/gnfi.png" style="width: 50px; height: 50px; padding-right: 0px"></h2>

                                        </div>
                                        <div class="modal-body">
                                           <table align="center">
                                               <tr>
                                                   <td style="margin-right: 50px;"><strong>Nama</strong></td>
                                                   <td><strong>:</strong></td>
                                                   <td><?php echo $temp['nama_pegawai']; ?></td>
                                               </tr>
                                               <tr>
                                                   <td><strong> Divisi</strong></td>
                                                   <td><strong>:</strong></td>
                                                   <td><?php echo $temp['jabatan']; ?></td>
                                               </tr>
                                               <tr>
                                                 <td><strong>Tanggal Pengajuan</strong></td>
                                                 <td><strong>:</strong></td>
                                                 <td><?php echo $temp['tgl_pengajuan']; ?></td>
                                               </tr>
                                               <tr>
                                                   <td><strong>Keperluan</strong></td>
                                                   <td><strong>:</strong></td>                                               
                                                   <td><?php echo $temp['alasan']; ?></td>
                                               </tr>
                                               <tr>
                                                   <td><strong>Tanggal Mulai Cuti</strong></td>
                                                   <td><strong>:</strong></td>
                                                   <td><?php echo $temp['tgl_mulai_cuti']; ?></td>
                                                   <td style="padding-right: 40px"><strong>s/d</strong></td>
                                                   <td><?php echo $temp['tgl_akhir_cuti']; ?></td>
                                               </tr>
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
                          