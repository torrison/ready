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
        $n++;
		$column_in_table[$n]['name'] = "teamrole";
   	    $column_in_table[$n]['input_type'] = "select";
  	    $column_in_table[$n]['fullname'] = "Роль в работе";
        $variants = array();
  	    $variants[0]['id'] = 1;$variants[0]['name']="Работник (Труд. договор)";
  	    $variants[1]['id'] = 2;$variants[1]['name']="Сотрудник (СПД договор)";
  	    $variants[1]['id'] = 2;$variants[1]['name']="Фрилансер";
  	    $variants[2]['id'] = 3;$variants[2]['name']="Сотрудник - Друг";
  	    $variants[3]['id'] = 4;$variants[3]['name']="Друг - пощник";
  	    $variants[4]['id'] = 5;$variants[4]['name']="Партнер (договор)";
  	    $variants[5]['id'] = 6;$variants[5]['name']="Партнер - друг";
  	    $variants[6]['id'] = 7;$variants[6]['name']="Смежная отрасль";
  	    $variants[7]['id'] = 8;$variants[7]['name']="Агент";
  	    $variants[7]['id'] = 8;$variants[7]['name']="Инвестор (Акционер)";
  	    $variants[8]['id'] = 9;$variants[8]['name']="Знакомый";
  	    $variants[9]['id'] = 10;$variants[9]['name']="Конкурент";
  	    $variants[10]['id'] = 11;$variants[10]['name']="Клиент-друг";
  	    $variants[11]['id'] = 12;$variants[11]['name']="Клиент";
  	    $variants[12]['id'] = 13;$variants[12]['name']="Клиент-договор";
        $column_in_table[$n]['variants'] = $variants;
		$column_in_table[$n]['intable'] = false;
		$defend_post['teamrole'] = C7_defend_post_fast ("teamrole");
        $n++;
  	    $column_in_table[$n]['name'] = "role";
   	    $column_in_table[$n]['input_type'] = "text";
  	    $column_in_table[$n]['fullname'] = "Должность";
		$column_in_table[$n]['intable'] = false;
        $defend_post['role'] = C7_defend_post_fast ("role");
        $n++;
  	    $column_in_table[$n]['name'] = "iin";
   	    $column_in_table[$n]['input_type'] = "text";
  	    $column_in_table[$n]['fullname'] = "ИИН";
		$column_in_table[$n]['intable'] = false;
		$defend_post['iin'] = C7_defend_post_fast ("iin");
        $n++;
  	    $column_in_table[$n]['name'] = "passport";
   	    $column_in_table[$n]['input_type'] = "text";
  	    $column_in_table[$n]['fullname'] = "Паспорт";
		$column_in_table[$n]['intable'] = false;
		$defend_post['passport'] = C7_defend_post_fast ("passport");
        $n++;
  	    $column_in_table[$n]['name'] = "wherepass";
   	    $column_in_table[$n]['input_type'] = "text";
  	    $column_in_table[$n]['fullname'] = "Кем и когда выдан";
		$column_in_table[$n]['intable'] = false;
		$defend_post['wherepass'] = C7_defend_post_fast ("wherepass");
        $n++;
  	    $column_in_table[$n]['name'] = "mobtel";
   	    $column_in_table[$n]['input_type'] = "text";
  	    $column_in_table[$n]['fullname'] = "Мобильный";
		$column_in_table[$n]['intable'] = false;
		$defend_post['mobtel'] = C7_defend_post_fast ("mobtel");
        $n++;
  	    $column_in_table[$n]['name'] = "citytel";
   	    $column_in_table[$n]['input_type'] = "text";
  	    $column_in_table[$n]['fullname'] = "Телефон";
		$column_in_table[$n]['intable'] = false;
		$defend_post['citytel'] = C7_defend_post_fast ("citytel");
        $n++;
  	    $column_in_table[$n]['name'] = "icq";
   	    $column_in_table[$n]['input_type'] = "text";
  	    $column_in_table[$n]['fullname'] = "ICQ";
		$column_in_table[$n]['intable'] = false;
		$defend_post['icq'] = C7_defend_post_fast ("icq");
        $n++;
  	    $column_in_table[$n]['name'] = "skype";
   	    $column_in_table[$n]['input_type'] = "text";
  	    $column_in_table[$n]['fullname'] = "Skype";
		$column_in_table[$n]['intable'] = false;
		$defend_post['skype'] = C7_defend_post_fast ("skype");
        $n++;
  	    $column_in_table[$n]['name'] = "date";
   	    $column_in_table[$n]['input_type'] = "date";
  	    $column_in_table[$n]['fullname'] = "Дата Рождения";
		$column_in_table[$n]['intable'] = false;
		$defend_post['date'] = C7_defend_post_fast ("date");
        $n++;
  	    $column_in_table[$n]['name'] = "adres";
   	    $column_in_table[$n]['input_type'] = "text";
  	    $column_in_table[$n]['fullname'] = "Адрес";
		$column_in_table[$n]['intable'] = false;
		$defend_post['adres'] = C7_defend_post_fast ("adres");
        $n++;
  	    $column_in_table[$n]['name'] = "email";
   	    $column_in_table[$n]['input_type'] = "text";
  	    $column_in_table[$n]['fullname'] = "E-mail";
		$column_in_table[$n]['intable'] = false;
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
  	    $column_in_table[$n]['img_path'] = "people";
  	    $column_in_table[$n]['fullname'] = "Фото";
  	    $column_in_table[$n]['intable'] = false;
  	    $defend_post['img'] = C7_defend_post_fast ("img");
        $n++;
  	    $column_in_table[$n]['name'] = "user_id";
   	    $column_in_table[$n]['input_type'] = "text";
  	    $column_in_table[$n]['fullname'] = "User ID";
		$column_in_table[$n]['intable'] = false;
		$defend_post['user_id'] = C7_defend_post_fast ("user_id");
		$n++;
  	    $column_in_table[$n]['name'] = "org_id";
   	    $column_in_table[$n]['input_type'] = "text";
  	    $column_in_table[$n]['fullname'] = "Организация";
		$column_in_table[$n]['intable'] = false;
		$defend_post['org_id'] = C7_defend_post_fast ("org_id");
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

		$n++;
  	    $column_in_table[$n]['name'] = "mlinks";
   	    $column_in_table[$n]['input_type'] = "mlinks";
  	    $column_in_table[$n]['fullname'] = "Ссылки";
		$column_in_table[$n]['intable'] = false;
		$defend_post['mlinks'] = C7_defend_post_fast ("mlinks");
		$n++;
  	    $column_in_table[$n]['name'] = "mfiles";
   	    $column_in_table[$n]['input_type'] = "mfiles";
  	    $column_in_table[$n]['fullname'] = "Файлы";
		$column_in_table[$n]['intable'] = false;
		$defend_post['mfiles'] = C7_defend_post_fast ("mfiles");

        //define("access_columns", "yes");
   	    $seo_columns = false;

?>