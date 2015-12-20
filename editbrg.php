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
		if (($_SESSION[level] == "admin") || ($_SESSION[level] == "operator"))
		{
?>

<html>
	<head>
    <link href="css/test.css" type="text/css" rel="stylesheet">
    <link href="../simdatindo/images/icon.jpg" rel="shortcut icon" />
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
		width:300px;
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
    <p align="center"><strong>Silahkan edit form dibawah ini untuk mengedit barang</strong></p>
	<?php
	  
		$part_number = $_GET['part_number'];
  		$query = "SELECT * FROM tbl_barang WHERE part_number='$part_number'";
		$sql =  custom_query($query);  
  		while ($r = mysqli_fetch_array($sql))
  		{ 
  	?> 
    
    <form action="updatebrg.php" method="post">
	 
	<table align="center" id="tabeledit" width="200" border="0">
  <tr>
    <td width="112" height="34"><strong>Part Number</strong></td>
    <td width="378"><span class="field">
      <input name="part_number" type="text" id="part_number" value="<?php echo $r['part_number']; ?>" maxlength="10" readonly>
      </span></td>
  </tr>
  <tr>
    <td height="34"><strong>Deskripsi</strong></td>
    <td class="field"><div align="center"><span class="field">
      <input name="deskripsi" type="text" id="deskripsi" value="<?php echo $r['description']; ?>">
    </span></div></td>
  </tr>
  <tr>
    <td height="34"><strong>Jumlah</strong></td>
    <td><span class="field">
      <input name="jumlah" type="text" id="jumlah" value="<?php echo $r['jumlah']; ?>">
    </span></td>
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
