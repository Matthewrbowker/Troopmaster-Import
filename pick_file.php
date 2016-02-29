<?php
require('cgi-bin/functions.php');
require('cgi-bin/vars.php');

$action=$_GET['action'];

echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">
<HTML>
<HEAD>
<TITLE>
$sitename
</TITLE>";
scripts();
echo "</HEAD>
<BODY>";

genhead();

echo "Please choose your file below:
<br>
<br>
<form method=\"post\" action=\"result.php\" enctype=\"multipart/form-data\">
<input type=\"hidden\" name=\"action\" value=\"$action\">
<input type=\"file\" name=\"file\">
<br>
";
genfoot(0,0);

?>