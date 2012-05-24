<?php
Class C7_mysql
{ var $hostname;
  var $username;
  var $password;
  var $dbname;
  var $work_table;

  function C7_mysql ($hostname, $username, $password, $dbname)
  {  $this->hostname = $hostname;
  $this->username = $username;
  $this->password = $password;
  $this->dbname = $dbname;
  }
  // Соединение с MySQL
  function db_connect()
  {
	 mysql_connect($this->hostname,$this->username,$this->password) OR DIE("Не могу создать соединение ");
 	 return true;
  }

  //Выбор БД
  function db_use()
  {
	 mysql_select_db($this->dbname) or die(mysql_error());
	 mysql_query("SET NAMES 'utf8' COLLATE 'utf8_unicode_ci'");  // Необходимо для правильной работы с UTF-8 кодировкой
	 return true;
  }

  // Завершение соединения с БД
  function db_close ()
  {
	 mysql_close();
	 return true;
  }

  // Удаление с рабочей таблицы по ID
  function delete_from_table ($del_id){
  	 $this->db_connect();
     $this->db_use();
     $query = "DELETE FROM `".$this->work_table."` WHERE `id` = ".$del_id." LIMIT 1";
     if ($GLOBALS['debug_mode'] == true) echo $query."<br />";
     mysql_query($query) or die(mysql_error());
     $this->db_close();
     write_in_file ("logs/mysql.log", "\n[".$_SESSION['user_id']."]:".date("Y-m-d H:i:s").":".$query); // Запись в LOG файл
     return true;
  }

  // Добавление полей в рабочую таблицу
  function add_to_table ($columns, $values){
     $this->db_connect();
     $this->db_use();
     $query = "INSERT INTO `".$this->work_table."` ($columns) VALUES ($values)";
     if ($GLOBALS['debug_mode'] == true) echo $query."<br />";
     mysql_query($query) or die(mysql_error());
     $this->db_close ();
     write_in_file ("logs/mysql.log", "\n[".$_SESSION['user_id']."]:".date("Y-m-d H:i:s").":".$query);
     return true;
  }

  // Редактирование полей в таблице
  function update_table ($update_columns, $edit_id){
     $this->db_connect();
     $this->db_use();
     $query = "UPDATE `".$this->work_table."` SET ".$update_columns." WHERE id = ".$edit_id;
     if ($GLOBALS['debug_mode'] == true) echo $query."<br />";
     mysql_query($query) or die(mysql_error());
     $this->db_close ();
     write_in_file ("logs/mysql.log", "\n[".$_SESSION['user_id']."]:".date("Y-m-d H:i:s").":".$query);
     return true;
  }

  // Получение найбольшего ID из рабочей таблицы
  function check_last_id ()
  {
     $this->db_connect();
     $this->db_use();
     $query = "SELECT id from `".$this->work_table."` ORDER BY id DESC LIMIT 1";
     if ($GLOBALS['debug_mode'] == true) echo $query."<br />";
     $res = mysql_query($query) or die(mysql_error());
     $row = mysql_fetch_array($res);
     $this->db_close ();
     return $row['id'];
  }

  // Получение строки из рабочей таблицы по ID
  function select_all_by_id ($id)
  {
     $this->db_connect();
     $this->db_use();
     $query = "SELECT * from `".$this->work_table."` WHERE id =".$id;
     if ($GLOBALS['debug_mode'] == true) echo $query."<br />";
     $res = mysql_query($query) or die(mysql_error());
     $this->db_close ();
     return mysql_fetch_array($res);
  }

  // Гибкое получение данных из БД по ID
  function user_select_not_all_by_id ($table, $columns, $id)
  {
     $this->db_connect();
     $this->db_use();
     $query = "SELECT ".$columns." from `".$table."` WHERE id = '".$id."'";
     if ($GLOBALS['debug_mode'] == true) echo $query."<br />";
     $res = mysql_query($query) or die(mysql_error());
     $this->db_close ();
     return mysql_fetch_array($res);
  }

  // Получение таблицы в массив из БД
  function user_select_not_all ($table, $columns)
  {
     $this->db_connect();
     $this->db_use();
     $query = "SELECT ".$columns." from `".$table."` ORDER by id DESC";
     if ($GLOBALS['debug_mode'] == true) echo $query."<br />";
     $res = mysql_query($query) or die(mysql_error());
     $this->db_close ();
     return $res;
  }

  // Гибкое получение таблицы в массив из БД
  function user_select_not_all_with_tail ($table, $columns, $tail)
  {
     $this->db_connect();
     $this->db_use();
     $query = "SELECT ".$columns." from `".$table."` ".$tail;
     if ($GLOBALS['debug_mode'] == true) echo $query."<br />";
     $res = mysql_query($query) or die(mysql_error());
     $this->db_close ();
     return $res;
  }

  // Выполнение произвольного MySQL запроса
  function free_sql ($query)
  {
     $this->db_connect();
     $this->db_use();
     if ($GLOBALS['debug_mode'] == true) echo $query."<br />";
     $res = mysql_query($query) or die(mysql_error());
     $this->db_close ();
     write_in_file ("logs/mysql.log", "\n[".$_SESSION['user_id']."]:".date("Y-m-d H:i:s").":".$query."[Free_query]");
     return $res;
  }

  // Дополнительные функции

  // Удаление из рабочей таблицы с проверкой прав доступа.
    function delete_from_table_defend ($del_id){
  	 $this->db_connect();
     $this->db_use();
     $query = "DELETE FROM `".$this->work_table."` WHERE `id` = ".$del_id." AND `user_write` LIKE '%[".$_SESSION['user_id']."]%' LIMIT 1";
     if ($_SESSION['user_type'] == 1) $query = "DELETE FROM `".$this->work_table."` WHERE `id` = ".$del_id." LIMIT 1";
     if ($GLOBALS['debug_mode'] == true) echo $query."<br />";
     return mysql_query($query) or die(mysql_error());
     $this->db_close();
     write_in_file ("logs/mysql.log", "\n[".$_SESSION['user_id']."]:".date("Y-m-d H:i:s").":".$query);
  }

}


$GLOBALS['mysql_obj'] = new C7_mysql($GLOBALS['mysql_hostname'], $GLOBALS['mysql_username'], $GLOBALS['mysql_password'], $GLOBALS['mysql_dbname']);

if ($GLOBALS['debug_mode'] == true) echo "C7_MySQL Lib Included<br />";
?>