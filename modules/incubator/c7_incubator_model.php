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
{  $incubator_list_res = $GLOBALS['mysql_obj']->user_select_not_all_with_tail("incubator", "id, page_name, url, parent_id, haschild, invisible", "ORDER BY parent_id, priority, page_name ASC");
  while ($row=mysql_fetch_array($incubator_list_res))
  {  $GLOBALS['center_div'] .= $row['id'].": ".$row['page_name']." -> <a href=\"incubator/".$row['url']."\" title=\"".$row['page_name']."\">link &gt;&gt;</a>"."<br /><br />";
  }

}
?>