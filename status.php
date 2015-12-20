<?php
session_start();
include "koneksi.php";
error_reporting(0);
$waktu=time()+25200;
$expired=30;
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){include "formlogin.php";}
else{
?>
<html>
<head>
    <link href="css/test.css" type="text/css" rel="stylesheet"><link href="../images/icon.jpg" rel="shortcut icon" />
<title>ATM Logistic</title>
		<style>
		table{
	width:200px;
	margin-bottom:10px;
	border-top-width: 3px;
	border-right-width: 3px;
	border-bottom-width: 3px;
	border-left-width: 3px;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
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

<p><font size="+2">Pilih Status Barang</font></p><p><div id="sidebar3"><form action="pstatus.php" method="post">
    Status 
        <select name="laporan">
          <option value="">- Pilih -</option>
          <option value="brgmsk">Barang Masuk</option>
          <option value="brgkel">Barang Keluar</option>
          <!-- <option value="brgret">Barang Return</option> -->
    </select>
  <input type="submit" name="pilih" id="pilih" value="Pilih">
</form></div></p>
<p>
<br><br><br><br><br>
  <?php
include "menu.php";
?>
</p>
    </body>

<?php } ?>
 	</div>
<div id="footer"></div>
	</body>
    </html>