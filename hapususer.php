<?php
session_start();
include "koneksi.php";

if (empty($_SESSION['username']) AND empty($_SESSION['password'])){echo print "<script>alert('Maaf anda tidak memiliki akses untuk melihat halaman ini, silakan login terlebih dahulu.');javascript:window.location='formlogin.php';</script>";}
else{

$username = $_GET['username'];

$sql= custom_query("DELETE FROM tbl_user WHERE username='$username'");

if ($sql)
{
	echo print "<script>alert('Selamat, data user telah dihapus');javascript:window.location='user.php';</script>";
}
else
{
	echo print "<script>alert('Maaf, data user gagal dihapus');javascript:window.location='user.php';</script>";
}
	}
?>