<?php

include("connect.php"); 
include("header.php");
include("menu.php");
include("functions.php");

if($newmember){

$qt_memstart = "$day/$month/$year";
$qt_memend = "$eday/$emonth/$eyear";
$check = $stream->do_query("select * from members where firstname='$qt_fname' and lastname='$qt_lname'","array");

if(count($check)>0){
print "<h3><font color=red>The Customer is already in the Database</font></h3><hr>";

$sql = $stream->do_query("select * from members","array");

print "<table bordercolor=\"#336699\" cellpadding=5 cellspacing=0 border=1 width=800>";
print "<tr><td width=50><b>Client Id</td><td width=80><b>First Name</td><td width=80><b>Surname</td><td width=180><b>Address</td><td width=80><b>Mobile Number</td><td width=80><b>Email</td></tr>";


for($h=0;$h<count($check);$h++){
$tmp = $check[$h];
$id = $tmp[0];
$fname = $tmp[1];
$sname = $tmp[2];
$add = $tmp[3];
$mob = $tmp[4];
$email = $tmp[5];
$pay = $tmp[6];
$op1 = $tmp[7];
$op2 = $tmp[8];
$op3 = $tmp[9];

if($h%2>0){
$bgcolor= "EEEECC";
}
else {
$bgcolor= "DDDDAA";
}

print "<tr bgcolor='$bgcolor'>
<td width=50><a href='editmember.php?members=memberedit&id=$id'>$id</a></td>
<td width=80>$fname</td>
<td width=80>$sname</td>
<td width=80>$add</td>
<td width=80>$mob</td>
<td width=80>$email</td>
</tr>";
print "<tr><td colspan=10><hr></td></tr>";
}

print "</table>";





}
else {
$shit = count($argv);
for($i=0;$i<$shit;$i++){
eregi_replace(","," ",$argv[$i]);
eregi_replace("\""," ",$argv[$i]);
eregi_replace("'"," ",$argv[$i]);
}

$fep = time();
$sql = $stream->do_query("insert into history values('',$fep,'Added Member \'$qt_fname $qt_lname\'  by user $fucking')","one");


$sql = $stream->do_query("insert into members values('','$qt_fname','$qt_lname','$qt_add','$qt_mob','$qt_email','$qt_pay','$qt_memstart','$qt_memend','$qt_other','','0','0','0')","one");
print "<h3><font color=red>Client Added</font></h3><hr>";


print "<h3>Client Application form</h3><hr><table bordercolor=\"#336699\" width=\"800\" border=\"1\" cellspacing=\"0\" cellpadding=\"5\">";

print "<form action='newmember.php?newmember=true' method='post'>";


print "  <tr>
    <td  bgcolor='#DDBB00'>First Names : </td>
    <td bgcolor='#cdcdcd'><input type=text name=qt_fname></td>
  </tr><tr>
    <td  bgcolor='#DDBB00'>Surname :</td>
    <td bgcolor='#cdcdcd'> <input type=text name=qt_lname></td>
  </tr><tr>
    <td bgcolor='#DDBB00'>Mobile No. :</td>
    <td> <input type=text name=qt_mob></td>
	  </tr><tr>
    <td bgcolor='#DDBB00'>Address : </td>
    <td><textarea cols=30 rows=4 name=qt_add></textarea></td>
  </tr><tr>
    <td bgcolor='#DDBB00'>Email Address : </td>
    <td><input type=text name=qt_email></td>
  </tr><tr>
    <td bgcolor='#DDBB00'>Pay Method : </td>
    <td><select name='qt_pay'>
<option value='1'>Direct Debit
<option value='2'>Weekly
<option value='3'>Hourly
<option value='4'>Per Minute</select></td>
  </tr>";

print "<tr>
    <td bgcolor='#DDBB00'>Date Joined :</td>
    <td> 
	";
	
$tyear = date("Y");
$tday = date("j");    
$tmonth = date("n"); 
	print "<select name=day>";
		
	for ($r=1;$r<32;$r++){
		if($tday==$r){ $x = "selected"; }
		else { $x = ""; }
			print "<option $x value='$r'>$r";
	}
	print "</select> / ";

	print "<select name=month>";
	for ($s=1;$s<13;$s++){
		if($tmonth==$s){ $x = "selected"; }
		else { $x = ""; } 
			print "<option $x value='$s'>$s";
	}
	print "</select> / ";
	print "<select name=year>";
	for ($t=2000;$t<2015;$t++){
		if($tyear==$t){ $x = "selected"; }
		else { $x = ""; }
			print "<option $x value='$t'>$t";
	}
	print "</select>";
	
print "	
	</td>
  </tr>";
print "<tr>
    <td bgcolor='#DDBB00'>End Of Membership  : </td>
    <td>";
	
		print "<select name=eday>";
	for ($r=1;$r<32;$r++){
	print "<option value='$r'>$r";
	}
	print "</select> / ";
	print "<select name=emonth>";
	for ($s=1;$s<13;$s++){
	print "<option value='$s'>$s";
	}
	print "</select> / ";
	print "<select name=eyear>";
	for ($t=2000;$t<2015;$t++){
	print "<option value='$t'>$t";
	}
	print "</select>";
	
	print "</td>
  </tr>
  
  <tr>
    <td bgcolor='#DDBB00'>Add Client  : </td>
    <td><input type=submit value='Add Client'></td>
  </tr>";


print "</form>";


print "</table>";



}

}

else {

print "<h3>Client Application form</h3><hr><table bordercolor=\"#336699\" width=\"800\" border=\"1\" cellspacing=\"0\" cellpadding=\"5\">";

print "<form action='newmember.php?newmember=true' method='post'>";


print "  <tr>
    <td  bgcolor='#DDBB00'>First Names : </td>
    <td bgcolor='#cdcdcd'><input type=text name=qt_fname></td>
  </tr><tr>
    <td  bgcolor='#DDBB00'>Surname :</td>
    <td bgcolor='#cdcdcd'> <input type=text name=qt_lname></td>
  </tr><tr>
    <td bgcolor='#DDBB00'>Mobile No. :</td>
    <td> <input type=text name=qt_mob></td>
	  </tr><tr>
    <td bgcolor='#DDBB00'>Address : </td>
    <td><textarea cols=30 rows=4 name=qt_add></textarea></td>
  </tr><tr>
    <td bgcolor='#DDBB00'>Email Address : </td>
    <td><input type=text name=qt_email></td>
  </tr><tr>
    <td bgcolor='#DDBB00'>Pay Method : </td>
    <td><select name='qt_pay'>
<option value='1'>Direct Debit
<option value='2'>Weekly
<option value='3'>Hourly
<option value='4'>Per Minute</select></td>
  </tr>";

print "<tr>
    <td bgcolor='#DDBB00'>Date Joined :</td>
    <td> 
	";
	$tyear = date("Y");
$tday = date("j");    
$tmonth = date("n"); 
	print "<select name=day>";
		
	for ($r=1;$r<32;$r++){
		if($tday==$r){ $x = "selected"; }
		else { $x = ""; }
			print "<option $x value='$r'>$r";
	}
	print "</select> / ";

	print "<select name=month>";
	for ($s=1;$s<13;$s++){
		if($tmonth==$s){ $x = "selected"; }
		else { $x = ""; } 
			print "<option $x value='$s'>$s";
	}
	print "</select> / ";
	print "<select name=year>";
	for ($t=2000;$t<2015;$t++){
		if($tyear==$t){ $x = "selected"; }
		else { $x = ""; }
			print "<option $x value='$t'>$t";
	}
	print "</select>";
print "	
	</td>
  </tr>";
print "<tr>
    <td bgcolor='#DDBB00'>End Of Membership  : </td>
    <td>";
	$tyear = date("Y");
$tday = date("j");    
$tmonth = date("n"); 
	print "<select name=eday>";
		
	for ($r=1;$r<32;$r++){
		if($tday==$r){ $x = "selected"; }
		else { $x = ""; }
			print "<option $x value='$r'>$r";
	}
	print "</select> / ";

	print "<select name=emonth>";
	for ($s=1;$s<13;$s++){
		if($tmonth==$s){ $x = "selected"; }
		else { $x = ""; } 
			print "<option $x value='$s'>$s";
	}
	print "</select> / ";
	print "<select name=eyear>";
	for ($t=2000;$t<2015;$t++){
		if($tyear==$t){ $x = "selected"; }
		else { $x = ""; }
			print "<option $x value='$t'>$t";
	}
	print "</select>";
	
	print "</td>
  </tr>
  
  <tr>
    <td bgcolor='#DDBB00'>Add Client  : </td>
    <td><input type=submit value='Add Client'></td>
  </tr>";


print "</form>";


print "</table>";


}

include("footer.php");





?>