<?php
session_start();
include "koneksi.php";
error_reporting(0);
$waktu=time()+25200;
$expired=30;
if ($_SESSION[level] == "admin")
{

if (empty($_SESSION['username']) AND empty($_SESSION['password'])){include "formlogin.php";}
else{
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
	<?php include "atas.php";?>
<p align="center"><strong>Master Data keterangan</strong></p>
	<table align="center" width="801" border="0">
  
  <tr>
    <td><div align="center"><strong>No.</strong></div></td>

  
    <td><div align="center"><strong>Nama keterangan</strong></div></td>
    <td colspan="2"><div align="center"><strong>Aksi</strong></div></td>
  </tr>
    <?php
  $sql =  custom_query("SELECT * FROM tbl_keterangan");
  while ($r = mysqli_fetch_array($sql))
  { $no++
  ?> 

  <tr>
    <td><div align="center"><?php echo $no; ?>
	</div></td>
 
    <td><div align="center"><?php echo $r['nama_keterangan']; ?></div></td>
    <td width="50"><div align="center"><a href="editketerangan.php?id=<?php echo $r['id_keterangan']; ?>">Edit</a></div></td>
    <td width="50"><div align="center"><a href="prosesketerangan.php?task=hapus&idketerangan=<?php echo $r['id_keterangan']; ?>" title="Hapus" onClick="return konfirmasihapus()">Hapus</a></div></td>
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
<?php } ?>  
  
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
echo "<script>alert('Maaf anda tidak memiliki akses untuk melihat halaman ini, silakan login sebagai admin terlebih dahulu.');javascript:window.location='formlogin.php';</script>";
} 
?>
<div id="footer"></div>
	</body>