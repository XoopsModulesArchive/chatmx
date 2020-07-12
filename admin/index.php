<?php
include("admin_header.php");
  
if ( file_exists("../language/".$xoopsConfig['language']."/modinfo.php") ) {
	include("../language/".$xoopsConfig['language']."/modinfo.php");
} else {
	include("../language/english/modinfo.php");
}
  
  echo "<strong>"._AM_CHAT_ELIGE."</strong><hr>\n<ul>";
  include("menu.php");
  foreach ($adminmenu as $key => $data) {
    echo "\n<li><a href='../".$data["link"]."'>".$data["title"]."</a></li>";
  }
include("admin_footer.php");
?>