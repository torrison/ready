<?php header('Content-Type: text/html; charset=utf-8');?>
<!DOCTYPE html>
<html lang="ru">
<head>
<?php

#--------------------------- For POST Data Redirect ----------------------------

if ($_SERVER['REQUEST_METHOD']=='POST')
{
    ?>
    <script type="text/javascript">
    <!--
    location.replace("<?php echo $_SERVER['REQUEST_URI']?>");
    //-->
    </script>
    <noscript>
    <meta http-equiv="refresh" content="0; url=index.php">
    </noscript>
    <?php
}
if ($_GET['auth_logout'] == '1')
{
    ?>
    <script type="text/javascript">
    <!--
    location.replace("<?php echo $GLOBALS['sitename'].$_GET['url_line'];?>");
    //-->
    </script>
    <noscript>
    <meta http-equiv="refresh" content="0; url=<?php echo $GLOBALS['sitename'].$_GET['url_line'];?>">
    </noscript>
    <?php
}

?><title><?php echo $GLOBALS['seo_title'];?></title>
<meta charset="utf-8">
<meta name="description" content="<?php echo $GLOBALS['seo_description'];?>">
<meta name="keywords" content="<?php echo $GLOBALS['seo_keywords'];?>">
<meta name="revisit" content="7 days">
<meta name="robots" content="index, follow">
<meta name="author" content="Torrison">
<meta name="Classification" Content="Customers" />
<meta name="Document-state" Content="Dynamic" />
<base href="<?php echo $GLOBALS['sitename'];?>" />
<link rel='shortcut icon' href='modules/themes/default/css/img/favicon.ico' type='image/x-icon' />
<link rel="stylesheet" href="modules/themes/default/css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="modules/themes/default/css/framework.css" type="text/css" media="all">
<link rel="stylesheet" href="modules/themes/default/css/style.css" type="text/css" media="all">
<link rel="stylesheet" type="text/css" href="modules/themes/default/css/jquery-ui/jquery-ui.css">
<script type="text/javascript" src="modules/themes/default/js/jquery-1.6.js"></script>
<script type="text/javascript" src="modules/themes/default/js/jquery-ui-1.8.16.custom.min.js"></script>
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