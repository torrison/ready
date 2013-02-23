<?php
	/*
  		Защита от прямой загрузки
	*/
	defined('ACCESS') or die();
	
	echo json_encode(array('done' => FileManager::create_dir(Manager::$conf['filesystem.files_path'].$_REQUEST['path'])));
?>