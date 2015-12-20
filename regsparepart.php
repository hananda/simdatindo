<link href="css/test.css" rel="stylesheet" type="text/css" />
<?php
include "koneksi.php";
//validasi
			$pn = $_POST['pn'];
			$description = $_POST['description'];
			$jumlah = $_POST['jumlah'];
			
			$query = "SELECT part_number FROM tbl_barang WHERE part_number = '$pn'";
			$a=custom_query($query);

	
if (trim($pn) == '')
	{
		$error[] = '- Part Number harus diisi';
	}

if(trim(mysqli_num_rows($a)>0))
	{
		$error[]= '- Part Number sudah ada, silakan ulangi kembali.';
	}

if (trim($description) == '')
	{
		$error[] = '- Deskripsi harus dipilih';
	}

if (trim($jumlah) == '')
	{
		$error[] = '- Jumlah barang harus diisi';
	}

//dan seterusnya

if (isset($error)) {
	echo '<div align="center" style="color:red; font-size:20px;"><b>Error</b>: <br /></div><div style="color:red;">'.implode('<br />', $error).'</div>';
} else {
	/*
	jika data mau dimasukkan ke database,
	maka perintah SQL INSERT bisa ditulis di sini
	*/
 	
			$query1 = "INSERT INTO tbl_barang (part_number,description,jumlah) VALUES ('$pn','$description', '$jumlah')";
				$input=custom_query($query1);
					
	echo '<div align="center" style="color:green; font-size:15px;"><b>Data Sparepart Baru berhasil di tambah. silakan klik <a href="listbarang.php">disini</a> untuk melihat perubahan:</b></div><br />';
		
}
die();
?>