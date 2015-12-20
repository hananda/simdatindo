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
<br>
<p align="center"><strong>Silahkan isi form dibawah ini untuk menambah user</strong></p>
<script type="text/javascript" src="javascript/jquery-1.2.3.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {

	$().ajaxStart(function() {
		$('#loading').show();
		$('#result').hide();
	}).ajaxStop(function() {
		$('#loading').hide();
		$('#result').fadeIn('slow');
	});

	$('#formreg').submit(function() {
		$.ajax({
			type: 'POST',
			url: $(this).attr('action'),
			data: $(this).serialize(),
			success: function(data) {
				$('#result').html(data);
			}
		})
		return false;
	});
})
</script>
<div align="center" id="loading" style="display:none;"><img src="images/loading.gif" alt="loading..." /></div>
<div id="result" style="display:none;"></div>
	<form id="formreg" action="reguser.php" method="post">
    <div align="center">
    <table width="400" border="6">
  <tr>
    <td width="123"><strong>Username :</strong></td>
        <td  class="field" width="255" bgcolor="#FFFFFF">
      <input type="text" name="username" id="username"></td>
  </tr>
  <tr>
    <td><strong>Password :</strong></td>
    <td class="field"><input type="password" name="password" id="password"></td>
  </tr>
  <tr>
    <td><strong>Ulangi Password :</strong></td>
    <td class="field"><input type="password" name="repassword" id="repassword"></td>
  </tr>
  <tr>
    <td><strong>Nama Karyawan :</strong></td>
    <td class="field"><input type="text" name="nama_karyawan" id="nama_karyawan"></td>
  </tr>
  <tr>
    <td><strong>Level Akses :</strong></td>
    <td><label for="level"></label>
      <select name="level" id="level">
      <option value="">- Pilih -</option>
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
    
      <option value="<?php echo $r1['id_karyawan'];?>"><?php echo $r1['id_karyawan']; 
  }	
  	  ?></option>
    </select>
    <strong> </strong></td>
  </tr>
  <tr>
    <td colspan="2"><div align="right">
      <strong>
      <input type="submit" name="tambah" id="tambah" value="Tambah">
      <input type="reset" name="reset" id="reset" value="Reset">
      </strong></div></td>
    </tr>
</table>
    <p>*) Anda harus terdaftar sebagai karyawan terlebih dahulu untuk mendapatkan id karyawan</p>
    </div>
	</form>
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