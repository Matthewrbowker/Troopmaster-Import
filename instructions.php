<?php
require('cgi-bin/functions.php');
require('cgi-bin/vars.php');
require('cgi-bin/instructions.inc.php');

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

if ($action == 'eagles') {
	eagles();
}
else if ($action == 'mbc') {
	mbc();
}
else {
exit("Your action was not recognized.  <br>
<br>
<a href=\"index.php\">Try again</a>
</BODY>
</HTML>");
}

echo "<form action=\"pick_file.php\" method=\"get\">
<input type=\"hidden\" name=\"action\" value=\"$action\" />";

genfoot(0,0);

?>