<?php
function c7_project_add_script()
{
$GLOBALS['footer_scripts'] .= "<script src=\"modules/project/js/project.js?1\"></script>";
}

function c7_project_get_tree_from_res ($res)
  {

    $data .= "\n<ul id=\"project_tree\">\n";

    $tree_i=0;    #MySQL array counter

    while ($row=mysql_fetch_array($res))
 	{
		$catalog_tree[$tree_i]['id'] = $row['id'];
		$catalog_tree[$tree_i]['parent_id'] = $row['parent_id'];
		$catalog_tree[$tree_i]['stage_name'] = $row['stage_name'];
		$catalog_tree[$tree_i]['haschild'] = $row['haschild'];
		$catalog_tree[$tree_i]['invisible'] = $row['invisible'];
		$catalog_tree[$tree_i]['student_cost'] = $row['student_cost'];
		$catalog_tree[$tree_i]['student_workdays'] = $row['student_workdays'];
		$catalog_tree[$tree_i]['amateur_cost'] = $row['amateur_cost'];
		$catalog_tree[$tree_i]['amateur_workdays'] = $row['amateur_workdays'];
		$catalog_tree[$tree_i]['pro_cost'] = $row['pro_cost'];
		$catalog_tree[$tree_i]['pro_workdays'] = $row['pro_workdays'];
		$tree_i++;
		#Add All MySQL Data to Array
    }
    $i=0;                      // Reset $i
    #$limit = 0;			   // Defend counter for Debuging
	$parent_step = 0;          // Start in parent_id = 0
    $parent[$parent_step] = 0; // Parent to Child Step Array
    $now_output = array();     // Array for ouput printing data
    while ($i <= $tree_i)
    {
       #$data .= "{".$catalog_tree[$i]['parent_id']."<< = >>".$parent[$parent_step]."}"; #Debuging echo
       $now_output_signal = false; #reset now output signal

	 if ($catalog_tree[$i]['invisible'] == 1)
	 {
     array_push($now_output, $catalog_tree[$i]['id']);
     $i++;
	 }
	 else
	 {

	   for ($j=0;$j<count($now_output);$j++)
       {
        if ($catalog_tree[$i]['id'] == $now_output[$j]) {$now_output_signal = true; break;} #Check for ouput printing data
       }

      if (($catalog_tree[$i]['parent_id'] == $parent[$parent_step])&&($catalog_tree[$i]['id'] > 0)) #if id has parent_id in current parent level (start in 0)
      {
         if ($catalog_tree[$i]['haschild'] == 1) #For HasChild Line
         {
       	 if ($now_output_signal == false) #if id has not printed
        	{
				$parent_step++;
	        	$parent[$parent_step] = $catalog_tree[$i]['id'];

			if ($catalog_tree[$i]['haschild'] == 1)
				{
				$catalog_tree[$i]['id'] = $catalog_tree[$i]['id']."p";
				}
			$data .= "<li class=\"closed\">".$data_prefix."<a id=\"stage_id_".$catalog_tree[$i]['id']."\" style=\"cursor:pointer;\" title=\"".$catalog_tree[$i]['stage_name']."\">".$catalog_tree[$i]['stage_name']."</a><ul>\n";

			array_push($now_output, $catalog_tree[$i]['id']);
			$i=0; #parent step+1, new parent has added, if not empty, data printed, prefix+1 "->" , array push printed id!. Start again.
		  	}
         }
         else
         {
         	if ($now_output_signal == false) #if id has not printed
        	{
         	$data .= "<li>".$data_prefix."<a id=\"stage_id_".$catalog_tree[$i]['id']."\" onclick=\"alert('".$catalog_tree[$i]['content']."')\" style=\"cursor:pointer;\" title=\"".$catalog_tree[$i]['stage_name']."\">".$catalog_tree[$i]['stage_name']."</a> [Ст:".$catalog_tree[$i]['student_cost']." грн. ".$catalog_tree[$i]['student_workdays']."дн.]<input id=\"stage_std_".$catalog_tree[$i]['id']."\" type=\"checkbox\" value=\"1\">[Ам:".$catalog_tree[$i]['amateur_cost']." грн. ".$catalog_tree[$i]['amateur_workdays']."дн.]<input id=\"stage_amt_".$catalog_tree[$i]['id']."\" type=\"checkbox\" value=\"1\">[Пр:".$catalog_tree[$i]['pro_cost']." грн. ".$catalog_tree[$i]['pro_workdays']."дн.] <input id=\"stage_pro_".$catalog_tree[$i]['id']."\" type=\"checkbox\" value=\"1\">\n</li>";
	     	array_push($now_output, $catalog_tree[$i]['id']);
	     	}
         }
      }
       if ($i == $tree_i) {$i=0;$parent_step--; $prefix--; $data .= "</ul></li>";} #step left in prefix way in the end of data
       $i++;
       #$limit++; if ($limit == 260) $i = $tree_i+5; # Defend system for ulimited while
       if (!isset($parent[$parent_step])) $i = $tree_i+5; #The End Of While, Bacause Step = -1
     }
    }

    $data = substr($data, 0, strlen($data)-10);
	$data .= "</ul>\n";
    return $data;

  }

function c7_project_gen_tree()
{$data .= "Интернет - Проект:<br />";
$menu_res = $GLOBALS['mysql_obj']->user_select_not_all_with_tail("project", "id, stage_name, parent_id, haschild, invisible, content, student_cost, student_workdays, amateur_cost, amateur_workdays, pro_cost, pro_workdays", "ORDER BY parent_id, priority, stage_name ASC");
return c7_project_get_tree_from_res ($menu_res);
}

function c7_project_show_me_main_div()
{ob_start();
include ('view/project_tree.php');
$GLOBALS['center_div'] = ob_get_clean();
$GLOBALS['center_div'] .= c7_project_gen_tree();
}
?>