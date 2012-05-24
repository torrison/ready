<?php
if ($debug_mode == true) echo "Prepare Edit Form for Table Fuction<br />";

// --------------------------------- Work With $column_in_table Massive START HEAD INFO---------------------------------
	function add_edit_form_head ($column_in_table)
	{		$i=1;
		while (isset($column_in_table[$i]['name'])&&($column_in_table[$i]['name'] != ""))
		{
		if ($column_in_table[$i]['input_type'] == "select_user") $head_data .= input_select_multi_head ($column_in_table[$i]['name']);
        if ($column_in_table[$i]['input_type'] == "date") $head_data .= input_date_head ($column_in_table[$i]['name']);
        if ($column_in_table[$i]['name'] == "content") $head_data .= file_get_contents("libs/js/tiny_mce/tiny_mce.php");
        if ($column_in_table[$i]['name'] == "mlinks") $head_data .= mlinks_head($column_in_table[$i]['name']);
        if ($column_in_table[$i]['name'] == "mfiles") $head_data .= mfiles_head($column_in_table[$i]['name']);
		$i++;
  		}
  		if (access_columns == "yes")
  		{  		$head_data .= input_select_multi_head ("user_read");
	    $head_data .= input_select_multi_head ("user_write");
  		}
		return $head_data;
 		}
	function add_edit_form ($column_in_table, $seo_columns, $row_from_base, $table_name, $mysql_processor){
   // --------------------------------- Work With $column_in_table Massive START---------------------------------
	$i=1;
	while (isset($column_in_table[$i]['name'])&&($column_in_table[$i]['name'] != ""))
		{
		$data .="
		";
        if ($column_in_table[$i]['input_type'] == "text") $data .= input_text($column_in_table[$i]['name'], $column_in_table[$i]['name'], "input", "350", $row_from_base[$column_in_table[$i]['name']]);
        if ($column_in_table[$i]['input_type'] == "password") $data .= input_password($column_in_table[$i]['name'], $column_in_table[$i]['name'], "input", "350", $row_from_base[$column_in_table[$i]['name']]);
		if ($column_in_table[$i]['input_type'] == "image") $data .= input_file_img($column_in_table[$i]['name'], $column_in_table[$i]['name'], "input", "350", $row_from_base[$column_in_table[$i]['name']], $row_from_base['img'], $column_in_table[$i]['img_folder']);
        if ($column_in_table[$i]['input_type'] == "textarea") $data .= input_textarea($column_in_table[$i]['name'], $column_in_table[$i]['name'], "input", "500", "200", $row_from_base[$column_in_table[$i]['name']]);
		if ($column_in_table[$i]['input_type'] == "checkbox") $data .= input_checkbox_on($column_in_table[$i]['name'], $column_in_table[$i]['name'], "input", $row_from_base[$column_in_table[$i]['name']]);
		if ($column_in_table[$i]['input_type'] == "mlinks") $data .= input_mlinks($column_in_table[$i]['name'], $column_in_table[$i]['name'], "input", "220", $row_from_base[$column_in_table[$i]['name']]);
		if ($column_in_table[$i]['input_type'] == "mfiles") $data .= input_mfiles($column_in_table[$i]['name'], $column_in_table[$i]['name'], "input", "230", $row_from_base[$column_in_table[$i]['name']]);
		if ($column_in_table[$i]['input_type'] == "date")
			{			$data .= input_date($column_in_table[$i]['name'], $column_in_table[$i]['name'], "input", $row_from_base[$column_in_table[$i]['name']]);
			}
		if ($column_in_table[$i]['input_type'] == "select") $data .= input_select($column_in_table[$i]['name'], $column_in_table[$i]['name'], "input", $row_from_base[$column_in_table[$i]['name']], $column_in_table[$i]['variants']);
		if ($column_in_table[$i]['input_type'] == "select_user") $data .= $mysql_processor->user_multi_select($column_in_table[$i]['name'], $column_in_table[$i]['name'], "input", $row_from_base[$column_in_table[$i]['name']]);
		if ($column_in_table[$i]['input_type'] == "select_from_table")
			{
			$data .= input_select_custom($column_in_table[$i]['name'], $column_in_table[$i]['name'], "input", $row_from_base[$column_in_table[$i]['name']], $column_in_table[$i]['table'], $column_in_table[$i]['field'], $column_in_table[$i]['rules']);
			}
		if ($column_in_table[$i]['input_type'] == "parent_select")
			{
            $menu_res = $GLOBALS['mysql_obj']->free_sql("SELECT id, page_name, parent_id FROM catalog ORDER BY parent_id, page_name ASC");
            $data .= c7_catalog_get_tree_from_res_select ($menu_res, $column_in_table[$i]['name'], $row_from_base[$column_in_table[$i]['name']]);
            }
  		if ($column_in_table[$i]['input_type'] == "parent_select_custom")
			{
            $menu_res = $GLOBALS['mysql_obj']->free_sql("SELECT id, ".$column_in_table[$i]['field'].", parent_id FROM ".$column_in_table[$i]['table']." ".$column_in_table[$i]['rules']);
            $data .= c7_input_get_tree_from_res_select ($menu_res, $column_in_table[$i]['name'], $row_from_base[$column_in_table[$i]['name']],$column_in_table[$i]['field']);
            }
		$data .=" - <b>".$column_in_table[$i]['fullname']."</b><br /><br />";
 		$i++;
 		}
    // --------------------------------- Work With $column_in_table Massive END----------------------------------

	// --------------------------------- ANSWER SYSTEM START--------------------------------------------------
		if ((chat == "yes")&&($_GET['amdt_edit']>0))
	    {
	  	  $data .= "
	  	  <br />
	  	  <b style=\"font-weight:bold;color:darkred;\">Обсуждение заказа:</b>
          <div style=\"border:1px solid silver; width:690px; height:200px;overflow-y: auto;\">
          ";
          $res = $mysql_processor->view_chat_info($GLOBALS['table'], intval ($_GET['amdt_edit']));
          while ($row=mysql_fetch_array($res)) {            $data .= "<b>".$row['fio']." (".$row['datetime']."):</b> ".$row['message']."<br />";          }
          $data .= "</div>
          <div style=\"font-weight:bold;color:darkred;\">
          Написать: <input name=\"chat_send\" type=\"text\" value=\"\" style=\"width:500px;\"> <input type=\"submit\" value=\"Отправить\">
          </div>
	      ";
	    }


    // --------------------------------- SEO Input Fields START--------------------------------------------------
    if ($seo_columns == true)
    	{	   $data .= "

	   ".input_text("title", "title", "input", "352", $row_from_base['title'])."
	   - <b>Title</b>
	   <br />

	   ".input_text("description", "description", "input", "352", $row_from_base['description'])."
	   - <b>Description</b>
	   <br />

	   ".input_text("keywords", "keywords", "input", "352", $row_from_base['keywords'])."
	   - <b>Keywords</b>
	   <br />

	   ".input_text("h1", "h1", "input", "352", $row_from_base['h1'])."
	   - <b>H1</b>
	   <br />

	   ".input_text("footer", "footer", "input", "352", $row_from_base['footer'])."
	   - <b>Footer</b>
	   <br />
	   ";
    	}
    // --------------------------------- SEO Input Fields END--------------------------------------------------



    // --------------------------------- Access Input Fields START----------------------------------------------
/*    if (access_columns == "yes")
       {
	   $data .= "
	   <br /><br /><br />
	   <table width=\"100%\">
	   <tr><td align=\"center\">
	   Create: <b>".$row_from_base['create_time']."</b>".input_text("creator", "creator", "input", "20", $row_from_base['creator'])."
       </td><td align=\"center\">
	   Update: <b>".$row_from_base['update_time']."</b>".input_text("updator", "updator", "input", "20", $row_from_base['updator'])."
	   </td></tr><tr><td align=\"center\">
	   Read_Users:
	   ".$mysql_processor->user_multi_select("user_read", "user_read", "input", $row_from_base['user_read'])."
	   </td><td align=\"center\">
	   Write_Users:
	   ".$mysql_processor->user_multi_select("user_write", "user_write", "input", $row_from_base['user_write'])."
	   </td></tr>
	   </table>
	   ";
       }
    // --------------------------------- Access Input Fields END--------------------------------------------------
*/
	return $data;
	}
?>