<?php
ob_start();
include ('view/send_yes_request.php');
$output['html'] = ob_get_clean();
echo json_encode($output);
?>