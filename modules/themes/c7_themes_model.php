<?php
function c7_themes_load()
{
//-------------------------OUTPUT ECHO VIEW INFO--------------------------------

	if ($GLOBALS['url_array'][0] == "admin")
	{	require ("modules/themes/".$GLOBALS['theme']."/main_template.php");
	}    else
    {
	ob_start();
	require ("modules/themes/".$GLOBALS['theme']."/head.php");
	$GLOBALS['head_code'] .= ob_get_clean();
	ob_start();
	require ("modules/themes/".$GLOBALS['theme']."/body.php");
	$GLOBALS['body_code'] .= ob_get_clean();
	require ("modules/themes/".$GLOBALS['theme']."/main_template.php");
	}
//------------------------------------------------------------------------------
}
?>