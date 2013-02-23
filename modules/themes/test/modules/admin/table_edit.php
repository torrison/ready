<a href="<?php echo $GLOBALS['sitename'].$GLOBALS['url_array'][0]."/".$GLOBALS['url_array'][1]."/".$GLOBALS['url_array'][2];?>">&lt;&lt;Назад</a><br /><br />

Редактировать строку #<b><?php echo $GLOBALS['url_array'][4];?></b>:<br /><br />

<form name="admin_table_add" method="post" action="" enctype="multipart/form-data">
<?php echo $input_data['edit_form'];?>

<br />
<input name="c7_admin_edit" type="hidden" value="1">
<input type="submit" value="Сохранить">
<br />

</form>