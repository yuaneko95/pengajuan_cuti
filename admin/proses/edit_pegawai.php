<?php 
	include "../koneksi.php";

	$id_pegawai 	= $_POST['id_pegawai'];
	$nama_pegawai 	= $_POST['nama_pegawai'];
	$id_jabatan 	= $_POST['id_jabatan'];
	$jenis_kelamin 	= $_POST['jenis_kelamin'];
	$email 			= $_POST['email'];
	$alamat_pegawai = $_POST['alamat_pegawai'];
	$telpon_pegawai = $_POST['telpon_pegawai'];
	$username 		= $_POST['username'];
	$password 		= $_POST['password'];

	$file 			= $_FILES["foto"]["name"];
	$target_dir 	= "../img/";
  	$target_file 	= $target_dir . basename($_FILES["foto"]["name"]);
  	$uploadOk 		= 1;
  	$imageFileType 	= pathinfo($target_file,PATHINFO_EXTENSION);

	if ($_POST['jenis_kelamin'] && $_FILES["foto"]["name"] != ""){
	$a = "UPDATE pegawai SET id_pegawai = '$id_pegawai', nama_pegawai = '$nama_pegawai', id_jabatan = '$id_jabatan', jenis_kelamin = '$jenis_kelamin', email = '$email', alamat_pegawai = '$alamat_pegawai', telpon_pegawai = '$telpon_pegawai', username = '$username', password = '$password', foto = '$file' WHERE id_pegawai = '$id_pegawai'";
	}else{
	$a = "UPDATE pegawai SET id_pegawai = '$id_pegawai', nama_pegawai = '$nama_pegawai', id_jabatan = '$id_jabatan', email = '$email', alamat_pegawai = '$alamat_pegawai', telpon_pegawai = '$telpon_pegawai', username = '$username', password = '$password' WHERE id_pegawai = '$id_pegawai'";
  	}

	$b = mysqli_query($conn,$a) or die (mysqli_error());
	if ($b == true){
	echo "<script>alert('UPDATE $id_admin BERHASIL')</script>";
	}else{
	echo "<script>alert('UPDATE GAK BERHASIL')</script>";
	}
?>
<meta http-equiv="refresh" content="0;URL=../list_pegawai.php" />