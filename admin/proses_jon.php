<?php 
session_start();
include 'koneksi.php';
$id_pegawai = $_SESSION['id_pegawai'];
$id_pcuti = $_POST['id_pcuti'];
$tgl_sah = date('Y/m/d');
<<<<<<< HEAD
$sql1 = "SELECT * FROM pegawai WHERE id_pegawai = '$id_pegawai'";

$b = mysqli_query($conn, $sql1) or die (mysqli_error($conn));
while ($row = mysqli_fetch_assoc($b)) {
	if ($row['jatah_cuti'] <= '0') {
		echo "<script>Alert('jatah cuti anda sudah habis')</script>";
	} else {
		$sql = "UPDATE pegawai
		INNER JOIN permohonan_cuti ON permohonan_cuti.id_pegawai = pegawai.id_pegawai
		SET jatah_cuti = jatah_cuti - lama_cuti, STATUS = 'disetujui', tgl_sah = '$tgl_sah' WHERE id_pcuti = '$id_pcuti'";
		$s = mysqli_query($conn, $sql) or die (mysqli_error($conn));
	}
=======
$id_jcuti = $_POST['id_jcuti'];
	
if ($_POST['id_jcuti'] != '2' ) {
	$sql = "UPDATE permohonan_cuti SET status = 'disetujui', tgl_sah = '$tgl_sah' WHERE id_pcuti = '$id_pcuti'";
}else{
	$sql = "UPDATE pegawai
		INNER JOIN permohonan_cuti ON permohonan_cuti.id_pegawai = pegawai.id_pegawai
		SET jatah_cuti = jatah_cuti - lama_cuti, STATUS = 'disetujui', tgl_sah = '$tgl_sah' WHERE id_pcuti = '$id_pcuti'";
>>>>>>> d0e5b2b4feaf173e1ed98d6ddc531c641530d92b
}

$s = mysqli_query($conn, $sql) or die (mysqli_error($conn));
?>
<meta http-equiv="refresh" content="0;URL='data_cuti.php'" />