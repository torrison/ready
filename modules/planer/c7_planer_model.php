<?php function c7_planer_get_plan_window()
{

$res = $GLOBALS['mysql_obj']->free_sql("SELECT id, date, task from planer where status = 2");

$todayDate =  mktime(0, 0, 0, date("m"), date("d"), date("Y"));

while ($row = mysql_fetch_array($res))
{
if ($todayDate > strtotime($row['date'])) $input_data['last'] .= "<a href=\"admin/planer/planer/edit/".$row['id']."\" onclick=\"return window.confirm('".$row['task'].". Перейти к задаче?')\">#ID".$row['id']."</a><br />";
if ($todayDate == strtotime($row['date'])) $input_data['today'] .= "<a href=\"admin/planer/planer/edit/".$row['id']."\" onclick=\"return window.confirm('".$row['task'].". Перейти к задаче?')\">#ID".$row['id']."</a><br />";
if ($todayDate < strtotime($row['date'])) $input_data['near'] .= "<a href=\"admin/planer/planer/edit/".$row['id']."\" onclick=\"return window.confirm('".$row['task'].". Перейти к задаче?')\">#ID".$row['id']."</a><br />";

}
$input_data['today'];
$input_data['near'];

$GLOBALS['body_code'] .= c7_get_view('planer','window', $input_data);
}
?>