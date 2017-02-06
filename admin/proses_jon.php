<?php 
session_start();
include 'koneksi.php';
$id_pegawai = $_SESSION['id_pegawai'];
$id_pcuti = $_POST['id_pcuti'];
$tgl_sah = date('Y/m/d');
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
}
?>
<meta http-equiv="refresh" content="0;URL='data_cuti.php'" />