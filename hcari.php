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
    <link href="images/icon.jpg" rel="shortcut icon" />
	<title>ATM Logistic</title>
	</head>
</html>
	<body>
    <div id="header">
    </div>
	<div id="main_content">
	<?php include "atas.php";?>
	<?php
		if((isset($_POST['cari'])) && ($_POST['caritext']))
			{
				$status = $_POST['menu'];
				$cari = $_POST['caritext'];
				if($status == "dkar")
				{
					$query1 = "SELECT * FROM tbl_karyawan WHERE id_karyawan LIKE '%$cari%' OR nama_karyawan LIKE '%$cari%' OR jabatan LIKE '%$cari%' OR alamat LIKE '%$cari%' OR no_telp LIKE '%$cari%'";
					$sql1 = custom_query($query1);
					$total = mysqli_num_rows($sql1);
					
					if ($total > 0)
					{
					?>
                    <p align="center"><strong>Ditemukan <?php echo $total?> hasil pencarian dengan kata kunci " <?php echo $cari?> "</strong></p>
	<table align="center" width="801" border="0">
  
  <tr>
    <td width="36"><div align="center"><strong>No.</strong></div></td>

  
    <td width="201"><div align="center"><strong>Id Karyawan</strong></div></td>
    <td width="189"><div align="center"><strong>Nama Karyawan</strong></div></td>
    <td width="179"><div align="center"><strong>Jabatan</strong></div></td>
    <td width="179"><div align="center"><strong>Alamat</strong></div></td>
    <td width="165"><div align="center"><strong>No Telp</strong></div></td>
  </tr>
					<?php
						while ($r=mysqli_fetch_array($sql1))
						{
							$no++
					?>
  <tr>
    <td><div align="center"><?php echo $no; ?></div></td>
    <td><div align="center"><?php echo $r['id_karyawan']; ?></div></td>
    <td><div align="center"><?php echo $r['nama_karyawan']; ?></div></td>
    <td><div align="center"><?php echo $r['jabatan']; ?></div></td>
    <td><div align="center"><?php echo $r['alamat']; ?></div></td>
    <td><div align="center"><?php echo $r['no_telp']; ?></div></td>
  </tr>

					<?php
						}
echo "</table>";
					;}
					else
					{
					?>
                    <h1 align="center"><strong>Maaf, Tidak Ditemukan hasil pencarian dengan kata kunci " <?php echo $cari?> "</strong></h1>
					<?php	
					}
				}
				if($status == "duser")
				{
					$sql2 =  custom_query("SELECT * FROM tbl_user WHERE username != 'admin' AND username LIKE '%$cari%' OR nama_karyawan LIKE '%$cari%'");
					$total2 = mysqli_num_rows($sql2);
  
					if ($total2 > 0)
					{
				?>
<p align="center"><strong>Ditemukan <?php echo $total2?> hasil pencarian dengan kata kunci " <?php echo $cari2?> "</strong></p>
	<table align="center" width="801" border="0">
  
  <tr>
    <td width="36"><div align="center"><strong>No.</strong></div></td>

  
    <td width="201"><div align="center"><strong>Username</strong></div></td>
    <td width="189"><div align="center"><strong>Password</strong></div></td>
    <td width="179"><div align="center"><strong>Nama Karyawan</strong></div></td>
    <td width="165"><div align="center"><strong>Level</strong></div></td>
  </tr>
    <?php
  while ($r2 = mysqli_fetch_array($sql2))
  { $no++
  ?> 

  <tr>
    <td><div align="center"><?php echo $no; ?>
	</div></td>
 
    <td><div align="center"><?php echo $r2['username']; ?></div></td>
    <td><div align="center"><?php echo $r2['password']; ?></div></td>
    <td><div align="center"><?php echo $r2['nama_karyawan']; ?></div></td>
    <td><div align="center"><?php echo $r2['level']; ?></div></td>
<?php } ?>  
  
</table>

                <?php	
					;}
					else
					{
					?>
                    <h1 align="center"><strong>Maaf, Tidak Ditemukan hasil pencarian dengan kata kunci " <?php echo $cari?> "</strong></h1>
					<?php	
					}
				}
				if($status == "dpart")
				{
					$query3 = "SELECT * FROM tbl_barang WHERE part_number LIKE '%$cari%' OR description LIKE '%$cari%' ORDER BY part_number";
					$sql3 = custom_query($query3);
					$total3 = mysqli_num_rows($sql3);

					if ($total3 > 0)
					{
						
				?>
                <p align="center"><strong>Ditemukan <?php echo $total3?> hasil pencarian dengan kata kunci " <?php echo $cari?> "</strong></p>
					<table align="center" width="753" border="0">

  <tr>
   <font size="5"> <td width="30"><div align="center"><strong>No.</strong></div></td>
    <td width="127"><div align="center"><strong>Part Number</strong></div></td>
    <td width="458"><div align="center"><strong>Deskripsi</strong></div></td>
    <td width="83"><div align="center"><strong>Jumlah</strong></div></td>
  </font></tr>
  
     <?php 
	 while ($r3 = mysqli_fetch_array($sql3))
 	 { 
	 	$urut++
  	?>
  <tr>
    <td><div align="center"><?php echo $urut;?></div></td>
    <td><div align="center"><?php echo $r3['part_number']; ?></div></td>
    <td><div align="left"><?php echo $r3['description']; ?></div></td>
    <td><div align="center"><?php echo $r3['jumlah']; ?></div></td>
    <?php
	if (($_SESSION[level] == "admin") || ($_SESSION[level] == "operator"))
{
    ?>
    
    <td width="50"><div align="center"><a href="editbrg.php?part_number=<?php echo $r3['part_number']; ?>">Edit</a></div></td>
    <td width="50"><div align="center"><a href="hapusbrg.php?part_number=<?php echo $r3['part_number']; ?>" title="Hapus" onClick="return konfirmasihapus()">Hapus</a></div></td>
    
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
	 }
	?>
</tr>
<tr>
<td colspan="4" align="center">

</td>
</tr>
</table><br>              
				<?php
					;}
					else
					{
					?>
                    <h1 align="center"><strong>Maaf, Tidak Ditemukan hasil pencarian dengan kata kunci " <?php echo $cari?> "</strong></h1>
					<?php	
					}
				}
				if($status == "datm")
				{
					$query4 = "SELECT * FROM tbl_atm WHERE id_atm LIKE '%$cari%' OR lokasi LIKE '%$cari%' OR sn LIKE '%$cari%' ORDER BY bank, id_atm";
					$sql4 = custom_query($query4);
					$total4 = mysqli_num_rows($sql4);
					if ($total4 > 0)
					{
					?>
  <p align="center"><strong>Ditemukan <?php echo $total4?> hasil pencarian dengan kata kunci " <?php echo $cari?> "</strong></p>
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
				while ($r4 = mysqli_fetch_array($sql4))
  				{
					$no++
				?>
                  <tr>
    <td><div align="center"><?php echo $no; ?></div></td>
    <td><div align="center"><?php echo $r4['id_atm']; ?></div></td>
    <td><div align="center"><?php echo $r4['bank']; ?></div></td>
    <td><div align="left"><?php echo $r4['lokasi']; ?></div></td>
    <td><div align="center"><?php echo $r4['sn']; ?></div></td>
    <td><div align="center"><?php echo $r4['install_date']; ?></div></td>
	<?php 
	 if ($_SESSION[level] == "admin")
	{
	?>
    <td width="33"><div align="center"><a href="editatm.php?id_atm=<?php echo $r4['id_atm']; ?>">Edit</a></div></td>
    <td width="64"><div align="center"><a href="hapusatm.php?id_atm=<?php echo $r4['id_atm']; ?>" title="Hapus" onClick="return konfirmasihapus()">Hapus</a></div></td>
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
				?>
   </table>
					<?php	
					;}
					else
					{
					?>
                    <h1 align="center"><strong>Maaf, Tidak Ditemukan hasil pencarian dengan kata kunci " <?php echo $cari?> "</strong></h1>
					<?php	
					}
				}
				if($status == "brgmsk")
				{
					$query5 = "SELECT * FROM tbl_det_masuk WHERE no_form_m LIKE '%$cari%' OR part_number LIKE '%$cari%' OR description LIKE '%$cari%' OR tgl_masuk LIKE '%$cari%' OR username LIKE '%$cari%' OR keterangan LIKE '%$cari%' ORDER BY no_form_m DESC";
					$sql5 = custom_query($query5);
					$total5 = mysqli_num_rows($sql5);
					if ($total5 > 0)
					{
					?>
       <style>
		table{
	width:1180px;
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

<p align="center"><strong>Ditemukan <?php echo $total5?> hasil pencarian dengan kata kunci " <?php echo $cari?> "</strong></p>
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
	while ($r5 = mysqli_fetch_array($sql5))
  	{
  ?> 
  <tr>
    <td><div align="center"><?php echo  $r5['no_form_m']; ?></div></td>
    <td><div align="center"><?php echo $r5['part_number']; ?></div></td>
    <td><?php echo $r5['description']; ?></td>
    <td><div align="center"><?php echo $r5['jumlah']; ?></div></td>
    <td><div align="center"><?php echo $r5['tgl_masuk']; ?></div></td>
    <td><div align="center"><?php echo $r5['username']; ?></div></td>
    <td><div align="center"><?php echo $r5['keterangan']; ?></div></td>
    
    <?php 
	if (($_SESSION[level] == "admin") || ($_SESSION[level] == "operator"))
	{
	?>
    <td width="50"><div align="center"><a href="editdetm.php?no_form_m=<?php echo $r5['no_form_m']; ?>">Edit</a></div></td>
  	<?php 
  	} 
  }
	?>
  </tr>
</table>
                    
                    <?php
					;}
					else
					{
					?>
                    <h1 align="center"><strong>Maaf, Tidak Ditemukan hasil pencarian dengan kata kunci " <?php echo $cari?> "</strong></h1>
					<?php	
					}
				}
				if($status == "brgkel")
				{
					$query6 = "SELECT * FROM tbl_det_keluar WHERE no_form_k LIKE '%$cari%' OR part_number LIKE '%$cari%' OR description LIKE '%$cari%' OR problem LIKE '%$cari%' OR id_atm LIKE '%$cari%' OR lokasi LIKE '%$cari%' OR nama_karyawan LIKE '%$cari%' OR username LIKE '%$cari%' OR tgl_keluar LIKE '%$cari%' OR keterangan LIKE '%$cari%' ORDER BY no_form_k DESC";
					$sql6 = custom_query($query6);
					$total6 = mysqli_num_rows($sql6);
					if ($total6 > 0)
					{
					?>
                    <style>
		table{
	width:1180px;
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
<p align="center"><strong>Ditemukan <?php echo $total6?> hasil pencarian dengan kata kunci " <?php echo $cari?> "</strong></p>
<table align="center" width="1400" border="0" bordercolor="#FFFFFF">
  <tr>
    <td width="59"><div align="center"><strong>No. Form</strong></div></td>
    <td width="109"><div align="center"><strong>Part Number</strong></div></td>
    <td width="143"><div align="center"><strong>Description</strong></div></td>
    <td width="94"><div align="center"><strong>Problem</strong></div></td>
    <td width="77"><div align="center"><strong>Operator</strong></div></td>
    <td width="77"><div align="center"><strong>Engineer</strong></div></td>
    <td width="47"><div align="center"><strong>Jumlah</strong></div></td>
    <td width="130"><div align="center"><strong>Tanggal Keluar</strong></div></td>
    <td width="140"><div align="center"><strong>Keterangan</strong></div></td>
  </tr>				<?php
   while ($r6 = mysqli_fetch_array($sql6))
  {
  ?> 
  <tr>
    <td><div align="center"><?php echo  $r6['no_form_k']; ?></div></td>
    <td><div align="center"><?php echo $r6['part_number']; ?></div></td>
    <td><?php echo $r6['description']; ?></td>
    <td><div align="center"><?php echo $r6['problem']; ?></div></td>
    <td><div align="center"><?php echo $r6['username']; ?></div></td>
    <td><div align="center"><?php echo $r6['nama_karyawan']; ?></div></td>
    <td><div align="center"><?php echo $r6['jumlah']; ?></div></td>
    <td><div align="center"><?php echo $r6['tgl_keluar']; ?></div></td>
    <td><div align="center"><?php echo $r6['keterangan']; ?></div></td>
  <?php
  if (($_SESSION[level] == "admin") || ($_SESSION[level] == "operator"))
  	{
  ?>
    <td width="39"><div align="center"><a href="showdetk.php?no_form_k=<?php echo $r6['no_form_k']; ?>">Show</a></div></td>
    <td width="39"><div align="center"><a href="editdetk.php?no_form_k=<?php echo $r6['no_form_k']; ?>">Edit</a></div></td>
  <?php
  	}
	if ($_SESSION[level] == "user")
	{
	?>
	<td width="39"><div align="center"><a href="showdetk.php?no_form_k=<?php echo $r6['no_form_k']; ?>">Show</a></div></td>
	<?php
    }
  }
  ?>
</table>                    
                    <?php	
					;}
					else
					{
					?>
                    <h1 align="center"><strong>Maaf, Tidak Ditemukan hasil pencarian dengan kata kunci " <?php echo $cari?> "</strong></h1>
					<?php	
					}					
				}
				if($status == "brgret")
				{
					$query7 = "SELECT * FROM tbl_det_return WHERE no_form_r LIKE '%$cari%' OR part_number LIKE '%$cari%' OR description LIKE '%$cari%' OR alasan LIKE '%$cari%' OR username LIKE '%$cari%' OR tgl_return LIKE '%$cari%' OR keterangan LIKE '%$cari%' ORDER BY no_form_r DESC";
					$sql7 = custom_query($query7);
					$total7 = mysqli_num_rows($sql7);
					if ($total7 > 0)
					{
					?>
       <style>
		table{
	width:1180px;
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

<p align="center"><strong>Ditemukan <?php echo $total7?> hasil pencarian dengan kata kunci " <?php echo $cari?> "</strong></p>
  <table align="center" width="1335" border="0" bordercolor="#FFFFFF">
  <tr>
    <td width="90"><div align="center"><strong>No. Form</strong></div></td>
    <td width="174"><div align="center"><strong>Part Number</strong></div></td>
    <td width="215"><div align="center"><strong>Description</strong></div></td>
    <td width="53"><div align="center"><strong>Jumlah</strong></div></td>
    <td width="250"><div align="center"><strong>Alasan Direturn</strong></div></td>
    <td width="212"><div align="center"><strong>Tanggal Masuk</strong></div></td>
    <td width="98"><div align="center"><strong>Operator</strong></div></td>
    <td width="212"><div align="center"><strong>Keterangan</strong></div></td>
  </tr>
  <?php
  while ($r7 = mysqli_fetch_array($sql7))
  {
  ?> 
  <tr>
    <td><div align="center"><?php echo  $r7['no_form_r']; ?></div></td>
    <td><div align="center"><?php echo $r7['part_number']; ?></div></td>
    <td><?php echo $r7['description']; ?></td>
    <td><div align="center"><?php echo $r7['jumlah']; ?></div></td>
    <td><div align="center"><?php echo $r7['alasan']; ?></div></td>
    <td><div align="center"><?php echo $r7['tgl_return']; ?></div></td>
    <td><div align="center"><?php echo $r7['username']; ?></div></td>
    <td><div align="center"><?php echo $r7['keterangan']; ?></div></td>
   	<?php
	if (($_SESSION[level] == "admin") || ($_SESSION[level] == "operator"))
	{
	?>
    <td width="50"><div align="center"><a href="editdetr.php?no_form_r=<?php echo $r7['no_form_r']; ?>">Edit</a></div></td>
 	<?php
	}
	?>
  </tr>
	<?php 
  } 
	?>
</table>
					<?php	
					;}
					else
					{
					?>
                    <h1 align="center"><strong>Maaf, Tidak Ditemukan hasil pencarian dengan kata kunci " <?php echo $cari?> "</strong></h1>
					<?php	
					}
				}
			}
			else 
			{ 
			echo "<script>alert('Maaf anda belum memilih kategori pencarian atau memasukkan kata yang ingin dicari');javascript:window.location='caridata.php';</script>";
			} 
	}
include "menu.php";?>
</div>
<div id="footer"></div>
	</body>
