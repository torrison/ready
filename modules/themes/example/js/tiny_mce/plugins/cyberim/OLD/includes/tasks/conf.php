<?php 
	/*
  		Защита от прямой загрузки
	*/
	defined('ACCESS') or die();
	
	echo json_encode(array(
		'lang' => Manager::$conf['general.language'],
		'allowed_extensions' => Manager::$conf['filesystem.allowed_extensions'],
		'max_file_size' => Manager::$conf['filesystem.max_file_size']
	));

?>