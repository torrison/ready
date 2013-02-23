<?php
	/*
  		Защита от прямой загрузки
	*/
	defined('ACCESS') or die();
	
	$fileArray = array();
	foreach ($_POST as $key => $value) {
		if ($key != 'folder') {
			$f = FileManager::clear_path(Manager::$conf['filesystem.files_abs_path'].$_POST['folder'].$value);
			if (file_exists(FileManager::convertToFileSystem($f))){
				$fileArray[$key] = $value;
			}
		}					
	}
	echo json_encode($fileArray);
?>