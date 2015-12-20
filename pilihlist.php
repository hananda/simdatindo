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

<p><font size="+2">Pilih Bank</font></p><p><div id="sidebar"><form action="listatm.php" method="post">
    Bank 
    <select name="Bank">
      <option value="ALL" selected>All</option>
  <option value="BAG">BAG</option>
  <option value="BCA">BCA</option>
  <option value="Bank Danamon">BDI</option>
  <option value="BII">BII</option>
  <option value="BRI">BRI</option>
  <option value="Bank DKI">DKI</option>
  <option value="Bank Jateng">JTG</option>
  <option value="Bank Mandiri">MDR</option>
  <option value="Bank Pundi">PUN</option>
  <option value="Bank Saudara">SDR</option>
  <option value="Sinarmas">SIN</option>
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