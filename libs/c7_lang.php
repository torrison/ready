<?php
// Analyse $_GET['url_line'] and set language variables
$GLOBALS['lang'] = substr($_GET['url_line'], 0, 3);
// Next string commented because russian language is default
//if ($GLOBALS['lang'] == "ru/") {$GLOBALS['lang'] = "ru"; $_GET['url_line'] = substr ($_GET['url_line'], 3, strlen($_GET['url_line']));}
if ($GLOBALS['lang'] == "en/")
  {  $GLOBALS['lang'] = "en";
  $_GET['url_line'] = substr ($_GET['url_line'], 3, strlen($_GET['url_line']));
  $GLOBALS['lang_prefix'] = $GLOBALS['lang']."/";
  }
else
  {  $GLOBALS['lang'] = "ru";
  $GLOBALS['lang_prefix'] = "";
  }

// Basic function for language switch links
function lang_swich ($lang)
{  $on = " class=\"on\"";
  if ($GLOBALS['lang'] == $lang) $on = "";

  if ($lang == "ru") $lang_name = "РУС";
  else ($lang == "en") $lang_name = "ENG";

  $data = "<a href=\"/".$GLOBALS['lang_prefix'].$_GET['url_line']."\"".$on.">".$lang_name."</a>";
  return $data;
}

?>