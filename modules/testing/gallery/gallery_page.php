<?php
$center_page_code .= "<a href=\"/\" title=\"Главная страница\">
    Главная</a> >> Галерея<br /><br />";

$center_page_code .= "

<div id=\"gallery\">

";

$directory = 'pics/gallery';

$allowed_types=array('jpg','jpeg','gif','png');
$file_parts=array();
$ext='';
$title='';
$i=0;

$dir_handle = @opendir($directory) or die("There is an error with your image directory!");

while ($file = readdir($dir_handle))
{
	if($file=='.' || $file == '..') continue;

	$file_parts = explode('.',$file);
	$ext = strtolower(array_pop($file_parts));

	$title = implode('.',$file_parts);
	$title = htmlspecialchars($title);

	$nomargin='';

	if(in_array($ext,$allowed_types))
	{
		if(($i+1)%4==0) $nomargin='nomargin';

		$center_page_code .= '
		<div class="pic '.$nomargin.'" style="background:url('.$directory.'/'.$file.') no-repeat 50% 50%;">
		<a href="'.$directory.'/'.$file.'" title="'.$title.'" target="_blank">'.$title.'</a>
		</div>';

		$i++;
	}
}

closedir($dir_handle);

$center_page_code .= "
<div style=\"clear:both;\"></div>
</div>
";

$head_page_code .=
"

<script type=\"text/javascript\" src=\"modules/gallery/script/lightbox/js/jquery.lightbox-0.5.pack.js\"></script>
<script type=\"text/javascript\" src=\"modules/gallery/script/script.js\"></script>
<link rel=\"stylesheet\" type=\"text/css\" href=\"modules/gallery/script/lightbox/css/jquery.lightbox-0.5.css\" />
<link rel=\"stylesheet\" type=\"text/css\" href=\"modules/gallery/script/demo.css\" />
";

?>