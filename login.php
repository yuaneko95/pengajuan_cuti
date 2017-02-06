<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" type="text/css" href="vendors/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/animate/animate.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/bootstrap/dist/css/styles.css">
</head>
<body>
	
	<div class="row animated zoomIn">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
				<?php  
					session_start();
					
					include 'admin/koneksi.php';
					if (isset($_POST['login'])) {
						$username = $_POST['username'];
						$userpass = $_POST['password'];
						$status_pegawai = $_POST['status_pegawai']; 
						
						$query = mysqli_query($conn, "SELECT * FROM pegawai WHERE username='$username'");
						
						if (mysqli_num_rows($query) > 0) {
							$data = mysqli_fetch_assoc($query);
							if (password_verify($userpass, $data['password'])) {
									   if ($data['status_pegawai'] == admin && $status_pegawai == admin) {
                                        $_SESSION['username'] =  $username;
                                        $_SESSION['id_pegawai'] = $data['id_pegawai'];
                                        $_SESSION['status_pegawai'] = 'admin';
                                        header('location:admin/index.php');
                                    } elseif ($data['status_pegawai'] == pegawai && $status_pegawai == pegawai) {
                                        $_SESSION['username'] =  $username;
                                        $_SESSION['id_pegawai'] = $data['id_pegawai'];
                                        $_SESSION['status_pegawai'] = 'pegawai';
                                        header('location:index.php');
                                    } else {
                                        echo '<div class="alert alert-danger">Upss...!!! sorry username dan password tidak cocok</div>';
                                    }
							} else {
								echo "username tidak dikenali";
							}
						
						}	
					}
				?>
					<form role="form" action="" method="POST">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Username" name="username" type="text" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
							<div class="form-group">
								<select name="status_pegawai" class="form-control">
									<option value="admin">Admin</option>
									<option value="pegawai">Pegawai</option>
								</select>
							</div>
							<div class="form-group">
						<input type="submit" name="login" class="btn btn-primary btn-block" value="Log me in" />
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	

 <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
	
</body>
</html>