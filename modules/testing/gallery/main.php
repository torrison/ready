<?php

#DB_SYSTEM VARS

  	    $column_in_table[0]['name'] = "id";
  	    $column_in_table[0]['intable'] = true;

  	    $column_in_table[1]['name'] = "img";
  	    $column_in_table[1]['input_type'] = "image";
  	    $column_in_table[1]['dbl_img_w'] = "231";
  	    $column_in_table[1]['dbl_img_h'] = "174";
  	    $column_in_table[1]['img_folder'] = "gallery";
  	    $column_in_table[1]['fullname'] = "Картинка";
  	    $column_in_table[1]['intable'] = true;

   	    $column_in_table[2]['name'] = "name";
   	    $column_in_table[2]['input_type'] = "text";
  	    $column_in_table[2]['fullname'] = "Название";
		$column_in_table[2]['intable'] = true;

   	    $column_in_table[3]['name'] = "priority";
   	    $column_in_table[3]['input_type'] = "text";
  	    $column_in_table[3]['fullname'] = "Приоритет";
		$column_in_table[3]['intable'] = false;

		$column_in_table[4]['name'] = "visible";
   	    $column_in_table[4]['input_type'] = "checkbox";
  	    $column_in_table[4]['fullname'] = "Не показывать";
		$column_in_table[4]['intable'] = false;

        $column_in_table[5]['name'] = "connect_id";
   	    $column_in_table[5]['input_type'] = "parent_select";
  	    $column_in_table[5]['fullname'] = "ID Объекта";
		$column_in_table[3]['intable'] = false;

		$column_in_table[6]['name'] = "connect_type";
   	    $column_in_table[6]['input_type'] = "select";
  	    $column_in_table[6]['fullname'] = "Тип соединения";

  	    $variants[0]['id'] = 1;$variants[0]['name']="catalog";
  	    $variants[1]['id'] = 2;$variants[1]['name']="blog";
  	    $variants[2]['id'] = 3;$variants[2]['name']="static_page";

  	    $column_in_table[6]['variants'] = $variants;
		$column_in_table[6]['intable'] = false;


   	    $seo_columns = false;
   	    define("access_columns", "yes");

?>