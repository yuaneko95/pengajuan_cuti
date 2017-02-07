<?php 
	session_start();
	include "admin/koneksi.php";
	$id_pegawai = $_SESSION['id_pegawai'];
	$sql = "SELECT pegawai.nama_pegawai, jabatan.jabatan ,jenis_cuti.nama_cuti, permohonan_cuti.tgl_pengajuan ,permohonan_cuti.lama_cuti, permohonan_cuti.tgl_mulai_cuti, permohonan_cuti.tgl_akhir_cuti,permohonan_cuti.status 
		FROM pegawai, permohonan_cuti, jabatan, jenis_cuti
		WHERE pegawai.id_pegawai = permohonan_cuti.id_pegawai
		AND pegawai.id_jabatan= jabatan.id_jabatan
		AND jenis_cuti.id_jcuti = permohonan_cuti.id_jcuti
		AND permohonan_cuti.id_pcuti = '$id_pegawai'";
	 $s = mysqli_query($conn, $sql) or die (mysqli_error($conn));
?>