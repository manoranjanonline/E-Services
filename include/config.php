<?php
	session_start();
	error_reporting(E_ALL & ~E_NOTICE);
	date_default_timezone_set('Asia/Calcutta');

	$servername = "localhost";	$username = "root";	$password = "";	$dbname = "tbs";

	$servername = "p3nlmysql7plsk.secureserver.net:3306";	$username = "tbs1";	$password = "Tbs@123";	$dbname = "tbs";

	$conn = new mysqli($servername, $username, $password, $dbname) or die("Connection failed: " . $conn->connect_error);

	$page_url = rtrim(basename($_SERVER['SCRIPT_NAME']),".php");

	$cont_dt=date('Y-m-d H:i:s', time());
	$yearl = date("Y", strtotime($cont_dt));
?>