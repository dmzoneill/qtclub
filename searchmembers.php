<?php

include("connect.php"); 
include("header.php");
include("menu.php");
include("functions.php");

?>
<script language=javascript>

function add(val){

document.fred.inputname.value = val;

}

</script>

<?php

switch($search){

case "results":

$rdate = "$day/$month/$year";
if(!$sort){
$sort = "lastname";
$order = "ASC";
}

search($inputname,$what,1,$sort,$order);

print "</td></tr></table>";

break;

default:


print "<h3>Search Client Database</h3><hr><table bordercolor=\"#336699\" width=\"800\" border=\"1\" cellspacing=\"0\" cellpadding=\"5\">";
print "<form name=fred action='searchmembers.php?search=results' method='post'>";
print "<tr><td  bgcolor='#DDBB00'>Search By :</td><td bgcolor='#cdcdcd'><select name='what'>
<option value='lastname'>Surname</option>
<option value='firstname'>First Name</option>
<option value='address'>Address</option>
<option value='mobile'>Mobile No.</option>
<option value='email'>Email.</option></select></td><td>";

print "Last 10 Searches";

print "</td></tr>";
print "<tr><td bgcolor='#DDBB00'>Sort by :</td><td><select name='sort'>
<option value='lastname'>Surname</option>
<option value='firstname'>First Name</option>
<option value='address'>Address</option>
<option value='mobile'>Mobile No.</option>
<option value='email'>Email.</option></select></td>";


print "<td width=250 rowspan=4>";

print "<table width=* cellpadding=1 border=0>";
print "<tr><td width=100><b>Edit</td><td><b>Quick Search</b></td></tr>";
		
$sql2 = $stream->do_query("select * from search order by id DESC","array");
	for($e=0;$e<count($sql2);$e++){
		$tmp = $sql2[$e];
		$id = $tmp[0];
		$term = $tmp[1];
		if ($e>10){
			break;
		}
		//search($inputname,$what,1,$sort,$order);
		print "<tr><td width=100><a href=\"javascript:add('$term');\">$term</a> </td><td> <a href=\"searchmembers.php?search=results&inputname=$term&what=lastname\">Do it....</a> </td></tr>";
		
	}

print "</table>";
print "</td>";

print "</tr>";
	print "<tr><td bgcolor='#DDBB00'>Sort order :</td><td><select name='order'>
<option value='ASC'>Ascending</option>
<option value='DESC'>Decending</option>
</select></td></tr>";
print "<tr><td bgcolor='#DDBB00'>Search For : </td><td bgcolor='#cdcdcd'><input type=text name=inputname></td>";
print "</tr>";
print "<tr><td bgcolor='#DDBB00'>Search  : </td><td><input type=submit value='Search for Client'></td></tr>";
print "</form>";
print "</table><br>";

print "<h3>Show Clients on Requested Date</h3><hr><table bordercolor=\"#336699\" width=\"800\" border=\"1\" cellspacing=\"0\" cellpadding=\"5\">";
print "<form action='searchmembers.php?search=results&inputname=1&what=1' method='post'>";

$tyear = date("Y");
$tday = date("j");    
$tmonth = date("n");     

print "<tr>
    <td  bgcolor='#DDBB00'>View By Date :</td>
    <td bgcolor='#cdcdcd'> 
	";
	
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
	
	print "</td></tr><tr><td bgcolor='#DDBB00'>Sort by :</td><td  bgcolor='#cdcdcd'><select name='sort'>
<option value='lastname'>Surname</option>
<option value='firstname'>First Name</option>
<option value='address'>Address</option>
<option value='mobile'>Mobile No.</option>
<option value='email'>Email.</option></select></td></tr>";
	print "<tr><td bgcolor='#DDBB00'>Sort order :</td><td><select name='order'>
<option value='ASC'>Ascending</option>
<option value='DESC'>Decending</option>
</select></td></tr>";
print "	
	</td>
  </tr>";
print "<tr><td bgcolor='#DDBB00'>Search  : </td><td><input type=submit value='Search for Clients'></td>";
print "</tr>";
print "</form>";
print "</table><br>";

break;

}

include("footer.php");

?>