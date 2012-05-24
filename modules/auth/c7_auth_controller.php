<?php
if ($GLOBALS['debug_mode'] == true) echo "Include Auth Controller<br />";

include ('c7_auth_model.php');
c7_auth_add_script();

if ($_GET['auth_logout'] == '1') c7_auth_logout_reload();
if (isset($_POST['auth_login'])) c7_check_user();
if (isset($_GET['auth_logout'])) unset($_SESSION['user_role']);
if (isset($_POST['auth_reg_login'])) unset($_SESSION['user_role']);

if ($_SESSION['user_role'] > 0)	$GLOBALS['view_auth_login'] = c7_get_view ('auth', 'auth_for_user');
else $GLOBALS['view_auth_login'] = c7_get_view ('auth', 'auth_login');

$GLOBALS['admin_buttons'] .= c7_get_view ('auth', 'admin_button');

?>