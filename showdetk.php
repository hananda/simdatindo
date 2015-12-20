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
    <link href="css/test.css" type="text/css" rel="stylesheet"> 
    <link href="../images/icon.jpg" rel="shortcut icon" />
<title>ATM Logistic</title>
	<style>
		table{
	border:thick none #FFF;
	margin-bottom:10px;
	width: 500px;
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
<br>
<?php
	
			$noform= $_GET['no_form_k'] ;
  			$query = "SELECT * FROM tbl_det_keluar WHERE no_form_k='$noform'";
  			$sql =  custom_query($query);
  			while ($r = mysqli_fetch_array($sql))
  			{ 
		?>
<h1 align="center"><strong>Detail Barang Keluar No. Form <?php echo  $r['no_form_k']; ?></strong></h1>
    <div align="center">
    
    <table width="400" border="6">
  <tr>
    <td width="120"><strong>Nomor Form :</strong></td>
    <td><?php echo  $r['no_form_k']; ?></td>
  </tr>
  <tr>
    <td width="120"><strong>Part Number :</strong></td>
    <td><?php echo  $r['part_number']; ?></td>
  </tr>
  <tr>
    <td width="120"><strong>Deskripsi :</strong></td>
    <td><?php echo  $r['description']; ?></td>
  </tr>
  <tr>
    <td width="120"><strong>Jumlah :</strong></td>
    <td><?php echo  $r['jumlah']; ?></td>
  </tr>
  <tr>
    <td width="120"><strong>Problem :</strong></td>
    <td><?php echo  $r['problem']; ?></td>
  </tr>
  <tr>
    <td width="120"><strong>ID ATM :</strong></td>
    <td><?php echo  $r['id_atm']; ?></td>
  </tr>
  <tr>
    <td width="120"><strong>Lokasi :</strong></td>
    <td><?php echo  $r['lokasi']; ?></td>
  </tr>
  <tr>
    <td width="120"><strong>Nama Engineer :</strong></td>
    <td><?php echo  $r['nama_karyawan']; ?></td>
  </tr>
  <tr>
    <td width="120"><strong>Alamat Kirim :</strong></td>
    <td><?php echo  $r['alamat']; ?></td>
  </tr>
  <tr>
    <td width="120"><strong>Tanggal Keluar :</strong></td>
    <td><?php echo  $r['tgl_keluar']; ?></td>
  </tr>
  <tr>
    <td width="120"><strong>Operator :</strong></td>
    <td><?php echo  $r['username']; ?></td>
  </tr>
  <tr>
    <td width="120"><strong>Keterangan :</strong></td>
    <td><?php echo  $r['keterangan']; ?></td>
  </tr>
</table>
   
    <?php
			}
	?>
    </div>
    <p>
      <?php include "menu.php"; ?>
    </p>
    </div>
	<?php 
	}
	?>
<div id="footer"></div>
	</body>
    