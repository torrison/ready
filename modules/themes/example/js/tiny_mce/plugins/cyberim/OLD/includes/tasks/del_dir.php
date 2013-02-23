<?php
	/*
  		Защита от прямой загрузки
	*/
	defined('ACCESS') or die();
	
	echo json_encode(
		array('done' => 
			FileManager::delete_dir(
				FileManager::convertToFileSystem(
					FileManager::clear_path(Manager::$conf['filesystem.files_abs_path'].DS.$_REQUEST['path'])
				)
			)
		)
	);
?>