<?php 

session_start();
include '../koneksi.php';
 
if(!empty($_POST)){
     
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    $sql = "select * from pegawai where username='".$username."' and password='".$password."'";
    #echo $sql."<br />";
    $query = mysqli_query($conn, $sql) or die (mysqli_error());
    // pengecekan query valid atau tidak
    if($query){
        $row = mysqli_num_rows($query);
         
        // jika $row > 0 atau username dan password ditemukan
        if($row > 0){
            $_SESSION['isLoggedIn']=1;
            $_SESSION['username_admin']=$username_admin;
            
            $result  = array('status' => true, 'message' => 'berhasil login', redirect('../index.php','refresh') );
        }else{
            $result  = array('status' => false, 'message' => 'gagal login' );
        }
        echo json_encode($result);
    }

}

?>