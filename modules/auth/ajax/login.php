<?php
$output['html'] = c7_get_view ('auth', 'login_form', '', 'ajax/');
echo json_encode($output);
?>