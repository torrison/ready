<?php
$social_sitename = substr($config_sitename, 0, strlen($config_sitename)-1);
$facebook_comm ="
<div id=\"fb-root\"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = \"//connect.facebook.net/ru_RU/all.js#xfbml=1\";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class=\"fb-comments\" data-href=\"".$social_sitename.$_SERVER['REQUEST_URI']."\" data-num-posts=\"5\" data-width=\"720\"></div>
";
?>