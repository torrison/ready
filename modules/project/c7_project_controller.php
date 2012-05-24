<?php
if ($GLOBALS['debug_mode'] == true) echo "Include Project Controller<br />";

include ('c7_project_model.php');



if ($GLOBALS['url_array'][0] == "project")
{c7_project_add_script();
c7_project_show_me_main_div();
}

// Admin button
	ob_start();
	include ('admin/admin_button.php');
	$GLOBALS['admin_buttons'] .= ob_get_clean();
?>