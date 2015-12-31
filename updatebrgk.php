<link href="css/test.css" rel="stylesheet" type="text/css" />
<?php
include "koneksi.php";
//validasi
			$noform = $_POST['noform'];
			$part_number = $_POST['partnumber2'];
			$deskripsi = $_POST['deskripsi'];
			$jumlah = $_POST['jumlah'];
			$id_atm = $_POST['id_atm'];
			$lokasi = $_POST['lokasi'];
			$problem = $_POST['problem'];
			$nama_karyawan = $_POST['nama_karyawan'];
			$alamat = $_POST['alamat'];
			$username = $_POST['id_user'];
			$tgl_keluar = $_POST['tgl_keluar'];
			$keterangan = $_POST['keterangan'];
			$id_cabang = $_POST['id_cabang'];
			$id_dasar = $_POST['id_dasar'];
			
			
	

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

if (trim($id_atm) == '')
	{
		$error[] = '- ID ATM harus diisi';
	}

if (trim($nama_karyawan) == '')
	{
		$error[] = '- Nama Engineer harus dipilih';
	}

if (trim($tgl_keluar) == '')
	{
		$error[] = '- Tanggal Keluar harus diisi';
	}
if (trim($id_cabang) == '')
	{
		$error[] = '- cabang harus diisi';
	}
if (trim($id_dasar) == '')
	{
		$error[] = '- dasar barang keluar harus diisi';
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
			
			
		$tblupdate = "SELECT * FROM tbl_det_keluar WHERE no_form_k = '$noform'";
		$update = custom_query($tblupdate);
		 while ($r = mysqli_fetch_array($update))
  {
		$hasil = $r['jumlah'];
  }
  		
		
  		$tblupdate1 = "SELECT * FROM tbl_barang WHERE part_number = '$part_number'";
		$update1 = custom_query($tblupdate1);
		 while ($r1 = mysqli_fetch_array($update1))
  {
		$hasil1 = @$r1['jumlah'];
  }
  
		if ($jumlah > $hasil1)
		{
			echo '<div align="center"><b>Error</b>: <br />Persediaan barang tidak mencukupi, harap periksa jumlah pada stocklist</div>';
		}
  		else
		{
			// echo $jumlah;
			// echo $hasil;

			if ($jumlah > $hasil)
			{
				$ok = ($hasil1 - ($jumlah - $hasil ));
				$sqlupdate = "UPDATE tbl_barang SET jumlah = '$ok' WHERE part_number = '$part_number'";
				$jmlupdate = custom_query($sqlupdate);
				
				$dbinput = "UPDATE `tbl_det_keluar` SET part_number = '$part_number', description = '$deskripsi', jumlah = '$jumlah', problem = '$problem', id_atm = '$id_atm', lokasi = '$lokasi', nama_karyawan = '$nama_karyawan', alamat = '$alamat', username = '$username', tgl_keluar = '$tgl_keluar', keterangan = '$keterangan', id_dasar = '$id_dasar', id_cabang = '$id_cabang' WHERE no_form_k = '$noform'";		
				$input = custom_query($dbinput);
			
			
				echo '<div align="center" style="color:green; font-size:15px;"><b>Data barang keluar berhasil di edit. silakan klik <a href="detbrgkeluar.php">disini </a>untuk melihat perubahan</b></div><br />';
			}
			if ($jumlah < $hasil)
			{
				$ok1 = (($hasil - $jumlah) + $hasil1 );
				$sqlupdate1 = "UPDATE tbl_barang SET jumlah = '$ok1' WHERE part_number = '$part_number'";
				$jmlupdate1 = custom_query($sqlupdate1);
				
				$dbinput = "UPDATE `tbl_det_keluar` SET part_number = '$part_number', description = '$deskripsi', jumlah = '$jumlah', problem = '$problem', id_atm = '$id_atm', lokasi = '$lokasi', nama_karyawan = '$nama_karyawan', alamat = '$alamat', username = '$username', tgl_keluar = '$tgl_keluar', keterangan = '$keterangan', id_dasar = '$id_dasar', id_cabang = '$id_cabang' WHERE no_form_k = '$noform'";		
				$input = custom_query($dbinput);
				
				echo '<div align="center" style="color:green; font-size:15px;"><b>Data barang keluar berhasil di edit. silakan klik <a href="detbrgkeluar.php">disini </a>untuk melihat perubahan</b></div><br />';
			}

			if ($jumlah == $hasil) {
				echo '<div align="center" style="color:green; font-size:15px;"><b>Data barang keluar berhasil di edit. silakan klik <a href="detbrgkeluar.php">disini </a>untuk melihat perubahan</b></div><br />';
			}
			
		}
}
die();
?>
