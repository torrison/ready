<?php
$output['html'] = c7_get_view ('auth', 'reg_form', '', 'ajax/');
echo json_encode($output);
?>