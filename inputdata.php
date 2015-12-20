<?php
	if(isset($_POST['pilih']))
	{
		$status = $_POST['input'];
		if($status == "dkar")
		{
			include "ikaryawan.php";
		}
		if($status == "duser")
		{
			include "iuser.php";
		}
		if($status == "dpart")
		{
			include "isparepart.php";
		}
		if($status == "datm")
		{
			include "iatm.php";
		}
		if($status == "brgmsk")
		{
			include "barangmsk.php";
		}
		if($status == "brgkel")
		{
			include "barangkel.php";
		}
		if($status == "brgret")
		{
			include "barangret.php";
		}
		if($status == "")
			{ 

			echo "<script>alert('Maaf anda belum memilih data yang akan diinput, silakan ulangi kembali');javascript:window.location='tambahdata.php';</script>";
			}
	
	}

?>