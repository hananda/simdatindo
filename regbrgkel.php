<link href="css/test.css" rel="stylesheet" type="text/css" />
<?php
include "koneksi.php";
//validasi
			$noform = $_POST['noform'];
			$part_number = $_POST['part_number'];
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
			
			$dbquery = "SELECT no_form_k FROM tbl_det_keluar WHERE no_form_k = '$noform'";
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
		$tblupdate = "SELECT jumlah FROM tbl_barang WHERE part_number = '$part_number'";
		$update = custom_query($tblupdate);
		 while ($r = mysqli_fetch_array($update))
  {
		$hasil = $r['jumlah'];
  }
  		if($jumlah > $hasil)
		{
			echo '<div align="center"><b>Error</b>: <br />Persediaan barang tidak mencukupi, harap periksa jumlah pada stocklist</div>';
		}
		else
		{
		$ok = ($hasil - $jumlah );
		$sqlupdate = "UPDATE tbl_barang SET jumlah = '$ok' WHERE part_number = '$part_number'";
		$jmlupdate = custom_query($sqlupdate);
	
		$dbinput = "INSERT INTO `tbl_det_keluar`(`no_form_k`, `part_number`, `description`, `jumlah`, `problem`, `id_atm`, `lokasi`, `nama_karyawan`, `alamat`, `username`, `tgl_keluar`, `keterangan`, `id_dasar`, `id_cabang`) VALUES ('$noform','$part_number','$deskripsi','$jumlah','$problem','$id_atm','$lokasi','$nama_karyawan','$alamat','$username','$tgl_keluar','$keterangan','$id_dasar','$id_cabang')";		
			$input = custom_query($dbinput);
			

		echo '<div align="center" style="color:green; font-size:15px;"><b>Data barang keluar berhasil di tambah. silakan klik <a href="detbrgkeluar.php">disini </a>untuk melihat perubahan</b></div><br />';
		}
}
die();
?>
