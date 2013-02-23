<?php
	/*
  		Защита от прямой загрузки
	*/
	defined('ACCESS') or die();
		
	echo json_encode(array('done' => FileManager::rename(
		FileManager::clear_path(
			str_ireplace(Manager::$conf['filesystem.path'], Manager::$conf['filesystem.files_abs_path'].DS, $_REQUEST['old_name'])	
		),
		FileManager::clear_path(
			str_ireplace(Manager::$conf['filesystem.path'], Manager::$conf['filesystem.files_abs_path'].DS, $_REQUEST['new_name'])
		)
	)));
?>