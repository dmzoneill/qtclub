<?php
include("connect.php");
include("header.php");
include("functions.php");
include("menu.php");





if($ind=="all"){

	$sql = $stream->do_query("select * from members","array");

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
		$fed = $tmp[12];
		

		$to = "$email"; 
		$nameto = "$fname"; 
		$from = "$fromz"; 
		$namefrom = "$fromname"; 
		$subject = "$subject"; 
		$message = "$frommessage";
		
			
		if(!stristr($email,'@')){
			continue;
		}
		if($fed!="1"){
			if(authSendEmail($from, $namefrom, $to, $nameto, $subject, $message)){
				$sas = $stream->do_query("update members set emailconfirmed='1' where id='$id'","one");
				print "Emailed $fname $sname<br>";
			}
		}
	}
	$fep = time();
	$sql = $stream->do_query("insert into history values('',$fep,'Sent email to all clients, by user $fucking')","one");
}
elseif($ind=="ind"){
		
	$sql = $stream->do_query("select * from members where id='$person'","array");

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
			
		$to = "$email"; 
		$nameto = "$fname"; 
		$from = "$fromz"; 
		$namefrom = "$fromname"; 
		$subject = "$subject"; 
		$message = "$frommessage" ;

		if(authSendEmail($from, $namefrom, $to, $nameto, $subject, $message)){
		$fep = time();
$sql = $stream->do_query("insert into history values('',$fep,'Sent email to Member \'$fname, $sname\'  by user $fucking')","one");


			print "Emailed $fname $sname<br>";
		}
	}
}
else {


?>
<h3>Send Email To All Clients</h3><hr>
<form action="emailclients.php?ind=all" method="post" name="sendit">
<table bordercolor='#000000' cellpadding=5 cellspacing=0 border=1>
<tr><td  bgcolor='#DDBB00' width=200>From (name) : </td><td><input name="fromname" type="text" value="Marcus"></td></tr>
<tr><td  bgcolor='#DDBB00' width=200>From (email addy) : </td><td><input name="fromz" type="text" value="mayocork2005@yahoo.ie"></td></tr>
<tr><td  bgcolor='#DDBB00' width=200>To : </td><td>All Clients with email addresses</td></tr>
<tr><td  bgcolor='#DDBB00' width=200>Subject : </td><td><input name="subject" type="text" value="Qt club Information"></td></tr>
<tr><td  bgcolor='#DDBB00' width=200>Message : </td><td><textarea name="frommessage" cols="40" rows="8"></textarea></td></tr>
<tr><td  bgcolor='#DDBB00' width=200></td><td><input type=hidden name=ind value=all></td></tr>
<tr><td  bgcolor='#DDBB00' width=200>Doit : </td><td><input name="sendit" type="submit" value="Send"><input name="" type="reset"></td></tr>
<tr><td colspan="2">Note: Sending to all clients can take up to 20 seconds per client</td></tr>
</table>
</form>


<h3>Send Email To Individual client </h3><hr>
<form action="emailclients.php?ind=ind" method="post" name="sendit">
<table bordercolor='#000000' cellpadding=5 cellspacing=0 border=1>
<tr><td  bgcolor='#DDBB00' width=200>From (name) : </td><td><input name="fromname" type="text" value="Marcus"></td></tr>
<tr><td  bgcolor='#DDBB00' width=200>From (email addy) : </td><td><input name="fromz" type="text" value="mayocork2005@yahoo.ie"></td></tr>
<tr><td  bgcolor='#DDBB00' width=200>To : </td><td>Select one of the Available Clients <br><select name=person>
<?php
print "<option value=''>Select One</option>";

$sql = $stream->do_query("select * from members order by lastname ASC","array");

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

	if(!stristr($email,'@')){
		continue;
	}

	print "<option value='$id'>$sname, $fname ($id)</option>";

}

?></select>
</td></tr>
<tr><td  bgcolor='#DDBB00' width=200>Subject : </td><td><input name="subject" type="text" value="Qt club Information"></td></tr>
<tr><td  bgcolor='#DDBB00' width=200>Message : </td><td><textarea name="frommessage" cols="40" rows="8"></textarea></td></tr>
<tr><td  bgcolor='#DDBB00' width=200></td><td><input type=hidden name=ind value=ind></td></tr>
<tr><td  bgcolor='#DDBB00' width=200>Doit : </td><td><input name="sendit" type="submit" value="Send"><input name="" type="reset"></td></tr>
</table>
</form>

<?php
}








include("footer.php");


?>