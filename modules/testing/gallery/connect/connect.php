<?php

$center_page_code .= "
<div id=\"gallery\">
";
#$center_page_code .= "<br /> Фотографии: [".$view_page_id."]";

$res_gallery = $mysql_processor->user_select_not_all_with_tail ("gallery", "id, img, name", " WHERE (connect_type = 1 AND connect_id = ".$view_page_id.") ORDER BY priority ASC");

while ($row_gallery=mysql_fetch_array($res_gallery))
	{
	$center_page_code .= "
		<div class=\"pic\" style=\"background:url(pics/gallery/".$row_gallery['img'].") no-repeat 50% 50%;\">
		<a href=\"pics/gallery/".$row_gallery['img']."\" title=\"".$row_gallery['name']."\" target=\"_blank\">".$row_gallery['name']."</a>
		</div>
	";
	}

$center_page_code .= "
</div>
";


#---------HEAD----------

$head_page_code .=
"

<script type=\"text/javascript\" src=\"modules/gallery/script/lightbox/js/jquery.lightbox-0.5.pack.js\"></script>
<script type=\"text/javascript\" src=\"modules/gallery/script/script.js\"></script>
<link rel=\"stylesheet\" type=\"text/css\" href=\"modules/gallery/script/lightbox/css/jquery.lightbox-0.5.css\" />
<link rel=\"stylesheet\" type=\"text/css\" href=\"modules/gallery/script/demo.css\" />
";



?>