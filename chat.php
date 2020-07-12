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

header("Expires: ".gmdate("D, d M Y H:i:s")."GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
?>

<?php 
/*	develooping flash chat   		                    */
/*	Based in a free flash engine from 	                */
/*	http://www.neo-ego.com	<joost@extrapink.com>       */
/*	Original script by Nicola Delbono <key5@key5.com>	*/
/*	Added time, users management, private messages,     */
/*	ip banning, bad words filter, kicking               */
/*  and more improvements by                            */
/*	juancarlos@develooping.com	                        */
/*	version 1.5.2                                       */
?>

<?php 
error_reporting(7);
require ('config.php');

$chat_file_ok = "cache/msg.txt";//message file

$users_file = "cache/users.txt";//The file where you save users and passwords

if($show_without_time == "no"){//show time?
$substart=0;
}else{
$substart=19;
}

/*	check banning   */
/*	--------------- */

$banned_file = "cache/banned_ip.txt";//the file with banned ips
$text_string = join ('', file ($banned_file));
if (ereg("(.)*$password\n",$text_string)){//this user was banned
$text_string = join ('', file ($users_file));
$new_list= str_replace ("$password", " banned", $text_string);
$fcusers = fopen($users_file, "w");
$fwcusers = fwrite($fcusers, $new_list);
fclose($fcusers);
}

$person = str_replace ("\n"," ", $person);
$person = str_replace ("<", " ", $person);
$person = str_replace (">", " ", $person);
$person = trim ($person);
$person = stripslashes ($person);
?>
&output=
<?php 
/*	check the user  */
/*	--------------- */
$text_string = join ('', file ($users_file));
$valid_user=  "valid";
if ((ereg("$person\n kicked\n", $text_string)) or (ereg("$person\n banned\n", $text_string))){
$valid_user = "kicked";
}
if ($valid_user == "kicked"){
if (ereg("$person\n kicked\n", $text_string)){echo urlencode($kicked_user)."\n";}
if (ereg("$person\n banned\n", $text_string)){echo urlencode($banned_user)."\n";}
if (ereg("$person\n $password\n", $text_string)){//is not in the user list
$user_is_not_here=0;
}
else
{
$user_is_not_here=1;
}

if ($user_is_not_here==1){
echo urlencode($banned_user)."\n";
}

}else{
			
/*	limit file size of $chat_file_ok */
/*	-------------------------------- */

$lines = file($chat_file_ok);
$a = count($lines);

if ($a >= $total_lenght){
$u = $a - $review_lenght;
$msg_old="";
for($i = $u; $i <= $a ;$i++){
		$msg_old =  $msg_old.strval($lines[$i]);
	}
$fchat = fopen($chat_file_ok, "w");
$fwchat = fwrite($fchat, $msg_old);
fclose($fchat);
}

/*	write message to $chat_file_ok */
/*	------------------------------ */
		
$msg = str_replace ("\n"," ", $message);
$msg = stripslashes ($msg);

/*	filter bad words */
/*	----------------- */

$number_of_bad_words = count($words_to_filter);
for($i = 0; $i <= $number_of_bad_words ;$i++){
if (strval($words_to_filter[$i])!=""){
$msg = eregi_replace(strval($words_to_filter[$i]),$replace_by,$msg);
}
}

if (ereg ("$private_message_expression", $msg, $regs) and ereg ("\(de $password a", $msg)){  // is a private message
$receiver = strval($regs[1])."\n";
$lines = file($users_file);
$a = count($lines);
$follow = 1;
for($i = 0; $i <= $a ;$i++){
if (strval($lines[$i]) == $receiver){
$add = rtrim(strval($lines[$i+1]));//read the password of receiver
$follow = 0;
}else{
if ($follow==1){
$add = " eztezamarchaoynoezta";// receiver is not in the room
}}
}
$msg .= $add;
}
if ($msg != ""){
$text_to_write = date ("(H:i:s)",time()+$correct_time)." ".$person." : ".$msg."\n";//compound single message
$fchat1 = fopen($chat_file_ok, "a");
$fwchat1 = fwrite($fchat1, "$text_to_write");// message is appended to the msg.txt file
fclose($fchat1);
}

/*	reads the last $chat_lenght lines of $chat_file_ok */
/*	-------------------------------------------------- */

$lines = file($chat_file_ok);
$a = count($lines);
$u = $a - $chat_lenght;

/*	check the text order */
/*	-------------------- */
if ($text_order == "up"){
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
	$line_value = ereg_replace( "\(de (.*) a (.*)$", "\n", $line_value);
	echo substr(urlencode($line_value),$substart);//show message
	} elseif(ereg("\(..:..:..\) $person :", $line_value) and ereg("(.)?$password", $senderpassword)){//is the sender
	if (ereg("(.)?eztezamarchaoynoezta(\n)?", $receiverpassword)) {$string_to_add = $not_here_string;}
	$line_value = ereg_replace( "\(de (.*) a (.*)$", "$string_to_add\n", $line_value);
	echo substr(urlencode($line_value),$substart);//show message
	}else{
	$u--;
	$show_message = 0;
	} 
	}         
if ($show_message == 1) {// is a general message
if ((ereg($bye_user,$line_value)) or (ereg($enter_string,$line_value))){
echo urlencode ($line_value);//show time only if user enters or exits
}
else{
echo substr(urlencode($line_value),$substart);//show message
}
}
}
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
	$line_value = ereg_replace( "\(de (.*) a (.*)$", "\n", $line_value);
	echo substr(urlencode($line_value),$substart);//show message
	} elseif(ereg("\(..:..:..\) $person :", $line_value) and ereg("(.)?$password", $senderpassword)){//is the sender
	if (ereg("(.)?eztezamarchaoynoezta(\n)?", $receiverpassword)) {$string_to_add = $not_here_string;}
	$line_value = ereg_replace( "\(de (.*) a (.*)$", "$string_to_add\n", $line_value);
	echo substr(urlencode($line_value),$substart);//show message
	}else{
	$u--;
	$show_message = 0;
	} 
	}         
if ($show_message == 1) {// is a general message
if ((ereg($bye_user,$line_value)) or (ereg($enter_string,$line_value))){
echo urlencode ($line_value);//show time only if user enters or exits
}
else{
echo substr(urlencode($line_value),$substart);//show message
}
}
}
}
}
echo "&order=";
echo $text_order;
?>
&salir=<?php print ""._MD_CHAT_LOGOUT."";?>
&sonidos=<?php print ""._MD_CHAT_SOUNDS."";?>
&mensajes=<?php print ""._MD_CHAT_MESSAGES."";?>