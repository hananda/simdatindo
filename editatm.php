<?php
	session_start();
	include "koneksi.php";
	error_reporting(0);
	$waktu=time()+25200;
	$expired=30;

	if (empty($_SESSION['username']) AND empty($_SESSION['password']))
	{
		include "formlogin.php";
	}
	else
	{
		if ($_SESSION[level] == "admin")
		{
?>

<html>
<head>
    <link href="css/test.css" type="text/css" rel="stylesheet">
		<title>ATM Logistic</title>
		<style>
		table{
	border:medium none black;
	width:500px;
	margin-bottom:10px;
	margin-top: 10px;
		}
	td.field
    {
		width:400px;
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
    <p align="center"><strong>Silahkan edit form dibawah ini untuk mengedit ATM</strong></p>
	<?php
	  
		$id_atm = $_GET['id_atm'];
  		$query = "SELECT * FROM tbl_atm WHERE id_atm='$id_atm'";
		$sql =  custom_query($query);  
  		while ($r = mysqli_fetch_array($sql))
  		{ 
  	?> 
    
    <form action="updateatm.php" method="post" name="form1">
	 
	<table align="center" id="tabeledit" width="200" border="0">
  <tr>
    <td width="112" height="34"><strong>ID ATM</strong></td>
    <td width="378"><span class="field">
      <input name="id_atm" type="text" id="id_atm" value="<?php echo $r['id_atm']; ?>" readonly>
      </span></td>
  </tr>
  <tr>
    <td height="34"><strong>Bank</strong></td>
    <td>
     <select name="bank">
  <option value="<?php echo $r['bank']; ?>" selected><?php echo $r['bank']; ?></option>
  <option value="BAG">BAG</option>
  <option value="BCA">BCA</option>
  <option value="Bank Danamon">Bank Danamon</option>
  <option value="BII">BII</option>
  <option value="BRI">BRI</option>
  <option value="Bank DKI">Bank DKI</option>
  <option value="Bank Jateng">Bank Jateng</option>
  <option value="Bank Mandiri">Bank Mandiri</option>
  <option value="Bank Pundi">Bank Pundi</option>
  <option value="Bank Saudara">Bank Saudara</option>
  <option value="Sinarmas">Sinarmas</option>
    </select>
    </span></td>
  </tr>
  <tr>
    <td height="34"><strong>Lokasi</strong></td>
    <td class="field" align="center">
      <input name="lokasi" type="text" id="lokasi" value="<?php echo $r['lokasi']; ?>">
    </td>
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
    
      <option value="<?php echo $r1['id_cabang'];?>" <?php echo ($r['id_cabang'] == $r1['id_cabang']) ? "selected" : ""; ?>><?php echo $r1['nama_cabang'];?> </option><?php
  } 
      ?>
    </select>
    <strong> </strong></td>
  </tr>
	<tr>
    <td height="34"><strong>Serial Number</strong></td>
    <td>
      <input name="sn" type="text" id="sn" value="<?php echo $r['sn']; ?>">
    </span></td>
  </tr>
  <tr>
    <td height="34"><strong>Install Date</strong></td>
    <td>
      <input name="install_date" type="text" id="install_date" value="<?php echo $r['install_date']; ?>" onClick="if(self.gfPop)gfPop.fPopCalendar(document.form1.install_date);return false;"/>
      <a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.form1.install_date);return false;"><img name="popcal" align="absmiddle" style="border:none" src="calender/calender.jpeg" width="34" height="29" border="0" alt=""></a></td>
  </tr>
  <tr>
    <td  bgcolor="#FFFFFF" height="34" colspan="2"><div align="right"> <input name="simpan" type="submit" value="Simpan" id="simpan"></div></td>
  </tr>
    </table>
   
	</form>
    <?php 
		} 
		include "menu.php"; 
	?>
</div>
<div id="footer"></div>
</body>
<?php 
	}  
	else 
	{ 
		echo "<script>
				alert('Maaf anda tidak memiliki akses untuk melihat halaman ini, silakan login terlebih dahulu.');javascript:window.location='formlogin.php';
			</script>";
	}

}
?>
<iframe width=174 height=189 name="gToday:normal:calender/agenda.js" id="gToday:normal:calender/agenda.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>