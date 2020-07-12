<?php
//  ------------------------------------------------------------------------ //
// Author:   Carlos Leopoldo Magaña Zavala                                   //
// Mail:     carloslmz@msn.com                                               //
// URL:      http://www.xoopsmx.com & http://www.miguanajuato.com            //
// Module:   ChatMX                                                          //
// Project:  The XOOPS Project (http://www.xoops.org/)                       //
// Based on  Develooping flash Chat version 1.5.2                            //
// ------------------------------------------------------------------------- //

require('header.php');
// Include the page header
include(XOOPS_ROOT_PATH.'/header.php');
require ('config.php');

print "<html>
<head>
<meta http-equiv=\"expires\" content=\"31 Dec 1990\"><title>"._MD_CHAT_ULMS."</title>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
<body bgcolor=\"#FFFFFF\" text=\"#000000\" leftmargin=\"0\" topmargin=\"0\" marginwidth=\"0\" marginheight=\"0\">
<table border=\"0\" width=\"288\" cellspacing=\"3\" cellpadding=\"3\">
<tr><td width=\"288\">
<font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\" color=\"#666666\">";

$chat_file_ok = "cache/msg.txt";//message file

$users_file = "cache/users.txt";//The file where you save users and passwords

$person = str_replace ("\n"," ", $person);
$person = str_replace ("<", " ", $person);
$person = str_replace (">", " ", $person);
$person = trim ($person);
$person = stripslashes ($person);

/*	check the user  */
/*	--------------- */
$text_string = join ('', file ($users_file));
$valid_user=  "false";
if (ereg("$person\n $password\n", $text_string)){
$valid_user = "true";
}
if ($valid_user == "false"){
echo "<center>".htmlentities($kicked_user)."</center>";
}else{			
/*	reads the last $chat_lenght lines of $chat_file_ok */
/*	-------------------------------------------------- */

$lines = file($chat_file_ok);
$a = count($lines);
$u = $a - $review_lenght;

/*	check the text order */
/*	-------------------- */

if ($review_text_order == "up"){
for($i = $a; $i >= $u ;$i--){
$is_private = 0;
$show_message = 1;
$line_value= strval($lines[$i]);
$string_to_add="";

/*	output to the chat private and general messages */
/*	----------------------------------------------- */

if (ereg($private_message_expression, $line_value, $name) and ereg("\(de (.*) a (.*)$", $line_value, $pass)){// is a private message
	$senderpassword=strval($pass[1]);
	$receiverpassword=strval($pass[2]);
	$receivername=strval($name[1]);
	$is_private = 1;
	$show_message = 0;
	}
	if ($is_private == 1){
	if (($receivername==$person) and ereg("(.)?$password(\n)?", $receiverpassword)){//is the receiver
	$line_value = ereg_replace( "\(de (.*) a (.*)$", "", $line_value);
	echo "<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#990000'><b>".htmlentities($line_value)."</b></font><br>";
	} elseif(ereg("\(..:..:..\) $person :", $line_value) and ereg("(.)?$password", $senderpassword)){//is the sender
	if (ereg("(.)?eztezamarchaoynoezta(\n)?", $receiverpassword)) {$string_to_add = $not_here_string;}
	$line_value = ereg_replace( "\(de (.*) a (.*)$", "<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#990000'>$string_to_add</font><br>", htmlentities($line_value));
	echo "<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'><b>".$line_value."</b></font>";
	}else{
	$u--;
	$show_message = 0;
	} 
	}         
if (($show_message == 1) and ($line_value)){
{echo htmlentities($line_value)."<br>";}// is a general message
	}}
}
else{
for($i = $u; $i <= $a ;$i++){
$is_private = 0;
$show_message = 1;
$line_value= strval($lines[$i]);
$string_to_add="";

/*	output to the chat private and general messages */
/*	----------------------------------------------- */

if (ereg($private_message_expression, $line_value, $name) and ereg("\(de (.*) a (.*)$", $line_value, $pass)){// is a private message
	$senderpassword=strval($pass[1]);
	$receiverpassword=strval($pass[2]);
	$receivername=strval($name[1]);
	$is_private = 1;
	$show_message = 0;
	}
	if ($is_private == 1){
	if (($receivername==$person) and ereg("(.)?$password(\n)?", $receiverpassword)){//is the receiver
	$line_value = ereg_replace( "\(de (.*) a (.*)$", "", $line_value);
	echo "<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#990000'><b>".htmlentities($line_value)."</b></font><br>";
	} elseif(ereg("\(..:..:..\) $person :", $line_value) and ereg("(.)?$password", $senderpassword)){//is the sender
	if (ereg("(.)?eztezamarchaoynoezta(\n)?", $receiverpassword)) {$string_to_add = $not_here_string;}
	$line_value = ereg_replace( "\(de (.*) a (.*)$", "<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#990000'>$string_to_add</font><br>", htmlentities($line_value));
	echo "<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'><b>".$line_value."</b></font>";
	}else{
	$u--;
	$show_message = 0;
	} 
	}         
if (($show_message == 1) and ($line_value)){
{echo htmlentities($line_value)."<br>";}// is a general message
	}}
}
}
print "</font></td></tr>
</table>
</body>
</html>";
?>