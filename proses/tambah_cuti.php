<?php  
	session_start();
	include '../admin/koneksi.php';
	$id_pegawai = $_SESSION['id_pegawai'];
	$id_jcuti = $_POST['id_jcuti'];
	$tgl_pengajuan = date('Y/m/d');
	// $lama_cuti = $_POST['lama_cuti'];
	$tgl_mulai_cuti = $_POST['tgl_mulai_cuti'];
	$tgl_akhir_cuti = $_POST['tgl_akhir_cuti'];
	$alasan = $_POST['alasan'];
	$status = $_POST['status'];
	$selisih = (strtotime($tgl_akhir_cuti) - strtotime($tgl_mulai_cuti))/(60*60*24);

	$sql1 = mysqli_query($conn, "SELECT * FROM pegawai WHERE id_pegawai = '$id_pegawai'") or die(mysqli_error($conn));
	$row = mysqli_fetch_assoc($sql1);
	
	if ($selisih <= $row['jatah_cuti']) {
		$sql = "INSERT INTO permohonan_cuti VALUES('','$id_pegawai','$id_jcuti','$tgl_pengajuan', '$selisih', '$tgl_mulai_cuti','$tgl_akhir_cuti','$alasan','$status','','')";
		$s = mysqli_query($conn, $sql) or die (mysqli_error($conn));
		if ($s) {
		echo "<script>alert('Pengajuan cuti berhasil...! Silahkan Tunggu Konfirmasi')</script>";
		}
	} else {
		echo "<script>alert('Maaf, Jatah cuti anda tahun ini telah habis....!')</script>";
	}
?>
<meta http-equiv="refresh" content="0;URL='../ajukan_cuti.php'" />