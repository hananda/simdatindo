<?php
if ($_SESSION[level] == "admin")
{
	echo "<a href='caridata.php'>Cari Data<br></a>";
	echo "<a href='tambahdata.php'>Tambah Data<br></a>";
	echo "<a href='karyawan.php'>Karyawan<br></a>";
	echo "<a href='user.php'>User<br></a>";
	echo "<a href='listbarang.php'>Barang<br></a>";
	echo "<a href='pilihlist.php'>List ATM<br></a>";
	echo "<a href='status.php'>Status<br></a>";
	echo "<a href='laporan.php'>Laporan<br></a>";}
if ($_SESSION[level] == "operator") 
{ 
	echo "<a href='caridata.php'>Cari Data<br></a>";
	echo "<a href='tambahdata.php'>Tambah Data<br></a>";
	echo "<a href='listbarang.php'>Barang<br></a>";
	echo "<a href='pilihlist.php'>List ATM<br></a>";
	echo "<a href='status.php'>Status<br></a>";
	echo "<a href='laporan.php'>Laporan<br></a>";
}
if ($_SESSION[level] == "user")
{
	echo "<a href='caridata.php'>Cari Data<br></a>";
	echo "<a href='listbarang.php'>Barang<br></a>";
	echo "<a href='pilihlist.php'>List ATM<br></a>";
	echo "<a href='status.php'>Status<br></a>";

}
if ($_SESSION[level] == "")
{
	echo "Kamu tidak memiliki akses kesini!";
}
?>