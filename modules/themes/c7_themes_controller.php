<?php
if ($GLOBALS['debug_mode'] == true) echo "Include Themes Controller<br />";

include ('c7_themes_model.php');

if (isset($GLOBALS['theme'])) c7_themes_load();
else {$GLOBALS['theme'] = "default"; c7_themes_load();}

?>