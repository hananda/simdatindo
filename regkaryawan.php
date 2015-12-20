<link href="css/test.css" rel="stylesheet" type="text/css" />
<?php
include "koneksi.php";
//validasi
			// $id_karyawan = $_POST['id_karyawan'];
			$nama_karyawan = $_POST['nama_karyawan'];
			$jabatan = $_POST['jabatan'];
			$alamat = $_POST['alamat'];
			$no_telp = $_POST['no_telp'];
 			
			// $query = "SELECT id_karyawan FROM tbl_karyawan WHERE id_karyawan = '$id_karyawan'";
			// $a=custom_query($query);

	
// if (trim($id_karyawan) == '')
// 	{
// 		$error[] = '- ID Karyawan harus diisi';
// 	}

// if(trim(mysqli_num_rows($a)>0))
// 	{
// 		$error[]= '- ID Karyawan sudah ada, silakan ulangi kembali.';
// 	}

if (trim($nama_karyawan) == '')
	{
		$error[] = '- Nama Karyawan harus diisi';
	}

if (trim($jabatan) == '')
	{
		$error[] = '- Jabatan harus diisi';
	}
	
if (trim($alamat) == '')
	{
		$error[] = '- Alamat harus diisi';
	}

if (trim($no_telp) == '')
	{
		$error[] = '- Nomor telepon harus diisi';
	}
//dan seterusnya

if (isset($error)) {
	echo '<div align="center" style="color:red; font-size:20px;"><b>Error</b>: <br /></div><div style="color:red;">'.implode('<br />', $error).'</div>';
} else {
	/*
	jika data mau dimasukkan ke database,
	maka perintah SQL INSERT bisa ditulis di sini
	*/
 	
			$query1 = "INSERT INTO tbl_karyawan (nama_karyawan,jabatan,alamat,no_telp) VALUES ('$nama_karyawan', '$jabatan', '$alamat','$no_telp')";
				$input=custom_query($query1);
					
	echo '<div align="center" style="color:green; font-size:15px;"><b>Data Karyawan berhasil di tambah. silakan klik <a href="karyawan.php">disini</a> untuk melihat perubahan:</b></div><br />';
		
}
die();
?>