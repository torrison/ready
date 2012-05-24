<?php
if (preg_match("/sitemap\//i",$_GET['url_line']))
    {
    $page_type="sitemap";
    }
if (preg_match("/xml_sitemap\//i",$_GET['url_line']))
	{
    $page_type="xml_sitemap";
	}
?>