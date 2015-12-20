<?php
    session_start();
	// koneksi ke database
	include "koneksi.php";
	

	//membaca inputan user
    $pwdlama = $_POST['pwdlama'];
    $pwdbaru = $_POST['pwdbaru'];
	$repwdbaru = $_POST['repwdbaru'];
	
	//mencari benar tidaknya password yang lama
	$sql = custom_query("SELECT * FROM tbl_user WHERE username = '$_SESSION[username]'");
	$data = mysqli_fetch_array($sql);
	
	if (trim($data['password']) != $pwdlama)
	{
		$error[] = '- Password lama tidak sesuai';
	}
	
	//jika password yang lama benar, maka selanjutnya cek kesesuaian password baru dan konfirmasi password
	if (trim($repwdbaru) != $pwdbaru)
	{
		$error[] = '- Konfirmasi password tidak sama, harap ulangi kembali';
	}

	if (strlen($pwdbaru) <=5)
	{
		$error[] = '- Password minimal 6 karakter';
	}


	if (isset($error))
	{
		echo '<div align="center"><b>Error</b>: <br /></div>'.implode('<br />', $error);
	} 
	else 
	{
		
			// jika password baru dan konfirmasi password benar, maka akan di lakukan update password ke database
			$query = "UPDATE tbl_user SET password = '$pwdbaru' WHERE username = '$_SESSION[username]'";
			$update = custom_query($query);
			
		echo '<div class="result" align="center"><b>Password berhasil di ubah. password baru anda adalah : '; echo $pwdbaru; '</b></div><br />';
	}
?>