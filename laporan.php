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

<p><font size="+2">Pilih Jenis Laporan</font></p><div id="sidebar2">
  <form action="lihatlaporan.php" method="post" name="form1">
      <p align="center">
        &nbsp;<label for="menu"></label>
        <select name="menu" id="menu">
          <option value="" selected>- Pilih -</option>
          <option value="brgmsk">Barang Masuk</option>
          <option value="brgkel">Barang Keluar</option>
        <!--  <option value="brgret">Barang Return</option> -->
        </select>
      </p>
      <p>Tanggal Awal&nbsp;
        <input name="startdate" type="text" onClick="if(self.gfPop)gfPop.fPopCalendar(document.form1.startdate);return false;"/><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.form1.startdate);return false;"><img name="popcal" align="absmiddle" style="border:none" src="calender/calender.jpeg" width="34" height="29" border="0" alt=""></a>
      </p>
      <p>Tanggal Akhir
        <input name="enddate" type="text" onClick="if(self.gfPop)gfPop.fPopCalendar(document.form1.enddate);return false;"/><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.form1.enddate);return false;"><img name="popcal" align="absmiddle" style="border:none" src="calender/calender.jpeg" width="34" height="29" border="0" alt=""></a>
      </p>
      <div align="center">
        <input name="lihat" type="submit" value="Lihat">
        <input name="unduh" type="submit" value="Unduh Laporan Excel">
      </div>
  </form>
    </div>
</p>
<br><br><br><br><br><br><br><br><br><br><br>
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