<?php
// Заголовок таблицы

$amdt_select_th_data = "
			<th>ID</th>
			".$amdt_select_th_data."
			<th>Edit</th>
			<th>Delete</th>
";

// Таблица с данными
$admin_page_code .= "

".$db_sys_filter."

<table cellpadding=\"0\" cellspacing=\"0\" border=\"1\" id=\"admin_table\">
	<thead>
		<tr>
".$amdt_select_th_data."
		</tr>
	</thead>
	<tbody>
	";

// Admin table body

    while ($row=mysql_fetch_array($res)) {
    $admin_page_code .= "
		<tr>
 	    	<td>".$row['id']."</td>
    ";
      // Work With $column_in_table Massive
      $i=1;
      while (isset($column_in_table[$i]['name'])&&($column_in_table[$i]['name'] != ""))
      {
      if ($column_in_table[$i]['intable'] == true) {
      $admin_page_code .= "<td>".$row[$column_in_table[$i]['name']]."</td>";
      }
      $i++;
      }
      // End

    $admin_page_code .= "
			<td class=\"center\"><a href=\"".$_GET['url_line']."/edit/".$row['id']."\">edit</a></td>
			<td class=\"center\">

			<a OnClick=\"return window.confirm('Удалить ячейку?');\" href=\"".$_GET['url_line']."?c7_admin_del=".$row['id']."\">х</a>

			</td>
		</tr>
    ";
    	}
	$admin_page_code .= "
	</tbody>
	<tfoot>
		<tr>
".$amdt_select_th_data."
		</tr>
	</tfoot>
</table>
    ";

// Данные для заголовка страницы
$GLOBALS['head_code'] .= "

		<style type=\"text/css\">
		#admin_table {width:80%;margin:auto;}
		</style>


";

?>