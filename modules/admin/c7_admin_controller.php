<?php
if ($GLOBALS['debug_mode'] == true) echo "Include Example Controller<br />";

include ('c7_admin_model.php');

// Admin Page
if ($GLOBALS['url_array'][0] == "admin")
{
	// Input Data to DB
	if (isset($_POST['c7_admin_add'])) c7_admin_insert();
	if (isset($_GET['c7_admin_del'])) c7_admin_del();
	// Show DataTables

	if (isset($GLOBALS['url_array'][3]))
	{		if ($GLOBALS['url_array'][3] == "add")
		{		// Add Form		c7_admin_add();
		}
		if ($GLOBALS['url_array'][3] == "edit")
		{		// Update Data in DB		if (isset($_POST['c7_admin_edit'])) c7_admin_update();
		// Edit Form
		c7_admin_edit();
		}
	}
	elseif (isset($GLOBALS['url_array'][2])) c7_admin_module();
	else c7_admin_system();

	//Admin Template
	c7_admin_view();
}

if ($_SESSION['user_role'] > 0)	$GLOBALS['body_code'] .= c7_get_view ('admin', 'admin_button');

?>