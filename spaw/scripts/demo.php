<?php 

if (!ereg('/$', $HTTP_SERVER_VARS['DOCUMENT_ROOT']))
  $_root = $HTTP_SERVER_VARS['DOCUMENT_ROOT'].'/';
else
  $_root = $HTTP_SERVER_VARS['DOCUMENT_ROOT'];

define('DR', $_root);
unset($_root);

$spaw_root = DR.'spaw/';

include $spaw_root.'spaw_control.class.php';

// here we add some styles to styles dropdown
$spaw_dropdown_data['style']['default'] = 'No styles';
$spaw_dropdown_data['style']['style1'] = 'Style no. 1';
$spaw_dropdown_data['style']['style2'] = 'Style no. 2';

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
	<title>Solmetra SPAW Editor usage demonstration page</title>
</head>
<body>
<style type="text/css">
  pre {
    background : #cccccc; 
    padding : 5 5 5 5;
  }
</style>

<?php 
$sw = new SPAW_Wysiwyg('spaw3' /*name*/,isset($HTTP_POST_VARS['spaw3'])?stripslashes($HTTP_POST_VARS['spaw3']):'' /*value*/,
                       'en' /*language*/, 'full' /*toolbar mode*/, 'classic' /*theme*/,
                       '550px' /*width*/, '150px' /*height*/);
$sw->show();
?>

</body>
</html>
