<?php
if ($debug_mode == true) echo "Prepare Sitemap Module<br />";

$main_social = file_get_contents('modules/social/main_social.php');
$landing_social = file_get_contents('modules/social/landing_social.php');
#$head_page_code .= file_get_contents('modules/social/socail_script.php');
include ('modules/social/facebook_comm.php');
?>