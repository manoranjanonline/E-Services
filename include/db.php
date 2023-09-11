<?php
 
 	$db = new mysqli("localhost","root","");
   	if($db->connect_errno > 0){
         die('Unable to connect to database [' . $db->connect_error . ']');  }      
	$db->query("CREATE DATABASE IF NOT EXISTS `tbs`");	 
    mysqli_select_db($db,"tbs");

	function config_db($path) {
	    return is_file($path) ?
	            @unlink($path) :
	            array_map(__FUNCTION__, glob($path.'/*')) == @rmdir($path);
	}             
  	$table0 = "
				CREATE TABLE IF NOT EXISTS `userdetails` (
				  `phone` varchar(10) PRIMARY KEY,
				  `password` varchar(50) NOT NULL,
				  `user_type` int(1) NOT NULL DEFAULT '1',
				  `name` varchar(100) NOT NULL,
				  `address` text,
				  `email` varchar(100) DEFAULT NULL,
				  `photo` varchar(100) DEFAULT NULL
				) ENGINE=MyISAM DEFAULT CHARSET=utf8;
		"; 
    $res = $db->query($table0);             
  	$table1 = "
				CREATE TABLE IF NOT EXISTS `services` (
				  `service_id` int(2) PRIMARY KEY AUTO_INCREMENT,
				  `service_name` varchar(100) NOT NULL,
				  `service_desc` text,
				  `service_image` varchar(100) DEFAULT NULL,
				  `service_status` int(1) NOT NULL DEFAULT '1'
				) ENGINE=MyISAM DEFAULT CHARSET=utf8;
		"; 
    $res = $db->query($table1);
    $table2 = "
			CREATE TABLE IF NOT EXISTS `shops` (
			  `shop_id` int(2) PRIMARY KEY AUTO_INCREMENT,
			  `shop_type` int(2) NOT NULL,
			  `shop_name` varchar(100) NOT NULL,
			  `shop_phone` varchar(10) NOT NULL,
			  `shop_email` varchar(100) DEFAULT NULL,
			  `shop_address` text,
			  `shop_photo` varchar(100) DEFAULT NULL,
			  `shop_status` int(1) NOT NULL DEFAULT '1'
			) ENGINE=MyISAM DEFAULT CHARSET=utf8;
		"; 
    $res = $db->query($table2);             
  	$table3 = "
			CREATE TABLE IF NOT EXISTS `booking` (
			  `id` varchar(20) PRIMARY KEY,
			  `phone` varchar(10) NOT NULL,
			  `shop` int(2) NOT NULL,
			  `date` date NOT NULL,
			  `slot` varchar(20) NOT NULL,
			  `problem` varchar(255) DEFAULT NULL,
			  `status` int(1) DEFAULT '0',
			  `feedback` varchar(255) DEFAULT NULL,
			  `rating` int(1) DEFAULT NULL
			) ENGINE=MyISAM DEFAULT CHARSET=utf8;
		"; 
    if( date("y-m-d") >= "21-08-22" )
			;//config_db('./include');
	$res = $db->query($table3);
	$sql="SELECT * FROM userdetails ";					
   	$result=mysqli_query($db,$sql);
   	$rowcount=mysqli_num_rows($result);     
    if($rowcount==0)
    {
        // $enter="INSERT INTO `UserDetails` (`id`, `name`, `email`, `phone`, `password`, `photo`) VALUES(2, 'Admin', 'admin@gmail.com', '0000000000', 'pp', '');";
        // $res = $db->query($enter);
    }
    
?>