<?php
if ($debug_mode == true) echo "Load Sitemap Module<br />";

		$center_page_code .= "Карта сайта:<br /><br />";
		$res = $mysql_processor->user_select_not_all_with_tail("catalog", "id, page_name, url, haschild", "");
		while ($row=mysql_fetch_array($res)) {
		if ($row['haschild'] == 1) $p = "p";
		else $p = "";
		$center_page_code .= "<a href=\"catalog/".$row['id'].$p."/".$row['url']."\">".$row['page_name']."</a><br />";
		}

?>