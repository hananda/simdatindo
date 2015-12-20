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

	$part_number = $_GET['part_number'];
	$query = "DELETE FROM tbl_barang WHERE part_number='$part_number'";
	$sql= custom_query($query);

	if ($sql)
	{
		echo 	"<script>
					alert('Selamat, data barang telah dihapus');javascript:window.location='listbarang.php';
				</script>";
	}
	else
	{
		echo	"<script>
					alert('Maaf, data barang gagal dihapus');javascript:window.location='listbarang.php';
				</script>";
	}
}
?>