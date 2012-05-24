<?php
// Добавления Админ. скриптов
//function c7_admin_add_script()
//{
//$GLOBALS['footer_scripts'] .= "<script src=\"modules/admin/js/c7_admin.js?1\"></script>";
//}

// Вывод шаблона страницы администрирования
function c7_admin_view()
{
$GLOBALS['head_code'] .= c7_get_view ("admin","admin_head");
$GLOBALS['body_code'] .= c7_get_view ("admin","admin_body");
}

// Вывод таблицы модуля
function c7_admin_module()
{
include ("modules/".$GLOBALS['url_array'][1]."/admin/".$GLOBALS['url_array'][2].".php"); // Load admin array

if (isset($GLOBALS['url_array'][2])) // Name of table

$i=1;
while (isset($column_in_table[$i]['name'])&&($column_in_table[$i]['name'] != ""))
{
  if ($column_in_table[$i]['intable'] == true)
  {
    $amdt_select_fields .= ", ".$column_in_table[$i]['name'];
    $input_data ['th_data'] .= "<th>".$column_in_table[$i]['fullname']."</th>\n";
  }
  $i++;
}
$amdt_select_fields = $column_in_table[0]['name'].$amdt_select_fields; // Select Fields For Data Table

$input_data ['res'] = $GLOBALS['mysql_obj']->free_sql("SELECT ".$amdt_select_fields." from ".$GLOBALS['url_array'][2]);

$input_data ['table columns'] = $column_in_table;

$view_output = c7_get_view ('admin', 'datatables', $input_data, 'datatables/', 'include');



$input_data ['datatable'] = $view_output ['datatable'];

$GLOBALS['admin_div'] .= c7_get_view ('admin', 'table', $input_data);
}

// Вывод данных о системе
function c7_admin_system()
{
$GLOBALS['admin_div'] .= c7_get_view ('admin', 'system');
}

// Add Form Generator
function c7_admin_add()
{
include ("modules/".$GLOBALS['url_array'][1]."/admin/".$GLOBALS['url_array'][2].".php");

include('model/input_generator.php');
include('model/edit_form_for_table.php');

$GLOBALS['head_code'] .= add_edit_form_head($column_in_table);
$add_form = add_edit_form($column_in_table, $seo_columns, "", $GLOBALS['url_array'][2], $c7_mysql);

$input_data['add_form'] = $add_form;

$GLOBALS['admin_div'] .= c7_get_view ('admin', 'table_add', $input_data);
}

// Edit Form Generator
function c7_admin_edit()
{
$GLOBALS['mysql_obj']->work_table = $GLOBALS['url_array'][2];
$row_for_edit = $GLOBALS['mysql_obj']->select_all_by_id($GLOBALS['url_array'][4]);
include ("modules/".$GLOBALS['url_array'][1]."/admin/".$GLOBALS['url_array'][2].".php");

include('model/input_generator.php');
include('model/edit_form_for_table.php');

$GLOBALS['head_code'] .= add_edit_form_head($column_in_table);
$c7_admin_form = add_edit_form($column_in_table, $seo_columns, $row_for_edit, $GLOBALS['url_array'][2], $c7_mysql);;

$input_data['edit_form'] = $c7_admin_form;

$GLOBALS['admin_div'] .= c7_get_view ('admin', 'table_edit', $input_data);

}

// Update line in table
function c7_admin_update()
{//echo "<script>alert('UPDATE')</script>";
$GLOBALS['mysql_obj']->work_table = $GLOBALS['url_array'][2];
include ("modules/".$GLOBALS['url_array'][1]."/admin/".$GLOBALS['url_array'][2].".php");
include ('model/update_in_db.php');
}

// Insert new line in table
function c7_admin_insert()
{
//echo "<script>alert('INSERT')</script>";
$GLOBALS['mysql_obj']->work_table = $GLOBALS['url_array'][2];
include ("modules/".$GLOBALS['url_array'][1]."/admin/".$GLOBALS['url_array'][2].".php");
include ('model/add_to_db.php');
}

function c7_admin_del()
{
//echo "<script>alert('DELETE')</script>";
$GLOBALS['mysql_obj']->work_table = $GLOBALS['url_array'][2];
$GLOBALS['mysql_obj']->delete_from_table(intval($_GET['c7_admin_del']));
$GLOBALS['head_code'] .= "
    <script type=\"text/javascript\">
    <!--
    location.replace(\"".$GLOBALS['sitename'].$_GET['url_line']."\");
    //-->
    </script>
    <noscript>
    <meta http-equiv=\"refresh\" content=\"0; url=".$GLOBALS['sitename'].$_GET['url_line']."\">
    </noscript>
";
}
?>