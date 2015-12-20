<?php
	if(isset($_POST['pilih']))
	{
		$status = $_POST['laporan'];
		if($status == "brgmsk")
		{
			include "detbrgmasuk.php";
		}
		if($status == "brgkel")
		{
			include "detbrgkeluar.php";
		}
		if($status == "brgret")
		{
			include "detbrgreturn.php";
		}
		if($status == "")
			{ 

			echo "<script>alert('Maaf anda belum memilih jenis status barang, silakan ulangi kembali');javascript:window.location='status.php';</script>";
			}
	
	}

?>