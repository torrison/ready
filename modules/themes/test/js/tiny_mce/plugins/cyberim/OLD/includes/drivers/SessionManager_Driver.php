<?php
/*
  Защита от прямой загрузки
*/
defined('ACCESS') or die();

interface SessionManager_Driver{
	public function authorisation();
}

?>