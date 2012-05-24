<a href="<?php echo $_SERVER['REQUEST_URI']."/add"?>">Добавить строку</a>
<br />
Показываю таблицу <?php echo C7_defend_filter( "4", $_POST['table']);?> из БД!

<?php echo $input_data ['datatable'];?>