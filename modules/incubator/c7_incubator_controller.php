<?php
if ($GLOBALS['debug_mode'] == true) echo "Include Incubator Controller<br />";

include ('c7_incubator_model.php');

if ($GLOBALS['url_array'][0] == "incubator")
if (isset($GLOBALS['url_array'][1])&&($GLOBALS['url_array'][1] != ""))
c7_incubator_show_the_example(C7_defend_filter ("4", $GLOBALS['url_array'][1]));
else c7_incubator_show_all();

// Admin button
	ob_start();
	include ('admin/admin_button.php');
	$GLOBALS['admin_buttons'] .= ob_get_clean();
?>