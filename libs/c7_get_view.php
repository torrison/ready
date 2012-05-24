<?php
function c7_get_view($module, $view, $input_data = array(), $folder = "" , $type="ob") // for $folder "/" in end is important!
{	if ($type == "ob")
	{    ob_start();
	include ('/modules/'.$module.'/view/'.$folder.$view.'.php');
	return ob_get_clean();
	}
	elseif ($type == "include")
	{    include ('/modules/'.$module.'/view/'.$folder.$view.'.php');
    return $output_data;
	}
	else return false;


}
?>