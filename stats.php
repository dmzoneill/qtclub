<?php

include("connect.php"); 
include("header.php");
include("menu.php");
include("functions.php");


$sql = count($stream->do_query("select * from members order by allvisits DESC","array"));

print "<h4>Total of $sql clients</h4>";

?>

<table cellpadding="0" cellspacing="0" border="0">
  <tr>
 
	<td align=left><?php

stats();

?><br><br></td>

	</tr>
	</table>

<?php

print "<hr>
<table width=100% bordercolor=\"#336699\" cellpadding=5 cellspacing=0 border=1>";
print "<tr><td colspan=6>Top 50 members</td></tr>";

print "<tr><td bgcolor='#DDBB00' width=50><b>Id</b></td>
<td bgcolor='#DDBB00' width=100><b>First Name</b></td>
<td bgcolor='#DDBB00' width=100><b>Last Name</b></td>
<td bgcolor='#DDBB00' width=100><b>Mobile No.</b></td>
<td bgcolor='#DDBB00' width=100><b>Email</b></td>
<td bgcolor='#DDBB00' width=100><b>No. Of Visits</b></td></tr>";

$sql = $stream->do_query("select * from members order by average desc","array");

for($h=0;$h<count($sql);$h++){
if($h>49){
break;
}
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
$crap = $tmp[11];

$fname = eregi_replace("[0-9]","",$fname);
$sname = eregi_replace("[0-9]","",$sname);

print "<tr><td width=50><a href='editmember.php?members=memberedit&id=$id'>$id</a></td>
<td width=100>$fname &nbsp;</td>
<td width=100>$sname &nbsp;</td>
<td width=100>$mob &nbsp;</td>
<td width=100>$email &nbsp;</td>
<td width=100 bgcolor='#DDBB00'>$crap</td></tr>";


}


print "<table></td></tr></table>";

include("footer.php");


?>