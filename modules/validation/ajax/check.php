<?php
if (isset($GLOBALS['url_array'][3]))
{    $vtype = $GLOBALS['url_array'][3];
    //echo 'modules/validation/ajax/view/'.$vtype.'.php'; 4 Debug
    if (is_file('modules/validation/ajax/view/'.$vtype.'.php'))
    {
	  ob_start();
  	  include ('view/'.$vtype.'.php');
 	  $output['html'] = ob_get_clean();
  	  echo json_encode($output);
	}
	else echo "Sorry, it doesn't works!";
}
else
{
  ob_start();
  include ('view/test.php');
  $output['html'] = ob_get_clean();
  echo json_encode($output);
}
?>