<?php
 require_once ("sms_api.php");
 $mysms = new sms();
 echo $mysms->session;
 echo $mysms->getbalance();
 $mysms->send ("353861938787", "netsector", "TEST MESSAGE");
 ?>