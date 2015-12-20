<link href="css/test.css" rel="stylesheet" type="text/css" />
<?php
include "koneksi.php";
//validasi
			$noform = $_POST['noform'];
			$part_number = $_POST['part_number'];
			$deskripsi = $_POST['deskripsi'];
			$jumlah = $_POST['jumlah'];
			$alasan = $_POST['alasan'];
			$username = $_POST['id_user'];
			$tgl_return = $_POST['tgl_return'];
			$keterangan = $_POST['keterangan'];
			
			$dbquery = "SELECT no_form_r FROM tbl_det_return WHERE no_form_r = '$noform'";
			$a=custom_query($dbquery);
	
if (trim($noform) == '')
	{
		$error[] = '- Nomor Formulir barang harus diisi';
	}
	
if(trim(mysqli_num_rows($a)>0))
	{
		$error[]= '- Nomor Form sudah ada, silakan input Nomor Form yang lain.';
	}

if (trim($part_number) == '')
	{
		$error[] = '- Part Number harus diisi';
	}

if (trim($jumlah) == '')
	{
		$error[] = '- Jumlah harus diisi';
	}

if (trim($alasan) == '')
	{
		$error[] = '- Alasan barang direturn harus diisi';
	}

if (trim($tgl_return) == '')
	{
		$error[] = '- Tanggal Return barang harus diisi';
	}

//dan seterusnya

if (isset($error)) 
{
	echo '<div align="center" style="color:red; font-size:20px;"><b>Error</b>: <br /></div><div style="color:red;">'.implode('<br />', $error).'</div>';
} 
else
{
	/*
	jika data mau dimasukkan ke database,
	maka perintah SQL INSERT bisa ditulis di sini
	*/
	$dbinput = "INSERT INTO `tbl_det_return`(`no_form_r`, `part_number`, `description`, `jumlah`, `alasan`,`tgl_return`, `username`, `keterangan`) VALUES ('$noform','$part_number','$deskripsi','$jumlah','$alasan','$tgl_return','$username','$keterangan')";		
			$input = custom_query($dbinput);
			
		$tblupdate = "SELECT * FROM tbl_barang WHERE part_number = '$part_number'";
		$update = custom_query($tblupdate);
		 while ($r = mysqli_fetch_array($update))
  {
		$hasil = $r['jumlah'];
  }
		if($jumlah > $hasil)
		{
			echo '<div align="center"><b>Error</b>: <br />Jumlah barang yang akan di return tidak sesuai dengan jumlah yang ada pada stocklist</div>';
		}
		else
		{
		$ok = ($hasil - $jumlah );
		$sqlupdate = "UPDATE tbl_barang SET jumlah = '$ok' WHERE part_number = '$part_number'";
		$jmlupdate = custom_query($sqlupdate);
	
		echo '<div align="center"><b>Data barang return berhasil di tambah. silakan klik <a href="detbrgreturn.php">disini </a>untuk melihat perubahan</b></div><br />';
		}
}
die();
?>
