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
$users_file = "../cache/users.txt";

if (($name==$admin_name) and ($password==$admin_password)){

$lines = file($users_file);
$a = count($lines);

//kick the user
//-------------

$text_string = join ('', file ($users_file));
$new_list= ereg_replace ("$username\n $user_password", "$username\n kicked", $text_string);
$fpku = fopen($users_file, "w");
$fwku = fwrite($fpku, $new_list);
fclose($fpku);


echo "<script>";
echo "location.replace('admin_users.php')";
echo "</script>";

}

?>