<div id="container">
	<div id="top-slogan"><h1><?php echo $GLOBALS['seo_h1'];?></h1></div>
	<div id="wrapper">
			<div id="header">
				<a href="/" title="Complex.org.ua">
				<div id="logo"></div>
				</a>
				<div id="contacts">
				  <div id="contacts_div" style="padding-left:20px;padding-top:10px;">
				   <b> Complex 7.3 Release - Modern Web-Solutions</b>
				  <br /><br /><br />
				  <b>Links:</b> <a href="project/">Project Tree</a> | <a href="incubator/">Incubator</a>
				  </div>
				</div>
				<div id="header-contact">
                <?php echo $GLOBALS['view_auth_login'];?>
				</div>
			</div><!--/header-->
			<div id="sidebar">
				<?php echo $GLOBALS['c7_catalog_menu'];?>
				<br />
				<?php echo $GLOBALS['search_form'];?>
			</div><!--/sidebar-->
			<div id="content-div">
	        <?php echo $GLOBALS['center_div'];?>
			</div><!--/content-->
	</div><!--/wrapper-->
</div><!--/container-->
<footer>
	<div id="footer-links">
		<a href="/">Главная</a>&#160;|&#160;
		<a href="/test/">Test Module</a>&#160;|&#160;
		<a href="catalog/all/complex-basic-сайт-каталог/">Каталог</a>&#160;|&#160;
		<a href="sitemap/">Карта Сайта</a>&#160;|&#160;
		<a href="http://complex.org.ua/">Complex.org.ua</a>
	</div><!--/footer-links-->
	<div id="footer-article"><?php echo $GLOBALS['seo_footer'];?></div>
	<div id="footer-copyright">2010 — 2011 © Complex.org.ua</div>
</footer>
<div id="dialog"></div>