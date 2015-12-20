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
			$id_karyawan = $_POST['id_karyawan'];
			$nama_karyawan = $_POST['nama_karyawan'];
			$jabatan = $_POST['jabatan'];
			$alamat = $_POST['alamat'];
			$no_telp = $_POST['no_telp'];

			$query = "UPDATE tbl_karyawan SET nama_karyawan='$nama_karyawan', jabatan='$jabatan', alamat='$alamat', no_telp='$no_telp' WHERE id_karyawan='$id_karyawan'";
			$sql= custom_query($query);

			if ($alamat="" || $nama_karyawan="" || $no_telp="")
				{
					echo print "<script>alert('Terjadi kesalahan, field tidak boleh kosong. Harap ulangi kembali');javascript:window.location='editkaryawan.php';</script>";
				}
			else
 				{
					if ($sql)
						{
							echo "<script>alert('Selamat, data karyawan telah terupdate');javascript:window.location='karyawan.php';</script>";
						}
					else
						{
							echo "<script>alert('Maaf, data karyawan gagal terupdate');javascript:window.location='karyawan.php';</script>";
						}
				}
		}
}?>