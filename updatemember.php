<?php

include("connect.php"); 
include("header.php");
include("menu.php");
include("functions.php");


$date = date("D j/n/Y  g:i a"); 



$updatevisit = $stream->do_query("update members set other='$date' where id='$id'","one");
$all = $stream->do_query("select allvisits from members where id='$id'","one");
$visits = "$all\n$date";
$update = $stream->do_query("update members set allvisits ='$visits' where id='$id'","one");
$crap = substr_count($stream->do_query("select allvisits from members where id=$id","one"),"/") / 2;
$update = $stream->do_query("update members set average ='$crap' where id='$id'","one");
$frt = $stream->do_query("select firstname from members where id='$id'","one");
$lst = $stream->do_query("select lastname from members where id='$id'","one");

print "<h3>Updated Last Visits For <br><font color='red'> $frt $lst </font></h3><hr>";

?>
<script language=javascript>
setTimeout("document.location.href='editmember.php?members=memberedit&id=<?php print $id; ?>'",1000);
</script>

<?php


include("footer.php");



?>