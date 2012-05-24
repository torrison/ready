<?php header('Content-type: application/xml; charset="utf-8"',true);echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

   <url>

      <loc><?php echo $config_sitename;?></loc>

      <priority>0.8</priority>

   </url>

   <url>

      <loc><?php echo $config_sitename.$cat_menu_url;?></loc>

      <priority>0.7</priority>

   </url>

<?php
		$res = $mysql_processor->user_select_not_all_with_tail("catalog", "id, page_name, url, haschild", "");
		while ($row=mysql_fetch_array($res)) {
		if ($row['haschild'] == 1) $p = "p";
		else $p = "";
?>

   <url>

      <loc><?php echo $config_sitename."catalog/".$row['id'].$p."/".$row['url']."/";?></loc>

      <priority>0.6</priority>

   </url>

<?php
		}
?>

</urlset>