 
 <meta content="600;url=../" http-equiv="refresh">
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
<p>Selamat Datang <?php echo "$user_nama"; ?>. <a href="/simdatindo">Beranda</a> <a href="changepwd.php">Ubah Password</a> <a href="logout.php">Keluar</a>  </p>