<?php
function c7_auth_add_script()
{
$GLOBALS['footer_scripts'] .= "<script src=\"modules/auth/js/auth.js?1\"></script>";
}
function c7_check_user()
{  $user_role = 2;
  if (($_POST['auth_login'] == "root")and($_POST['auth_password'] == "c12345!"))
  $_SESSION['user_role'] = $user_role;
  return true;
}

function c7_auth_logout_reload()
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

?>