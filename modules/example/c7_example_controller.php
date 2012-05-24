<?php
if ($GLOBALS['debug_mode'] == true) echo "Include Example Controller<br />";

include ('c7_example_model.php');

if ($GLOBALS['url_array'][0] == "example")
{c7_example_add_script();
$GLOBALS['center_div'] =  c7_get_view ('example', 'view');
}

$GLOBALS['admin_buttons'] .= c7_get_view ('example', 'admin_button');
?>