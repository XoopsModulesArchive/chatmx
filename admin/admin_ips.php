<?php
//  ------------------------------------------------------------------------ //
// Author:   Carlos Leopoldo Magaña Zavala                                   //
// Mail:     carloslmz@msn.com                                               //
// URL:      http://www.xoopsmx.com & http://www.miguanajuato.com            //
// Module:   ChatMX                                                          //
// Project:  The XOOPS Project (http://www.xoops.org/)                       //
// Based on  Develooping flash Chat version 1.5.2                            //
// ------------------------------------------------------------------------- //
include("admin_header.php");
require ('admin_config.php');

$banned_file = "../cache/banned_ip.txt";

if (($name==$admin_name) and ($password==$admin_password)){


$lines = file($banned_file);
$a = count($lines);

if ($a==0){
echo "<table width=\"400\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">";
echo "<tr><td>";
echo "<center>";
echo "<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'>";
echo htmlentities($no_ips);
echo "</font>";
echo "</center>";
echo "</td></tr></table>";
}
else{
$presence=0;
for($i = $a; $i >= 0 ;$i--){
$each_ip = strval($lines[$i]);//each ip in the file
$each_ip = str_replace ("\n","", $each_ip);
$each_ip = trim ($each_ip);
if ($each_ip!=""){
$presence=1;
echo "<table width=\"400\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">";
echo "<tr>";
echo "<td width=\"100\">";
echo "<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'>";
echo $each_ip."&nbsp;";
echo "</font></td><td width=\"100\">";
echo "<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'>";
echo "&nbsp;";
echo "</font></td><td width=\"200\">";
echo "<form name=\"$each_user\" method=\"post\" action=\"admin_pardon_ip.php\">";
echo "<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'>";
echo "<input type=\"hidden\" name=\"name\" value=\"$name\">";
echo "<input type=\"hidden\" name=\"password\" value=\"$password\">";
echo "<input type=\"hidden\" name=\"ip\" value=\"$each_ip\">";
echo "<input type=\"submit\" name=\"Submit\" value=\"".htmlentities($text_for_pardon_button)."\">";
echo "</font></form></td></tr></table><hr>"."\n";
}
 }
 if ($presence==0){
echo "<table width=\"400\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">";
echo "<tr><td>";
echo "<center>";
echo "<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'>";
echo htmlentities($no_ips);
echo "</font>";
echo "</center>";
echo "</td></tr></table>";
}
}
echo "<hr>";
echo "<table width=\"400\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">";
echo "<tr>";
echo "<td width=\"400\">";
echo "<center>";
echo "<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'>";
echo "<a href=\"admin_users.php\">".htmlentities($users_link)."</a>";
echo "</font>";
echo "</center>";
echo "</td></tr></table>";
}
else{
echo "<script>";
echo "location.replace('index.php')";
echo "</script>";
}

include("admin_footer.php");
?>