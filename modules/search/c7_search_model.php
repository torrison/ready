<?php
function c7_search_add_script()
{
$GLOBALS['footer_scripts'] .= "<script src=\"modules/example/js/example.js?1\"></script>";
}

function c7_search_now()
{ob_start();
$c7_main_page_list_res = $GLOBALS['mysql_obj']->free_sql("SELECT img, page_name, short_text, id, url from catalog where page_name like '%".$_GET['c7_s']."%'order by priority,id");;
	while ($c7_main_page_list_row = mysql_fetch_array($c7_main_page_list_res))
	{
	include ('modules/main_page/view/main_page.php');
	$c7_s_ok = true;
	}
$GLOBALS['center_div'] = ob_get_clean();
if ($c7_s_ok != true) $GLOBALS['center_div'] = "<b>По данному запросу не найдено информации...</b>";
}
?>