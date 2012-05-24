<?php
function c7_main_page_add_script()
{
//$GLOBALS['footer_scripts'] .= "<script src=\"modules/main_page/js/main_page.js?1\"></script>";
}
function c7_main_page_show_me_main_div()
{ob_start();
$c7_main_page_list_res = $GLOBALS['mysql_obj']->free_sql("SELECT img, page_name, short_text, id, url, haschild from catalog where invisible < 1 and inmain = 1 order by priority,id ");
	while ($c7_main_page_list_row = mysql_fetch_array($c7_main_page_list_res))
	{	if ($c7_main_page_list_row['haschild'] == 1) $c7_main_page_list_row['id'] .= "p";
	include ('view/main_page.php');
	}
$GLOBALS['center_div'] = ob_get_clean();
}
?>