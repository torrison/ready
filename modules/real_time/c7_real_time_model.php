<?php
function c7_real_time_add_script()
{
$GLOBALS['footer_scripts'] .= "<script src=\"modules/real_time/js/real_time.js?1\"></script>";
}

function c7_real_time_show_me_admin_div()
{$GLOBALS['center_div'] .= "<b>Real-Time System Admin (Users OnLine):</b><br /><br /><div id=\"real_time_admin_div\"></div>";
}

function c7_real_time_show_me_main_div()
{$GLOBALS['center_div'] .= "Real Time Main Page";
}
?>