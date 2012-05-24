<?php
if ($GLOBALS['debug_mode'] == true) echo "Include People Controller<br />";

// Admin button
	ob_start();
	include ('admin/admin_button.php');
	$GLOBALS['admin_buttons'] .= ob_get_clean();

?>