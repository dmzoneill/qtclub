<?php
include("connect.php");
include("header.php");

include("menu.php");

?>

<script language=javascript>

function doit(){

var hours;
var mins;
var value;

mins = parseInt (document.fed.mins.value);
hours = parseInt (document.fed.hours.value);
mins = mins * 60;
hours = hours * 60 * 60;
value = mins + hours;


document.fed.vcookietime.value = value;


}


</script>

<?php
switch($options){



default :
	$fep = time();
	$sql2 = $stream->do_query("insert into history values('',$fep,'Show Users by user $fucking')","one");
		print "<form action=useradmin.php?options=adduser method=post>";
		print "<h3>Add User</h3><table width=100% bordercolor=\"#336699\" cellpadding=5 cellspacing=0 border=1>";
		print "<tr><td bgcolor='#DDBB00'>Username</td><td><input type=text name=vuser></td></tr>";
		print "<tr><td bgcolor='#DDBB00'>Password</td><td><input type=password name=vpass1></td></tr>";
		print "<tr><td bgcolor='#DDBB00'>Re-type</td><td><input type=password name=vpass2></td></tr>";
		print "<tr><td bgcolor='#DDBB00' colspan=2>";
		print "<input type=submit value='Add User'></td></tr>";
		print "</table><br>";
		print "</form>";


		print "<h3>Manage Users</h3><table width=100% bordercolor=\"#336699\" cellpadding=5 cellspacing=0 border=1>";
		print "<tr bgcolor='#DDBB00'><td bgcolor='#DDBB00'>Id</td><td bgcolor='#DDBB00'>Username</td><td>Password (md5 checksum)</td><td>Cookie Time</td><td>Something</td><td>Options</td></tr>";
		
				
	$sql = $stream->do_query("select * from users","array");

	for($r=0;$r<count($sql);$r++){
		$tmp = $sql[$r];
		$id = $tmp[0];
		$fname = $tmp[1];
		$fpass = $tmp[2];
		$cookietime = $tmp[3];
		$something = $tmp[4];
		
		print "<tr><td>$id</td><td>$fname</td><td>$fpass</td><td>$cookietime</td><td>$something</td><td><a href=useradmin.php?options=delete&id=$id>Delete</a> | <a href=useradmin.php?options=change&id=$id>Change</a></td></tr>";
		
	}
	print "</table>";
	
	
break;


case "adduser":

	$some = $stream->do_query("select password from users where username='$vuser'","one");

	if(!strlen($some)==20){
		if($vpass1==$vpass2){
			$vpass1 = md5($vpass2);
			$fep = time();
	$sql2 = $stream->do_query("insert into history values('',$fep,'Added user \'$vuser\' by user $fucking')","one");
		$sql = $stream->do_query("insert into users values('','$vuser','$vpass1','3600','1')","one");#
			print "<h3>User Added</h3>";
		
		}
		else {
			print "<form action=useradmin.php?options=adduser method=post>";
			print "<h3>Passwords do not match</h3>";
			print "<h3>Add User</h3><table width=100% bordercolor=\"#336699\" cellpadding=5 cellspacing=0 border=1>";
			print "<tr><td>Username</td><td><input type=text name=vuser></td></tr>";
			print "<tr><td>Password</td><td><input type=password name=vpass1></td></tr>";
			print "<tr><td>Re-type</td><td><input type=password name=vpass2></td></tr>";
			print "<tr><td colspan=2>";
			print "<input type=submit value='Add User'></td></tr>";
			print "</table><br>";
			print "</form>";
		
		}
	}
	else {
		print "<h3>Username already exists</h3>";
		print "<form action=useradmin.php?options=adduser method=post>";
		print "<h3>Add User</h3><table width=100% bordercolor=\"#336699\" cellpadding=5 cellspacing=0 border=1>";
		print "<tr><td>Username</td><td><input type=text name=vuser></td></tr>";
		print "<tr><td>Password</td><td><input type=password name=vpass1></td></tr>";
		print "<tr><td>Re-type</td><td><input type=password name=vpass2></td></tr>";
		print "<tr><td colspan=2>";
		print "<input type=submit value='Add User'></td></tr>";
		print "</table><br>";
		print "</form>";
	}

break;



case "change":

print "<form action=useradmin.php?options=changeit name=fed method=post>";
print "<table width=60% bordercolor=\"#336699\" cellpadding=10 cellspacing=0 border=1>";
				
	$sql = $stream->do_query("select * from users where id=$id","array");

	for($r=0;$r<count($sql);$r++){
		$tmp = $sql[$r];
		$id = $tmp[0];
		$fname = $tmp[1];
		$fpass = $tmp[2];
		$cookietime = $tmp[3];
		$something = $tmp[4];

		print "<tr bgcolor='#cccccc'>";
		print "<td colspan=2><h3>$fname</h3></td></tr>";
		print "<tr bgcolor='#bbbbbb'><td colspan=2><b>Change Password</td></tr>";		
		print "<tr><td colspan=2>Old Password<br><input type=password name=vold><br>";
		print "New Password<br><input type=password name=vpass1><br>";
		print "Retype new Password<br><input type=password name=vpass2>";
		print "</td></tr>";
		print "<tr><td colspan=2>";
		print "&nbsp;</td></tr>";
		print "<tr bgcolor='#bbbbbb'><td colspan=2>";
		print "<b>Login Timeout</td></tr>";
		print "<tr><td colspan=2>";
		print "<input type=text name=vcookietime value='$cookietime'>&nbsp;&nbsp;&nbsp;&nbsp;<br><br><table border=1 cellpadding=10><tr><td><b>Cookie Time Calculator</b>, Use this to change the value above....<br>";
		print " Hours : <input size=2 type=text name=hours> Mins : <input size=2 type=text name=mins> <br><input type=button value='Change Time' onclick='javascript:doit()'>";
		print "</td></tr></table><br><br>After this time of inactivity you will automatically be logged out</td></tr>";
		print "<tr><td colspan=2><input type=hidden name='vfed' value='$id'><input type=hidden name='vguser' value='$fname'>";
		print "<input type=submit value='Change User Settings'></td></tr>";
	}
	
	print "</table><h3>To Change any of the settings above to must also change the password / or 'renew' it, by typing your current one in each box.</h3>";
print "</form>";
break;




case "changeit":

if(($vpass1) || ($vcookietime)){
	
	if($vold){
	$old = $stream->do_query("select password from users where id='$vfed'","one");
		if($vpass1==$vpass2){
			if($old==md5($vold)){
				$rrr = md5($vpass1);
				$sql = $stream->do_query("update users set password='$rrr', cookietime='$vcookietime' where id='$vfed'","one");
				$fep = time();
	$sql2 = $stream->do_query("insert into history values('',$fep,'Updated user \'$vguser\' by user $fucking')","one");
				print "<h3>Updated User Settings</h3>";
			}
			else {
				print "<h3>Old Password verification failed</h3>";
			}			
		}
		else {
			print "<h3>New Passwords do not match</h3>";
		}
	}
}	
else {


print "<form action=useradmin.php?options=changeit name=fed method=post>";
print "<table width=60% bordercolor=\"#336699\" cellpadding=5 cellspacing=0 border=1>";
				
	$sql = $stream->do_query("select * from users where id=$id","array");

	for($r=0;$r<count($sql);$r++){
		$tmp = $sql[$r];
		$id = $tmp[0];
		$fname = $tmp[1];
		$fpass = $tmp[2];
		$cookietime = $tmp[3];
		$something = $tmp[4];

		print "<tr bgcolor='#cccccc'>";
		print "<td colspan=2><h3>$fname</h3></td></tr>";
		print "<tr bgcolor='#bbbbbb'><td colspan=2><b>Change Password</td></tr>";		
		print "<tr><td colspan=2>Old Password<br><input type=password name=vold><br>";
		print "New Password<br><input type=password name=vpass1><br>";
		print "Retype new Password<br><input type=password name=vpass2>";
		print "</td></tr>";
		print "<tr><td colspan=2>";
		print "&nbsp;</td></tr>";
		print "<tr bgcolor='#bbbbbb'><td colspan=2>";
		print "<b>Login Timeout</td></tr>";
		print "<tr><td colspan=2>";
		print "<input type=text name=vcookietime value='$cookietime'>&nbsp;&nbsp;&nbsp;&nbsp;<br><br>";
		print " Hours : <input size=2 type=text name=hours> Mins : <input size=2 type=text name=mins> <br><input type=button value='Change Time' onclick='javascript:doit()'>";
		print "<br><br>After this time of inactivity you will automatically be logged out</td></tr>";
		print "<tr><td colspan=2><input type=hidden name='vfed' value='$id'><input type=hidden name='vguser' value='$fname'>";
		print "<input type=submit value='Change User Settings'></td></tr>";
	}
	
	print "</table>";
print "</form>";

}

break;








case "delete":

break;

}

include("footer.php");


?>