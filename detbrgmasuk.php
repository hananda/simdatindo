<?php
session_start();
include "koneksi.php";

error_reporting(0);
$waktu=time()+25200;
$expired=30;
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){include "formlogin.php";}
else{
	 ?>
<html>
<head>
    <link href="css/test.css" type="text/css" rel="stylesheet"><link href="../images/icon.jpg" rel="shortcut icon" />
		<title>ATM Logistic</title>
	<style>
		table{
	width:1000px;
	margin-bottom:10px;
	border-top-width: medium;
	border-right-width: medium;
	border-bottom-width: medium;
	border-left-width: medium;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
		}
		</style>
</head>
</html>

	<body>
    <div id="header">
    </div>
	<div id="main_content">
	<?php include "atas.php";?>
<h1 align="center">
	<b>Status Barang Masuk</b>
</h1>
<table align="center" width="1335" border="0" bordercolor="#FFFFFF">
  <tr>
    <td width="90"><div align="center"><strong>No. Form</strong></div></td>
    <td width="174"><div align="center"><strong>Part Number</strong></div></td>
    <td width="215"><div align="center"><strong>Description</strong></div></td>
    <td width="215"><div align="center"><strong>Dasar Barang masuk</strong></div></td>
    <td width="53"><div align="center"><strong>Jumlah</strong></div></td>
    <td width="53"><div align="center"><strong>Cabang</strong></div></td>
    <td width="212"><div align="center"><strong>Tanggal Masuk</strong></div></td>
    <td width="98"><div align="center"><strong>Operator</strong></div></td>
    <td width="212"><div align="center"><strong>Keterangan</strong></div></td>
  </tr>
  <?php
  $where = "";
    if ($_SESSION[level] == "operator") 
    {
      $where = " WHERE tbl_det_masuk.id_cabang = ".$_SESSION['id_cabang'];
    }
  $sql =  custom_query("SELECT * 
FROM  `tbl_det_masuk` LEFT JOIN tbl_keterangan on keterangan = id_keterangan 
LEFT JOIN tbl_cabang on tbl_det_masuk.id_cabang = tbl_cabang.id_cabang
LEFT JOIN tbl_dasar on tbl_det_masuk.id_dasar = tbl_dasar.id_dasar
$where
ORDER BY  `tbl_det_masuk`.`no_form_m` DESC");  
  while ($r = mysqli_fetch_array($sql))
  {
  ?> 
  <tr>
    <td><div align="center"><?php echo  $r['no_form_m']; ?></div></td>
    <td><div align="center"><?php echo $r['part_number']; ?></div></td>
    <td><?php echo $r['description']; ?></td>
    <td><?php echo $r['nama_dasar']; ?></td>
    <td><div align="center"><?php echo $r['jumlah']; ?></div></td>
    <td><div align="center"><?php echo $r['nama_cabang']; ?></div></td>
    <td><div align="center"><?php echo $r['tgl_masuk']; ?></div></td>
    <td><div align="center"><?php echo $r['username']; ?></div></td>
    <td><div align="center"><?php echo $r['nama_keterangan']; ?></div></td>
    
    <?php 
	if (($_SESSION[level] == "admin") || ($_SESSION[level] == "operator"))
	{
	?>
    <td width="50"><div align="center"><a href="editdetm.php?no_form_m=<?php echo $r['no_form_m']; ?>">Edit</a></div></td>
  	<?php 
  	} 
  }
	?>
  </tr>
</table>
<?php
include "menu.php"; 
}?>
</div>
<div id="footer"></div>
	</body>