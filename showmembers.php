<?php

include("connect.php"); 
include("header.php");
include("menu.php");
include("functions.php");

if(!$sort){
$sort = "lastname";
}
if(!$order){
$order = "ASC";
}
$fep = time();
$sql = $stream->do_query("insert into history values('',$fep,'Member List requested  by user $fucking')","one");

$sql = $stream->do_query("select * from members ORDER BY $sort $order","array");
print "<a name=top></a>";
print "<h3>Showing All Clients</h3><hr><table  bordercolor=\"#336699\" cellpadding=5 cellspacing=0 border=1  width=100%>";

if($sort=="lastname"){
print "<tr><td colspan=7>";
print " <a href='#optA'>A</a> |";
print " <a href='#optB'>B</a> |";
print " <a href='#optC'>C</a> |";
print " <a href='#optD'>D</a> |";
print " <a href='#optE'>E</a> |";
print " <a href='#optF'>F</a> |";
print " <a href='#optG'>G</a> |";
print " <a href='#optH'>H</a> |";
print " <a href='#optI'>I</a> |";
print " <a href='#optJ'>J</a> |";
print " <a href='#optK'>K</a> |";
print " <a href='#optL'>L</a> |";
print " <a href='#optM'>M</a> |";
print " <a href='#optN'>N</a> |";
print " <a href='#optO'>O</a> |";
print " <a href='#optP'>P</a> |";
print " <a href='#optQ'>Q</a> |";
print " <a href='#optR'>R</a> |";
print " <a href='#optS'>S</a> |";
print " <a href='#optT'>T</a> |";
print " <a href='#optU'>U</a> |";
print " <a href='#optV'>V</a> |";
print " <a href='#optW'>W</a> |";
print " <a href='#optX'>X</a> |";
print " <a href='#optY'>Y</a> |";
print " <a href='#optZ'>Z</a>";
print "</td></tr>";
}


$g=0;
$r=0;

for($h=0;$h<count($sql);$h++){

$tmp = $sql[$h];
$id = $tmp[0];
$fname = $tmp[1];
$sname = $tmp[2];
$add = substr($tmp[3],0,12);
$mob = $tmp[4];
$email = $tmp[5];
$pay = $tmp[6];
$op1 = $tmp[7];
$op2 = $tmp[8];
$op3 = $tmp[9];
$all = $tmp[10];
$fname = eregi_replace("[0-9]","",$fname);
$sname = eregi_replace("[0-9]","",$sname);

$crap = substr_count($stream->do_query("select allvisits from members where id=$id","one"),"/") / 2;

$rrr = $stream->do_query("update members set average='$crap' where id = $id","one");

$sname = ucfirst(trim(strtolower($sname)));
$fname = ucfirst(trim(strtolower($fname)));

$fuck = $stream->do_query("update members set firstname='$fname', lastname='$sname' where id ='$id'","one");

if($sort=="lastname"){
$crap = substr($sname,0,1);
	if($shit==$crap){ 			
		$shit = substr($sname,0,1);
	}
	else {
		$shit = substr($sname,0,1);
		print "</td></tr></table><br>";
		print "<table  bordercolor=\"#336699\" cellpadding=5 cellspacing=0 border=1 width=100%>";
		print "<tr bgcolor='#DDDDDD'><td colspan=4><a name='opt$shit'><h3>$shit</h3></a></td><td colspan=3><a href='#top'><b>Go To Top</b></a></td></tr>";
		print "<tr>
			<td bgcolor='#DDBB00' width=50>Club Id</td>
			<td bgcolor='#DDBB00' width=100><a href='showmembers.php?sort=firstname'>First Names</a></td>
			<td bgcolor='#DDBB00' width=100><a href='showmembers.php?sort=lastname'>Surname</td>
			<td bgcolor='#DDBB00' width=120><a href='showmembers.php?sort=address'>Address</td>
			<td bgcolor='#DDBB00' width=100><a href='showmembers.php?sort=mobile'>Mobile Number</td>
			<td bgcolor='#DDBB00' width=100><a href='showmembers.php?sort=email'>Email</td>
			<td bgcolor='#DDBB00' width=150>View Profile</td></tr>";
		$r++;
	}
$g++;
}

if($r%2>0){
	if($h%2>0){
		$bgcolor= "EEEECC";
	}
	else {
		$bgcolor= "DDDDAA";
	}
}
else {
	if($h%2>0){
		$bgcolor= "CCCCCC";
	}
	else {
		$bgcolor= "AAAAAA";
	}
}
	
print "<tr bgcolor='$bgcolor'>
<td width=50>$id &nbsp;</td>
<td width=100>$fname &nbsp;</td>
<td width=100>$sname &nbsp;</td>
<td width=120>$add &nbsp;</td>
<td width=100>$mob &nbsp;$ccc</td>
<td width=100>$email &nbsp;</td>
<td width=150><a href='editmember.php?members=memberedit&id=$id'>Show Profile</a> &nbsp;</td></tr>";

}


print "</td></tr></table>";

include("footer.php");


?>