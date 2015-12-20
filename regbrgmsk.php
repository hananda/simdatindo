<link href="css/test.css" rel="stylesheet" type="text/css" />
<?php
include "koneksi.php";
//validasi
			$noform = $_POST['noform'];
			$part_number = $_POST['part_number'];
			$deskripsi = $_POST['deskripsi'];
			$jumlah = $_POST['jumlah'];
			$username = $_POST['id_user'];
			$tgl_masuk = $_POST['tgl_masuk'];
			$keterangan = $_POST['keterangan'];
			
			$dbquery = "SELECT no_form_m FROM tbl_det_masuk WHERE no_form_m = '$noform'";
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

if (trim($tgl_masuk) == '')
	{
		$error[] = '- Tanggal Masuk harus diisi';
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
			
		$tblupdate = "SELECT * FROM tbl_barang WHERE part_number = '$part_number'";
		$update = custom_query($tblupdate);
		 while ($r = mysqli_fetch_array($update))
  {
		$hasil = $r['jumlah'];
  }
		
		$sqlupdate = "UPDATE tbl_barang SET jumlah = ('$hasil' + '$jumlah' )WHERE part_number = '$part_number'";
		$jmlupdate = custom_query($sqlupdate);
		
			$dbinput = "INSERT INTO `tbl_det_masuk`(`no_form_m`, `part_number`, `description`, `jumlah`,   `tgl_masuk`, `username`, `keterangan`) VALUES ('$noform','$part_number','$deskripsi','$jumlah','$tgl_masuk','$username','$keterangan')";		
			$input = custom_query($dbinput);

	
		echo '<div align="center" style="color:green; font-size:15px;"><b>Data barang masuk berhasil di tambah. silakan klik <a href="detbrgmasuk.php">disini </a>untuk melihat perubahan</b></div><br />';
}
die();
?>
