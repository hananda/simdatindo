<link href="css/test.css" rel="stylesheet" type="text/css" />
<?php
include "koneksi.php";
//validasi
$task = $_GET['task'];
if($task == 'tambah'){
	$namadasar = $_POST['nmdasar'];
	
	$dbquery = "SELECT nama_dasar FROM tbl_dasar WHERE nama_dasar = '$namadasar'";
	$a=custom_query($dbquery);

	if (trim($namadasar) == '')
		{
			$error[] = '- Nama dasar harus diisi';
		}
		if(trim(mysqli_num_rows($a)>0))
		{
			$error[]= '- Nama dasar sudah ada, silakan input username yang lain.';
		}

	//dan seterusnya

	if (isset($error)) {
		echo '<div align="center" style="color:red; font-size:20px;"><b>Error</b>: <br /></div><div style="color:red;">'.implode('<br />', $error).'</div>';
	} else {
		/*
		jika data mau dimasukkan ke database,
		maka perintah SQL INSERT bisa ditulis di sini
		*/
	 	
				$dbinput = "INSERT INTO tbl_dasar (nama_dasar)VALUES ('$namadasar')";		
		$input=custom_query($dbinput);
						
		echo '<div align="center" style="color:green; font-size:15px;"><b>Data User berhasil di tambah. silakan klik <a href="dasar.php">disini </a>untuk melihat perubahan</b></div><br />';
			
	}
	die();
}else if($task == 'edit'){
	if (isset($_POST['simpan']))
	{
	$nmdasar = $_POST['nmdasar'];
	$iddasar = $_POST['iddasar'];
	$dquery = "UPDATE tbl_dasar SET nama_dasar='$nmdasar' WHERE id_dasar='$iddasar'";

	$sql= custom_query($dquery);
		if ($sql)
			{
			echo "<script>alert('Selamat, data dasar telah terupdate');javascript:window.location='dasar.php';</script>";
			}

		else
			{
			echo "<script>alert('Maaf, data dasar gagal terupdate');javascript:window.location='dasar.php';</script>";
			}

	}
}else if($task == 'hapus'){
	$iddasar = $_GET['iddasar'];

	$sql= custom_query("DELETE FROM tbl_dasar WHERE id_dasar='$iddasar'");

	if ($sql)
	{
		echo print "<script>alert('Selamat, data dasar telah dihapus');javascript:window.location='dasar.php';</script>";
	}
	else
	{
		echo print "<script>alert('Maaf, data dasar gagal dihapus');javascript:window.location='dasar.php';</script>";
	}
}else{
	echo '<div align="center" style="color:red; font-size:20px;"><b>Error</b>: <br /></div><div style="color:red;">unknown task</div>';
}
?>
