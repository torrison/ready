  <br />
  <big><b>Параметры сервера:</b></big>
  <div style="border: 1px solid #eeeeee; text-align:left; width:350px;padding:5px;">
<?php
    echo "<b>Операционная система: </b>" .
		$_SERVER["OS"] . "<br />\n";
    echo "Web-сервер: " .
		$_SERVER["SERVER_SOFTWARE"] . "<br />\n";
    echo "<b>Имя сервера: </b>" .
		$_SERVER["SERVER_NAME"] . "<br />\n";
    echo "<b>Адрес сервера: </b>" .
		$_SERVER["SERVER_ADDR"] . "<br />\n";
    echo "<b>Порт сервера: </b>" .
		$_SERVER["SERVER_PORT"] . "<br />\n";
    echo "<b>Адрес клиента: </b>" .
		$_SERVER["REMOTE_ADDR"] . "<br />\n";
    echo "<b>Путь к документам на сервере: </b>" .
		$_SERVER["DOCUMENT_ROOT"] . "<br />\n";
    echo "<b>Полный путь к текущему скрипту: </b>" .
		$_SERVER["SCRIPT_FILENAME"] . "<br />\n";
    echo "<b>Имя текущего скрипта: </b>" .
		$_SERVER["PHP_SELF"] . "<br />\n";

?>
<a href="modules/mysql_dumper/dumper.php">MySQLDumper</a>