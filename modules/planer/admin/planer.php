<?php
#DB_SYSTEM VARS

  	    $column_in_table[0]['name'] = "id";
  	    $column_in_table[0]['intable'] = true;
        $n = 1;
  	    $column_in_table[$n]['name'] = "task";
   	    $column_in_table[$n]['input_type'] = "text";
  	    $column_in_table[$n]['fullname'] = "Задача";
		$column_in_table[$n]['intable'] = true;
        $defend_post['task'] = C7_defend_post_fast ("task");
        $n++;
		$column_in_table[$n]['name'] = "status";
   	    $column_in_table[$n]['input_type'] = "select";
  	    $column_in_table[$n]['fullname'] = "Статус";
        $variants = array();
  	    $variants[0]['id'] = 1;$variants[0]['name']="Новая";
  	    $variants[1]['id'] = 2;$variants[1]['name']="В работе";
  	    $variants[2]['id'] = 3;$variants[2]['name']="Отменена";
  	    $variants[3]['id'] = 4;$variants[3]['name']="Выполнена";
  	    $variants[4]['id'] = 5;$variants[4]['name']="Закрыта";
        $column_in_table[$n]['variants'] = $variants;
		$column_in_table[$n]['intable'] = false;
		$defend_post['status'] = C7_defend_post_fast ("status");
        $n++;
  	    $column_in_table[$n]['name'] = "date";
   	    $column_in_table[$n]['input_type'] = "date";
  	    $column_in_table[$n]['fullname'] = "Deadline";
		$column_in_table[$n]['intable'] = false;
		$defend_post['date'] = C7_defend_post_fast ("date");
        $n++;
  	    $column_in_table[$n]['name'] = "info";
   	    $column_in_table[$n]['input_type'] = "textarea";
  	    $column_in_table[$n]['fullname'] = "Информация";
		$column_in_table[$n]['intable'] = false;
		$defend_post['info'] = C7_defend_post_fast ("info");
        //define("access_columns", "yes");
   	    $seo_columns = false;

?>