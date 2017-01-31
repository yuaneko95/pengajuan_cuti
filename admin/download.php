<?php
  include ("koneksi.php"); 
  $data = mysqli_query ("select * from pengadaan_barang where id_pbarang=" . $_REQUEST['id_pbarang']);
  if ($row = mysqli_fetch_assoc($data)) {
    $id_pegawai = $row['id_pegawai']; $id_kategori = $row['id_kategori'];
    $nama_barang = $row['nama_barang']; $tgl_pengajuan = $row['tgl_pengajuan']; $berkas = $row['berkas']; $alasan = $row['alasan']; 
  }
    header('Content-type: ' . $berkas); header('Content-length: ' . $berkas);
    header("Content-Transfer-Encoding: binarynn"); header("Pragma: no-cache"); header("Expires: 0");
    header('Content-Disposition: attachment; filename="' . $berkas . '"');
    echo $filedata; exit();
?>