<?php
    // Generating query
    $i=1;
    while (isset($column_in_table[$i]['name'])&&($column_in_table[$i]['name'] != ""))
	{
		if ($column_in_table[$i]['input_type'] == "image")
  		{
	  		// Update File System!
    		if (isset($_POST['del_img_'.$column_in_table[$i]['name']]))
	  		{
	  			require ("image_del_file.php");
	  			$amdt_edit_fields_data .= $column_in_table[$i]['name']." = '', ";
	  		}
	  		else require ("image_add_file.php");

	  		if (isset($_FILES[$column_in_table[$i]['name']]['name'])) $amdt_edit_fields_data .= $column_in_table[$i]['name']." = '".$_FILES[$column_in_table[$i]['name']]['name']."', ";

		}
		elseif ($column_in_table[$i]['input_type'] == "mfiles")
  		{
	  		#echo "mfiles edit ON";
	  		#Make Array [][][]
	  		if (isset($_FILES[$column_in_table[$i]['name']]['name'][0])) $amdt_edit_fields_data .= $column_in_table[$i]['name']." = '".$_FILES[$column_in_table[$i]['name']]['name'][0]."', ";
	  		if (isset($del_img_array)) echo "Delete all in array ".$del_img_array;
		}
		else $amdt_edit_fields_data .= $column_in_table[$i]['name']." = '".$defend_post[$column_in_table[$i]['name']]."', ";
	$i++;
	}
	$amdt_edit_fields_data = substr($amdt_edit_fields_data, 0, strlen($amdt_edit_fields_data)-2); // Edit Fields DATA For Edit Data in Table

  	if ($seo_columns == true)
  		{
  		$seo_update_data = ",
  		title= '".C7_defend_post_fast ("title")."',
  		h1 = '".C7_defend_post_fast ("h1")."',
  		description = '".C7_defend_post_fast ("description")."',
  		keywords = '".C7_defend_post_fast ("keywords")."',
  		footer = '".C7_defend_post_fast ("footer")."'
  		";
 	 	}

  	if (access_columns == "yes") // ACCESS
  		{
  		$access_data = ",
  		updator = '".$_SESSION['user_id']."',
  		update_time = '".date("Y-m-d H:i:s")."'";
  		if ($user_admin_ok == true)
  			{
  			$access_data .= ",
  			user_read = '".$defend_post['user_read']."',
  			user_write = '".$defend_post['user_write']."'
  			";
    		}
  		}

  		//include ('chat.php');

    $GLOBALS['mysql_obj']->update_table($amdt_edit_fields_data.$seo_update_data.$access_data, $GLOBALS['url_array'][4]);
?>