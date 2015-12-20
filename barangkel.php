<?php
session_start();
include "koneksi.php";
error_reporting(0);
$waktu=time()+25200;
$expired=30;
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){include "formlogin.php";}
else{if (($_SESSION[level] == "admin") || ($_SESSION[level] == "operator"))
{?>

<html>
	<head>
    <script src="javascript/jquery.js"></script>
    <link href="css/test.css" type="text/css" rel="stylesheet"><link href="../images/icon.jpg" rel="shortcut icon" />
		<title>ATM Logistic</title>
		<style>
		table{
	border:medium none black;
	width:500px;
	margin-bottom:10px;
	margin-top: 10px;
		}
	td.field
    {
		width:300px;
	}
    td.field input
    {
		width:100%;
	}
		</style>
   
	</head>
</html>
	<body>
    <div id="header">
    </div>
	<div id="main_content">
    <?php include "atas.php";?>
    <h1 align="center"><b>Isi Form Dibawah Ini Untuk Input Barang Keluar</b></h1>
    <script type="text/javascript" src="javascript/jquery-1.2.3.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {

	$().ajaxStart(function() {
		$('#loading').show();
		$('#result').hide();
	}).ajaxStop(function() {
		$('#loading').hide();
		$('#result').fadeIn('slow');
	});

	$('#form1').submit(function() {
		$.ajax({
			type: 'POST',
			url: $(this).attr('action'),
			data: $(this).serialize(),
			success: function(data) {
				$('#result').html(data);
			}
		})
		return false;
	});
})
</script>
<div align="center" id="loading" style="display:none;"><img src="images/loading.gif" alt="loading..." /></div>
<div id="result" style="display:none;"></div>
	<form id="form1" name="form1" method="post" action="regbrgkel.php" >
	  
	<table align="center" id="tabeledit" width="200" border="0">
  <tr>
    <td width="178" height="34"><strong>No. Form</strong></td>
    <td  width="512"><label for="noform"></label>
      <input name="noform" type="text" id="noform" value="K-" maxlength="7"></td>
  </tr>
  <tr>
    <td height="34"><strong>Part Number</strong></td>
    <td><span class="field">
      <input name="part_number" type="text" id="part_number" value="" maxlength="10">
    </span></td>
  </tr>
  <tr>
    <td height="34"><strong>Deskripsi</strong></td>
    <td class="field"><div align="center"><span class="field">
      <input name="deskripsi" type="text" id="deskripsi" value="" readonly>
    </span></div></td>
  </tr>
  <tr>
    <td height="34"><strong>Jumlah</strong></td>
    <td><span class="field">
      <input name="jumlah" type="text" id="jumlah" value="">
    </span></td>
  </tr>
  <tr>
    <td height="34"><strong>Problem</strong></td>
    <td><span class="field">
      <input name="problem" type="text" id="problem" value="">
    </span></td>
  </tr>
  <tr>
    <td height="34"><strong>Id ATM</strong></td>
    <td><span class="field">
      <input name="id_atm" type="text" id="id_atm" value="">
    </span></td>
  </tr>
  <tr>
    <td height="34"><strong>Lokasi</strong></td>
    <td class="field"><div align="center"><span class="field">
      <input name="lokasi" type="text" id="lokasi"  value="" readonly>
    </span></div></td>
  </tr>
  <tr>
    <td height="34"><strong>Nama Engineer</strong></td>
    <td><span class="field">
     <select name="nama_karyawan" id="nama_karyawan">
      <option value="">- Pilih -</option>
      <?php 
		  $sql1 =  custom_query("SELECT * FROM tbl_karyawan WHERE jabatan = 'Engineer' ORDER BY nama_karyawan");
  while ($r1 = mysqli_fetch_array($sql1))
  {
	  ?>
    
      <option value="<?php echo $r1['nama_karyawan'];?>"><?php echo $r1['nama_karyawan']; 
  }	
  	  ?></option>
    </select>
    </span></td>
  </tr>
  <tr>
    <td height="34"><strong>Alamat Pengiriman</strong></td>
    <td class="field"><div align="center"><span class="field">
      <input name="alamat" type="text" id="alamat" value="" readonly>
    </span></div></td>
  </tr>
  <tr>
    
    <td height="34"><strong>Tgl Keluar</strong></td>
    <td><input type="text" id="tgl_keluar" name="tgl_keluar" value="<?php echo date('Y-m-d'); ?>" onClick="if(self.gfPop)gfPop.fPopCalendar(document.form1.tgl_keluar);return false;"/><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.form1.tgl_keluar);return false;"><img name="popcal" align="absmiddle" style="border:none" src="calender/calender.jpeg" width="34" height="29" border="0" alt=""></a></td>
  </tr>
   <tr>
    
    <td height="34"><strong>Operator</strong></td>
    <td><span class="field">
      <input name="id_user" type="text" id="id_user" value="<?php
	  $sql = custom_query("SELECT * FROM tbl_user WHERE username = '$_SESSION[username]'");
while ($data = mysqli_fetch_array($sql))
{
 $username = $data['username'];
}
	  echo "$username";
	  ?>" readonly>
    </span></td>
  </tr>
  <tr>
    <td height="34"><strong>Keterangan</strong></td>
    <td class="field">
      <input name="keterangan" type="text" id="keterangan" value="">
    </td>
  </tr>
  <tr>
   <td  bgcolor="#FFFFFF" height="34" colspan="2"><div align="center"> 
     <input name="simpan" type="submit" value="Simpan" id="simpan">
     
     </div></td>
    </tr>
    </table>
    
	</form>
    <?php include "menu.php"; ?>
</div>
</body>
<?php }  else { echo "<script>alert('Maaf anda tidak memiliki akses untuk melihat halaman ini, silakan login terlebih dahulu.');javascript:window.location='formlogin.php';</script>";}

}?>
<script>
var part_number = $("#part_number");
part_number.blur(function(){
	var value_part_number = part_number.val();
	$.ajax({
		url : 'fungsi/fungsiBarang.php',
		type : 'POST',
		data : {
			function : 'ambilDeskripsi',
			part_number : value_part_number
		},
		success : function(response){
			$("#deskripsi").val(response);
		}
	});
});

var id_atm = $("#id_atm");
id_atm.blur(function(){
	var value_id_atm = id_atm.val();
	$.ajax({
		url : 'fungsi/fungsiBarang.php',
		type : 'POST',
		data : {
			function : 'ambilLokasi',
			id_atm : value_id_atm
		},
		success : function(response){
			$("#lokasi").val(response);
		}
	});
});

var nama_karyawan = $("#nama_karyawan");
nama_karyawan.blur(function(){
	var value_nama_karyawan = nama_karyawan.val();
	$.ajax({
		url : 'fungsi/fungsiBarang.php',
		type : 'POST',
		data : {
			function : 'ambilAlamat',
			nama_karyawan : value_nama_karyawan
		},
		success : function(response){
			$("#alamat").val(response);
		}
	});
});

</script>
<div id="footer"></div>
<iframe width=174 height=189 name="gToday:normal:calender/agenda.js" id="gToday:normal:calender/agenda.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>
