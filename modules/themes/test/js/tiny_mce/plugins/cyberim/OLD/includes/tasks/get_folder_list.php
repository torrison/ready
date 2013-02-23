<?php
	/*
  		Защита от прямой загрузки
	*/
	defined('ACCESS') or die();
	
	header('Content-type: text/json; charset='.Manager::$conf['general.char_set']);
	$list = Manager::$file_m->get_path_list($_REQUEST['path'], false, true);
	echo json_encode($list);
?>