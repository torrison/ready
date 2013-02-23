<?php
	/*
  		Защита от прямой загрузки
	*/
	defined('ACCESS') or die();
	
	echo json_encode(array('done' => FileManager::rename(
		FileManager::clear_path(Manager::$conf['filesystem.files_path'].$_REQUEST['old_name']), 
		FileManager::clear_path(Manager::$conf['filesystem.files_path'].$_REQUEST['new_name'])
	)));
?>