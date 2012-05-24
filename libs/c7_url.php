<?php
// Defent input url line
$_GET['url_line'] = C7_defend_get_fast ('url_line');
$GLOBALS['url_array'] = explode("/", $_GET['url_line']);
//print_r($GLOBALS['url_array']); //For Debug
?>