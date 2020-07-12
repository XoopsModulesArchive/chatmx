<?php
//  ------------------------------------------------------------------------ //
// Author:   Carlos Leopoldo Magaña Zavala                                   //
// Mail:     carloslmz@msn.com                                               //
// URL:      http://www.xoopsmx.com & http://www.miguanajuato.com            //
// Module:   ChatMX                                                          //
// Project:  The XOOPS Project (http://www.xoops.org/)                       //
// Based on  Develooping flash Chat version 1.5.2                            //
// ------------------------------------------------------------------------- //
  require('../../../mainfile.php');
//----------------------------------------------------------------------------/
include_once(XOOPS_ROOT_PATH."/class/xoopsmodule.php");
include(XOOPS_ROOT_PATH."/include/cp_functions.php");
//error_reporting(E_ALL ^ E_NOTICE);
if ( $xoopsUser ) {
	$xoopsModule = XoopsModule::getByDirname("chatmx");
	if ( !$xoopsUser->isAdmin($xoopsModule->mid()) ) { 
		redirect_header(XOOPS_URL."/",3,_NOPERM);
		exit();
	}
} else {
	redirect_header(XOOPS_URL."/",3,_NOPERM);
	exit();
}
if ( file_exists("../language/".$xoopsConfig['language']."/admin.php") ) {
	include("../language/".$xoopsConfig['language']."/admin.php");
} else {
	include("../language/english/admin.php");
}
if ( file_exists("../language/".$xoopsConfig['language']."/main.php") ) {
	include("../language/".$xoopsConfig['language']."/main.php");
} else {
	include("../language/english/main.php");
}
xoops_cp_header();
echo "<br />
<h4>"._AM_CHAT_ADM2."</h4>
<table width=\"100%\" border=\"0\" cellspacing=\"1\" class=\"outer\">
  <tr class=\"odd\">
    <td>";
?>