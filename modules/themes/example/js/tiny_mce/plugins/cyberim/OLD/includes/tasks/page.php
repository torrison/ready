<?php
	/*
  		Защита от прямой загрузки
	*/
	defined('ACCESS') or die();
	
	$file = PAGES_PATH.Manager::$conf['general.template'].DS.(isset($_REQUEST['page']) ? $_REQUEST['page'] : 'index').'.html';
	
	if (file_exists($file)){
		header('Content-type: text/html; charset='.Manager::$conf['general.char_set']);
		header('Cache-Control: private');
		readfile($file);	
	} else{
		header('HTTP/1.0 404 Not Found');
	}
?>