<?php
#if (preg_match("/gallery\//i",$_GET['url_line']))
#    {
#    $page_type="gallery";
#    $input_get_amdt_table = "c5_gallery";
#    $view_page_id = str_replace ("gallery/", "", $_GET['url_line']);
#    $view_page_id = substr($view_page_id, 0, strpos($view_page_id, "/"));
#    }
?>