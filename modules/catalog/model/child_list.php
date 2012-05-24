<?php
if ($debug_mode == true) echo "Include C7 Catalog Model Child List<br />";

// For parenthas catalog pages

    $res = $GLOBALS['mysql_obj']->user_select_not_all_with_tail("catalog", "id, url, page_name, short_text, content, img, haschild, invisible", " WHERE parent_id = ".$view_page_id." ORDER BY priority,parent_id, page_name ASC");

    $i3=0;
    while ($row=mysql_fetch_array($res)) {

      if ($row['haschild'] == 1) $href = $page_type."/".$row['id']."p/".$row['url']; // For HasChild Objects
      else $href = $page_type."/".$row['id']."/".$row['url']; // For Landing Objects

 	  if ($row['short_text'] == "") $row['short_text'] = substr ($row['content'], 0, 201); // If Not Short Text, We use content 201 bytes

   	  if ($row['haschild'] == 1) $href_id = $row['id']."p";
   	  else $href_id = $row['id'];

	  if ($row['invisible'] != 1)
	  {
      $input_data ['href_id'] = $href_id;
      $input_data ['childs_row'] = $row;

      $catalog_code .= c7_get_view ('catalog', 'child_list', $input_data);
	  $i3++;
	  if ($i3 == 3)
	  	{
	  	$i3 = 0;
	  	$catalog_code .= "
	  	<div style=\"clear:both;\"></div>
	  	";
	  	}
	  }
	}
?>