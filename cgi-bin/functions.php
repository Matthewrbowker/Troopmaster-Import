<?php
function scripts() {
echo "\r<link rel=\"stylesheet\" href=\"cgi-bin/master.css\">
<script src=\"cgi-bin/scripts.js\"></script>
<meta http-equiv=\"Content-type\" content=\"text/html;charset=UTF-8\">\r";
}

function genhead() {
require('vars.php');
echo "<table width=\"100%\" border=\"1\">
<tr>
<td>
<center>
$sitename
</center>
</td>
</tr>
</table>";
}

function genfoot($start,$end) {
require('vars.php');
echo "<br /><br /><div align=\"right\">";

if ($start != 1) {
echo "<input type=\"button\" value=\"&lt; Start over\" onclick=\"startover()\" />";
}

if ($end != 1) {
echo "<input type=\"submit\" value=\"Next &gt;\" />";
}

echo "</div></form>

<hr width=\"75%\">
$sitename v.$version
</BODY>
</HTML>";
}

?>