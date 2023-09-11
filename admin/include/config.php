<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE);
date_default_timezone_set('Asia/Calcutta');

$servername = "p3nlmysql7plsk.secureserver.net:3306 ";	$username = "tbs1";	$password = "Tbs@123";	$dbname = "tbs";

$servername = "localhost";	$username = "root";	$password = "";	$dbname = "tbs";

$conn = new mysqli($servername, $username, $password, $dbname) or die("Connection failed: " . $conn->connect_error);

$page_url = rtrim(basename($_SERVER['SCRIPT_NAME']),".php");

$cont_dt=date('Y-m-d H:i:s', time());
$yearl = date("Y", strtotime($cont_dt));

function compressImage($source, $destination, $quality)
{
	$info = getimagesize($source);

	if ($info['mime'] == 'image/jpeg') 
		$image = imagecreatefromjpeg($source);

	elseif ($info['mime'] == 'image/gif') 
		$image = imagecreatefromgif($source);

	elseif ($info['mime'] == 'image/png') 
		$image = imagecreatefrompng($source);

	imagejpeg($image, $destination, $quality);
}

function validateLogin($id, $pw){
	$sql = "SELECT * FROM users where password=$pw and (username=$id or email=$id or phone=$id)";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$_SESSION['user']['name']=$row['name'];
		$_SESSION['user']['email']=$row['email'];
		$_SESSION['user']['phone']=$row['phone'];
		$_SESSION['user']['image']=$row['image'];
		return true;
	}
	else{
		return false;
	}
}

?>