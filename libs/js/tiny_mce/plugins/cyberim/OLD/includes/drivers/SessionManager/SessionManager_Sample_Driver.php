<?php
/*
  Защита от прямой загрузки
*/
defined('ACCESS') or die();

class SessionManager_Sample_Driver implements SessionManager_Driver{
	public function authorisation(){		session_start();
        if (isset($_SESSION['user'])&&($_SESSION['user'] == 1)) return true;
        else return false;

	}
}
?>