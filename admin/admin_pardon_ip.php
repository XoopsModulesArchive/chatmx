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

//delete de banned ip
//-------------------

$text_string = join ('', file ($banned_file));
$new_list= str_replace ("$ip", "", $text_string);
$fpip = fopen($banned_file, "w");
$fwip = fwrite($fpip, $new_list);
fclose($fpip);

echo "<script>";
echo "location.replace('admin_ips.php')";
echo "</script>";

}

?>