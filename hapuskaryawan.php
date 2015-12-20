<?php
session_start();
include "koneksi.php";

if (empty($_SESSION['username']) AND empty($_SESSION['password'])){echo print "<script>alert('Maaf anda tidak memiliki akses untuk melihat halaman ini, silakan login terlebih dahulu.');javascript:window.location='formlogin.php';</script>";}
else{

$id_karyawan = $_GET['id_karyawan'];

$sql= custom_query("DELETE FROM tbl_karyawan WHERE id_karyawan='$id_karyawan'");

if ($sql)
{
	echo print "<script>alert('Selamat, data user telah dihapus');javascript:window.location='karyawan.php';</script>";
}
else
{
	echo print "<script>alert('Maaf, data user gagal dihapus');javascript:window.location='karyawan.php';</script>";
}
	}
?>