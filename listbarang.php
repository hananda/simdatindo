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
    <link href="css/test.css" type="text/css" rel="stylesheet"><link href="../simdatindo/images/icon.jpg" rel="shortcut icon" />
		<title>ATM Logistic</title>
		<style>
		table{
	border:medium none black;
	width:800px;
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
		// jumlah data yang akan ditampilkan per halaman

		$dataPerPage = 40;

		// apabila $_GET['page'] sudah didefinisikan, gunakan nomor halaman tersebut, 
		// sedangkan apabila belum, nomor halamannya 1.

		if(isset($_GET['page']))
		{
    		$noPage = $_GET['page'];
		} 
		else $noPage = 1;

		// perhitungan offset

		$offset = ($noPage - 1) * $dataPerPage;

		// query SQL untuk menampilkan data perhalaman sesuai offset

		$query = "SELECT * FROM tbl_barang ORDER BY part_number LIMIT $offset, $dataPerPage";

		$result = custom_query($query) or die('Error');

	?>

	<table align="center" width="753" border="0">

  <tr>
   <font size="5"> <td width="30"><div align="center"><strong>No.</strong></div></td>
    <td width="127"><div align="center"><strong>Part Number</strong></div></td>
    <td width="458"><div align="center"><strong>Deskripsi</strong></div></td>
    <td width="83"><div align="center"><strong>Jumlah</strong></div></td>
  </font></tr>
  
     <?php 
	 while ($r = mysqli_fetch_array($result))
 	 { 
	 	$urut++
  	?>
  <tr>
    <td><div align="center"><?php echo $urut;?></div></td>
    <td><div align="center"><?php echo $r['part_number']; ?></div></td>
    <td><div align="left"><?php echo $r['description']; ?></div></td>
    <td><div align="center"><?php echo $r['jumlah']; ?></div></td>
    <?php
	if (($_SESSION[level] == "admin") || ($_SESSION[level] == "operator"))
{
    ?>
    
    <td width="50"><div align="center"><a href="editbrg.php?part_number=<?php echo $r['part_number']; ?>">Edit</a></div></td>
    <td width="50"><div align="center"><a href="hapusbrg.php?part_number=<?php echo $r['part_number']; ?>" title="Hapus" onClick="return konfirmasihapus()">Hapus</a></div></td>
    
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
<div align="center"><?php
// mencari jumlah semua data dalam tabel guestbook

$query   = "SELECT COUNT(*) AS jumData FROM tbl_barang";
$hasil  = custom_query($query);
$data     = mysqli_fetch_array($hasil);

$jumData = $data['jumData'];

// menentukan jumlah halaman yang muncul berdasarkan jumlah semua data

$jumPage = ceil($jumData/$dataPerPage);

// menampilkan link previous

if ($noPage > 1) echo  "<a href='".$_SERVER['PHP_SELF']."?page=".($noPage-1)."'>&lt;&lt; Prev</a>";

// memunculkan nomor halaman dan linknya

for($page = 1; $page <= $jumPage; $page++)
{
         if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) 
         {   
            if (($showPage == 1) && ($page != 2))  echo "..."; 
            if (($showPage != ($jumPage - 1)) && ($page == $jumPage))  echo "...";
            if ($page == $noPage) echo " <b>".$page."</b> ";
            else echo " <a href='".$_SERVER['PHP_SELF']."?page=".$page."'>".$page."</a> ";
            $showPage = $page;          
         }
}

// menampilkan link next

if ($noPage < $jumPage) echo "<a href='".$_SERVER['PHP_SELF']."?page=".($noPage+1)."'>Next &gt;&gt;</a>";
echo "<br><br></div>";
include "menu.php";?>
</div>
<?php } ?>
<div id="footer"></div>
	</body>