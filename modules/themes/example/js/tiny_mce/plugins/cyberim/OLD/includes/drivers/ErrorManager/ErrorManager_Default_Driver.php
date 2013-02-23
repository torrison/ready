<?php
/*
  Защита от прямой загрузки
*/
defined('ACCESS') or die();

class ErrorManager_Default_Driver implements ErrorManager_Driver{
	public function errorHandler($error_num, $error_var, $error_file, $error_line){
		
	}
}