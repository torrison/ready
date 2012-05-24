<?php
if ($debug_mode == true) echo "Include C7 Catalog Model<br />";

function c7_catalog_add_script()
{
$GLOBALS['footer_scripts'] .= "<script src=\"modules/example/js/c7_catalog.js?1\"></script>";

$GLOBALS['head_code'] .= "<link rel=\"stylesheet\" href=\"modules/catalog/css/jquery.treeview.css\" />

<script src=\"modules/catalog/js/lib/jquery.cookie.js\" type=\"text/javascript\"></script>
<script src=\"modules/catalog/js/jquery.treeview.js\" type=\"text/javascript\"></script>

<script type=\"text/javascript\">
		$(function() {
			$(\"#tree_menu\").treeview({
				collapsed: false,
				animated: \"medium\",
				persist: \"location\"
			});
		})
</script>

";
}

function c7_catalog_gen_catalog_menu()
{
$data .= "Каталог:<br />";
$menu_res = $GLOBALS['mysql_obj']->user_select_not_all_with_tail("catalog", "id, page_name, url, parent_id, haschild, invisible", "ORDER BY parent_id, priority, page_name ASC");
$data .= c7_catalog_get_tree_from_res ($menu_res);

return $data;
}

function c7_catalog_get_tree_from_res ($res)
  {

    $data .= "\n<ul id=\"tree_menu\">\n";

    $tree_i=0;    #MySQL array counter

    while ($row=mysql_fetch_array($res))
 	{
		$catalog_tree[$tree_i]['id'] = $row['id'];
		$catalog_tree[$tree_i]['parent_id'] = $row['parent_id'];
		$catalog_tree[$tree_i]['page_name'] = $row['page_name'];
		$catalog_tree[$tree_i]['url'] = $row['url'];
		$catalog_tree[$tree_i]['haschild'] = $row['haschild'];
		$catalog_tree[$tree_i]['invisible'] = $row['invisible'];
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
			$data .= "<li class=\"closed\">".$data_prefix."<a href=\"catalog/".$catalog_tree[$i]['id']."/".$catalog_tree[$i]['url']."/\" title=\"".$catalog_tree[$i]['page_name']."\">".$catalog_tree[$i]['page_name']."</a><ul>\n";

			array_push($now_output, $catalog_tree[$i]['id']);
			$i=0; #parent step+1, new parent has added, if not empty, data printed, prefix+1 "->" , array push printed id!. Start again.
		  	}
         }
         else
         {
         	if ($now_output_signal == false) #if id has not printed
        	{
         	$data .= "<li>".$data_prefix."<a href=\"catalog/".$catalog_tree[$i]['id']."/".$catalog_tree[$i]['url']."/\" title=\"".$catalog_tree[$i]['page_name']."\">".$catalog_tree[$i]['page_name']."</a>\n</li>";
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

function c7_catalog_get_tree_from_res_select ($res, $select_name, $select_id)
  {

    $data .= "<select id=\"".$select_name."\" name=\"".$select_name."\">";
    $data .= "<option value=\"0\">Главная</option>";
    $tree_i=0;    #MySQL array counter
    while ($row=mysql_fetch_array($res))
 	{
		$catalog_tree[$tree_i]['id'] = $row['id'];
		$catalog_tree[$tree_i]['parent_id'] = $row['parent_id'];
		$catalog_tree[$tree_i]['page_name'] = $row['page_name'];
		$catalog_tree[$tree_i]['url'] = $row['url'];
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
       if ($catalog_tree[$i]['parent_id'] == $parent[$parent_step]) #if id has parent_id in current parent level (start in 0)
       {
         for ($j=0;$j<count($now_output);$j++)
         {
           if ($catalog_tree[$i]['id'] == $now_output[$j]) {$now_output_signal = true; break;} #Check for ouput printing data
         }
       	 if (($now_output_signal == false)&&($catalog_tree[$i]['id'] > 0)) #if id has not printed
        	{
        	$parent_step++;
        	$parent[$parent_step] = $catalog_tree[$i]['id'];
        	if ($catalog_tree[$i]['id'] != "")
            if ($catalog_tree[$i]['id'] == $select_id) $select=" SELECTED";
			$data .= "<option value=\"".$catalog_tree[$i]['id']."\"".$select.">".$data_prefix.$catalog_tree[$i]['page_name']."</option>";
            $select="";
			$data_prefix .= "->";
			array_push($now_output, $catalog_tree[$i]['id']);
			$i=0; #parent step+1, new parent has added, if not empty, data printed, prefix+1 "->" , array push printed id!. Start again.
		  	}
       }
       if ($i == $tree_i) {$i=0;$parent_step--; $data_prefix = substr($data_prefix, 0,strlen($data_prefix)-2);} #step left in prefix way in the end of data
       $i++;
       #$limit++; if ($limit == 260) $i = $tree_i+5; # Defend system for ulimited while
       if (!isset($parent[$parent_step])) $i = $tree_i+5; #The End Of While, Bacause Step = -1
    }
    $data .= "</select>";
    return $data;

  }

function c7_catalog_show_me_main_div()
{	if ($GLOBALS['url_array'][1] > 0)
	{

	$view_page_id = $GLOBALS['url_array'][1];

	//Landing Page
	if (($view_page_id > 0)&&($view_page_id != "all")&&(!preg_match("/p/i",$view_page_id)))
  		{  		// Get Page Data from DB
		$page_row = $GLOBALS['mysql_obj']->user_select_not_all_by_id("catalog", "*", $view_page_id);
		require ('model/back_step_generator.php');
		// Add Head Tags
		$GLOBALS['head_code'] .= $page_row['head_tags'];

		$input_data ['page_row'] = $page_row;
		$input_data ['backstep_code'] = $backstep_code;
		if ($page_row['social'] > 0) $input_data ['social'] .= c7_social_show_now();
        // Comments, Rating, Views must be here

		$GLOBALS['center_div'] .= c7_get_view ('catalog', 'land_page', $input_data);

		if ($page_row['gallery'] > 0) $GLOBALS['center_div'] .= c7_gallery_show_now();
		// Edit Button For Admin
		$input_data ['view_page_id']= $view_page_id;
		if ($_SESSION['user_role'] > 0) $GLOBALS['center_div'] .= c7_get_view ('catalog', 'page_edit_button', $input_data);
		}
  	//Parent with Child Page
  	elseif (($view_page_id == "all")||(preg_match("/p/i",$view_page_id)))
  		{  		$view_page_id = substr ($view_page_id, 0, strlen($view_page_id)-1); // Del 'p' from id
  		$page_row = $GLOBALS['mysql_obj']->user_select_not_all_by_id("catalog", "*", $view_page_id);
  		require ('model/back_step_generator.php');
  		include ('model/child_list.php');

		$input_data ['page_row'] = $page_row;
		$input_data ['backstep_code'] = $backstep_code;
		if ($page_row['social'] > 0) $input_data ['social'] .= c7_social_show_now();
  	    $input_data ['catalog_code'] = $catalog_code;
  	    // Comments, Rating, Views must be here

		$GLOBALS['center_div'] .= c7_get_view ('catalog', 'catalog_page', $input_data);

		// Edit Button For Admin
		$input_data ['view_page_id']= $view_page_id;
		if ($_SESSION['user_role'] > 0) $GLOBALS['center_div'] .= c7_get_view ('catalog', 'page_edit_button', $input_data);
		}
	}
}

?>