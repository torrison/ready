<?php
#DB_SYSTEM VARS

  	    $column_in_table[0]['name'] = "id";
  	    $column_in_table[0]['intable'] = true;
        $n = 1;
  	    $column_in_table[$n]['name'] = "orgname";
   	    $column_in_table[$n]['input_type'] = "text";
  	    $column_in_table[$n]['fullname'] = "Название";
		$column_in_table[$n]['intable'] = true;
		$defend_post['orgname'] = C7_defend_post_fast ("orgname");
        $n++;
		$column_in_table[$n]['name'] = "orgrole";
   	    $column_in_table[$n]['input_type'] = "select";
  	    $column_in_table[$n]['fullname'] = "Взаимодействие";
        $variants = array();
  	    $variants[0]['id'] = 1;$variants[0]['name']="Подрядчик";
  	    $variants[1]['id'] = 2;$variants[1]['name']="Поставщик";
  	    $variants[1]['id'] = 2;$variants[1]['name']="Полезные услуги";
  	    $variants[2]['id'] = 3;$variants[2]['name']="Клиент";
  	    $variants[3]['id'] = 4;$variants[3]['name']="Конкурент";
  	    $variants[4]['id'] = 5;$variants[4]['name']="Партнер (договор)";
  	    $variants[5]['id'] = 6;$variants[5]['name']="Партнер - друг";
  	    $variants[6]['id'] = 7;$variants[6]['name']="Смежная отрасль";
  	    $variants[7]['id'] = 8;$variants[7]['name']="Агент";
  	    $variants[7]['id'] = 8;$variants[7]['name']="Инвестор (Акционер)";
        $column_in_table[$n]['variants'] = $variants;
		$column_in_table[$n]['intable'] = false;
		$defend_post['orgrole'] = C7_defend_post_fast ("orgrole");
		$n++;
  	    $column_in_table[$n]['name'] = "info";
   	    $column_in_table[$n]['input_type'] = "textarea";
  	    $column_in_table[$n]['fullname'] = "Информация";
		$column_in_table[$n]['intable'] = false;
		$defend_post['info'] = C7_defend_post_fast ("info");
        $n++;
  	    $column_in_table[$n]['name'] = "img";
  	    $column_in_table[$n]['input_type'] = "image";
  	    $column_in_table[$n]['img_path'] = "orgs";
  	    $column_in_table[$n]['fullname'] = "Логотип";
  	    $column_in_table[$n]['intable'] = false;
  	    $defend_post['img'] = C7_defend_post_fast ("img");
        $n++;
		$column_in_table[$n]['name'] = "level";
   	    $column_in_table[$n]['input_type'] = "select";
  	    $column_in_table[$n]['fullname'] = "Уровень";
        $variants = array();
        $variants[0]['id'] = 1;$variants[0]['name']="Не оценена";
  	    $variants[1]['id'] = 2;$variants[1]['name']="Брак / Обман";
  	    $variants[2]['id'] = 3;$variants[2]['name']="3 сорт";
  	    $variants[3]['id'] = 4;$variants[3]['name']="Для бедных и тупых";
  	    $variants[4]['id'] = 5;$variants[4]['name']="Массовое потребление";
  	    $variants[5]['id'] = 6;$variants[5]['name']="Средний класс";
  	    $variants[6]['id'] = 7;$variants[6]['name']="Профессионалы";
  	    $variants[7]['id'] = 8;$variants[7]['name']="Инноваторы";

  	    $column_in_table[$n]['variants'] = $variants;
		$column_in_table[$n]['intable'] = false;
        $defend_post['level'] = C7_defend_post_fast ("level");
        //define("access_columns", "yes");
   	    $seo_columns = false;

?>