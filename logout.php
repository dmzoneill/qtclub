<?php

include("connect.php");

$fep = time();
$sql = $stream->do_query("insert into history values('',$fep,'Logged Out')","one");


setcookie("qtclub", $value, time()+3600, "/", "");

header("location:index.php");

?>