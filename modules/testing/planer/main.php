<?php
if ($debug_mode == true) echo "Prepare Planer Module<br />";

#DB_SYSTEM VARS

  	    $n=0;
  	    $column_in_table[$n]['name'] = "id";
  	    $column_in_table[$n]['intable'] = true;
        $n++;
   	    $column_in_table[$n]['name'] = "name";
   	    $column_in_table[$n]['input_type'] = "text";
  	    $column_in_table[$n]['fullname'] = "Задача";
		$column_in_table[$n]['intable'] = true;
   	    $n++;
		$column_in_table[$n]['name'] = "office";
   	    $column_in_table[$n]['input_type'] = "select";
   	    $variants[0]['id'] = 1;$variants[0]['name']="Офис 1";
  	    $variants[1]['id'] = 2;$variants[1]['name']="Офис 2";
  	    $column_in_table[$n]['variants'] = $variants;
  	    $column_in_table[$n]['fullname'] = "Офис";
		$column_in_table[$n]['intable'] = false;
		$n++;
		$column_in_table[$n]['name'] = "deadline";
   	    $column_in_table[$n]['input_type'] = "date";
  	    $column_in_table[$n]['fullname'] = "Сроки";
		$column_in_table[$n]['intable'] = true;
        $n++;
   	    $column_in_table[$n]['name'] = "start";
   	    $column_in_table[$n]['input_type'] = "date";
  	    $column_in_table[$n]['fullname'] = "Дата начала";
		$column_in_table[$n]['intable'] = false;
        $n++;
   	    $column_in_table[$n]['name'] = "content";
   	    $column_in_table[$n]['input_type'] = "textarea";
  	    $column_in_table[$n]['fullname'] = "Подробнее";
		$column_in_table[$n]['intable'] = false;
        $n++;
   	    $column_in_table[$n]['name'] = "users";
   	    $column_in_table[$n]['input_type'] = "select_user";
   	    $column_in_table[$n]['input_db'] = "c5_staff";
  	    $column_in_table[$n]['fullname'] = "Ответственные";
		$column_in_table[$n]['intable'] = true;

		$n++;
		$column_in_table[$n]['name'] = "status";
   	    $column_in_table[$n]['input_type'] = "select";
   	    $variants = array();
   	    $variants[0]['id'] = 1;$variants[0]['name']="Новая задача";
  	    $variants[1]['id'] = 2;$variants[1]['name']="Принята/В работе";
  	    $variants[2]['id'] = 3;$variants[2]['name']="Выполнена";
  	    $column_in_table[$n]['variants'] = $variants;
  	    $column_in_table[$n]['fullname'] = "Статус";
		$column_in_table[$n]['intable'] = false;

		$n++;
  	    $column_in_table[$n]['name'] = "fast";
   	    $column_in_table[$n]['input_type'] = "checkbox";
  	    $column_in_table[$n]['fullname'] = "СРОЧНО!";
		$column_in_table[$n]['intable'] = false;

		$n++;
  	    $column_in_table[$n]['name'] = "mlinks";
   	    $column_in_table[$n]['input_type'] = "mlinks";
  	    $column_in_table[$n]['fullname'] = "<br /> <b>Ссылки</b>";
		$column_in_table[$n]['intable'] = false;
		$n++;
  	    $column_in_table[$n]['name'] = "mfiles";
   	    $column_in_table[$n]['input_type'] = "mfiles";
  	    $column_in_table[$n]['fullname'] = "<b>Файлы</b>";
		$column_in_table[$n]['intable'] = false;
   	    $seo_columns = false;
   	    
            define("answer_system", "yes");
   	    define("access_columns", "yes");
   
	    define("chat", "yes");
            $defend_post['chat_send'] = input_defend1 ('chat_send');
?>