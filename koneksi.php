<?php
ini_set('display_errors', 1);
#**************** koneksi ke mysqli *****************#
$host = "localhost";
$user = "root";
$pass = "inimysql";
$dbname ="simdatindo";
$conn = mysqli_connect($host,$user,$pass);
if($conn) {
//select database
$sele = mysqli_select_db($conn,$dbname);
if(!$sele) {
echo mysqli_error();
}
}

function custom_query($query=''){
	$conn = $GLOBALS['conn'];
	return mysqli_query($conn,$query);
}

?>