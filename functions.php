<?php
// phpcs:ignoreFile
// jscpd:ignore-start


/** @psalm-suppress MissingReturnType, MissingParamType */ /** @psalm-suppress MissingReturnType, MissingParamType */ function search($term,$what,$show,$sort,$order){

global $stream,$rdate,$fucking;

print "<h3>Search Results</h3><hr>";

if(($term==1) && ($what==1)){
$y=0;
$query = "select * from members where allvisits like '%$rdate%' ORDER BY '$sort' $order";
/** @psalm-suppress UndefinedClass */ /** @psalm-suppress UndefinedClass */ $sql = $stream->do_query($query,"array");
$fep = time();
/** @psalm-suppress UnusedVariable, UndefinedClass */ /** @psalm-suppress UnusedVariable, UndefinedClass */ $sql2 = $stream->do_query("insert into history values('',$fep,'Search for \'$rdate\'  by user $fucking')","one");


print "<table bordercolor=\"#336699\" cellpadding=5 cellspacing=0 border=1 width=800>";
print "<tr>
<td width=80>Club Id</td>
<td width=110>First Names</td>
<td width=110>Surnames</td>
<td width=110>Address</td>
<td width=110>Mobile Number</td>
<td width=110>Update Last Visit</td>
<td width=110>View Profile</td></tr>";

for($h=0;$h<count($sql);$h++){

$tmp = $sql[$h];
$id = $tmp[0];
$fname = $tmp[1];
$sname = $tmp[2];
$add = $tmp[3];
$mob = $tmp[4];
/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $email = $tmp[5];
/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $pay = $tmp[6];
/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $op1 = $tmp[7];
/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $op2 = $tmp[8];
/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $last = $tmp[9];
/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $all = $tmp[10];

if($h%2>0){
$bgcolor= "EEEECC";
}
else {
$bgcolor= "DDDDAA";
}
print "<tr bgcolor='$bgcolor'>
<td width=50>$id &nbsp;</td>
<td width=80>$fname &nbsp;</td>
<td width=80>$sname &nbsp;</td>
<td width=80>$add &nbsp;</td>
<td width=80>$mob &nbsp;</td>
<td width=80><a href='updatemember.php?id=$id'>Update</a> &nbsp;</td>
<td><a href='editmember.php?members=memberedit&id=$id'>Show Profile</a> &nbsp;</td></tr>";
$y++;
}

if($y==0){
/* @phpstan-ignore-line */ /** @psalm-suppress PossiblyUndefinedVariable */ /** @psalm-suppress PossiblyUndefinedVariable */ print "<tr bgcolor='$bgcolor'><td colspan=7>No Results Returned</td></tr>";
}
print "<table>";
}
else {


$query = "select * from members where $what like '%$term%' ORDER BY '$sort' $order";
/** @psalm-suppress UndefinedClass */ /** @psalm-suppress UndefinedClass */ $sql = $stream->do_query($query,"array");
$fep = time();
/** @psalm-suppress UnusedVariable, UndefinedClass */ /** @psalm-suppress UnusedVariable, UndefinedClass */ $sql2 = $stream->do_query("insert into history values('',$fep,'Search for \'$term\' in \'$what\'  by user $fucking')","one");
/** @psalm-suppress UnusedVariable, UndefinedClass */ /** @psalm-suppress UnusedVariable, UndefinedClass */ $sql3 = $stream->do_query("insert into search values('','$term')","one");

if($show==1){

$y=0;
print "<table bordercolor=\"#336699\" cellpadding=5 cellspacing=0 border=1 width=800>";
print "<tr>
<td width=80>Club Id</td>
<td width=110>First Names</td>
<td width=110>Surnames</td>
<td width=110>Address</td>
<td width=110>Mobile Number</td>
<td width=110>Update Last Visit</td>
<td width=110>View Profile</td></tr>";

for($h=0;$h<count($sql);$h++){

$tmp = $sql[$h];
$id = $tmp[0];
$fname = $tmp[1];
$sname = $tmp[2];
$add = $tmp[3];
$mob = $tmp[4];
/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $email = $tmp[5];
/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $pay = $tmp[6];
/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $op1 = $tmp[7];
/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $op2 = $tmp[8];
/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $last = $tmp[9];
/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $all = $tmp[10];
$y++;
if($h%2>0){
$bgcolor= "EEEECC";
}
else {
$bgcolor= "DDDDAA";
}
print "<tr bgcolor='$bgcolor'>
<td width=50>$id &nbsp;</td>
<td width=80>$fname &nbsp;</td>
<td width=80>$sname &nbsp;</td>
<td width=80>$add &nbsp;</td>
<td width=80>$mob &nbsp;</td>
<td width=80><a href='updatemember.php?id=$id'>Update</a> &nbsp;</td>
<td><a href='editmember.php?members=memberedit&id=$id'>Show Profile</a> &nbsp;</td></tr>";
}
if($y==0){
/* @phpstan-ignore-line */ /** @psalm-suppress PossiblyUndefinedVariable */ /** @psalm-suppress PossiblyUndefinedVariable */ print "<tr bgcolor='$bgcolor'><td colspan=7>No Results Returned</td></tr>";
}
print "<table>";

}
}
}













/** @psalm-suppress MissingReturnType */ /** @psalm-suppress MissingReturnType */ function stats(){

global $stream;

$rdate = date("j/n/Y");
/** @psalm-suppress InvalidOperand */ /** @psalm-suppress InvalidOperand */ $yesterday = date("j") -1; 

$mon = date("n");
$year = date("Y");
$yesterday = "$yesterday/$mon/$year";

$query = "select * from members where allvisits like '%$rdate%'";
/** @psalm-suppress UndefinedClass */ /** @psalm-suppress UndefinedClass */ $sql = $stream->do_query($query,"array");
$clients = count($sql);
print "No. Clients Visits Today : $clients  <br> ";

$query1 = "select * from members where allvisits like '%$yesterday%'";
/** @psalm-suppress UndefinedClass */ /** @psalm-suppress UndefinedClass */ $sql1 = $stream->do_query($query1,"array");
$clients1 = count($sql1);
print "No. Clients Visits Yesterday : $clients1";


}







/** @psalm-suppress MissingReturnType, MissingParamType */ /** @psalm-suppress MissingReturnType, MissingParamType */ function authSendEmail($from, $namefrom, $to, $nameto, $subject, $message) 
{ 
    //SMTP + SERVER DETAILS 
    /* * * * CONFIGURATION START * * * */ 
    $smtpServer = "www.feeditout.com"; 
    $port = "25"; 
    $timeout = "30"; 
    $username = "don"; 
    $password = "8454"; 
    $localhost = "localhost"; 
    $newLine = "\r\n"; 
    /* * * * CONFIGURATION END * * * * */ 
     
    //Connect to the host on the specified port 
    /* @phpstan-ignore-line */ /** @psalm-suppress InvalidScalarArgument */ /** @psalm-suppress InvalidScalarArgument */ $smtpConnect = fsockopen($smtpServer, $port, $errno, $errstr, $timeout); 
    /** @psalm-suppress PossiblyFalseArgument */ /** @psalm-suppress PossiblyFalseArgument */ $smtpResponse = fgets($smtpConnect, 515); 
    if(empty($smtpConnect))  
    { 
        $output = "Failed to connect: $smtpResponse"; 
        return $output; 
    } 
    else 
    { 
        /** @psalm-suppress PossiblyUndefinedVariable, UnusedVariable */ /** @psalm-suppress PossiblyUndefinedVariable, UnusedVariable */ $logArray['connection'] = "Connected: $smtpResponse"; 
    } 

    //Request Auth Login 
    fputs($smtpConnect,"AUTH LOGIN" . $newLine); 
    /** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $smtpResponse = fgets($smtpConnect, 515); 
    $logArray['authrequest'] = "$smtpResponse"; 
     
    //Send username 
    fputs($smtpConnect, base64_encode($username) . $newLine); 
    /** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $smtpResponse = fgets($smtpConnect, 515); 
    $logArray['authusername'] = "$smtpResponse"; 
     
    //Send password 
    fputs($smtpConnect, base64_encode($password) . $newLine); 
    /** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $smtpResponse = fgets($smtpConnect, 515); 
    $logArray['authpassword'] = "$smtpResponse"; 

    //Say Hello to SMTP 
    fputs($smtpConnect, "HELO $localhost" . $newLine); 
    /** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $smtpResponse = fgets($smtpConnect, 515); 
    $logArray['heloresponse'] = "$smtpResponse"; 
     
    //Email From 
    fputs($smtpConnect, "MAIL FROM: $from" . $newLine); 
    /** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $smtpResponse = fgets($smtpConnect, 515); 
    $logArray['mailfromresponse'] = "$smtpResponse"; 
         
    //Email To 
    fputs($smtpConnect, "RCPT TO: $to" . $newLine); 
    /** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $smtpResponse = fgets($smtpConnect, 515); 
    $logArray['mailtoresponse'] = "$smtpResponse"; 
     
    //The Email 
    fputs($smtpConnect, "DATA" . $newLine); 
    /** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $smtpResponse = fgets($smtpConnect, 515); 
    $logArray['data1response'] = "$smtpResponse"; 
     
    //Construct Headers 
    $headers  = "MIME-Version: 1.0" . $newLine; 
    $headers .= "Content-type: text/html; charset=iso-8859-1" . $newLine; 
    $headers .= "To: $nameto <$to>" . $newLine; 
    $headers .= "From: $namefrom <$from>" . $newLine; 
     
    fputs($smtpConnect, "To: $to\nFrom: $from\nSubject: $subject\n$headers\n\n$message\n.\n"); 
    /** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $smtpResponse = fgets($smtpConnect, 515); 
    $logArray['data2response'] = "$smtpResponse"; 
     
    // Say Bye to SMTP 
    fputs($smtpConnect,"QUIT" . $newLine);  
    /** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $smtpResponse = fgets($smtpConnect, 515); 
    $logArray['quitresponse'] = "$smtpResponse";  
	
	return 1;   
} 





?>
<?php // jscpd:ignore-end ?>
