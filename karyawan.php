<?php
session_start();
include "koneksi.php";
error_reporting(0);
$waktu=time()+25200;
$expired=30;
if ($_SESSION[level] == "admin")
{

	if (empty($_SESSION['username']) AND empty($_SESSION['password']))
	{
		include "formlogin.php";
	}
	else
	{
?>
<html>
	<head>
    <link href="css/test.css" type="text/css" rel="stylesheet"> 
    <link href="../images/icon.jpg" rel="shortcut icon" />
	<title>ATM Logistic</title>
		<style>
		table{
	border:medium dashed #FFF;
	margin-bottom:10px;
		}
		td.field
		{
		width:200px;
		}
		td.field input
    {
		width:100%;
	}
		</style>
	</head>
</html>
	<body>
    <div id="header">
    </div>
	<div id="main_content">
	<?php include "atas.php"; ?>
<p align="center"><strong>Data Semua Karyawan Yang Terdaftar</strong></p>
	<table align="center" width="801" border="0">
  
  <tr>
    <td width="36"><div align="center"><strong>No.</strong></div></td>

  
    <td width="201"><div align="center"><strong>Id Karyawan</strong></div></td>
    <td width="189"><div align="center"><strong>Nama Karyawan</strong></div></td>
    <td width="179"><div align="center"><strong>Jabatan</strong></div></td>
    <td width="179"><div align="center"><strong>Alamat</strong></div></td>
    <td width="165"><div align="center"><strong>No Telp</strong></div></td>
  </tr>
    <?php
  	$query = "SELECT * FROM tbl_karyawan";
  	$sql =  custom_query($query);
  	while ($r = mysqli_fetch_array($sql))
  	{
		$no++ 
  	?> 

  <tr>
    <td><div align="center"><?php echo $no; ?></div></td>
    <td><div align="center"><?php echo $r['id_karyawan']; ?></div></td>
    <td><div align="center"><?php echo $r['nama_karyawan']; ?></div></td>
    <td><div align="center"><?php echo $r['jabatan']; ?></div></td>
    <td><div align="center"><?php echo $r['alamat']; ?></div></td>
    <td><div align="center"><?php echo $r['no_telp']; ?></div></td>
    <td width="50"><div align="center"><a href="editkaryawan.php?id_karyawan=<?php echo $r['id_karyawan']; ?>">Edit</a></div></td>
    <td width="50"><div align="center"><a href="hapuskaryawan.php?id_karyawan=<?php echo $r['id_karyawan']; ?>" title="Hapus" onClick="return konfirmasihapus()">Hapus</a></div></td>
  </tr>
  <script type="text/javascript">
  function konfirmasihapus()
  {
	var jawab;
	
	jawab = confirm("Apakah anda yakin akan menghapus data ini?")
	if(jawab)
	{ return true;
	} else {return false;}
	}
	</script>
	<?php
	}
	?>  
  
</table>
<br>
    <p>
      <?php include "menu.php"; ?>
    </p>
    </div>
	<?php 
	}
} 
else 
{ 
	echo	"<script>
				alert('Maaf anda tidak memiliki akses untuk melihat halaman ini, silakan login sebagai admin terlebih dahulu.');javascript:window.location='formlogin.php';
			</script>";
} 	
	?>
<div id="footer"></div>
	</body>