<?php
function c7_incubator_show_the_example($example_name)
{
    if (is_dir('modules/incubator/model/'.$example_name))
    {
	ob_start();
	include ('model/'.$example_name.'/index.php');
	$GLOBALS['center_div'] .= ob_get_clean();
	}
	else $GLOBALS['center_div'] .= "Sorry, it doesn't works!";
}
function c7_incubator_show_all()
{
  while ($row=mysql_fetch_array($incubator_list_res))
  {
  }

}
?>