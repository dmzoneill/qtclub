<?php

include("connect.php"); 
include("header.php");
include("menu.php");
include("functions.php");

$month = date("m");  
$day = date("d");
$year = date("y");

$fff = mktime(0, 0, 0, $month, $day, $year);

$mint = "select * from history where dated>$fff order by dated DESC";
if($show){
$mint = "select * from history order by dated DESC";
}
$sql = $stream->do_query($mint,"array");

print "<h3>History</h3>Showing History for $day / $month / $year ---- <a href='history.php?show=all'>Show All</a><hr><h4>Color Legend</h4>";
print "<table  bordercolor=\"#336699\" cellpadding=5 cellspacing=0 border=1 width=800>";

print "<tr bgcolor='$bgcolor'>
<td bgcolor='#CCCC00' valign=top>Member List</td>
<td bgcolor='#BBBBBB' valign=top>Viewed Member</td>
<td bgcolor='#99CC66' valign=top>Search</td>
<td bgcolor='#999999' valign=top>Edited Client</td>
<td bgcolor='#DDDDDD' valign=top>Added Client</td>
<td bgcolor='#EEEEEE' valign=top>Database Backup</td>
<td bgcolor='#ffCCCC' valign=top>Everything Else</td>
</tr></table><br>";

print "<table  bordercolor=\"#336699\" cellpadding=5 cellspacing=0 border=1 width=800>";
print "<tr bgcolor='#DDBB00'><td valign=top>id</td><td valign=top>date</td><td valign=top>Operation</td></tr>";

$sql2 = $stream->do_query("select * from users","array");

for($h=0;$h<count($sql);$h++){

$tmp = $sql[$h];
$id = $tmp[0];
$date = date("F j, Y, g:i a",$tmp[1]); 
$opt = $tmp[2];


for($d=0;$d<count($sql2);$d++){
$tmpf = $sql2[$d];
$idf = $tmpf[0];
$userf = $tmpf[1];
$opt = eregi_replace($userf,"<b><a href='useradmin.php'>$userf</a></b>",$opt);
}

if(stristr($opt,"Member List")){
$bgcolor = "#CCCC00";
}
elseif(stristr($opt,"Viewed")){
$bgcolor = "#bbbbbb";
}
elseif(stristr($opt,"Search")){
$bgcolor = "#99CC66";
}
elseif(stristr($opt,"Edited")){
$bgcolor = "#999999";
}
elseif(stristr($opt,"Added")){
$bgcolor = "#DDDDDD";
}
elseif(stristr($opt,"database")){
$bgcolor = "#EEEEEE";
}
else {
$bgcolor = "#ffCCCC";
}

print "<tr bgcolor='$bgcolor'><td valign=top>$id</td><td valign=top><a href='calendar.php'>$date</a></td><td valign=top>$opt</td></tr>";

}

print "</table>";

include("footer.php");

?>