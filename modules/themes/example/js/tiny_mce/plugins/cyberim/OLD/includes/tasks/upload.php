<?php
	/*
  		Защита от прямой загрузки
	*/
	defined('ACCESS') or die();
	
	if (!empty($_FILES)) {
		$tempFile = $_FILES['Filedata']['tmp_name'];
		$targetPath =  FileManager::clear_path(Manager::$conf['filesystem.files_abs_path'].$_REQUEST['folder']);
		echo $_REQUEST['folder']."\n";
		$targetFile =  $targetPath.$_FILES['Filedata']['name'];
		$fileTypes = explode('|', strtolower(Manager::$conf['filesystem.allowed_extensions']));
		$ext = FileManager::get_ext($_FILES['Filedata']['name']);							
		if (in_array(strtolower($ext), $fileTypes)) {
			move_uploaded_file(FileManager::convertToFileSystem($tempFile), FileManager::convertToFileSystem($targetFile));
			chmod(FileManager::convertToFileSystem($targetFile), Manager::$conf['filesystem.file_chmod']);
			echo "1";
		}
	}
?>