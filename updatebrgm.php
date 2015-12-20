<link href="css/test.css" rel="stylesheet" type="text/css" />
<?php
include "koneksi.php";
//validasi
			$noform = $_POST['noform'];
			$part_number = $_POST['part_number'];
			$deskripsi = $_POST['deskripsi'];
			$jumlah = $_POST['jumlah'];
			$tgl_masuk = $_POST['tgl_masuk'];
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
			
			
		$tblupdate = "SELECT * FROM tbl_det_masuk WHERE no_form_m = '$noform'";
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
  
					
			if ($jumlah > $hasil)
			{
				$ok = ($hasil1 + ($jumlah - $hasil ));
				$sqlupdate = "UPDATE tbl_barang SET jumlah = '$ok' WHERE part_number = '$part_number'";
				$jmlupdate = custom_query($sqlupdate);
				
				$dbinput = "UPDATE `tbl_det_masuk` SET part_number = '$part_number', description = '$deskripsi', jumlah = '$jumlah', tgl_masuk = '$tgl_masuk', username = '$username', keterangan = '$keterangan' WHERE no_form_m = '$noform'";		
				$input = custom_query($dbinput);
			
			
				echo '<div align="center" style="color:green; font-size:15px;"><b>Data barang masuk berhasil di edit. silakan klik <a href="detbrgmasuk.php">disini </a>untuk melihat perubahan</b></div><br />';
			}
			if ($jumlah < $hasil)
			{
				$ok1 = ($hasil1 - ($hasil - $jumlah));
				$sqlupdate1 = "UPDATE tbl_barang SET jumlah = '$ok1' WHERE part_number = '$part_number'";
				$jmlupdate1 = custom_query($sqlupdate1);
				
				$dbinput = "UPDATE `tbl_det_masuk` SET part_number = '$part_number', description = '$deskripsi', jumlah = '$jumlah', tgl_masuk = '$tgl_masuk', username = '$username', keterangan = '$keterangan' WHERE no_form_m = '$noform'";		
				$input = custom_query($dbinput);
				
				echo '<div align="center" style="color:green; font-size:15px;"><b>Data barang masuk berhasil di edit. silakan klik <a href="detbrgmasuk.php">disini </a>untuk melihat perubahan</b></div><br />';
			}
			else
			{
				$dbinput = "UPDATE `tbl_det_masuk` SET part_number = '$part_number', description = '$deskripsi', jumlah = '$jumlah', tgl_masuk = '$tgl_masuk', username = '$username', keterangan = '$keterangan' WHERE no_form_k = '$noform'";		
				$input = custom_query($dbinput);
			}
			
		
}
die();
?>
