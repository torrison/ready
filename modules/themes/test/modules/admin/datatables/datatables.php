<?php
// Заголовок таблицы

$input_data ['th_data'] = "
			<th>ID</th>
			".$input_data ['th_data']."
			<th>Edit</th>
			<th>Delete</th>
";

// Таблица с данными
$output_data ['datatable'] .= "

".$input_data ['filters']."

<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" class=\"display\" id=\"example\">
	<thead>
		<tr>
".$input_data ['th_data']."
		</tr>
	</thead>
	<tbody>
	";

// Admin table body

    while ($row=mysql_fetch_array($input_data ['res'])) {
   $output_data ['datatable'] .= "
		<tr class=\"even gradeC\">
 	    	<td>".$row['id']."</td>
    ";
      // Work With $column_in_table Massive
      $i=1;
      while (isset($input_data ['table columns'][$i]['name'])&&($input_data ['table columns'][$i]['name'] != ""))
      {
      if ($input_data ['table columns'][$i]['intable'] == true) {
      $output_data ['datatable'] .= "<td>".$row[$input_data ['table columns'][$i]['name']]."</td>";
      }
      $i++;
      }
      // End

    $output_data ['datatable'] .= "
			<td class=\"center\"><a href=\"".$_GET['url_line']."/edit/".$row['id']."\">edit</a></td>
			<td class=\"center\">

			<a OnClick=\"return window.confirm('Удалить ячейку?');\" href=\"".$_GET['url_line']."?c7_admin_del=".$row['id']."\">х</a>

			</td>
		</tr>
    ";
    	}
	$output_data ['datatable'] .= "
	</tbody>
	<tfoot>
		<tr>
".$input_data ['th_data']."
		</tr>
	</tfoot>
</table>
    ";

// Данные для заголовка страницы
$GLOBALS['head_code'] .= "

		<style type=\"text/css\" title=\"currentStyle\">
			@import \"modules/admin/css/data_table.css\";
		</style>
		<script type=\"text/javascript\" language=\"javascript\" src=\"modules/admin/js/jquery.dataTables.min.js\"></script>
		<script type=\"text/javascript\" charset=\"utf-8\">
			$(document).ready(function() {
				$('#example').dataTable();
			} );
		</script>

";

?>