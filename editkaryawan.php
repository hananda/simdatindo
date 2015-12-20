<?php
	session_start();
	include "koneksi.php";
	error_reporting(0);
	$waktu=time()+25200;
	$expired=30;
	if ($_SESSION[level] == "admin")
	{
		if (empty($_SESSION['username']) AND empty($_SESSION['password']))
		{
			include "formlogin.php";
		}
		else
		{
?>
<html>
	<head>
    <link href="../simdatindo/css/test.css" type="text/css" rel="stylesheet"> 
    <link href="../simdatindo/images/icon.jpg" rel="shortcut icon" />
	<title>ATM Logistic</title>
		<style>
		table
	{
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

<p align="center">
	<strong>
		Silahkan edit form dibawah ini untuk mengedit data karyawan
    </strong>
</p>

		<?php
	
			$id_karyawan = $_GET['id_karyawan'] ;
  			$query = "SELECT * FROM tbl_karyawan WHERE id_karyawan='$id_karyawan'";
  			$sql =  custom_query($query);
  			while ($r = mysqli_fetch_array($sql))
  			{ 
		?> 
	<form action="updatekaryawan.php" method="post">
    <div align="center">
    <table width="400" border="6">
  <tr>
    <td width="123"><strong>Id Karyawan:</strong></td>
    <td  class="field" width="255" bgcolor="#FFFFFF"><label for="id_karyawan"></label>
      <input name="id_karyawan" type="text" id="id_karyawan" value="<?php echo $r['id_karyawan']; ?>" readonly></td>
  </tr>
  <tr>
    <td><strong>Nama Karyawan :</strong></td>
    <td class="field"><input type="text" name="nama_karyawan" id="nama_karyawan" value="<?php echo $r['nama_karyawan']; ?>"></td>
  </tr>
  <tr>
    <td><strong>Jabatan :</strong></td>
    <td class="field"><input type="text" name="jabatan" id="jabatan" value="<?php echo $r['jabatan']; ?>"></td>
  </tr>
  <tr>
    <td><strong>Alamat :</strong></td>
    <td class="field"><input type="text" name="alamat" id="alamat" value="<?php echo $r['alamat']; ?>"></td>
  </tr>
  <tr>
    <td><strong>No Telp :</strong></td>
    <td class="field"><input name="no_telp" type="text" id="no_telp" value="<?php echo $r['no_telp']; ?>"></td>
  </tr>
  <tr>
    <td colspan="2"><div align="right">
      <strong>
      <input type="submit" name="simpan" id="simpan" value="Simpan">
      <a href="karyawan.php"><input type="button" name="reset" id="reset" value="Reset"></a>
      </strong></div></td>
    </tr>
</table>
      </div>
	</form>
		<?php 
			}
		?>
    <p>
    	<?php include "menu.php"; ?>
    </p>
    </div>
	<?php
		}
	} 
else
	{ 
		echo	"<script>
					alert('Maaf anda tidak memiliki akses untuk melihat halaman ini, silakan login sebagai admin terlebih dahulu.');javascript:window.location='formlogin.php';
				</script>";
	} 
	?>
<div id="footer"></div>
	</body>