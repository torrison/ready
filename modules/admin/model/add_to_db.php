<?php
  	// Generating query
    $i=1;
	while (isset($column_in_table[$i]['name'])&&($column_in_table[$i]['name'] != ""))
	{
	$amdt_add_fields .= $column_in_table[$i]['name'].", ";

	if ($column_in_table[$i]['input_type'] == "image")
	{        // Update File System!
    	require ("image_add_file.php");
		$amdt_add_fields_data .= "'".$_FILES[$column_in_table[$i]['name']]['name']."', ";
	}
	else $amdt_add_fields_data .= "'".$defend_post[$column_in_table[$i]['name']]."', ";
	$i++;
	}
    $amdt_add_fields = substr($amdt_add_fields, 0, strlen($amdt_add_fields)-2); // Add Fields For Add Data in Table
    $amdt_add_fields_data = substr($amdt_add_fields_data, 0, strlen($amdt_add_fields_data)-2); // Add Fields DATA For Add Data in Table

  		if ($seo_columns == true)
  		{ $seo_columns = ", title, h1, description, keywords, footer";
		  $seo_add_data = ",
		  '".C7_defend_post_fast ("title")."',
		  '".C7_defend_post_fast ("h1")."',
		  '".C7_defend_post_fast ("description")."',
		  '".C7_defend_post_fast ("keywords")."',
		  '".C7_defend_post_fast ("footer")."'
		  ";
	    }

	    if (access_columns == "yes")
	  	{
	    $access_columns = ", creator, create_time, user_read, user_write";

	    if ($defend_post['user_read'] == "") $defend_post['user_read'] = "[all]";
	    if ($defend_post['user_write'] == "") $defend_post['user_write'] = "[all]";

	    $access_add_data = ",
		'".$_SESSION['user_id']."',
	    '".date("Y-m-d H:i:s")."',
	    '".$defend_post['user_read']."',
		'".$defend_post['user_write']."'
	    ";
	  	}

    	$GLOBALS['mysql_obj']->add_to_table(
    	$amdt_add_fields.$seo_columns.$access_columns,
    	$amdt_add_fields_data.$seo_add_data.$access_add_data);
?>