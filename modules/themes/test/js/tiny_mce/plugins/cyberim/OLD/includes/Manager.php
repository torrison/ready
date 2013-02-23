<?php
/*
  Защита от прямой загрузки
*/
defined('ACCESS') or die();

class Manager {
	public static $file_m;
	public static $image_m;
	public static $sess_m;
	public static $error_m;
	public static $conf;
	private static $instance;
	
	/*
	  Контсруктор класса Manager
	*/
	public function __construct(){
	    Manager::$instance = & $this;
	}		
	
	/*
	  Метод возвращает ссылку на обьект или создает его
	*/
	public static function & instance(){
		empty(Manager::$instance) and new Manager;
		return Manager::$instance;
	}
	
	/*
	  Метод выполняет задачу
	*/
	public function peform($task = ''){
		if (file_exists(TASKS_PATH.$task.EXT)){
			require_once(TASKS_PATH.$task.EXT);
		}
	}	
}
?>