<?php
/*
  Защита от прямой загрузки
*/
defined('ACCESS') or die();

interface ErrorManager_Driver{
	public function errorHandler($error_num, $error_var, $error_file, $error_line);
}

?>