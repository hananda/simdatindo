<?php
session_start();
include "koneksi.php";
error_reporting(0);
$waktu=time()+25200;
$expired=30;
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){echo print "<script>alert('Maaf anda tidak memiliki akses untuk melihat halaman ini, silakan login terlebih dahulu.');javascript:window.location='formlogin.php';</script>";}
else{?>
<html>
	<head>
    <link href="css/test.css" type="text/css" rel="stylesheet"> <link href="../images/icon.jpg" rel="shortcut icon" />
	<title>ATM Logistic</title>
		<style>
		table{
	width:310px;
	margin-bottom:10px;
	border: medium none #FFF;
		}
		</style>
	</head>
</html>
	<body>
    <div id="header">
    </div>
	<div id="main_content">
	<?php include "atas.php";?>
<h2 align="center">Silahkan isi form di bawah ini untuk merubah password anda</h2>
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

	$('#formupdate').submit(function() {
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

<form id="formupdate" action="updatepwd.php" method="post">
  <div align="center">
    <table width="347" border="6">
      <tr>
        <td width="152"><strong>Password Anda saat ini :</strong></td>
        <td width="142"><label for="pwdlama"></label>
          <input type="password" name="pwdlama" id="pwdlama"></td>
        </tr>
      <tr>
        <td><strong>Password Baru </strong>:</td>
        <td><input type="password" name="pwdbaru" id="pwdbaru"></td>
        </tr>
      <tr>
        <td><strong>Ulangi Password Baru :</strong></td>
        <td><input type="password" name="repwdbaru" id="repwdbaru"></td>
        </tr>
      <tr>
        <td colspan="2"><div align="right">
          <input type="reset" name="reset" id="reset" value="Reset">
          <input type="submit" name="simpan" id="simpan" value="Simpan">
        </div></td>
        </tr>
    </table>
  </div>
</form>
<p>
  <?php include "menu.php"; ?>
</p>
    </div>
<?php } ?>
<div id="footer"></div>
	</body>