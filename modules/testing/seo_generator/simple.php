<?php
if ($debug_mode == true) echo "Prepare SEO Generator Module<br />";

if (isset($page_row['page_name']))
{
 if (isset($page_row['title'])&&($page_row['title'] != "")) $seo_title = $page_row['title'];
 else $seo_title = "Комплексные интернет решения Киев Украина";

 if (isset($page_row['h1'])&&($page_row['h1'] != "")) $seo_h1 = $page_row['h1'];
 else $seo_h1 = "Complex интернет система";

 if (isset($page_row['description'])&&($page_row['description'] != "")) $seo_description = $page_row['description'];
 else $seo_description = "Более подробнее об этом и о системе Complex 5 на нашем сайте или по тел. (093) 155-29-70";

 if (isset($page_row['keywords'])&&($page_row['keywords'] != "")) $seo_keywords = $page_row['keywords'];
 else $seo_keywords = "киев, украина, интернет, сайт, сайты, заказать";

 if (isset($page_row['footer'])&&($page_row['footer'] != "")) $seo_footer = $page_row['footer'];
 else $seo_footer = "Интернет система Complex, заказать сайт, эффективный веб сайт.";

 $seo_title = $page_row['page_name'].". ".$seo_title;
 $seo_h1 = $page_row['page_name'].". ".$seo_h1;
 $seo_description = $page_row['page_name'].". ".$seo_description;
 $seo_keywords = $page_row['page_name'].", ".$seo_keywords;
 $seo_footer = $page_row['page_name'].". ".$seo_footer;
}
else
{
 $seo_title = $seo_title;
 $seo_h1 = $seo_h1;
 $seo_description = $seo_description;
 $seo_keywords = $seo_keywords;
 $seo_footer = $seo_footer;
}
?>