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

<p align="center"><strong>Silahkan edit form dibawah ini untuk mengedit user</strong></p>
<?php
$username = $_GET['username'] ;
  $sql =  custom_query("SELECT * FROM tbl_user WHERE username='$username'");
  while ($r = mysqli_fetch_array($sql))
  { 
  ?> 
	<form action="updateuser.php" method="post" id="update">
    <div align="center">
    <table width="400" border="6">
  <tr>
    <td width="123"><strong>Username :</strong></td>
    <td  class="field" width="255" bgcolor="#FFFFFF"><label for="username"></label>
      <input name="username" type="text" id="username" value="<?php echo $r['username']; ?>" readonly></td>
  </tr>
  <tr>
    <td><strong>Password :</strong></td>
    <td class="field"><input type="text" name="password" id="password" value="<?php echo $r['password']; ?>"></td>
  </tr>
  <tr>
    <td><strong>Nama Karyawan :</strong></td>
    <td class="field"><input type="text" name="nama_karyawan" id="nama_karyawan" value="<?php echo $r['nama_karyawan']; ?>"></td>
  </tr>
  <tr>
    <td><strong>Level Akses :</strong></td>
    <td><label for="level"></label>
      <select name="level" id="level">
      <option value="operator">Operator</option>
<option value="user">User</option>

      </select></td>
  </tr>
  <tr>
    <td><strong>Id Karyawan *:</strong></td>
    <td class="field">
    <select name="id_karyawan" id="id_karyawan">
      <option value="">- Pilih -</option>
      <?php 
      $sql1 =  custom_query("SELECT * FROM tbl_karyawan");
  while ($r1 = mysqli_fetch_array($sql1))
  {
    ?>
    
      <option value="<?php echo $r1['id_karyawan'];?>" <?php echo ($r['id_karyawan'] == $r1['id_karyawan']) ? "selected" : ""; ?>><?php echo $r1['id_karyawan'];?>-<?php echo $r1['nama_karyawan'];?> </option>
  <?php } 
      ?>
    </select>
    <strong> </strong></td>
  </tr>
  <tr>
    <td><strong>Cabang :</strong></td>
    <td class="field">
    <select name="id_cabang" id="id_cabang">
      <option value="">- Pilih -</option>
      <?php 
      $sql1 =  custom_query("SELECT * FROM tbl_cabang");
  while ($r1 = mysqli_fetch_array($sql1))
  {
    ?>
    
      <option value="<?php echo $r1['id_cabang'];?>" <?php echo ($r['id_cabang'] == $r1['id_cabang']) ? "selected" : ""; ?>><?php echo $r1['nama_cabang'];?> </option><?php
  } 
      ?>
    </select>
    <strong> </strong></td>
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