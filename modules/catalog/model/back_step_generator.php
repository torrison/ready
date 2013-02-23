<?php
if ($debug_mode == true) echo "Include Catalog Model Back Step Generator<br />";

	  $main = "
		<a href=\"/\" title=\"Главная страница\">Главная</a>
		";
	  if ($view_page_id > 0)
	  {

        $row_p['parent_id'] = $page_row['parent_id'];
        while ($row_p['parent_id']>0)
        {
		$page_type = "catalog";
		$columns = "id, page_name, parent_id, url, haschild";
		$res_p = $GLOBALS['mysql_obj']->user_select_not_all_with_tail ($page_type, $columns, "where id = ".$row_p['parent_id']);
	    $row_p = mysql_fetch_array($res_p);

		if ($row_p['haschild'] == 1) $href_id = $row_p['id']."p";
   	  	else $href_id = $row_p['id'];

	    $par = " >> "."
	    <a href=\"/catalog/".$href_id."/".$row_p['url']."/\" title=\"".$row_p['page_name']."\">
		".$row_p['page_name']."
		</a>".$par;
	    }

		$now = $page_row['page_name'];


		$backstep_code = $main.$par." >> ".$now;
		}
	  elseif ($view_page_id == "all") $backstep_code = $main." >> Каталог";
	  else $backstep_code = "";
?>