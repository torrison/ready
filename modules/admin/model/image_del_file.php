<?php
$access = true;
#echo "<script>alert('".$_POST['del_img_'.$column_in_table[$i]['name']]."111')</script>";
if ($access)
  {
  if (isset($_POST['del_img_'.$column_in_table[$i]['name']]))
    {
    if ($column_in_table[$i]['folder'] != "") $folder = $column_in_table[$i]['folder']."/";
    else $folder = "";
    unlink($_SERVER["DOCUMENT_ROOT"]."/pics/".$folder.$defend_post['img']);
    }
  }
?>