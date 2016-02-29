<?php
require('cgi-bin/vars.php');
require('cgi-bin/functions.php');

$count = 0;

if (!move_uploaded_file($_FILES['file']['tmp_name'],'temporary.t71')) echo "Error moving your file!";

$file = fopen('temporary.t71', r);

$html = fopen('testing.html',w);

if (!$file || !$html) echo "error opening file";

$string = "<html>
<head>
<title>content</title>
<link rel=\"stylesheet\" href=\"../177/scripts/master.css\"><link rel=\"stylesheet\" media=\"all\" href=\"../177/scripts/icwebsiteelement.css\">
<script language=\"JavaScript\" src=\"../scripts/ic_globals_published.js\"></script><script language=\"JavaScript\" src=\"../scripts/user.js\"></script><script language=\"JavaScript\" src=\"../scripts/photoalbum.js\"></script>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
</head>
<body  bgcolor=\"#000000\" text=\"#000000\" leftmargin=\"0\" topmargin=\"0\" marginwidth=\"0\" marginheight=\"0\">
<table width=499 border=0 cellpadding=0 cellspacing=0>
  <tr>
    <td width=\"620\">
      <table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" background=\"../177/images/wildlife_sd_3_08.jpg\">
      </table>
      <img src=\"../177/images/pagetop.jpg\" width=\"518\" height=\"15\"></td>
    <td rowspan=13 width=\"23\">&nbsp; </td>
  </tr>
  <tr>
    <td rowspan=12 width=\"620\" bgcolor=\"#FFFFF4\">
      <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
        <tr>
          <td><!-- Start console section --><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\">
<tr>
<td>
<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"1\" background=\"../177//images/cn_back02.jpg\">
<tr>
<td>
<table width=\"100%\" border frame=void cellspacing=\"0\" cellpadding=\"1\" background=\"../177//images/cn_back.jpg\" bordercolor=\"#FFFFFF\">
<tr><td background=\"../177//images/spacer.gif\" align=\"center\" valign=\"middle\" width=\"18%\">
<p><a href=\"/eagles/howto.html\" target=\"_parent\" class=\"cndark\">How-to</a></td><td background=\"../177//images/spacer.gif\" align=\"center\" valign=\"middle\" width=\"18%\">
<p><a href=\"/eagles/oureagles.html\" target=\"_parent\" class=\"cndark\">Our Eagles!</a></td><td background=\"../177//images/spacer.gif\" align=\"center\" valign=\"middle\" width=\"18%\">
<p><a href=\"/eagles/eagleprojects.html\" target=\"_parent\" class=\"cndark\">Eagle Projects</a></td><td background=\"../177//images/spacer.gif\" align=\"center\" valign=\"middle\" width=\"18%\">&nbsp;</td><td background=\"../177//images/spacer.gif\" align=\"center\" valign=\"middle\" width=\"18%\">&nbsp;</td></tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
</table>
<!-- End console section --><!-- Start content section --><P>
<table border=\"1\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">
<tr>
<td>

<center>
<table border=\"0\" width=\"90%\" cellpadding=\"0\" cellspacing=\"0\" style=\"padding-top: 10px; \">
<tr>
<td width = \"30%\">
<center>
<b>
Date
</b>
</center>
</td>
<td widht=\"70%\">
<center>
<b>
Name
</b>
</center>
</td>
</tr>";

echo $date;

while (($buffer = fgets($file)) != false) {
	$buffer = trim($buffer);
	if ($buffer == "" || $buffer == " " || $buffer == 'Troop 71 Eagle Honor Roll' || $buffer == 'Eagle Date Name' || preg_match("(\d\d Eagles since original charter)", $buffer) || preg_match("(Page \d)",$buffer)) continue;
	$data = explode('  ', $buffer);
	$data[0] = explode('/',$data[0]);
	$data[2] = trim($data[2]);
	$data[2] = explode(' ',$data[2]);
	if ($data[0][2] > 85) $year = "19". $data[0][2];
	else $year = "20" . $data[0][2];
	$name = $data[2][0] . " " . substr($data[1], 0, 1);
	$string.="<tr>
	<td>
	$year</td>
	<td>
	$name
	</td>
	</tr>";
	$count ++;
}

$string.="
<tr>
<td colspan=\"2\" style=\"padding-bottom: 5px; padding-top: 5px;\">
<center>
<i>$count eagles since Troop 71's founding</i>
</center>
</td>
</tr>
<tr>
<td colspan=\"2\">
<center>
<a HREF=\"mailto:webmaster@scouttroop71.com\" TARGET=\"null\" MCE_REAL_HREF=\"mailto:webmaster@scouttroop71.com\" >Email our webmaster</a> to request corrections please.
</center>
</td>
</tr>
</table>
</center>
</body>
<!-- End content section --></td>
</tr>
</table>
<!-- Template Design by Network Solutions, LLC  --></body>
</html>";

fwrite($html,$string);

fclose($file);

unlink('temporary.t71');

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

echo "File updated successfully!";

genfoot(0,1);

?>