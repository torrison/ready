<?php
$output['html'] = c7_get_view ('example', 'message', '', 'ajax/');
echo json_encode($output);
?>