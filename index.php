<?php
require('cgi-bin/functions.php');
require('cgi-bin/vars.php');

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

echo "Please choose what you're updating.

<form action=\"instructions.php\" methond=\"get\">

<input type=\"radio\" name=\"action\" value=\"eagles\" checked>Eagle scouts
<br>
<!-- input type=\"radio\" name=\"action\" value=\"mbc\">Merit badge councellors -->";

genfoot(1,0);
?>