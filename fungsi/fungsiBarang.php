<?php

include '../koneksi.php';

function ambilDeskripsi()
{
	$pn = $_POST['part_number'];
	$qry = "SELECT * FROM tbl_barang WHERE part_number = '$pn'";
	$sql = custom_query($qry);
	
	while ($array = mysqli_fetch_array($sql))
	{
		
		echo $array['description'];
	}
}


function ambilLokasi()
{
	$id_atm = $_POST['id_atm'];
	$qry1 = "SELECT * FROM tbl_atm WHERE id_atm = '$id_atm'";
	$sql1 = custom_query($qry1);
	
	while ($array1 = mysqli_fetch_array($sql1))
	{
		
		echo $array1['lokasi'];
	}
}

function ambilAlamat()
{
	
	$nama_karyawan = $_POST['nama_karyawan'];
	$qry2 = "SELECT * FROM tbl_karyawan WHERE nama_karyawan = '$nama_karyawan'";
	$sql2 = custom_query($qry2);
	
	while ($array2 = mysqli_fetch_array($sql2))
	{
		
		echo $array2['alamat'];
	}
	
}


$switchFunction = $_POST['function'];
switch($switchFunction)
{
	case "ambilDeskripsi":
		ambilDeskripsi();
	break;
	case "ambilLokasi":
		ambilLokasi();
	break;
		case "ambilAlamat":
		ambilAlamat();
	break;

	default:
		echo "error";
	break;
}

?>