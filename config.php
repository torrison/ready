<?php
if ($GLOBALS['debug_mode'] == true) echo "Include Config File<br />Define data for MySQL <br />";

 // C7 main variables
 $GLOBALS['mysql_hostname'] = "localhost";
 $GLOBALS['mysql_username'] = "root";
 $GLOBALS['mysql_password'] = "";
 $GLOBALS['mysql_dbname'] = "c7";
 $GLOBALS['pma_link'] = "http://localhost/Tools/phpMyAdmin/";
 $GLOBALS['webftp_link'] = "http://localhost/Tools/phpMyAdmin/";
 $GLOBALS['sitename'] = "http://".$_SERVER['HTTP_HOST']."/";// use slash in end of string http://www.site.com/ - for example.

 //View Themes
 $GLOBALS['theme'] = "test";

 // Default SEO Data
 $GLOBALS['seo_title'] = "Ou! 7 - Logic Structure and Simple Modules System";
 $GLOBALS['seo_h1'] = "Complex 7 - Best Site Platform for today.";
 $GLOBALS['seo_description'] = "Complex 7 - This system must change the world";
 $GLOBALS['seo_keywords'] = "Complex 7, cms, framework, site system, web site";
 $GLOBALS['seo_footer'] = "Complex 7 - Simple, Functionally, Defendly and Fast.";
?>