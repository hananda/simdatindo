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
    <link href="../simdatindo/css/test.css" type="text/css" rel="stylesheet"> 
    <link href="../simdatindo/images/icon.jpg" rel="shortcut icon" />
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

<p align="center"><strong>Silahkan edit form dibawah ini untuk mengedit dasar</strong></p>
<?php
$id = $_GET['id'] ;
  $sql =  custom_query("SELECT * FROM tbl_dasar WHERE id_dasar='$id'");
  while ($r = mysqli_fetch_array($sql))
  { 
  ?> 
	<form action="prosesdasar.php?task=edit" method="post" id="update">
    <div align="center">
    <table width="400" border="6">
    <input type="hidden" name="iddasar" value="<?php echo $id; ?>" />
  <tr>
    <td width="123"><strong>Nama dasar keterangan barang masuk / keluar :</strong></td>
    <td  class="field" width="255" bgcolor="#FFFFFF"><label for="username"></label>
      <input name="nmdasar" type="text" id="nmdasar" value="<?php echo $r['nama_dasar']; ?>" /></td>
  </tr>

  <tr>
    <td width="123"><strong>Jenis :</strong></td>
        <td  class="field" width="255" bgcolor="#FFFFFF">
      <select name="jenis"><option value="1" <?php echo $r['jenis'] == 1 ? "selected" : ""; ?>>Barang Masuk</option><option value="2" <?php echo $r['jenis'] == 1 ? "selected" : ""; ?>>Barang Keluar</option></select></td>
  </tr>
  <tr>
    <td colspan="2"><div align="right">
      <strong>
      <input type="submit" name="simpan" id="simpan" value="Simpan">
      <input type="reset" name="reset" id="reset" value="Reset">
      </strong></div></td>
    </tr>
</table>
      </div>
	</form>
    <?php }?>
    <p>
      <?php include "menu.php"; ?>
    </p>
    </div>
<?php }} else { echo print "<script>alert('Maaf anda tidak memiliki akses untuk melihat halaman ini, silakan login sebagai admin terlebih dahulu.');javascript:window.location='formlogin.php';</script>";} ?>
<div id="footer"></div>
	</body>