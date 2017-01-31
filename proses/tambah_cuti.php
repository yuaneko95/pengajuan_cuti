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

	$sql = "INSERT INTO permohonan_cuti VALUES('','$id_pegawai','$id_jcuti','$tgl_pengajuan', '$selisih', '$tgl_mulai_cuti','$tgl_akhir_cuti','$alasan','$status','')";
	$s = mysqli_query($conn, $sql) or die (mysqli_error($conn));

	header('location:../ajukan_cuti.php');
?>