<?php

include("connect.php"); 
include("header.php");
include("menu.php");
include("functions.php");

switch($members){




case "editmembers":

$shit = count($argv);
for($i=0;$i<$shit;$i++){
eregi_replace(","," ",$argv[$i]);
eregi_replace("\""," ",$argv[$i]);
eregi_replace("'"," ",$argv[$i]);
}

$sql = $stream->do_query("select allvisits from members where id='$id'","array");
$crap = substr_count($sql, "/") / 2; 

$sql = $stream->do_query("update members set firstname='$qt_fname', lastname='$qt_lname', address='$qt_add', mobile='$qt_mob', email='$qt_email', paymentmethod='$qt_pay', option1='$qt_memstart', option2='$qt_memend', other='$qt_other', other='$last', allvisits='$all', average='$crap'  where id='$id'","one");
$qt_fname = eregi_replace("[0-9]","",$qt_fname);
$qt_lname = eregi_replace("[0-9]","",$qt_lname);
$fep = time();
$sql = $stream->do_query("insert into history values('',$fep,'Edited Member \'$qt_fname $qt_lname\', id number <a href=\'editmember.php?members=memberedit&id=$id\'>$id</a> by user $fucking')","one");
print "<h3>Client Edited Successfully</h3><hr>Redirecting .......";
?>
<script language=javascript>
setTimeout("document.location.href='<?php print $fedfed; ?>'",1000);
</script>
<?php

break;






case "memberedit";


$sql = $stream->do_query("select * from members where id='$id'","array");

for($h=0;$h<count($sql);$h++){
 
  
$tmp = $sql[$h];
$idd = $tmp[0];
$fname = $tmp[1];
$sname = $tmp[2];
$add = $tmp[3];
$mob = $tmp[4];
$email = $tmp[5];
$pay = $tmp[6];
$op1 = $tmp[7];
$op2 = $tmp[8];
$op3 = $tmp[9];
$all = $tmp[10];
$fname = eregi_replace("[0-9]","",$fname);
$sname = eregi_replace("[0-9]","",$sname);

$fep = time();
$sql2 = $stream->do_query("insert into history values('',$fep,'Viewed Member \'$fname $sname\', id number <a href=\'editmember.php?members=memberedit&id=$idd\'>$id</a>  by user $fucking')","one");



print "<h3>Viewing Profile for <font color=red>$fname $sname</font></h3><hr><a href='updatemember.php?id=$id'>Update Last Visit</a><form action='editmember.php?members=editmembers&id=$id' method='post'>
<table  bordercolor=\"#336699\" width=\"800\" border=\"1\" cellspacing=\"0\" cellpadding=\"5\">";
print "<tr>    <td>First Names : </td>
    <td><input type=text name=qt_fname value='$fname'></td><td rowspan=11><center><img alt='Customer Photograph' border=1 src='images/7.jpg'></td>
  </tr><tr>
    <td>Surname :</td>
    <td> <input type=text name=qt_lname value='$sname'></td>
  </tr><tr>
    <td>Mobile No. :</td>
    <td> <input type=text name=qt_mob value='$mob'></td>
  </tr><tr>
    <td>Address : </td>
    <td><textarea cols=30 rows=4 name=qt_add>$add</textarea></td>
  </tr><tr>
    <td>Email Address : </td>
    <td><input type=text name=qt_email value='$email'></td>
  </tr>
    <tr>
    <td>Pay Method : </td>
    <td><select name='qt_pay'>";
if($pay=="1"){
$crap1 = "SELECTED";
}
if($pay=="2"){
$crap2 = "SELECTED";
}
if($pay=="3"){
$crap3 = "SELECTED";
}
if($pay=="4"){
$crap4 = "SELECTED";
}


print "
<option $crap1 value='1'>Direct Debit
<option $crap2 value='2'>Weekly
<option $crap3 value='3'>Hourly
<option $crap4 value='4'>Per Minute</select></td>
  </tr>
  <tr>
    <td>All Visits  : </td>
    <td><textarea cols=30 name=all rows=10>$all</textarea></td>
  </tr> 
    <tr>
    <td>Last Visit  : </td>
    <td><input type=text value='$op3' name='last'></td>
  </tr>
  
  <tr>
    <td>Date Joined :</td>
    <td> <input type=text name=qt_memstart value='$op1'></td>
  </tr><tr>
    <td>End Of Membership  : </td>
    <td><input type=text name=qt_memend value='$op2'></td>
  </tr><tr>
    <td>Edit Client  : </td>
    <td><input type=submit value='Edit Client'></td>
	<input type=hidden name=fedfed value='editmember.php?members=memberedit&id=$idd'>
  </tr>";
  
print "</form>";
print "</table>";

}

break;




default:
if(!$sort){
$sort = "lastname";
}
if(!$order){
$order = "ASC";
}

$sql = $stream->do_query("select * from members ORDER BY $sort $order","array");

print "<h3>Edit a Client</h3><hr><table bordercolor=\"#336699\" cellpadding=5 cellspacing=0 border=1>";
print "<tr>
<td bgcolor='#DDBB00' width=50>Club Id</td>
<td bgcolor='#DDBB00' width=110><a href='editmember.php?sort=firstname'>First Names</a></td>
<td bgcolor='#DDBB00' width=110><a href='editmember.php?sort=lastname'>Surname</td>
<td bgcolor='#DDBB00' width=110><a href='editmember.php?sort=address'>Address</td>
<td bgcolor='#DDBB00' width=110><a href='editmember.php?sort=mobile'>Mobile Number</td>
<td bgcolor='#DDBB00' width=110><a href='editmember.php?sort=email'>Email</td>
<td bgcolor='#DDBB00' width=100>View Profile</td></tr>";


for($h=0;$h<count($sql);$h++){
$tmp = $sql[$h];
$id = $tmp[0];
$fname = $tmp[1];
$sname = $tmp[2];
$add = substr($tmp[3],0,15);
$mob = $tmp[4];
$email = $tmp[5];
$pay = $tmp[6];
$op1 = $tmp[7];
$op2 = $tmp[8];
$op3 = $tmp[9];
$all = $tmp[10];
$fname = eregi_replace("[0-9]","",$fname);
$sname = eregi_replace("[0-9]","",$sname);
if($h%2>0){
$bgcolor= "EEEECC";
}
else {
$bgcolor= "DDDDAA";
}

print "<tr bgcolor='$bgcolor'>
<td width=50><a href='editmember.php?members=memberedit&id=$id'>$id &nbsp;</a></td>
<td width=80>$fname  &nbsp;</td><td width=80>$sname &nbsp;</td>
<td width=80>$add &nbsp;</td>
<td width=80>$mob &nbsp;</td>
<td width=80>$email &nbsp;</td>
<td><a href='editmember.php?members=memberedit&id=$id'>Show Profile</a> &nbsp;</td></tr>";
}

print "</table>";

break;


}

include("footer.php");



?>