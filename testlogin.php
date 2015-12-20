<?php
    include "koneksi.php";
	
	$waktu=time()+25200;
	$expired=30;
    $username = $_POST['username'];
	$username = htmlentities(str_replace("'",'',$username));
    $password = $_POST['password'];
	$password = htmlentities(str_replace("'",'',$password));
    
    $login = custom_query("SELECT * FROM tbl_user WHERE username='".$username."' AND password='".$password."'");
    $hasil = mysqli_num_rows($login);
    $r = mysqli_fetch_array($login);
    
    if ($hasil > 0)
    {
      session_start();
      isset($_SESSION['username']);
      isset($_SESSION['password']);
      isset($_SESSION['password']);
      $_SESSION['id_karyawan']     = $r['user_id'];
      $_SESSION['username']     = $r['username'];
      $_SESSION['password']     = $r['password'];
      $_SESSION['level']    = $r['level'];
	  $_SESSION['timeout']=$waktu+$expired;
      header('location:/simdatindo');
    }
    else{ echo print "<script>alert('Username atau password salah. Silakan mencoba kembali.');javascript:window.location='formlogin.php';</script>";}

?>