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

	if($_FILES["foto"]["name"] != ""){
	if (file_exists($target_file)) {
    echo "<script>alert('Maaf, file Sudah pernah di Upload....<br>')</script>";
    $uploadOk = 0;
	}
	}	

	// Periksa ukuran file================================================
	if($_FILES["foto"]["name"] != ""){
	if ($_FILES["foto"]["size"] > 50000000) {
    echo "<script>alert('Maaf, File Anda terlalu besar...<br>')</script>";
    $uploadOk = 0;
	}
	}

	// Format yang diperbolehkan
	if($_FILES["foto"]["name"] != ""){
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  	&& $imageFileType != "gif" && $imageFileType != "JPG" ) {
    echo "<script>alert('Maaf, hanya Format JPG, JPEG, PNG & GIF yang diperbolehkan....<br>')</script>";
    $uploadOk = 0;
	}
	}

	if($_FILES["foto"]["name"] != ""){
	if ($uploadOk == 0) {
    echo "<script>alert('Maaf, File Anda tidak ter Upload....<br>')</script>";
	} else {
           if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
               echo "<script>alert('File ". basename( $_FILES["foto"]["name"]). " sukses di Upload...<br>')<script>";
    } else {
               echo "<script>alert('Maaf, terdapat kesalahan saat upload file Anda...<br>')<script>";
           }
	}
	}

	if ($_FILES["foto"]["name"] == ""){
	$a = "UPDATE pegawai SET id_pegawai = '$id_pegawai', nama_pegawai = '$nama_pegawai', id_jabatan = '$id_jabatan', email = '$email', jenis_kelamin = '$jenis_kelamin', alamat_pegawai = '$alamat_pegawai', telpon_pegawai = '$telpon_pegawai', username = '$username', password = '$password' WHERE id_pegawai = '$id_pegawai'";
	}else{
	$a = "UPDATE pegawai SET id_pegawai = '$id_pegawai', nama_pegawai = '$nama_pegawai', id_jabatan = '$id_jabatan', email = '$email', jenis_kelamin = '$jenis_kelamin', alamat_pegawai = '$alamat_pegawai', telpon_pegawai = '$telpon_pegawai', username = '$username', password = '$password',foto = '$file' WHERE id_pegawai = '$id_pegawai'";
  	}
	$b = mysqli_query($conn,$a) or die (mysqli_error());
	if ($b == true){
	echo "<script>alert('UPDATE $id_admin BERHASIL')</script>";
	}else{
	echo "<script>alert('UPDATE GAK BERHASIL')</script>";
	}
?>
<meta http-equiv="refresh" content="0;URL=../list_pegawai.php" />