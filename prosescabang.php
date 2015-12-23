<link href="css/test.css" rel="stylesheet" type="text/css" />
<?php
include "koneksi.php";
//validasi
$task = $_GET['task'];
if($task == 'tambah'){
	$namacabang = $_POST['nmcabang'];
	
	$dbquery = "SELECT nama_cabang FROM tbl_cabang WHERE nama_cabang = '$namacabang'";
	$a=custom_query($dbquery);

	if (trim($namacabang) == '')
		{
			$error[] = '- Nama cabang harus diisi';
		}
		if(trim(mysqli_num_rows($a)>0))
		{
			$error[]= '- Nama cabang sudah ada, silakan input username yang lain.';
		}

	//dan seterusnya

	if (isset($error)) {
		echo '<div align="center" style="color:red; font-size:20px;"><b>Error</b>: <br /></div><div style="color:red;">'.implode('<br />', $error).'</div>';
	} else {
		/*
		jika data mau dimasukkan ke database,
		maka perintah SQL INSERT bisa ditulis di sini
		*/
	 	
				$dbinput = "INSERT INTO tbl_cabang (nama_cabang)VALUES ('$namacabang')";		
		$input=custom_query($dbinput);
						
		echo '<div align="center" style="color:green; font-size:15px;"><b>Data User berhasil di tambah. silakan klik <a href="cabang.php">disini </a>untuk melihat perubahan</b></div><br />';
			
	}
	die();
}else if($task == 'edit'){
	if (isset($_POST['simpan']))
	{
	$nmcabang = $_POST['nmcabang'];
	$idcabang = $_POST['idcabang'];
	$dquery = "UPDATE tbl_cabang SET nama_cabang='$nmcabang' WHERE id_cabang='$idcabang'";

	$sql= custom_query($dquery);
		if ($sql)
			{
			echo "<script>alert('Selamat, data cabang telah terupdate');javascript:window.location='cabang.php';</script>";
			}

		else
			{
			echo "<script>alert('Maaf, data cabang gagal terupdate');javascript:window.location='cabang.php';</script>";
			}

	}
}else if($task == 'hapus'){
	$idcabang = $_GET['idcabang'];

	$sql= custom_query("DELETE FROM tbl_cabang WHERE id_cabang='$idcabang'");

	if ($sql)
	{
		echo print "<script>alert('Selamat, data cabang telah dihapus');javascript:window.location='cabang.php';</script>";
	}
	else
	{
		echo print "<script>alert('Maaf, data cabang gagal dihapus');javascript:window.location='cabang.php';</script>";
	}
}else{
	echo '<div align="center" style="color:red; font-size:20px;"><b>Error</b>: <br /></div><div style="color:red;">unknown task</div>';
}
?>
