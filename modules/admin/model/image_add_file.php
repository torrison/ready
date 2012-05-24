<?php
	#DEBUG echo "<script>alert('Upload Start')</script>";
if (isset($_FILES[$column_in_table[$i]['name']]['name']))
   	{
    if ($column_in_table[$i]['folder'] != "") $folder = $column_in_table[$i]['folder']."/";
    else $folder = "";
	#echo "<script>alert('".$_FILES[$column_in_table[$i]['name']]['name']." ready to Upload')</script>";
   	$_FILES[$column_in_table[$i]['name']]['name'] = C7_fs_file_upload ($column_in_table[$i]['name'], "/pics/".$folder);
   	}

if (isset($_FILES['mfiles']['name'][0]))
   	{
$_FILES['tmp']['name'] = $_FILES['mfiles']['name'][0];
$_FILES['tmp']['tmp_name'] = $_FILES['mfiles']['tmp_name'][0];
$_FILES['mfiles']['name'][0] = C7_fs_file_upload ("tmp", "/pics/mfiles/");
   	}

?>