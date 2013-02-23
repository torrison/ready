<?php
	/*
  		Защита от прямой загрузки
	*/
	defined('ACCESS') or die();
	
	$filename = FileManager::convertToFileSystem(
		urldecode(
			str_ireplace(Manager::$conf['filesystem.path'], Manager::$conf['filesystem.files_path'], $_POST['filename'])
		)
	);
	$info = ImageManager::instance()->info($filename);
	echo json_encode($info);
?>