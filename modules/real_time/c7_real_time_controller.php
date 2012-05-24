<?php
if ($GLOBALS['debug_mode'] == true) echo "Include real_time Controller<br />";

include ('c7_real_time_model.php');
c7_real_time_add_script();
	ob_start();
	include ('view/view.php');
	$GLOBALS['body_code'] = ob_get_clean();

	if ($GLOBALS['url_array'][0] == "real_time")
	{
	if ($GLOBALS['url_array'][1] == "admin")
	c7_real_time_show_me_admin_div();
	else
	c7_real_time_show_me_main_div();
	}
// Admin button
	ob_start();
	include ('admin/admin_button.php');
	$GLOBALS['admin_buttons'] .= ob_get_clean();
?>