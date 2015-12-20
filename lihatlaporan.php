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
			if(isset($_POST['unduh']))
			{
				$status = $_POST['menu'];
				if($status == "brgkel")
				{
					$startdate = $_POST['startdate'];
					$enddate = $_POST['enddate'];
					
					$result=custom_query("select * from tbl_det_keluar  where tgl_keluar >= '$startdate' and tgl_keluar <= '$enddate' order by no_form_k desc");

					// function xlsBOF()
					// {
					// 	echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
					// 	return;
					// }
					// function xlsEOF()
					// {
					// 	echo pack("ss", 0x0A, 0x00);
					// 	return;
					// }
					// function xlsWriteNumber($Row, $Col, $Value)
					// {
					// 	echo pack("sssss", 0x203, 14, $Row, $Col, 0x0);
					// 	echo pack("d", $Value);
					// 	return;
					// }
					// 	function xlsWriteLabel($Row, $Col, $Value )
					// {
					// 	$L = strlen($Value);
					// 	echo pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L);
					// 	echo $Value;
					// 	return;
					// }
					header("Pragma: public");
					header("Expires: 0");
					header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
					header("Content-Type: application/force-download");
					header("Content-Type: application/octet-stream");
					header("Content-Type: application/download");;
					header("Content-Disposition: attachment;filename=brgkeluar.xls ");
					header("Content-Transfer-Encoding: binary ");

					// xlsBOF();
			
			
			
			
					// xlsWriteLabel(1,0,"No Form Keluar");
					// xlsWriteLabel(1,1,"Part Number");
					// xlsWriteLabel(1,2,"Description");
					// xlsWriteLabel(1,3,"Jumlah");
					// xlsWriteLabel(1,4,"Problem");
					// xlsWriteLabel(1,5,"ID ATM");
					// xlsWriteLabel(1,6,"Lokasi");
					// xlsWriteLabel(1,7,"Nama Engineer");
					// xlsWriteLabel(1,8,"Alamat");
					// xlsWriteLabel(1,9,"Operator");
					// xlsWriteLabel(1,10,"Tanggal Keluar");
					// xlsWriteLabel(1,11,"Keterangan");
					

					// $xlsRow = 2;
					$html= '<table border="1">
						<tr>
						<td colspan="12" style="text-align:center;font-weight:bold">LAPORAN BARANG KELUAR<br>PERIODE '.$startdate.' - '.$enddate.'</td>
						</tr>
						<tr>
							<td>No Form Keluar</td>
							<td>Part Number</td>
							<td>Description</td>
							<td>Jumlah</td>
							<td>Problem</td>
							<td>ID ATM</td>
							<td>Lokasi</td>
							<td>Nama Engineer</td>
							<td>Alamat</td>
							<td>Operator</td>
							<td>Tanggal Keluar</td>
							<td>Keterangan</td>
						</tr>';
			
					while($row=mysqli_fetch_array($result))
					{
   						$html.= '<tr>';
   						$html.='<td>'.$row['no_form_k'].'</td>';
   						$html.='<td>'.$row['part_number'].'</td>';
   						$html.='<td>'.$row['description'].'</td>';
   						$html.='<td>'.$row['jumlah'].'</td>';
   						$html.='<td>'.$row['problem'].'</td>';
   						$html.='<td>'.$row['id_atm'].'</td>';
   						$html.='<td>'.$row['lokasi'].'</td>';
   						$html.='<td>'.$row['nama_karyawan'].'</td>';
   						$html.='<td>'.$row['alamat'].'</td>';
   						$html.='<td>'.$row['username'].'</td>';
   						$html.='<td>'.$row['tgl_keluar'].'</td>';
   						$html.='<td>'.$row['keterangan'].'</td>';
						// xlsWriteLabel($xlsRow,0,$row['no_form_k']);
						// xlsWriteLabel($xlsRow,1,$row['part_number']);
						// xlsWriteLabel($xlsRow,2,$row['description']);
						// xlsWriteLabel($xlsRow,3,$row['jumlah']);
						// xlsWriteLabel($xlsRow,4,$row['problem']);
						// xlsWriteLabel($xlsRow,5,$row['id_atm']);
						// xlsWriteLabel($xlsRow,6,$row['lokasi']);
						// xlsWriteLabel($xlsRow,7,$row['nama_karyawan']);
						// xlsWriteLabel($xlsRow,8,$row['alamat']);
						// xlsWriteLabel($xlsRow,9,$row['username']);
						// xlsWriteLabel($xlsRow,10,$row['tgl_keluar']);
						// xlsWriteLabel($xlsRow,11,$row['keterangan']);
						$html.='</tr>';
						// $xlsRow++;
					}
					// xlsEOF();
					// exit();
					$html .= '
					</table>';
					echo $html;
				}
				if($status == "brgmsk")
				{
					$startdate = $_POST['startdate'];
					$enddate = $_POST['enddate'];
					
					$result=custom_query("select * from tbl_det_masuk where tgl_masuk >= '$startdate' and tgl_masuk <= '$enddate' order by no_form_m desc");

					function xlsBOF()
					{
						echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
						return;
					}
					function xlsEOF()
					{
						echo pack("ss", 0x0A, 0x00);
						return;
					}
					function xlsWriteNumber($Row, $Col, $Value)
					{
						echo pack("sssss", 0x203, 14, $Row, $Col, 0x0);
						echo pack("d", $Value);
						return;
					}
						function xlsWriteLabel($Row, $Col, $Value )
					{
						$L = strlen($Value);
						echo pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L);
						echo $Value;
						return;
					}
					header("Pragma: public");
					header("Expires: 0");
					header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
					header("Content-Type: application/force-download");
					header("Content-Type: application/octet-stream");
					header("Content-Type: application/download");;
					header("Content-Disposition: attachment;filename=brgmasuk.xls ");
					header("Content-Transfer-Encoding: binary ");

					// xlsBOF();
			
			
			
			
					// xlsWriteLabel(1,0,"No Form Masuk");
					// xlsWriteLabel(1,1,"Part Number");
					// xlsWriteLabel(1,2,"Description");
					// xlsWriteLabel(1,3,"Jumlah");
					// xlsWriteLabel(1,4,"Tanggal Masuk");
					// xlsWriteLabel(1,5,"Operator");
					// xlsWriteLabel(1,6,"Keterangan");			

					// $xlsRow = 2;
			
					// while($row=mysqli_fetch_array($result))
					// {
   
					// 	xlsWriteLabel($xlsRow,0,$row['no_form_m']);
					// 	xlsWriteLabel($xlsRow,1,$row['part_number']);
					// 	xlsWriteLabel($xlsRow,2,$row['description']);
					// 	xlsWriteLabel($xlsRow,3,$row['jumlah']);
					// 	xlsWriteLabel($xlsRow,4,$row['tgl_masuk']);
					// 	xlsWriteLabel($xlsRow,5,$row['username']);
					// 	xlsWriteLabel($xlsRow,6,$row['keterangan']);
					// $xlsRow++;
					// }
					// xlsEOF();
					// exit();
					$html= '<table border="1">
						<tr>
						<td colspan="7" style="text-align:center;font-weight:bold">LAPORAN BARANG KELUAR<br>PERIODE '.$startdate.' - '.$enddate.'</td>
						</tr>
						<tr>
							<td>No Form Masuk</td>
							<td>Part Number</td>
							<td>Description</td>
							<td>Jumlah</td>
							<td>Tanggal Masuk</td>
							<td>Operator</td>
							<td>Keterangan</td>
						</tr>';
			
					while($row=mysqli_fetch_array($result))
					{
   						$html.= '<tr>';
   						$html.='<td>'.$row['no_form_m'].'</td>';
   						$html.='<td>'.$row['part_number'].'</td>';
   						$html.='<td>'.$row['description'].'</td>';
   						$html.='<td>'.$row['jumlah'].'</td>';
   						$html.='<td>'.$row['tgl_masuk'].'</td>';
   						$html.='<td>'.$row['username'].'</td>';
   						$html.='<td>'.$row['keterangan'].'</td>';
						$html.='</tr>';
					}
					$html .= '
					</table>';
					echo $html;
				}
				if($status == "brgret")
				{
					$startdate = $_POST['startdate'];
					$enddate = $_POST['enddate'];
					
					$result=custom_query("select * from tbl_det_return where tgl_return >= '$startdate' and tgl_return <= '$enddate' order by no_form_r desc");

					// function xlsBOF()
					// {
					// 	echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
					// 	return;
					// }
					// function xlsEOF()
					// {
					// 	echo pack("ss", 0x0A, 0x00);
					// 	return;
					// }
					// function xlsWriteNumber($Row, $Col, $Value)
					// {
					// 	echo pack("sssss", 0x203, 14, $Row, $Col, 0x0);
					// 	echo pack("d", $Value);
					// 	return;
					// }
					// 	function xlsWriteLabel($Row, $Col, $Value )
					// {
					// 	$L = strlen($Value);
					// 	echo pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L);
					// 	echo $Value;
					// 	return;
					// }
					header("Pragma: public");
					header("Expires: 0");
					header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
					header("Content-Type: application/force-download");
					header("Content-Type: application/octet-stream");
					header("Content-Type: application/download");;
					header("Content-Disposition: attachment;filename=brgreturn.xls ");
					header("Content-Transfer-Encoding: binary ");

					// xlsBOF();
			
			
			
			
					xlsWriteLabel(1,0,"No Form Return");
					xlsWriteLabel(1,1,"Part Number");
					xlsWriteLabel(1,2,"Description");
					xlsWriteLabel(1,3,"Jumlah");
					xlsWriteLabel(1,4,"Alasan Return");
					xlsWriteLabel(1,5,"Tanggal Return");
					xlsWriteLabel(1,6,"Operator");
					xlsWriteLabel(1,7,"Keterangan");
	

					$xlsRow = 2;
			
					while($row=mysqli_fetch_array($result))
					{
   
						xlsWriteLabel($xlsRow,0,$row['no_form_r']);
						xlsWriteLabel($xlsRow,1,$row['part_number']);
						xlsWriteLabel($xlsRow,2,$row['description']);
						xlsWriteLabel($xlsRow,3,$row['jumlah']);
						xlsWriteLabel($xlsRow,4,$row['alasan']);
						xlsWriteLabel($xlsRow,5,$row['tgl_return']);
						xlsWriteLabel($xlsRow,6,$row['username']);
						xlsWriteLabel($xlsRow,7,$row['keterangan']);
					$xlsRow++;
					}
					xlsEOF();
					exit();
				}
			}
			else if(isset($_POST['lihat']))
			{
				$menu = $_POST['menu'];
				if($menu == "brgkel")
				{
					
					$startdate = $_POST['startdate'];
					$enddate = $_POST['enddate'];
				?>
<html>
<head>
    <link href="css/test.css" type="text/css" rel="stylesheet"><link href="../images/icon.jpg" rel="shortcut icon" />
		<title>ATM Logistic</title>
	<style>
		table{
	width:1000px;
	margin-bottom:10px;
	border-top-width: medium;
	border-right-width: medium;
	border-bottom-width: medium;
	border-left-width: medium;
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
	<?php include "atas.php";?>
<h1 align="center">
	<b>Status Barang Keluar</b>
</h1>
<table align="center" width="1335" border="0" bordercolor="#FFFFFF">
  <tr>
    <td width="90"><div align="center"><strong>No. Form</strong></div></td>
    <td width="174"><div align="center"><strong>Part Number</strong></div></td>
    <td width="215"><div align="center"><strong>Description</strong></div></td>
    <td width="139"><div align="center"><strong>Problem</strong></div></td>
    <td width="98"><div align="center"><strong>Operator</strong></div></td>
    <td width="98"><div align="center"><strong>Engineer</strong></div></td>
    <td width="53"><div align="center"><strong>Jumlah</strong></div></td>
    <td width="212"><div align="center"><strong>Tanggal Keluar</strong></div></td>
    <td width="212"><div align="center"><strong>Keterangan</strong></div></td>
  </tr>
  <?php
  
  $sql = custom_query("select * from tbl_det_keluar  where tgl_keluar >= '$startdate' and tgl_keluar <= '$enddate' order by no_form_k desc"); 
  while ($r = mysqli_fetch_array($sql))
  {
  ?> 
  <tr>
    <td><div align="center"><?php echo  $r['no_form_k']; ?></div></td>
    <td><div align="center"><?php echo $r['part_number']; ?></div></td>
    <td><?php echo $r['description']; ?></td>
    <td><div align="center"><?php echo $r['problem']; ?></div></td>
    <td><div align="center"><?php echo $r['username']; ?></div></td>
    <td><div align="center"><?php echo $r['nama_karyawan']; ?></div></td>
    <td><div align="center"><?php echo $r['jumlah']; ?></div></td>
    <td><div align="center"><?php echo $r['tgl_keluar']; ?></div></td>
    <td><div align="center"><?php echo $r['keterangan']; ?></div></td>
  </tr>
  <?php } ?>
</table>
<?php
include "menu.php";?>
</div>
<div id="footer"></div>

                <?php	
				}
				if($menu == "brgmsk")
				{
					$startdate = $_POST['startdate'];
					$enddate = $_POST['enddate'];
					
				?>
<html>
<head>
    <link href="css/test.css" type="text/css" rel="stylesheet"><link href="../images/icon.jpg" rel="shortcut icon" />
		<title>ATM Logistic</title>
	<style>
		table{
	width:1000px;
	margin-bottom:10px;
	border-top-width: medium;
	border-right-width: medium;
	border-bottom-width: medium;
	border-left-width: medium;
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
	<?php include "atas.php";?>
<h1 align="center">
	<b>Status Barang Masuk</b>
</h1>
<table align="center" width="1335" border="0" bordercolor="#FFFFFF">
  <tr>
    <td width="90"><div align="center"><strong>No. Form</strong></div></td>
    <td width="174"><div align="center"><strong>Part Number</strong></div></td>
    <td width="215"><div align="center"><strong>Description</strong></div></td>
    <td width="53"><div align="center"><strong>Jumlah</strong></div></td>
    <td width="212"><div align="center"><strong>Tanggal Masuk</strong></div></td> 
	<td width="98"><div align="center"><strong>Operator</strong></div></td>
    <td width="212"><div align="center"><strong>Keterangan</strong></div></td>
  </tr>
  <?php
  
  $sql = custom_query("select * from tbl_det_masuk where tgl_masuk >= '$startdate' and tgl_masuk <= '$enddate' order by no_form_m desc"); 
  while ($r = mysqli_fetch_array($sql))
  {
  ?> 
  <tr>
    <td><div align="center"><?php echo  $r['no_form_m']; ?></div></td>
    <td><div align="center"><?php echo $r['part_number']; ?></div></td>
    <td><?php echo $r['description']; ?></td>
    <td><div align="center"><?php echo $r['jumlah']; ?></div></td>
    <td><div align="center"><?php echo $r['tgl_masuk']; ?></div></td>
    <td><div align="center"><?php echo $r['username']; ?></div></td>
    <td><div align="center"><?php echo $r['keterangan']; ?></div></td>
  </tr>
  <?php } ?>
</table>
<?php
include "menu.php";?>
</div>
<div id="footer"></div>                
                <?php
				}
				if($menu == "brgret")
				{
					$startdate = $_POST['startdate'];
					$enddate = $_POST['enddate'];
					
				?>
<html>
<head>
    <link href="css/test.css" type="text/css" rel="stylesheet"><link href="../images/icon.jpg" rel="shortcut icon" />
		<title>ATM Logistic</title>
	<style>
		table{
	width:1000px;
	margin-bottom:10px;
	border-top-width: medium;
	border-right-width: medium;
	border-bottom-width: medium;
	border-left-width: medium;
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
	<?php include "atas.php";?>
<h1 align="center">
	<b>Status Barang Return</b>
</h1>
<table align="center" width="1335" border="0" bordercolor="#FFFFFF">
  <tr>
    <td width="90"><div align="center"><strong>No. Form</strong></div></td>
    <td width="174"><div align="center"><strong>Part Number</strong></div></td>
    <td width="215"><div align="center"><strong>Description</strong></div></td>
    <td width="53"><div align="center"><strong>Jumlah</strong></div></td>
    <td width="300"><div align="center"><strong>Alasan Direturn</strong></div></td>
    <td width="150"><div align="center"><strong>Tanggal Return</strong></div></td>
    <td width="98"><div align="center"><strong>Operator</strong></div></td>
    <td width="212"><div align="center"><strong>Keterangan</strong></div></td>
  </tr>
  <?php
  
  $sql = custom_query("select * from tbl_det_return where tgl_return >= '$startdate' and tgl_return <= '$enddate' order by no_form_r desc");
  while ($r = mysqli_fetch_array($sql))
  {
  ?> 
  <tr>
    <td><div align="center"><?php echo  $r['no_form_r']; ?></div></td>
    <td><div align="center"><?php echo $r['part_number']; ?></div></td>
    <td><?php echo $r['description']; ?></td>
    <td><div align="center"><?php echo $r['jumlah']; ?></div></td>
    <td><div align="center"><?php echo $r['alasan']; ?></div></td>
    <td><div align="center"><?php echo $r['tgl_return']; ?></div></td>
    <td><div align="center"><?php echo $r['username']; ?></div></td>
    <td><div align="center"><?php echo $r['keterangan']; ?></div></td>
  </tr>
  <?php } ?>
</table>
<?php
include "menu.php";?>
</div>
<div id="footer"></div>                
                <?php
				}
			}
		}
	}
?>

