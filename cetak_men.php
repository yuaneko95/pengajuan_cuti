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
$sql = "SELECT permohonan_cuti.id_pcuti,pegawai.nama_pegawai, pegawai.foto ,jabatan.jabatan ,jenis_cuti.nama_cuti, permohonan_cuti.tgl_pengajuan ,permohonan_cuti.lama_cuti, permohonan_cuti.tgl_mulai_cuti, permohonan_cuti.tgl_akhir_cuti, permohonan_cuti.alasan ,permohonan_cuti.status, permohonan_cuti.tgl_sah, permohonan_cuti.disahkan
        FROM pegawai, permohonan_cuti, jabatan, jenis_cuti
        WHERE pegawai.id_pegawai = permohonan_cuti.id_pegawai
        AND pegawai.id_jabatan= jabatan.id_jabatan
        AND jenis_cuti.id_jcuti = permohonan_cuti.id_jcuti
        AND permohonan_cuti.id_pcuti = '$id_pcuti'";
$s = mysqli_query($conn, $sql) or die (mysqli_error($conn));
$temp=mysqli_fetch_array($s);
$tgl_sah = $temp['tgl_sah'];
?>
<div id="p1">
                                <div class="modal-dialog" style="width: 700px;">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <img src="img/gnfi.png" style="width: 100px; height: 100px; " align="right">
                                            <h2 class="modal-title" id="myModalLabel" style="padding-left: 220px; font-size: 24px"><strong>Form Pengajuan Cuti</strong></h2>
                                            <h2 class="modal-title" id="myModalLabel" style="padding-left: 270px"><strong>Karyawan GNFI</strong></h2>
                                        </div>
                                        <div class="modal-body">
                                          <p style="padding-left: 70px">Dengan Hormat,</p>
                                          <p style="padding-left: 70px">Yang bertanda tangan di bawah ini,</p>
                                           <table align="center">
                                               <tr>
                                                   <td ><strong>Nama</strong></td>
                                                   <td style="padding-left: 30px"><strong>:</strong></td>
                                                   <td style="padding-left: 30px"><?php echo $temp['nama_pegawai']; ?></td>
                                               </tr>
                                               <tr>
                                                   <td><strong> Divisi</strong></td>
                                                   <td style="padding-left: 30px"><strong>:</strong></td>
                                                   <td style="padding-left: 30px"><?php echo $temp['jabatan']; ?></td>
                                               </tr>
                                               <tr>
                                                 <td><strong>Tanggal Pengajuan</strong></td>
                                                 <td style="padding-left: 30px"><strong>:</strong></td>
                                                 <td style="padding-left: 30px"><?php echo $temp['tgl_pengajuan']; ?></td>
                                               </tr>
                                               <tr>
                                                   <td><strong>Keperluan</strong></td>
                                                   <td style="padding-left: 30px"><strong>:</strong></td>                                               
                                                   <td style="padding-left: 30px"><?php echo $temp['alasan']; ?></td>
                                               </tr>
                                               <tr>
                                                   <td><strong>Tanggal Cuti</strong></td>
                                                   <td style="padding-left: 30px"><strong>:</strong></td>
                                                   <td style="padding-left: 30px"><?php echo $temp['tgl_mulai_cuti']; ?></td>
                                                   <td style="padding-right: 40px"><strong>s/d</strong></td>
                                                   <td><?php echo $temp['tgl_akhir_cuti']; ?></td>
                                               </tr>
                                               
                                           </table>
                                           <br>
                                            <p style="padding-left: 70px">Demikian surat cuti kerja ini saya buat dengan sebagaimana mestinya. Atas perhatiannya,</p>
                                            <p style="padding-left: 70px"> Saya ucapkan terimakasih.</p>
                                            <br>
                                            <br>
                                            <br>
                                            <table>
                                              <tr>
                                                <td style="padding-left: 100px"><strong>Surabaya, <?php echo date("d F Y", strtotime($tgl_sah)); ?></strong></td>
                                              </tr>
                                              <tr>
                                                <td style="padding-left: 100px"><strong>Yang Mengajukan Cuti</strong></td>
                                                <td style="padding-left: 200px"><strong>Yang Menyetujui Cuti</strong></td>
                                              </tr>

                                              <tr>
                                                <td style="padding-left: 150px"><strong><?php echo $temp['nama_pegawai']; ?></strong></td>
                                                <td style="padding-left: 230px"><strong><?php echo $temp['disahkan']; ?></strong></td>
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
                          