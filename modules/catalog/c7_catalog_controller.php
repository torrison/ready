<?php
if ($GLOBALS['debug_mode'] == true) echo "Include Example Controller<br />";

include ('c7_catalog_model.php');
c7_catalog_add_script();
$GLOBALS['c7_catalog_menu'] = c7_catalog_gen_catalog_menu();

if ($GLOBALS['url_array'][0] == "catalog")
{c7_catalog_show_me_main_div();
}

$GLOBALS['admin_buttons'] .= c7_get_view ('catalog', 'admin_button');

?>