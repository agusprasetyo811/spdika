<?php
include 'php_config.php';
$query = mysql_connect($_CONFIG['db_type'],$_CONFIG['db_user'],$_CONFIG['db_pass']) or die ("Data Base Error");
mysql_select_db($_CONFIG['db_name'],$query) or die ("Data Base Kosong");