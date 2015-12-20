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

	$part_number = $_POST['part_number'];
	$description = $_POST['deskripsi'];
	$jumlah = $_POST['jumlah'];

	$query = "UPDATE tbl_barang SET description='$description', jumlah='$jumlah' WHERE part_number='$part_number'";
	$sql = custom_query($query);

	if ($description="" || $jumlah="")
	{
		echo 	"<script>
					alert('Terjadi kesalahan, field tidak boleh kosong. Harap ulangi kembali');javascript:window.location='editbrg.php';
				</script>";
	}
	else
 	{
		if ($sql)
		{
			echo	 "<script>
						alert('Selamat, data barang telah terupdate');javascript:window.location='listbarang.php';
					</script>";
		}
		else
		{
			echo	"<script>
						alert('Maaf, data barang gagal terupdate');javascript:window.location='editbrg.php';
					</script>";
		}
	}
}?>