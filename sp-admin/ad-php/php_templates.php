<?php
ob_start();
//include body nya
include ($CONTENT_FILE . '.php');
$TEMPLATE['BODY'] = ob_get_contents();
ob_end_clean();

ob_start();  
$TEMPLATE['TITLE_CONTENT'] = $title; 
ob_end_clean(); 

// config to template 
$key_config = array_keys($_CONFIG); 
foreach($key_config as $keys){ 
    $TEMPLATE[strtoupper($keys)] = $_CONFIG[$keys]; 
} 

// include template nya 
ob_start(); 
include ($SITE_TEMPLATE . '.php'); 
$site_template = ob_get_contents(); 
ob_end_clean(); 

$OUTPUT = preg_replace('/\{(\w+)\}/e',"\$TEMPLATE['\\1']",$site_template); 

echo $OUTPUT; 

?>