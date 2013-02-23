<?php
	/*
  		Защита от прямой загрузки
	*/
	defined('ACCESS') or die();
	
	$file = LANG_PATH.$_REQUEST['lang'].'-'.Manager::$conf['general.char_set'].'.js';
	
	if (file_exists($file)){
		header('Content-type: text/javascript; charset='.Manager::$conf['general.char_set']);
		header('Cache-Control: private');
		readfile($file);	
	} else{
		header('HTTP/1.0 404 Not Found');
	}
?>