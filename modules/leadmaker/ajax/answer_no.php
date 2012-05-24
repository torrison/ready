<?php
ob_start();
include ('view/answer_no.php');
$output['html'] = ob_get_clean();
echo json_encode($output);
?>