<?php
if ($GLOBALS['debug_mode'] == true) echo "Include Planer Controller<br />";

// Planer window
	if ($_SESSION['user_role'] > 0)
	{	include ('c7_planer_model.php');	c7_planer_get_plan_window();
	}

// Admin button
	$GLOBALS['admin_buttons'] .= c7_get_view('planer','admin_button');

?>