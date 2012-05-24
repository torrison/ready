<?php
ob_start();
include ('view/main_div.php');
$output['html'] = ob_get_clean();
echo json_encode($output);
?>