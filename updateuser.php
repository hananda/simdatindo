<?php
session_start();
include "koneksi.php";

if (empty($_SESSION['username']) AND empty($_SESSION['password']))
	{
	echo print "<script>alert('Maaf anda tidak memiliki akses untuk melihat halaman ini, silakan login terlebih dahulu.');javascript:window.location='formlogin.php';</script>";
	}
else
	{
	if ($password="" || $nama_karyawan="" || $id_karyawan="")
		{
		echo print "<script>alert('Terjadi kesalahan, field tidak boleh kosong. Harap ulangi kembali');javascript:window.location='edituser.php';</script>";
		}
	else
 	{
		if (isset($_POST['simpan']))
		{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$nama_karyawan = $_POST['nama_karyawan'];
		$level = $_POST['level'];
		$id_karyawan = $_POST['id_karyawan'];
		$id_cabang = $_POST['id_cabang'];
		$dquery = "UPDATE tbl_user SET password='$password', nama_karyawan='$nama_karyawan', level='$level', id_karyawan='$id_karyawan', id_cabang = '$id_cabang' WHERE username='$username'";

		$sql= custom_query($dquery);
			if ($sql)
				{
				echo "<script>alert('Selamat, data user telah terupdate');javascript:window.location='user.php';</script>";
				}
	
			else
				{
				echo "<script>alert('Maaf, data user gagal terupdate');javascript:window.location='user.php';</script>";
				}
 
		}
	}

}
?>