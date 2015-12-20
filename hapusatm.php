<?php
session_start();
include "koneksi.php";

if (empty($_SESSION['username']) AND empty($_SESSION['password']))
{
	echo	"<script>
				alert('Maaf anda tidak memiliki akses untuk melihat halaman ini, silakan login terlebih dahulu.');javascript:window.location='formlogin.php';
			</script>";
}
else
{

	$id_atm = $_GET['id_atm'];
	$query = "DELETE FROM tbl_atm WHERE id_atm='$id_atm'";
	$sql= custom_query($query);

	if ($sql)
	{
		echo 	"<script>
					alert('Selamat, data atm telah dihapus');javascript:window.location='pilihlist.php';
				</script>";
	}
	else
	{
		echo	"<script>
					alert('Maaf, data atm gagal dihapus');javascript:window.location='pilihlist.php';
				</script>";
	}
}
?>