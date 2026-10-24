<?php
// phpcs:ignoreFile
// jscpd:ignore-start
include("connect.php");
include("header.php");
include("functions.php");
include("menu.php");





/* @phpstan-ignore-line */ /** @psalm-suppress UndefinedGlobalVariable */ /** @psalm-suppress UndefinedGlobalVariable */ if($ind=="all"){

	/* @phpstan-ignore-line */ /** @psalm-suppress UndefinedClass */ /** @psalm-suppress UndefinedClass */ $sql = $stream->do_query("select * from members","array");

	for($h=0;$h<count($sql);$h++){

		$tmp = $sql[$h];
		$id = $tmp[0];
		$fname = $tmp[1];
		$sname = $tmp[2];
		/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $add = substr($tmp[3],0,15);
		/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $mob = $tmp[4];
		$email = $tmp[5];
		/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $pay = $tmp[6];
		/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $op1 = $tmp[7];
		/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $op2 = $tmp[8];
		/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $op3 = $tmp[9];
		/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $all = $tmp[10];
		/* @phpstan-ignore-line */ /** @psalm-suppress UndefinedFunction */ /** @psalm-suppress UndefinedFunction */ $fname = eregi_replace("[0-9]","",$fname);
		/* @phpstan-ignore-line */ /** @psalm-suppress UndefinedFunction */ /** @psalm-suppress UndefinedFunction */ $sname = eregi_replace("[0-9]","",$sname);
		$fed = $tmp[12];
		

		$to = "$email"; 
		$nameto = "$fname"; 
		/* @phpstan-ignore-line */ /** @psalm-suppress UndefinedGlobalVariable */ /** @psalm-suppress UndefinedGlobalVariable */ $from = "$fromz"; 
		/* @phpstan-ignore-line */ /** @psalm-suppress UndefinedGlobalVariable */ /** @psalm-suppress UndefinedGlobalVariable */ $namefrom = "$fromname"; 
		/* @phpstan-ignore-line */ /** @psalm-suppress PossiblyUndefinedGlobalVariable */ /** @psalm-suppress PossiblyUndefinedGlobalVariable */ $subject = "$subject"; 
		/* @phpstan-ignore-line */ /** @psalm-suppress UndefinedGlobalVariable */ /** @psalm-suppress UndefinedGlobalVariable */ $message = "$frommessage";
		
			
		/** @psalm-suppress RiskyTruthyFalsyComparison */ /** @psalm-suppress RiskyTruthyFalsyComparison */ if(!stristr($email,'@')){
			continue;
		}
		if($fed!="1"){
			if(authSendEmail($from, $namefrom, $to, $nameto, $subject, $message)){
				/* @phpstan-ignore-line */ /** @psalm-suppress UnusedVariable, UndefinedClass */ /** @psalm-suppress UnusedVariable, UndefinedClass */ $sas = $stream->do_query("update members set emailconfirmed='1' where id='$id'","one");
				print "Emailed $fname $sname<br>";
			}
		}
	}
	$fep = time();
	/* @phpstan-ignore-line */ /** @psalm-suppress UnusedVariable, UndefinedClass, UndefinedGlobalVariable */ /** @psalm-suppress UnusedVariable, UndefinedClass, UndefinedGlobalVariable */ $sql = $stream->do_query("insert into history values('',$fep,'Sent email to all clients, by user $fucking')","one");
}
/* @phpstan-ignore-line */ elseif($ind=="ind"){
		
	/* @phpstan-ignore-line */ /** @psalm-suppress UndefinedClass, UndefinedGlobalVariable */ /** @psalm-suppress UndefinedClass, UndefinedGlobalVariable */ $sql = $stream->do_query("select * from members where id='$person'","array");

	for($h=0;$h<count($sql);$h++){
	
		$tmp = $sql[$h];
		/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $id = $tmp[0];
		$fname = $tmp[1];
		$sname = $tmp[2];
		/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $add = substr($tmp[3],0,15);
		/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $mob = $tmp[4];
		$email = $tmp[5];
		/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $pay = $tmp[6];
		/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $op1 = $tmp[7];
		/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $op2 = $tmp[8];
		/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $op3 = $tmp[9];
		/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $all = $tmp[10];
		/* @phpstan-ignore-line */ /** @psalm-suppress UndefinedFunction */ /** @psalm-suppress UndefinedFunction */ $fname = eregi_replace("[0-9]","",$fname);
		/* @phpstan-ignore-line */ /** @psalm-suppress UndefinedFunction */ /** @psalm-suppress UndefinedFunction */ $sname = eregi_replace("[0-9]","",$sname);
			
		$to = "$email"; 
		$nameto = "$fname"; 
		/* @phpstan-ignore-line */ /** @psalm-suppress UndefinedGlobalVariable */ /** @psalm-suppress UndefinedGlobalVariable */ $from = "$fromz"; 
		/* @phpstan-ignore-line */ /** @psalm-suppress UndefinedGlobalVariable */ /** @psalm-suppress UndefinedGlobalVariable */ $namefrom = "$fromname"; 
		/* @phpstan-ignore-line */ /** @psalm-suppress PossiblyUndefinedGlobalVariable */ /** @psalm-suppress PossiblyUndefinedGlobalVariable */ $subject = "$subject"; 
		/* @phpstan-ignore-line */ /** @psalm-suppress UndefinedGlobalVariable */ /** @psalm-suppress UndefinedGlobalVariable */ $message = "$frommessage" ;

		if(authSendEmail($from, $namefrom, $to, $nameto, $subject, $message)){
		$fep = time();
/* @phpstan-ignore-line */ /** @psalm-suppress UndefinedClass, UndefinedGlobalVariable */ /** @psalm-suppress UndefinedClass, UndefinedGlobalVariable */ $sql = $stream->do_query("insert into history values('',$fep,'Sent email to Member \'$fname, $sname\'  by user $fucking')","one");


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

/* @phpstan-ignore-line */ /** @psalm-suppress UndefinedClass */ /** @psalm-suppress UndefinedClass */ $sql = $stream->do_query("select * from members order by lastname ASC","array");

for($h=0;$h<count($sql);$h++){

	$tmp = $sql[$h];
	$id = $tmp[0];
	$fname = $tmp[1];
	$sname = $tmp[2];
	/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $add = substr($tmp[3],0,15);
	/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $mob = $tmp[4];
	$email = $tmp[5];
	/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $pay = $tmp[6];
	/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $op1 = $tmp[7];
	/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $op2 = $tmp[8];
	/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $op3 = $tmp[9];
	/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $all = $tmp[10];
	/* @phpstan-ignore-line */ /** @psalm-suppress UndefinedFunction */ /** @psalm-suppress UndefinedFunction */ $fname = eregi_replace("[0-9]","",$fname);
	/* @phpstan-ignore-line */ /** @psalm-suppress UndefinedFunction */ /** @psalm-suppress UndefinedFunction */ $sname = eregi_replace("[0-9]","",$sname);

	/** @psalm-suppress RiskyTruthyFalsyComparison */ /** @psalm-suppress RiskyTruthyFalsyComparison */ if(!stristr($email,'@')){
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
<?php // jscpd:ignore-end ?>
