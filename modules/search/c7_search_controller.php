<?php
if ($GLOBALS['debug_mode'] == true) echo "Include Search Controller<br />";

include ('c7_search_model.php');
//c7_search_add_script();

if ($GLOBALS['url_array'][0] == "search")
{$_GET['c7_s'] = C7_defend_filter ("2", $_GET['c7_s']);
c7_search_now();
}

ob_start();
include ("view/search_form.php");
$GLOBALS['search_form'] = ob_get_clean();
?>