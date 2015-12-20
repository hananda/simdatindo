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
<p align="center"><strong>Silahkan isi form dibawah ini untuk menambah data sparepart</strong></p>
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
	<form id="formreg" action="regsparepart.php" method="post">
    <div align="center">
    <table width="400" border="6">
  <tr>
    <td width="123"><strong>Part Number :</strong></td>
        <td  class="field" width="255" bgcolor="#FFFFFF">
      <input type="text" name="pn" id="pn" maxlength="10"></td>
  </tr>
  <tr>
    <td><strong>Deskripsi :</strong></td>
    <td class="field"><input type="text" name="description" id="description"></td>
  </tr>
  <tr>
    <td><strong>Jumlah :</strong></td>
    <td class="field"><input type="text" name="jumlah" id="jumlah"></td>
  </tr>
  <tr>
    <td colspan="2"><div align="right">
      <strong>
        <input type="submit" name="tambah" id="tambah" value="Tambah">
        <input type="reset" name="reset" id="reset" value="Reset">
        </strong></div></td>
  </tr>
</table>
    <p>&nbsp;</p>
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