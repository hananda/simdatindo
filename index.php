<?php
session_start();
include "koneksi.php";
error_reporting(0);
$waktu=time()+25200;
$expired=30;
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){ ?>
<html>
	<head>
    <link href="css/test.css" type="text/css" rel="stylesheet">
     <link href="../simdatindo/images/icon.jpg" rel="shortcut icon" />
		<title>ATM Logistic</title>
		<style>
		table{
	border:3px solid black;
	width:250px;
	margin-bottom:10px;
		}
		</style>
	</head>
</html>
	<body>
    <div id="header"></div>
    <div id="main_content">
    <div align="right">
	<script language="JavaScript" type="text/JavaScript">
		var mydate=new Date()
		var year=mydate.getYear()
		if (year < 1000)
		year+=1900
		var day=mydate.getDay()
		var month=mydate.getMonth()
		var daym=mydate.getDate()
		if (daym<10)
		daym="0"+daym
		var dayarray=new Array("Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu")
		var montharray=new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember")
		document.write(dayarray[day]+", "+daym+" "+montharray[month]+" "+year)
	</script></div>
   </td>
    <h2 align="center" style="font-style:oblique">
   <p>.:: Selamat Datang di Sistem Informasi Manajemen Logistik ::.</p>
   </h2>
    <a href="formlogin.php"><img src="images/login.jpg" width="130" height="74" alt="Login" longdesc="formlogin.php"></a></div>
    <div id="footer"></div>
    </body>

<?php }
else {
?>
<html>
	<head>
    <link href="css/test.css" type="text/css" rel="stylesheet">
	<link href="../simdatindo/images/icon.jpg" rel="shortcut icon" />
		<title>ATM Logistic</title>
		<style>
		table{
		border:3px solid black;
		width:700px;
		margin-bottom:10px;
		}
		</style>
	</head>
</html>
	<body>
    <div id="header">
    </div>
	<div id="main_content">
    <div align="right">
	<script language="JavaScript" type="text/JavaScript">
		var mydate=new Date()
		var year=mydate.getYear()
		if (year < 1000)
		year+=1900
		var day=mydate.getDay()
		var month=mydate.getMonth()
		var daym=mydate.getDate()
		if (daym<10)
		daym="0"+daym
		var dayarray=new Array("Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu")
		var montharray=new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember")
		document.write(dayarray[day]+", "+daym+" "+montharray[month]+" "+year)
	</script></div>
<?php
$sql = custom_query("SELECT * FROM tbl_user WHERE username = '$_SESSION[username]'");
while ($data = mysqli_fetch_array($sql))
{
 $user_nama = $data['nama_karyawan'];
}
?>
<p>Selamat Datang <?php echo "$user_nama"; ?>. <a href="changepwd.php">Ubah Password</a> <a href="logout.php">Keluar</a></p><br><br>
<?php include "menu.php";
?>
</div>
</body>
</div>
<div id="footer"></div>
	</body>
    </html>
<?php } ?>
 	