<link href="css/test.css" rel="stylesheet" type="text/css" />
<?php
include "koneksi.php";
//validasi
			$username = $_POST['username'];
			$password = $_POST['password'];
			$repassword = $_POST['repassword'];
			$nama_karyawan = $_POST['nama_karyawan'];
			$level = $_POST['level'];
			$id_karyawan = $_POST['id_karyawan'];
			$id_cabang = $_POST['id_cabang'];
			
			$dbquery = "SELECT username FROM tbl_user WHERE username = '$username'";
			$a=custom_query($dbquery);
	
if (trim($username) == '')
	{
		$error[] = '- Username harus diisi';
	}
if (strlen($username) <=3)
	{
		$error[] = '- Username minimal 4 karakter';
	}
if(trim(mysqli_num_rows($a)>0))
	{
		$error[]= '- Username sudah ada, silakan input username yang lain.';
	}

if (trim($password) == '')
	{
		$error[] = '- Password harus diisi';
	}

if (trim($repassword) != $password)
	{
		$error[] = '- Konfirmasi password tidak sama, harap ulangi kembali';
	}


if (strlen($password) <=5)
	{
		$error[] = '- Password minimal 6 karakter';
	}
	
if (trim($nama_karyawan) == '')
	{
		$error[] = '- Nama Karyawan harus diisi';
	}

if (trim($level) == '')
	{
		$error[] = '- Level hak akses harus di pilih';
	}

if (trim($id_karyawan) == '')
	{
		$error[] = '- ID Karyawan harus dipilih';
	}
if (trim($id_cabang) == '')
	{
		$error[] = '- cabang harus dipilih';
	}

//dan seterusnya

if (isset($error)) {
	echo '<div align="center" style="color:red; font-size:20px;"><b>Error</b>: <br /></div><div style="color:red;">'.implode('<br />', $error).'</div>';
} else {
	/*
	jika data mau dimasukkan ke database,
	maka perintah SQL INSERT bisa ditulis di sini
	*/
 	
			$dbinput = "INSERT INTO tbl_user (username,password,nama_karyawan,level,id_karyawan,id_cabang)VALUES ('$username','$password','$nama_karyawan','$level','$id_karyawan','$id_cabang')";		
	$input=custom_query($dbinput);
					
	echo '<div align="center" style="color:green; font-size:15px;"><b>Data User berhasil di tambah. silakan klik <a href="user.php">disini </a>untuk melihat perubahan</b></div><br />';
		
}
die();
?>
