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
<p align="center"><strong>Master Data dasar keterangan barang masuk / keluar</strong></p>
	<table align="center" width="801" border="0">
  
  <tr>
    <td><div align="center"><strong>No.</strong></div></td>

  
    <td><div align="center"><strong>Nama dasar keterangan barang masuk / keluar</strong></div></td>
    <td colspan="2"><div align="center"><strong>Aksi</strong></div></td>
  </tr>
    <?php
  $sql =  custom_query("SELECT * FROM tbl_dasar");
  while ($r = mysqli_fetch_array($sql))
  { $no++
  ?> 

  <tr>
    <td><div align="center"><?php echo $no; ?>
	</div></td>
 
    <td><div align="center"><?php echo $r['nama_dasar']; ?></div></td>
    <td width="50"><div align="center"><a href="editdasar.php?id=<?php echo $r['id_dasar']; ?>">Edit</a></div></td>
    <td width="50"><div align="center"><a href="prosesdasar.php?task=hapus&iddasar=<?php echo $r['id_dasar']; ?>" title="Hapus" onClick="return konfirmasihapus()">Hapus</a></div></td>
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