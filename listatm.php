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
		
?>
<html>
	<head>
    <link href="css/test.css" type="text/css" rel="stylesheet" > <link href="images/icon.jpg" rel="shortcut icon" />
	<link href="images/icon.jpg" rel="shortcut icon" />
	<title>ATM Logistic</title>
		<style>
		table{
	border:medium none black;
	width:1000px;
	margin-bottom:10px;
		}
		</style>
	</head>
</html>
	<body>
    <div id="header">
    </div>
	<div id="main_content">
	<?php 
		include "atas.php";
	?> 
    </h2>
	<table align="center" width="753" border="0">
  <tr>
  	<font size="5"> 
    	<td width="51"><div align="center"><strong>No.</strong></div></td>
        <td width="135"><div align="center"><strong>ID</strong></div></td>
    	<td width="173"><div align="center"><strong>BANK</strong></div></td>
    	<td width="315"><div align="center"><strong>Lokasi</strong></div></td>
    	<td width="175"><div align="center"><strong>Serial Number</strong></div></td>
    	<td width="170"><div align="center"><strong>Install Date</strong></div></td>
  	</font>
   </tr>
  
  <?php
  	if(isset($_POST['pilih']))
	{
		$bank1 = $_POST['Bank'];
		if($bank1 == ALL)
		{

		$query = "SELECT * FROM tbl_atm ORDER BY bank";

		$result = custom_query($query) or die('Error');
		}
		else
		{
		$query  = "SELECT * FROM tbl_atm WHERE bank = '$bank1' ORDER BY id_atm";

		$result = custom_query($query) or die('Error');
		}
  			while ($r1 = mysqli_fetch_array($result))
  			{
				$no++ 
  ?> 
  <tr>
    <td><div align="center"><?php echo $no; ?></div></td>
    <td><div align="center"><?php echo $r1['id_atm']; ?></div></td>
    <td><div align="center"><?php echo $r1['bank']; ?></div></td>
    <td><div align="left"><?php echo $r1['lokasi']; ?></div></td>
    <td><div align="center"><?php echo $r1['sn']; ?></div></td>
    <td><div align="center"><?php echo $r1['install_date']; ?></div></td>
	<?php 
	 if ($_SESSION[level] == "admin")
	{
	?>
    <td width="33"><div align="center"><a href="editatm.php?id_atm=<?php echo $r1['id_atm']; ?>">Edit</a></div></td>
    <td width="64"><div align="center"><a href="hapusatm.php?id_atm=<?php echo $r1['id_atm']; ?>" title="Hapus" onClick="return konfirmasihapus()">Hapus</a></div></td>
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
    <?php
	}
	?>
    </tr>

	<?php 
			}
	}
	?>
    </table>
	<?php
	include "menu.php"; 
	} 
?>
</div>
<div id="footer"></div>
	</body>