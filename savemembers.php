<?php

include("connect.php"); 
include("header.php");
include("menu.php");
include("functions.php");

/* clickatell
  history
  members
  search
  users */
$tablenamer = array("history","members","search","users");  
 
  	for($t=0;$t<count($tablenamer);$t++){
		$tableName  = "$tablenamer[$t]";
		$backupFile = "$tableName.sql";
		$shell = shell_exec("del \"c:\\apache2triad\\mysql\\data\\qtclub\\$tableName.sql\"");
		$shell = shell_exec("del \"c:\\apache2triad\\htdocs\\backup\\$tableName.sql\"");
		$query      = $stream->do_query("SELECT * INTO OUTFILE '$backupFile' FROM $tableName","one");
		$shell = shell_exec("move \"c:\\apache2triad\\mysql\\data\\qtclub\\$tableName.sql\" \"c:\\apache2triad\\htdocs\\backup\\$tableName.sql\"");
	}
/*



<?php
include 'config.php';
include 'opendb.php';

$tableName  = 'mypet';
$backupFile = 'mypet.sql';
$query      = "LOAD DATA INFILE 'backupFile' INTO TABLE $tableName";
$result = mysql_query($query);


include 'closedb.php';
?> 

*/

$fep = time();
$sql = $stream->do_query("insert into history values('',$fep,'Member database backup complete  by user $fucking')","one");


print "<a href='/backup'>Backup completed click here to view</a>";

include("footer.php");


?>