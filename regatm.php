<link href="css/test.css" rel="stylesheet" type="text/css" />
<?php
include "koneksi.php";
//validasi
			$id_atm = $_POST['id_atm'];
			$bank = $_POST['bank'];
			$lokasi = $_POST['lokasi'];
			$sn = $_POST['sn'];
			$install_date = $_POST['install_date'];
			$id_cabang = $_POST['id_cabang'];
 			
			$query = "SELECT id_atm FROM tbl_atm WHERE id_atm = '$id_atm'";
			$a=custom_query($query);

			$query1 = "SELECT sn FROM tbl_atm WHERE sn = '$sn'";
			$a1=custom_query($query1);

	
if (trim($id_atm) == '')
	{
		$error[] = '- ID ATM harus diisi';
	}

if(trim(mysqli_num_rows($a)>0))
	{
		$error[]= '- ID ATM sudah ada, silakan ulangi kembali.';
	}

if (trim($bank) == '')
	{
		$error[] = '- Bank harus dipilih';
	}

if (trim($lokasi) == '')
	{
		$error[] = '- Lokasi harus diisi';
	}

if (trim($sn) == '')
	{
		$error[] = '- Serial Number harus diisi';
	}
	
if(trim(mysqli_num_rows($a1)>0))
	{
		$error[]= '- Serial Number sudah ada, silakan ulangi kembali.';
	}

	
if (trim($install_date) == '')
	{
		$error[] = '- Tanggal Instalasi harus diisi';
	}
	
if (trim($id_cabang) == '')
	{
		$error[] = '- cabang harus diisi';
	}

//dan seterusnya

if (isset($error)) {
	echo '<div align="center" style="color:red; font-size:20px;"><b>Error</b>: <br /></div><div style="color:red;">'.implode('<br />', $error).'</div>';
} else {
	/*
	jika data mau dimasukkan ke database,
	maka perintah SQL INSERT bisa ditulis di sini
	*/
 	
			$query2 = "INSERT INTO tbl_atm (id_atm,bank,lokasi,sn,install_date,id_cabang) VALUES ('$id_atm','$bank', '$lokasi', '$sn','$install_date','$id_cabang')";
				$input=custom_query($query2);
					
	echo '<div align="center" style="color:green; font-size:15px;"><b>Data ATM berhasil di tambah. silakan klik <a href="pilihlist.php">disini</a> untuk melihat perubahan:</b></div><br />';
		
}
die();
?>