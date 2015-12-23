<link href="css/test.css" rel="stylesheet" type="text/css" />
<?php
include "koneksi.php";
//validasi
$task = $_GET['task'];
if($task == 'tambah'){
	$namaketerangan = $_POST['nmketerangan'];
	
	$dbquery = "SELECT nama_keterangan FROM tbl_keterangan WHERE nama_keterangan = '$namaketerangan'";
	$a=custom_query($dbquery);

	if (trim($namaketerangan) == '')
		{
			$error[] = '- Nama keterangan harus diisi';
		}
		if(trim(mysqli_num_rows($a)>0))
		{
			$error[]= '- Nama keterangan sudah ada, silakan input username yang lain.';
		}

	//dan seterusnya

	if (isset($error)) {
		echo '<div align="center" style="color:red; font-size:20px;"><b>Error</b>: <br /></div><div style="color:red;">'.implode('<br />', $error).'</div>';
	} else {
		/*
		jika data mau dimasukkan ke database,
		maka perintah SQL INSERT bisa ditulis di sini
		*/
	 	
				$dbinput = "INSERT INTO tbl_keterangan (nama_keterangan)VALUES ('$namaketerangan')";		
		$input=custom_query($dbinput);
						
		echo '<div align="center" style="color:green; font-size:15px;"><b>Data User berhasil di tambah. silakan klik <a href="keterangan.php">disini </a>untuk melihat perubahan</b></div><br />';
			
	}
	die();
}else if($task == 'edit'){
	if (isset($_POST['simpan']))
	{
	$nmketerangan = $_POST['nmketerangan'];
	$idketerangan = $_POST['idketerangan'];
	$dquery = "UPDATE tbl_keterangan SET nama_keterangan='$nmketerangan' WHERE id_keterangan='$idketerangan'";

	$sql= custom_query($dquery);
		if ($sql)
			{
			echo "<script>alert('Selamat, data keterangan telah terupdate');javascript:window.location='keterangan.php';</script>";
			}

		else
			{
			echo "<script>alert('Maaf, data keterangan gagal terupdate');javascript:window.location='keterangan.php';</script>";
			}

	}
}else if($task == 'hapus'){
	$idketerangan = $_GET['idketerangan'];

	$sql= custom_query("DELETE FROM tbl_keterangan WHERE id_keterangan='$idketerangan'");

	if ($sql)
	{
		echo print "<script>alert('Selamat, data keterangan telah dihapus');javascript:window.location='keterangan.php';</script>";
	}
	else
	{
		echo print "<script>alert('Maaf, data keterangan gagal dihapus');javascript:window.location='keterangan.php';</script>";
	}
}else{
	echo '<div align="center" style="color:red; font-size:20px;"><b>Error</b>: <br /></div><div style="color:red;">unknown task</div>';
}
?>
