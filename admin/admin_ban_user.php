<?php
//  ------------------------------------------------------------------------ //
// Author:   Carlos Leopoldo Maga�a Zavala                                   //
// Mail:     carloslmz@msn.com                                               //
// URL:      http://www.xoopsmx.com & http://www.miguanajuato.com            //
// Module:   ChatMX                                                          //
// Project:  The XOOPS Project (http://www.xoops.org/)                       //
// Based on  Develooping flash Chat version 1.5.2                            //
// ------------------------------------------------------------------------- //
include("admin_header.php");
require ('admin_config.php');
$users_file = "../cache/users.txt";
$banned_file = "../cache/banned_ip.txt";

if (($name==$admin_name) and ($password==$admin_password)){

$lines = file($users_file);
$a = count($lines);

//inhabilitation for ip
//---------------------

$text_string = join ('', file ($users_file));
$new_list= ereg_replace ("$username\n $user_password", "$username\n banned", $text_string);
$fpbu = fopen($users_file, "w");
$fwbu = fwrite($fpbu, $new_list);
fclose($fpbu);

//add ip to banned_ip.txt
//-----------------------

$fpbu1 = fopen($banned_file, "a");
$user_password= trim ($user_password);
$fwbu1 = fwrite($fpbu1, "$user_password\n");
fclose($fpbu1);



echo "<script>";
echo "location.replace('admin_users.php')";
echo "</script>";

}

?>