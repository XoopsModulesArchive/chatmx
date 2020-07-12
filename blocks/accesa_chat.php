<?php
//  ------------------------------------------------------------------------ //
// Author:   Carlos Leopoldo Magaña Zavala                                   //
// Mail:     carloslmz@msn.com                                               //
// URL:      http://www.xoopsmx.com & http://www.miguanajuato.com            //
// Module:   ChatMX                                                          //
// Project:  The XOOPS Project (http://www.xoops.org/)                       //
// Based on  Develooping flash Chat version 1.5.2                            //
// ------------------------------------------------------------------------- //

function b_accesachat_show($options) {
global $xoopsConfig;
	$block = array();
	$block['title'] =  _MB_CHAT_BLOCKNAME;
	$block['content']  = "<div align=\"center\"><a href=\"".XOOPS_URL."/modules/chatmx/\"><img src=\"".XOOPS_URL."/modules/chatmx/images/entrar.gif\" alt=\""._MB_CHAT_ALTIMG."\" border=\"0\"></a><br>
"._MB_CHAT_CHATEAR."</div>";
	return $block;
}
?>