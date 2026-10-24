<?php
// phpcs:ignoreFile
// jscpd:ignore-start
include("connect.php");
include("header.php");
include("functions.php");
include("menu.php");
require_once ("sms_api.php");



/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $l=0;
/* @phpstan-ignore-line */ /** @psalm-suppress UndefinedGlobalVariable */ /** @psalm-suppress UndefinedGlobalVariable */ if($ind=="all"){

	/* @phpstan-ignore-line */ /** @psalm-suppress UndefinedClass */ /** @psalm-suppress UndefinedClass */ $sql = $stream->do_query("select * from members","array");

	for($h=0;$h<count($sql);$h++){

		$tmp = $sql[$h];
		/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $id = $tmp[0];
		$fname = $tmp[1];
		$sname = $tmp[2];
		/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $add = substr($tmp[3],0,15);
		$mob = $tmp[4];
		/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $email = $tmp[5];
		/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $pay = $tmp[6];
		/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $op1 = $tmp[7];
		/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $op2 = $tmp[8];
		/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $op3 = $tmp[9];
		/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $all = $tmp[10];
		/* @phpstan-ignore-line */ /** @psalm-suppress UndefinedFunction */ /** @psalm-suppress UndefinedFunction */ $fname = eregi_replace("[0-9]","",$fname);
		/* @phpstan-ignore-line */ /** @psalm-suppress UndefinedFunction */ /** @psalm-suppress UndefinedFunction */ $sname = eregi_replace("[0-9]","",$sname);


	if(substr(trim($mob),0,2)=="08"){
		$rest = substr(trim($mob),2,strlen($mob));
		$ccc = "3538$rest";
	}
	else {
		/* @phpstan-ignore-line */ /** @psalm-suppress UndefinedGlobalVariable */ /** @psalm-suppress UndefinedGlobalVariable */ $ccc = $mod;
	}

	/** @psalm-suppress RiskyTruthyFalsyComparison */ /** @psalm-suppress RiskyTruthyFalsyComparison */ if(!stristr($ccc,'3538')){
		continue;
	}

	
	  	 /* @phpstan-ignore-line */ $mysms = new sms();
 	/* @phpstan-ignore-line */ $fed = $mysms->getbalance();
 	echo "<b>You have " . $fed ." messages left in your account @ clickatell.</b><br>";
	/* @phpstan-ignore-line */ /** @psalm-suppress UnusedVariable, UndefinedClass */ /** @psalm-suppress UnusedVariable, UndefinedClass */ $update = $stream->do_query("update clickatell set msg='$fed' where id=1","one");
	$fep = time();
/* @phpstan-ignore-line */ /** @psalm-suppress UndefinedClass, UndefinedGlobalVariable */ /** @psalm-suppress UndefinedClass, UndefinedGlobalVariable */ $sql = $stream->do_query("insert into history values('',$fep,'Sent SMS to Member \'$fname, $sname\'  by user $fucking')","one");

 	/* @phpstan-ignore-line */ /** @psalm-suppress UndefinedGlobalVariable */ /** @psalm-suppress UndefinedGlobalVariable */ $mysms->send ("$ccc", "$fromname", "$frommessage");
	print "Sent to $ccc, $fname, $sname";
	
	}
}
/* @phpstan-ignore-line */ elseif($ind=="ind"){
		
	/* @phpstan-ignore-line */ /** @psalm-suppress UndefinedClass, UndefinedGlobalVariable */ /** @psalm-suppress UndefinedClass, UndefinedGlobalVariable */ $sql = $stream->do_query("select * from members where id='$person'","array");

	for($h=0;$h<count($sql);$h++){
	
		$tmp = $sql[$h];
		/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $id = $tmp[0];
		$fname = $tmp[1];
		$sname = $tmp[2];
		/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $add = substr($tmp[3],0,15);
		$mob = $tmp[4];
		/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $email = $tmp[5];
		/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $pay = $tmp[6];
		/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $op1 = $tmp[7];
		/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $op2 = $tmp[8];
		/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $op3 = $tmp[9];
		/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $all = $tmp[10];
		/* @phpstan-ignore-line */ /** @psalm-suppress UndefinedFunction */ /** @psalm-suppress UndefinedFunction */ $fname = eregi_replace("[0-9]","",$fname);
		/* @phpstan-ignore-line */ /** @psalm-suppress UndefinedFunction */ /** @psalm-suppress UndefinedFunction */ $sname = eregi_replace("[0-9]","",$sname);
			
			
	if(substr(trim($mob),0,2)=="08"){
		$rest = substr(trim($mob),2,strlen($mob));
		$ccc = "3538$rest";
	}
	else {
		/* @phpstan-ignore-line */ /** @psalm-suppress UndefinedGlobalVariable */ /** @psalm-suppress UndefinedGlobalVariable */ $ccc = $mod;
	}

	/** @psalm-suppress RiskyTruthyFalsyComparison */ /** @psalm-suppress RiskyTruthyFalsyComparison */ if(!stristr($ccc,'3538')){
		continue;
	}

	
	 /* @phpstan-ignore-line */ $mysms = new sms();
 	/* @phpstan-ignore-line */ $fed = $mysms->getbalance();
 	echo "<b>You have " . $fed ." messages left in your account @ clickatell.</b><br>";
	/* @phpstan-ignore-line */ /** @psalm-suppress UnusedVariable, UndefinedClass */ /** @psalm-suppress UnusedVariable, UndefinedClass */ $update = $stream->do_query("update clickatell set msg='$fed' where id=1","one");
	$fep = time();
	/* @phpstan-ignore-line */ /** @psalm-suppress UndefinedClass, UndefinedGlobalVariable */ /** @psalm-suppress UndefinedClass, UndefinedGlobalVariable */ $sql = $stream->do_query("insert into history values('',$fep,'Sent SMS to Member \'$fname, $sname\'  by user $fucking')","one");
 	/* @phpstan-ignore-line */ /** @psalm-suppress UndefinedGlobalVariable */ /** @psalm-suppress UndefinedGlobalVariable */ $mysms->send ("$ccc", "$fromname", "$frommessage");
	print "Sent to $ccc, $fname, $sname";

	}
}
else {
/* @phpstan-ignore-line */ /** @psalm-suppress UndefinedClass */ /** @psalm-suppress UndefinedClass */ $amount = $stream->do_query("select msg from clickatell where id=1","one");
echo "<b>You have " . $amount ." messages left in your account @ clickatell.</b><br>";
?>
<h3>Send SMS To All Clients</h3><hr>
<form action="sms.php?ind=all" method="post" name="sendit">
<table bordercolor='#000000' cellpadding=5 cellspacing=0 border=1>
<tr><td  bgcolor='#DDBB00' width=200>From (name) : </td><td><input name="fromname" type="text" value="QtClub"></td></tr>
<tr><td  bgcolor='#DDBB00' width=200>To : </td><td>All Clients with Mobile Phones</td></tr>
<tr><td  bgcolor='#DDBB00' width=200>Message : </td><td><textarea name="frommessage" cols="40" rows="8"></textarea></td></tr>
<tr><td  bgcolor='#DDBB00' width=200></td><td><input type=hidden name=ind value=all></td></tr>
<tr><td  bgcolor='#DDBB00' width=200>Doit : </td><td><input name="sendit" type="submit" value="Send"><input name="" type="reset"></td></tr>
</table>
</form>


<h3>Send SMS To Individual client </h3><hr>
<form action="sms.php?ind=ind" method="post" name="sendit">
<table bordercolor='#000000' cellpadding=5 cellspacing=0 border=1>
<tr><td  bgcolor='#DDBB00' width=200>From (name) : </td><td><input name="fromname" type="text" value="QtClub"></td></tr>
<tr><td  bgcolor='#DDBB00' width=200>To : </td><td>Select one of the Available Clients <br><select name=person>
<?php
print "<option value=''>Select One</option>";

/* @phpstan-ignore-line */ /** @psalm-suppress UndefinedClass */ /** @psalm-suppress UndefinedClass */ $sql = $stream->do_query("select * from members order by lastname ASC","array");
$b=0;
for($h=0;$h<count($sql);$h++){

	$tmp = $sql[$h];
	$id = $tmp[0];
	$fname = $tmp[1];
	$sname = $tmp[2];
	/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $add = substr($tmp[3],0,15);
	$mob = $tmp[4];
	/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $email = $tmp[5];
	/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $pay = $tmp[6];
	/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $op1 = $tmp[7];
	/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $op2 = $tmp[8];
	/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $op3 = $tmp[9];
	/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $all = $tmp[10];
	/* @phpstan-ignore-line */ /** @psalm-suppress UndefinedFunction */ /** @psalm-suppress UndefinedFunction */ $fname = eregi_replace("[0-9]","",$fname);
	/* @phpstan-ignore-line */ /** @psalm-suppress UndefinedFunction */ /** @psalm-suppress UndefinedFunction */ $sname = eregi_replace("[0-9]","",$sname);
	
	if(substr(trim($mob),0,2)=="08"){
		$rest = substr(trim($mob),2,strlen($mob));
		$ccc = "3538$rest";
		$b++;
	}
	else {
		/* @phpstan-ignore-line */ /** @psalm-suppress UndefinedGlobalVariable */ /** @psalm-suppress UndefinedGlobalVariable */ $ccc = $mod;
	}

	/** @psalm-suppress RiskyTruthyFalsyComparison */ /** @psalm-suppress RiskyTruthyFalsyComparison */ if(!stristr($ccc,'3538')){
		continue;
	}

	print "<option value='$id'>$sname, $fname ($id)</option>";

}

?></select><br><?php print "$b Mobile Phone contacts"; ?>
</td></tr>
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
