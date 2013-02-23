<a href="<?php echo $GLOBALS['sitename'].$GLOBALS['url_array'][0]."/".$GLOBALS['url_array'][1]."/".$GLOBALS['url_array'][2];?>">&lt;&lt;Назад</a><br /><br />

Добавить строку в таблицу <b><?php echo C7_defend_filter("4", $_POST['table']);?></b>:<br /><br />

<form name="admin_table_add" method="post" action="<?php echo substr ($GLOBALS['sitename'].$_GET['url_line'], 0, strlen($GLOBALS['sitename'].$_GET['url_line'])-4);?>" enctype="multipart/form-data">
<?php echo $input_data['add_form'];?>

<br />
<input name="c7_admin_add" type="hidden" value="1">
<input type="submit" value="Сохранить">
<br />

</form>