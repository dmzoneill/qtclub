<?php



$fcwhost = "localhost"; //216.26.131.80 
$fcwusername = "root"; 
$fcwpassword2 = "11111111"; 
$fcwdb_name = "qtclub";
$fcwdb_type = "mysql";



include($path."db_".$fcwdb_type.".php");
$stream = new db;
$stream->connect();

