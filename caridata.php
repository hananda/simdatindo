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
    <link href="css/test.css" type="text/css" rel="stylesheet"><link href="images/icon.jpg" rel="shortcut icon" />
<title>ATM Logistic</title>
		<style>
		table{
	width:270px;
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

<p><font size="+2">Pilih Jenis Pencarian</font></p><div id="sidebar4">
  <form action="hcari.php" method="post" name="form1">
      <table>
		<tr>
			<td>Kategori Pencarian</td>
			<td align="right"><select name="menu">
          <option value="" selected>- Pilih -</option>
         <?php
         if ($_SESSION[level] == "admin")
		 {
			 ?>
          <option value="dkar">Data Karyawan</option>
          <option value="duser">Data User</option>
		  	 <?php
		 }
		 ?>
          <option value="dpart">Data Sparepart</option>
          <option value="datm">Data ATM</option>
          <option value="brgmsk">Barang Masuk</option>
          <option value="brgkel">Barang Keluar</option>
          <!-- <option value="brgret">Barang Return</option> -->     
         </select></td>
        </tr>
		<tr>
			<td>Kata Kunci</td>
			<td align="right"><input name="caritext" type="text" size="15"/></td>
        </tr>
		<tr>
			<td></td>
			<td align="right"><input name="cari" type="submit" value="Cari"></td>
		</tr>
	  </table>
  </form>
    </div>
</p>
<br><br><br><br><br><br><br>
	<?php
	
include "menu.php";
?>
</p>
    </body>

<?php } ?>
 	</div>
    <iframe width=174 height=189 name="gToday:normal:calender/agenda.js" id="gToday:normal:calender/agenda.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>
<div id="footer"></div>
	</body>
    </html>