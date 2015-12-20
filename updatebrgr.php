<link href="css/test.css" rel="stylesheet" type="text/css" />
<?php
include "koneksi.php";
//validasi
			$noform = $_POST['noform'];
			$part_number = $_POST['part_number'];
			$deskripsi = $_POST['deskripsi'];
			$jumlah = $_POST['jumlah'];
			$alasan = $_POST['alasan'];
			$tgl_return = $_POST['tgl_return'];
			$username = $_POST['id_user'];
			$keterangan = $_POST['keterangan'];			
			
			
	

if (trim($part_number) == '')
	{
		$error[] = '- Part Number harus diisi';
	}

if (trim($jumlah) == '')
	{
		$error[] = '- Jumlah harus diisi';
	}

if (trim($jumlah) == 0)
	{
		$error[] = '- Jumlah tidak boleh nol';
	}

if (trim($alasan) == '')
	{
		$error[] = '- Alasan Barang di return harus diisi';
	}

if (trim($tgl_return) == '')
	{
		$error[] = '- Tanggal barang di return harus diisi';
	}

//dan seterusnya

if (isset($error)) 
{
	echo '<div align="center"><b>Error</b>: <br /></div>'.implode('<br />', $error);
} 
else
{
	/*
	jika data mau dimasukkan ke database,
	maka perintah SQL INSERT bisa ditulis di sini
	*/
			
			
		$tblupdate = "SELECT * FROM tbl_det_return WHERE no_form_r = '$noform'";
		$update = custom_query($tblupdate);
		 while ($r = mysqli_fetch_array($update))
  {
		$hasil = $r['jumlah'];
  }
  		
		
  		$tblupdate1 = "SELECT * FROM tbl_barang WHERE part_number = '$part_number'";
		$update1 = custom_query($tblupdate1);
		 while ($r1 = mysqli_fetch_array($update1))
  {
		$hasil1 = $r1['jumlah'];
  }
  
		if ($jumlah > $hasil1)
		{
			echo '<div align="center"><b>Error</b>: <br />Barang yang di return melebihi jumlah stoklist, harap periksa jumlah pada stocklist</div>';
		}
  		else
		{
			
			if ($jumlah > $hasil)
			{
				$ok = ($hasil1 - ($jumlah - $hasil ));
				$sqlupdate = "UPDATE tbl_barang SET jumlah = '$ok' WHERE part_number = '$part_number'";
				$jmlupdate = custom_query($sqlupdate);
				
				$dbinput = "UPDATE `tbl_det_return` SET part_number = '$part_number', description = '$deskripsi', jumlah = '$jumlah', alasan = '$alasan', tgl_return = '$tgl_return', username = '$username',  keterangan = '$keterangan' WHERE no_form_r = '$noform'";		
				$input = custom_query($dbinput);
			
			
				echo '<div align="center"><b>Data barang yang di return berhasil di edit. silakan klik <a href="detbrgreturn.php">disini </a>untuk melihat perubahan</b></div><br />';
			}
			if ($jumlah < $hasil)
			{
				$ok1 = (($hasil - $jumlah) + $hasil1 );
				$sqlupdate1 = "UPDATE tbl_barang SET jumlah = '$ok1' WHERE part_number = '$part_number'";
				$jmlupdate1 = custom_query($sqlupdate1);
				
				$dbinput = "UPDATE `tbl_det_return` SET part_number = '$part_number', description = '$deskripsi', jumlah = '$jumlah', alasan = '$alasan', tgl_return = '$tgl_return', username = '$username',  keterangan = '$keterangan' WHERE no_form_r = '$noform'";		
				$input = custom_query($dbinput);
			
			
				echo '<div align="center"><b>Data barang yang di return berhasil di edit. silakan klik <a href="detbrgreturn.php">disini </a>untuk melihat perubahan</b></div><br />';			}
			
		}
}
die();
?>
