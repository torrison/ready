<?php
$output['html'] = c7_get_view ('auth', 'reg_send_answer', '', 'ajax/');
echo json_encode($output);
?>