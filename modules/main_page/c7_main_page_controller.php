<?php
if ($GLOBALS['debug_mode'] == true) echo "Include Main Page Controller<br />";

include ('c7_main_page_model.php');
//c7_main_page_add_script();

if ($_GET['url_line'] == "")
{
c7_main_page_show_me_main_div();
}

// Admin button
//	ob_start();
//	include ('admin/admin_button.php');
//	$GLOBALS['admin_buttons'] .= ob_get_clean();
?>