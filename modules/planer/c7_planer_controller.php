<?php
if ($GLOBALS['debug_mode'] == true) echo "Include Planer Controller<br />";

// Planer window
	if ($_SESSION['user_role'] > 0)
	{
	}

// Admin button
	$GLOBALS['admin_buttons'] .= c7_get_view('planer','admin_button');

?>