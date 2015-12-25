<?php
session_start();
include "koneksi.php";

if (empty($_SESSION['username']) AND empty($_SESSION['password']))
	{
		echo "<script>alert('Maaf anda tidak memiliki akses untuk melihat halaman ini, silakan login terlebih dahulu.');javascript:window.location='formlogin.php';</script>";
	}
else
	{
		if (isset($_POST['simpan']))
		{
			$id_atm = $_POST['id_atm'];
			$bank = $_POST['bank'];
			$lokasi = $_POST['lokasi'];
			$sn = $_POST['sn'];
			$install_date = $_POST['install_date'];
			$id_cabang = $_POST['id_cabang'];

			$query = "UPDATE tbl_atm SET bank='$bank', lokasi='$lokasi', sn='$sn', install_date='$install_date', id_cabang='$id_cabang' WHERE id_atm='$id_atm'";
			$query1 = "SELECT sn FROM tbl_atm WHERE sn = '$sn'";
			
			$sql= custom_query($query);
			$sql1 = custom_query($query1);

			if ($lokasi="" || $sn="")
				{
					echo	"<script>
								alert('Terjadi kesalahan, field tidak boleh kosong. Harap ulangi kembali');javascript:window.location='pilihlist.php';
							</script>";
				}
			else
 				{
				
					if ($sql)
					{
						echo "<script>alert('Selamat, data ATM telah terupdate');javascript:window.location='pilihlist.php';</script>";
					}
					else
					{
						echo "<script>alert('Maaf, data ATM gagal terupdate');javascript:window.location='pilihlist.php';</script>";
					}
					
				}
		}
}?>