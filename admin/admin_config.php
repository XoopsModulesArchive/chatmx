<?php
//  ------------------------------------------------------------------------ //
// Author:   Carlos Leopoldo Magaña Zavala                                   //
// Mail:     carloslmz@msn.com                                               //
// URL:      http://www.xoopsmx.com & http://www.miguanajuato.com            //
// Module:   ChatMX                                                          //
// Project:  The XOOPS Project (http://www.xoops.org/)                       //
// Based on  Develooping flash Chat version 1.5.2                            //
// ------------------------------------------------------------------------- //
error_reporting(7);

// usa "ip" o "password" segœn quieras usar la ip o un password para identificar usuarios
// NOTA: El sistema de banning (inhabilitacion de usuarios) solo funciona con "ip" Usa "password" preferiblemente solo en entornos donde haya usuarios conectados a través de una misma ip
$password_system = "ip"; // Si cambias esta variable. debes cambiar la misma variable del archivo config.php

// Variables de Administracion *NO MODIFICAR*//
$admin_name = "admin"; //nombre del administrador (max. 12 caracteres)
$admin_password = "pass"; // clave del administrador (max. 12 caracteres)
$name = "admin";
$password ="pass";

//  TRADUCCION
//   Frases en las paginas de administracion
$link_to_admin =""._AM_CHAT_ADMI."";// texto para vinculo a las paginas de administracion
$intro_admin_title = ""._AM_CHAT_ADM2."";// titulo de la pagina intro de administracion
$intro_admin_name = ""._AM_CHAT_ADM3."";// texto para el campo nombre de la pagina intro de administracion
$intro_admin_password = ""._AM_CHAT_ADM4."";// texto para el campo password de la pagina intro de administracion
$intro_admin_button= ""._AM_CHAT_ADM5."";//texto para el boton de la pagina intro de administracion
$no_users = ""._AM_CHAT_ADUS."";//no hay usuarios en la sala
$text_for_kick_button = ""._AM_CHAT_ADEX."";//texto para boton 'kicking'
$text_for_bann_button = ""._AM_CHAT_ADIN."";//texto para boton 'banning'
$no_ips = ""._AM_CHAT_ADNI."";//no hay IPs inhabilitadas
$text_for_pardon_button = ""._AM_CHAT_ADPE."";//texto para boton 'perdonar ip'
$ip_link = ""._AM_CHAT_ADIP."";//texto para vinculo a IPs inhabilitadas
$no_ip_link = ""._AM_CHAT_ADII."";//texto si usas password en lugar de IP
$users_link = ""._AM_CHAT_ADAU."";//texto del vinculo a usuarios conectados
?>