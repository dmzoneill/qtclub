<?php

if(($qt_user) && ($qt_pass)){
	$pass_db = $stream->do_query("select password from users where username='$qt_user'","one");
	$qt_pass = md5($qt_pass);
	if($pass_db == $qt_pass){		
		$login = "yes";
		$vvvcheckuser = "$qt_user";
		$value = "$qt_user|$qt_pass";
		setcookie("qtclub", $value, time()+3600, "/", "");
		$fep = time();
		$sql = $stream->do_query("insert into history values('',$fep,'Logged in as $qt_user')","one");
	}
	else {
		$fep = time();
		$sql = $stream->do_query("insert into history values('',$fep,'Failed Login Attempt')","one");
		$msgg = "Wrong Password";
		$login = "fed";
	}
}
else {
	if($_COOKIE["qtclub"]){
		$value = explode("|",$HTTP_COOKIE_VARS["qtclub"]);
		$pass_db = $stream->do_query("select password from users where username='$value[0]'","one");
		if($pass_db == $value[1]){		
			$login = "yes";
			$vvvcheckuser = "$value[0]";
			$value = "$value[0]|$value[1]";			
			setcookie("qtclub", $value, time()+3600, "/", "");
		}
		else {
			$fep = time();
			$sql = $stream->do_query("insert into history values('',$fep,'Invalid Cookie Information or invalid login attempt')","one");
				$msgg = "Wrong Password";
			$login = "fed";
		}
	}	
	else {
		$login = "fed";
	}
}

if($vvvcheckuser){
$fucking = $vvvcheckuser;
}

if($login == "fed"){

?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Qt Club Client Database</title>
<style TYPE="text/css">
<!--
BODY { background: #000040; }
.para1 { margin-top: -42px; margin-left: 145px; margin-right: 10px; font-family: "font2, Arial"; font-size: 30px; line-height: 35px; text-align: left; color: #E1E1E1; }
.para2 { margin-top: 15px; margin-left: 15px; margin-right: 50px; font-family: "font1, Arial Black"; font-size: 50px; line-height: 40px; text-align: left; color: #004080; }
-->
</style>
</head>

<body TOPMARGIN=0 LEFTMARGIN=0 MARGINHEIGHT=0 MARGINWIDTH=0 bgcolor='#AAAAAA' onLoad="show_clock()">
<basefont  face="verdana" color="#333333" size="3">

<div CLASS="para2" align="center"><p>Client Database</p></div>
<div CLASS="para1" align="center"><p><font color=red>Qt</font> Club</p></div>

  <table bgcolor='#3333FF' cellpadding="0" cellspacing="0" border="0" width="100%" height="2">
  <tr>
    <td width=27></td>
	<td width=*></td>
	<td width=76></td>
	</tr>
	</table>&nbsp;&nbsp;<script language="javascript" src="liveclock.js"></script><font color=white>, you are logged in as </font><b><font color=ff0000><?php print "$fucking"; ?></font></b>
</font>	<table bgcolor='#3333FF' cellpadding="0" cellspacing="0" border="0" width="100%" height="2">
  <tr>
    <td width=27></td>
	<td width=*></td>
	<td width=76></td>
	</tr>
	</table><br>
	<center>
	
	<table width="95%" bordercolor='3333FF' border="1" cellspacing="0" cellpadding="1">
  <tr bgcolor='#336699'><td bgcolor='#336699'>
	
	<?php include("menu.php"); ?>
	<h3>Login</h3>
	<form action="index.php" method="post" name="login">
	Username : <br>
	<input name="qt_user" type="text" value="Marcus"><br><br>
	Password : <br>
	<input name="qt_pass" type="password"><br><br>
	<input name="doit" type="submit" value="Login">
	</form><br><br><h3><font color=red><?php print $msgg; ?></font></h3><br><br>


<?php include("footer.php");
}

else { ?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Qt Club Client Database</title>
<style TYPE="text/css">
<!--
BODY { background: #000040; }
.para1 { margin-top: -42px; margin-left: 145px; margin-right: 10px; font-family: "font2, Arial"; font-size: 30px; line-height: 35px; text-align: left; color: #E1E1E1; }
.para2 { margin-top: 15px; margin-left: 15px; margin-right: 50px; font-family: "font1, Arial Black"; font-size: 50px; line-height: 40px; text-align: left; color: #004080; }
-->
</style>
<script type="text/javascript">

/***********************************************
* Switch Content script- © Dynamic Drive (www.dynamicdrive.com)
* This notice must stay intact for legal use. Last updated April 2nd, 2005.
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

var enablepersist="on" //Enable saving state of content structure using session cookies? (on/off)
var collapseprevious="no" //Collapse previously open content when opening present? (yes/no)

var contractsymbol='- ' //HTML for contract symbol. For image, use: <img src="whatever.gif">
var expandsymbol='+ ' //HTML for expand symbol.


if (document.getElementById){
document.write('<style type="text/css">')
document.write('.switchcontent{display:none;}')
document.write('</style>')
}

function getElementbyClass(rootobj, classname){
var temparray=new Array()
var inc=0
var rootlength=rootobj.length
for (i=0; i<rootlength; i++){
if (rootobj[i].className==classname)
temparray[inc++]=rootobj[i]
}
return temparray
}

function sweeptoggle(ec){
var thestate=(ec=="expand")? "block" : "none"
var inc=0
while (ccollect[inc]){
ccollect[inc].style.display=thestate
inc++
}
revivestatus()
}


function contractcontent(omit){
var inc=0
while (ccollect[inc]){
if (ccollect[inc].id!=omit)
ccollect[inc].style.display="none"
inc++
}
}

function expandcontent(curobj, cid){
var spantags=curobj.getElementsByTagName("SPAN")
var showstateobj=getElementbyClass(spantags, "showstate")
if (ccollect.length>0){
if (collapseprevious=="yes")
contractcontent(cid)
document.getElementById(cid).style.display=(document.getElementById(cid).style.display!="block")? "block" : "none"
if (showstateobj.length>0){ //if "showstate" span exists in header
if (collapseprevious=="no")
showstateobj[0].innerHTML=(document.getElementById(cid).style.display=="block")? contractsymbol : expandsymbol
else
revivestatus()
}
}
}

function revivecontent(){
contractcontent("omitnothing")
selectedItem=getselectedItem()
selectedComponents=selectedItem.split("|")
for (i=0; i<selectedComponents.length-1; i++)
document.getElementById(selectedComponents[i]).style.display="block"
}

function revivestatus(){
var inc=0
while (statecollect[inc]){
if (ccollect[inc].style.display=="block")
statecollect[inc].innerHTML=contractsymbol
else
statecollect[inc].innerHTML=expandsymbol
inc++
}
}

function get_cookie(Name) { 
var search = Name + "="
var returnvalue = "";
if (document.cookie.length > 0) {
offset = document.cookie.indexOf(search)
if (offset != -1) { 
offset += search.length
end = document.cookie.indexOf(";", offset);
if (end == -1) end = document.cookie.length;
returnvalue=unescape(document.cookie.substring(offset, end))
}
}
return returnvalue;
}

function getselectedItem(){
if (get_cookie(window.location.pathname) != ""){
selectedItem=get_cookie(window.location.pathname)
return selectedItem
}
else
return ""
}

function saveswitchstate(){
var inc=0, selectedItem=""
while (ccollect[inc]){
if (ccollect[inc].style.display=="block")
selectedItem+=ccollect[inc].id+"|"
inc++
}

document.cookie=window.location.pathname+"="+selectedItem
}

function do_onload(){
uniqueidn=window.location.pathname+"firsttimeload"
var alltags=document.all? document.all : document.getElementsByTagName("*")
ccollect=getElementbyClass(alltags, "switchcontent")
statecollect=getElementbyClass(alltags, "showstate")
if (enablepersist=="on" && ccollect.length>0){
document.cookie=(get_cookie(uniqueidn)=="")? uniqueidn+"=1" : uniqueidn+"=0" 
firsttimeload=(get_cookie(uniqueidn)==1)? 1 : 0 //check if this is 1st page load
if (!firsttimeload)
revivecontent()
}
if (ccollect.length>0 && statecollect.length>0)
revivestatus()
}

if (window.addEventListener)
window.addEventListener("load", do_onload, false)
else if (window.attachEvent)
window.attachEvent("onload", do_onload)
else if (document.getElementById)
window.onload=do_onload

if (enablepersist=="on" && document.getElementById)
window.onunload=saveswitchstate

</script>
</head>

<body TOPMARGIN=0 LEFTMARGIN=0 MARGINHEIGHT=0 MARGINWIDTH=0 bgcolor='#AAAAAA' onLoad="show_clock()">
<basefont  face="verdana" color="#333333" size="2">

<div CLASS="para2" align="center"><p>Client Database</p></div>
<div CLASS="para1" align="center"><p><font color=red>Qt</font> Club</p></div>

  <table bgcolor='#3333FF' cellpadding="0" cellspacing="0" border="0" width="100%" height="2">
  <tr>
    <td width=27></td>
	<td width=*></td>
	<td width=76></td>
	</tr>
	</table>&nbsp;&nbsp;<script language="javascript" src="liveclock.js"></script><font color=white>, you are logged in as </font><b><font color=ff0000><?php print "$fucking"; ?></font></b>
</font>	<table bgcolor='#3333FF' cellpadding="0" cellspacing="0" border="0" width="100%" height="2">
  <tr>
    <td width=27></td>
	<td width=*></td>
	<td width=76></td>
	</tr>
	</table><br>
	<center>
	
<table width="95%" bordercolor='3333FF' border="1" cellspacing="0" cellpadding="1">
  <tr bgcolor='#336699'><td bgcolor='#336699'>
	<?php
	
	}
	
	?>
	


