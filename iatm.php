<?php
session_start();
include "koneksi.php";
error_reporting(0);
$waktu=time()+25200;
$expired=30;
// if ($_SESSION[level] == "admin")
// {

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
	<?php include "atas.php";?>
<br>

<p align="center"><strong>Silahkan isi form dibawah ini untuk menambah data ATM</strong></p>
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

	<form action="regatm.php" method="post" id="formreg" name="formreg">
    <div align="center">
    <table width="400" border="6">
  <tr>
    <td width="123"><strong>ID ATM:</strong></td>
    <td  class="field" width="255" bgcolor="#FFFFFF"><label for="id_atm"></label>
      <input name="id_atm" type="text" id="id_karyawan"></td>
  </tr>
  <tr>
    <td><strong>Bank :</strong></td>
    <td><span class="field"><select name="bank" id="bank">
      <option value="">- Pilih -</option>
      <?php 
		  $sql1 =  custom_query("SELECT bank FROM tbl_atm GROUP BY bank ORDER BY bank ASC");
  while ($r1 = mysqli_fetch_array($sql1))
  {
	  ?>
    
      <option value="<?php echo $r1['bank'];?>"><?php echo $r1['bank']; 
  }	
  	  ?></option>
    </select></span></td>
  </tr>
  <tr>
    <td><strong>Lokasi :</strong></td>
    <td class="field"><span class="field">
      <input name="lokasi" type="text" id="lokasi">
      </span></label></td>
  </tr>
  <tr>
    <td><strong>Cabang :</strong></td>
    <td class="field">
    <select name="id_cabang" id="id_cabang">
      <option value="">- Pilih -</option>
      <?php 
      	$query = "SELECT * FROM tbl_cabang";
      	if ($_SESSION[level] == "operator") 
		{
		  $query.= " WHERE id_cabang = ".$_SESSION['id_cabang'];
		}
		// echo $query;
		$sql1 =  custom_query($query);
  while ($r1 = mysqli_fetch_array($sql1))
  {
	  ?>
    
      <option value="<?php echo $r1['id_cabang'];?>"><?php echo $r1['nama_cabang'];?> </option><?php
  }	
  	  ?>
    </select>
    <strong> </strong></td>
  </tr>
  <tr>
    <td><strong>Serial Number :</strong></td>
    <td class="field"><span class="field">
      <input name="sn" type="text" id="sn" maxlength="10">
      </span></label></td>
  </tr>
  <tr>
    <td><strong>Install Date :</strong></td>
    <td><input name="install_date" type="text" id="install_date" onClick="if(self.gfPop)gfPop.fPopCalendar(document.formreg.install_date);return false;"/><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.formreg.install_date);return false;"><img name="popcal" align="absmiddle" style="border:none" src="calender/calender.jpeg" width="34" height="29" border="0" alt=""></a></td>
  </tr>
  <tr>
    <td colspan="2"><div align="right">
      <strong>
      <input type="submit" name="tambah" id="tambah" value="Tambah">
      <input type="reset" name="reset" id="reset" value="Reset">
      </strong></div></td>
    </tr>
</table>
    
    </div>
	</form>
    <p>
      <?php include "menu.php"; ?>
    </p>
    </div>
	<?php 
	}
// } 
// else 
// { 
// 	echo	"<script>
// 				alert('Maaf anda tidak memiliki akses untuk melihat halaman ini, silakan login sebagai admin terlebih dahulu.');javascript:window.location='formlogin.php';
// 			</script>";
// } 	
	?>
<div id="footer"></div>
	</body>
    <iframe width=174 height=189 name="gToday:normal:calender/agenda.js" id="gToday:normal:calender/agenda.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>
