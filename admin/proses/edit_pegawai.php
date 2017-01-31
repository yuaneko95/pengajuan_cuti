<?php 
	include "../koneksi.php";

	$id_pegawai = $_POST['id_pegawai'];
	$nama_pegawai = $_POST['nama_pegawai'];
	$id_jabatan = $_POST['id_jabatan'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$email = $_POST['email'];
	$alamat_pegawai = $_POST['alamat_pegawai'];
	$telpon_pegawai = $_POST['telpon_pegawai'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	$nama_folder="../img/";

	$jenis_gambar=$_FILES["foto"]["type"];

	if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/png"){           

				$alamat = $nama_folder . basename($_FILES['foto']['name']);
				$foto = basename($_FILES['foto']['name']);       
				
				if (!move_uploaded_file($_FILES['foto']['tmp_name'], $alamat)) 

				{

				   die("Gambar gagal dikirim");

				}

			} else { die("Jenis gambar yang anda kirim salah. Harus .jpg .gif .png"); 
		}

	$sql = "UPDATE pegawai SET id_pegawai = '$id_pegawai', nama_pegawai = '$nama_pegawai', id_jabatan = '$id_jabatan', jenis_kelamin = '$jenis_kelamin', email = '$email', alamat_pegawai = '$alamat_pegawai', telpon_pegawai = '$telpon_pegawai', foto = '$foto', username = '$username', password = '$password' WHERE id_pegawai = '$id_pegawai'";

	$s = mysqli_query($conn, $sql) or die(mysqli_error($conn));
	header("location:../list_pegawai.php");
?>