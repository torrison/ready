<?php
#DB_SYSTEM VARS

  	    $column_in_table[0]['name'] = "id";
  	    $column_in_table[0]['intable'] = true;
        $n = 1;
  	    $column_in_table[$n]['name'] = "fio";
   	    $column_in_table[$n]['input_type'] = "text";
  	    $column_in_table[$n]['fullname'] = "ФИО";
		$column_in_table[$n]['intable'] = true;
		$defend_post['fio'] = C7_defend_post_fast ("fio");

  	    $column_in_table[$n]['name'] = "email";
   	    $column_in_table[$n]['input_type'] = "text";
  	    $column_in_table[$n]['fullname'] = "E-mail";
		$column_in_table[$n]['intable'] = true;
        $defend_post['email'] = C7_defend_post_fast ("email");
        $n++;
  	    $column_in_table[$n]['name'] = "info";
   	    $column_in_table[$n]['input_type'] = "textarea";
  	    $column_in_table[$n]['fullname'] = "Информация";
		$column_in_table[$n]['intable'] = false;
        $defend_post['info'] = C7_defend_post_fast ("info");
        $n++;
  	    $column_in_table[$n]['name'] = "img";
  	    $column_in_table[$n]['input_type'] = "image";
  	    $column_in_table[$n]['img_path'] = "users";
  	    $column_in_table[$n]['fullname'] = "Аватар";
  	    $column_in_table[$n]['intable'] = false;
        $n++;
  	    $column_in_table[$n]['name'] = "login";
   	    $column_in_table[$n]['input_type'] = "text";
  	    $column_in_table[$n]['fullname'] = "Логин";
		$column_in_table[$n]['intable'] = true;
        $defend_post['login'] = C7_defend_post_fast ("login");
        $n++;
  	    $column_in_table[$n]['name'] = "password";
   	    $column_in_table[$n]['input_type'] = "password";
  	    $column_in_table[$n]['fullname'] = "Пароль";
		$column_in_table[$n]['intable'] = false;
        $defend_post['password'] = C7_defend_post_fast ("password");
        $n++;
		$column_in_table[$n]['name'] = "user_type";
   	    $column_in_table[$n]['input_type'] = "select";
  	    $column_in_table[$n]['fullname'] = "Доступ";
        $variants = array();
  	    $variants[0]['id'] = 1;$variants[0]['name']="Администратор";
  	    $variants[1]['id'] = 2;$variants[1]['name']="Директор";
  	    $variants[2]['id'] = 3;$variants[2]['name']="Главный Бухгалтер";
  	    $variants[3]['id'] = 4;$variants[3]['name']="Бухгалтер";
  	    $variants[4]['id'] = 5;$variants[4]['name']="Менеджер";
  	    $variants[5]['id'] = 6;$variants[5]['name']="Дизайнер";
  	    $variants[6]['id'] = 7;$variants[6]['name']="Производство";
  	    $variants[7]['id'] = 8;$variants[7]['name']="Доставка";
  	    $column_in_table[$n]['variants'] = $variants;
		$column_in_table[$n]['intable'] = false;
        $defend_post['user_type'] = C7_defend_post_fast ("user_type");
        //define("access_columns", "yes");
   	    $seo_columns = false;

?>