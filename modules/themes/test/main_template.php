<?php header('Content-Type: text/html; charset=utf-8');?>
<!DOCTYPE html>
<html lang="ru">
<head>
<?php include ('libs/c7_page_reload.php');?>
<title><?php echo $GLOBALS['seo_title'];?></title>
<meta charset="utf-8">
<meta name="description" content="<?php echo $GLOBALS['seo_description'];?>">
<meta name="keywords" content="<?php echo $GLOBALS['seo_keywords'];?>">
<meta name="revisit" content="7 days">
<meta name="robots" content="index, follow">
<meta name="author" content="Torrison">
<meta name="Classification" Content="Customers" />
<meta name="Document-state" Content="Dynamic" />
<base href="<?php echo $GLOBALS['sitename'];?>" />
<link rel='shortcut icon' href='modules/themes/test/css/img/favicon.ico' type='image/x-icon' />
<link rel="stylesheet" href="modules/themes/test/css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="modules/themes/test/css/framework.css" type="text/css" media="all">
<link rel="stylesheet" href="modules/themes/test/css/style.css" type="text/css" media="all">
<link rel="stylesheet" type="text/css" href="modules/themes/test/css/jquery-ui/jquery-ui.css">
<script type="text/javascript" src="libs/js/jquery-1.6.js"></script>
<script type="text/javascript" src="libs/js/jquery-ui-1.8.16.custom.min.js"></script>
<!--[if lt IE 9]>
<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
<![endif]-->
<?php echo $GLOBALS['head_code'];?>
</head>
<body>
<?php echo $GLOBALS['body_code'];?>
<?php echo $GLOBALS['footer_scripts'];?>
</body>

</html>