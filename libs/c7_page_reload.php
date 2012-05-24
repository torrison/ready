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

?>