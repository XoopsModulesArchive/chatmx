<?php
//  ------------------------------------------------------------------------ //
// Author:   Carlos Leopoldo Magaña Zavala                                   //
// Mail:     carloslmz@msn.com                                               //
// URL:      http://www.xoopsmx.com & http://www.miguanajuato.com            //
// Module:   ChatMX                                                          //
// Project:  The XOOPS Project (http://www.xoops.org/)                       //
// Based on  Develooping flash Chat version 1.5.2                            //
// ------------------------------------------------------------------------- //
$modversion['name'] = _MI_CHAT_NAME;
$modversion['version'] = 1.00;
$modversion['description'] = _MI_CHAT_DESC;
$modversion['credits'] = 'XOOPS Mexico <a href="http://www.xoopsmx.com" target="mx">www.xoopsmx.com</a>';
$modversion['author'] = 'Carlos Leopoldo Magaña Zavala;';
$modversion['help'] = 'help.php';
$modversion['license'] = 'GPL see LICENSE';
$modversion['official'] = 0;
$modversion['image'] = "images/chatmx_slogo.png";
$modversion['dirname'] = "chatmx";

// Admin things
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = "admin/index.php";
$modversion['adminmenu'] = "admin/menu.php";

// Menu
$modversion['hasMain'] = 1;

// Blocks
$modversion['blocks'][1]['file'] = "accesa_chat.php";
$modversion['blocks'][1]['name'] = _MI_CHAT_BNAME;
$modversion['blocks'][1]['description'] = _MI_CHAT_BDESC;
$modversion['blocks'][1]['show_func'] = "b_accesachat_show";

?>