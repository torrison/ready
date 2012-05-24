<?php
if ($debug_mode == true) echo "Prepare Input Generator Functions Module<br />";

# Input Data Main Inputs

function input_text($name, $id, $class, $style_width, $value)
  {  return "<input type=\"text\" name=\"".$name."\" id=\"".$id."\" class=\"".$class."\" style=\"width:".$style_width."px;\" value=\"".$value."\" >";
  }

function input_password($name, $id, $class, $style_width, $value)
  {
  return "<input type=\"password\" name=\"".$name."\" id=\"".$id."\" class=\"".$class."\" style=\"width:".$style_width."px;\" value=\"".$value."\" >";
  }

function input_textarea($name, $id, $class, $style_width, $style_height, $value)
  {
  return "<br /><textarea name=\"".$name."\" id=\"".$id."\" class=\"".$class."\" style=\"width:".$style_width."px;height:".$style_height."px;\">".$value."</textarea>";
  }
function input_checkbox_on($name, $id, $class, $value)
  {
  if ($value == 1) $selection = " CHECKED";
  return "<input type=\"checkbox\" name=\"".$name."\" id=\"".$id."\" class=\"".$class."\" value=\"1\"".$selection.">";
  }

#-------------------------------------------------------------------ADD IMAGE---------------------------------------------




#-------------------------------------------------------------------SELECT---------------------------------------------


function input_select ($name, $id, $class, $value, $variants)
  {  $data .= "
  <select name=\"".$name."\" id=\"".$id."\" class=\"".$class."\">
  ";
  $i=0;
  while ($variants[$i]['id']>0)
  	{
  	if ($value == $variants[$i]['id']) $selected = " SELECTED"; else $selected = "";
    $data .= "<option value=\"".$variants[$i]['id']."\"".$selected.">".$variants[$i]['name']."</option>";
    $i++;
  	}
  $data .= "
  </select>
  ";
  return $data;
  }

function input_select_custom ($name, $id, $class, $value, $table, $field, $rules)
  {
  $res = $GLOBALS['mysql_obj']->free_sql("SELECT id, ".$field." FROM ".$table." ".$rules);

  $i=0;
  while ($row = mysql_fetch_array($res))
  {
  $variants[$i]['name'] = $row [$field];
  $variants[$i]['id'] = $row ['id'];  $i++;
  }

  $data .= "
  <select name=\"".$name."\" id=\"".$id."\" class=\"".$class."\">
  <option value=\"0\">Не выбрано</option>
  ";
  $i=0;
  while ($variants[$i]['id']>0)
  	{
  	if ($value == $variants[$i]['id']) $selected = " SELECTED"; else $selected = "";
    $data .= "<option value=\"".$variants[$i]['id']."\"".$selected.">".$variants[$i]['name']."</option>";
    $i++;
  	}
  $data .= "
  </select>
  ";
  return $data;
  }

#-------------------------------------------------------------------DatePicker---------------------------------------------


function input_date($name, $id, $class, $value)
  {
  if ($value == "") $value = date ("Y-m-d");
  return "
  <input id=\"".$name."\" name=\"".$name."\" class=\"inputDate\" type=\"text\" value=\"".$value."\" />
  ";
  }

function input_date_head ($name)
  {  return "
	<script type=\"text/javascript\">
		$(function(){

$.datepicker.regional['ru'] = {
closeText: 'Закрыть',
prevText: '&#x3c;Пред',
nextText: 'След&#x3e;',
currentText: 'Сегодня',
monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь',
'Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн',
'Июл','Авг','Сен','Окт','Ноя','Дек'],
dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
dateFormat: 'dd.mm.yy',
firstDay: 1,
isRTL: false
};
$.datepicker.setDefaults($.datepicker.regional['ru']);

			// Datepicker
			$('#".$name."').datepicker({
				inline: true, changeMonth: true, changeYear: true, dateFormat: 'yy-mm-dd', yearRange: 'c-90:c+4', firstDay: 1
			});
		});
	</script>
  ";
  }

#-------------------------------------------------------------------SELECT USER--------------------------------------------

function input_select_multi_head($name)
  {  return "
<script type=\"text/javascript\">
    $(document).ready(function() {
        $(\"#".$name."\").dropdownchecklist({ icon: {}, width: 270 });
    })
</script>
  ";
  }


#-------------------------------------------------------------------Multi FORM---------------------------------------------

  function input_mlinks($name, $id, $class, $style_width, $value)
  {
  ob_start();
?>
<img id="mlinks_<?php echo $name;?>_add" height="20" border="0" width="20" alt="add" src="css/images/add-1-icon.png" onclick="add_mlinks('');" style="cursor: pointer;"/>
<div id="mlinks_<?php echo $name;?>">

<?php

$value = str_replace ("[", "", $value);

$value = explode ("]", $value);

$i=0; while (!is_null($value[$i])) {if ($value[$i] != "")
{
	?>

<input type="text" name="<?php echo $name;?>[]" id="<?php echo $id;?>" class="<?php echo $class;?>" style="width:220px;" value="<?php echo $value[$i];?>" >
<a href="<?php echo $value[$i];?>" target="_blank">&gt;&gt;</a>
<br />
<?php
}
$i++;} ;?>
</div>
<?php
  return ob_get_clean();
  }

function mlinks_head($name)
	{  ob_start();
?>
<script type="text/javascript">
    $(document).ready(function() {
    $("#mlinks_<?php echo $name;?>_add").click(function() {$("#mlinks_<?php echo $name;?>").append('<br /><input type="text" name="<?php echo $name;?>[]" id="<?php echo $id;?>" class="<?php echo $class;?>" style="width:220px;" value="<?php echo $value;?>" >')});
    });
</script>
<?php
  return ob_get_clean();
	}

# File input Functions

#----------------------------------------------------------------------------------------------------------------------------- NOT READY!---------------------------

function mfiles_head($name)
	{  ob_start();
?>
<script type="text/javascript">
    $(document).ready(function() {
    $("#mfiles_<?php echo $name;?>_add").click(function() {$("#mfiles_<?php echo $name;?>").append('<br /><input type="file" name="<?php echo $name;?>[]" id="<?php echo $id;?>" class="<?php echo $class;?>" style="width:220px;" value="<?php echo $value;?>">')});
    });
</script>
<?php
  return ob_get_clean();
	}

#----------------------------------------------------------------------------------------------------------------------------- NOT READY!---------------------------
#----------------------------------------------------------------------------------------------------------------------------- NOT READY!---------------------------
  function input_mfiles ($name, $id, $class, $style_width, $value)
  {  return "Closed.";
  }
  function input_mfiles1($name, $id, $class, $style_width, $value)
  {
  ob_start();
?>
<img id="mfiles_<?php echo $name;?>_add" height="20" border="0" width="20" alt="add" src="css/images/add-1-icon.png" style="cursor: pointer;"/>
<div id="mfiles_<?php echo $name;?>">
<?php

$value = str_replace ("[", "", $value);

$value = split ("]", $value);

$i=0; while (!is_null($value[$i])) {
if ($value[$i] != "")
{

  	if ($value[$i] == "error_file") $data .= "<font color=\"darkred\">pics/mfiles/".$value[$i]."</font>";
  	else $data .= "<a href=\"pics/mfiles/".$row_img."\" target=\"_blank\">pics/mfiles/".$row_img."</a>";
  		$data .= "
  		<input name=\"del_img_arr[]\" type=\"checkbox\" value=\"1\">Del?
  		<input name=\"mfiles_stay[]\" type=\"hidden\" value=\"".$value."\">
  		";

  	if (isset($img_folder)) $data .= "<input name=\"".$name."_folder\" type=\"hidden\" value=\"".$img_folder."\">";
    echo $data;
	?>
<input type="file" name="<?php echo $name;?>[]" id="<?php echo $id;?>" class="<?php echo $class;?>" style="width:220px;" value="<?php echo $value;?>">
<a href="<?php echo $value[$i];?>" target="_blank">&gt;&gt;</a>
<br />
<?php
}
$i++;} ;?>
</div>
<?php
  return ob_get_clean();
  }


// Parent Select Generator

function c7_input_get_tree_from_res_select ($res, $select_name, $select_id, $field)
  {

    $data .= "<select id=\"".$select_name."\" name=\"".$select_name."\">";
    $data .= "<option value=\"0\">Главная</option>";
    $tree_i=0;    #MySQL array counter
    while ($row=mysql_fetch_array($res))
 	{
		$catalog_tree[$tree_i]['id'] = $row['id'];
		$catalog_tree[$tree_i]['parent_id'] = $row['parent_id'];
		$catalog_tree[$tree_i][$field] = $row[$field];
		$catalog_tree[$tree_i]['url'] = $row['url'];
		$tree_i++;
		#Add All MySQL Data to Array
    }

    $i=0;                      // Reset $i
    #$limit = 0;			   // Defend counter for Debuging
	$parent_step = 0;          // Start in parent_id = 0
    $parent[$parent_step] = 0; // Parent to Child Step Array
    $now_output = array();     // Array for ouput printing data
    while ($i <= $tree_i)
    {
       #$data .= "{".$catalog_tree[$i]['parent_id']."<< = >>".$parent[$parent_step]."}"; #Debuging echo
       $now_output_signal = false; #reset now output signal
       if ($catalog_tree[$i]['parent_id'] == $parent[$parent_step]) #if id has parent_id in current parent level (start in 0)
       {
         for ($j=0;$j<count($now_output);$j++)
         {
           if ($catalog_tree[$i]['id'] == $now_output[$j]) {$now_output_signal = true; break;} #Check for ouput printing data
         }
       	 if (($now_output_signal == false)&&($catalog_tree[$i]['id'] > 0)) #if id has not printed
        	{
        	$parent_step++;
        	$parent[$parent_step] = $catalog_tree[$i]['id'];
        	if ($catalog_tree[$i]['id'] != "")
            if ($catalog_tree[$i]['id'] == $select_id) $select=" SELECTED";
			$data .= "<option value=\"".$catalog_tree[$i]['id']."\"".$select.">".$data_prefix.$catalog_tree[$i][$field]."</option>";
            $select="";
			$data_prefix .= "->";
			array_push($now_output, $catalog_tree[$i]['id']);
			$i=0; #parent step+1, new parent has added, if not empty, data printed, prefix+1 "->" , array push printed id!. Start again.
		  	}
       }
       if ($i == $tree_i) {$i=0;$parent_step--; $data_prefix = substr($data_prefix, 0,strlen($data_prefix)-2);} #step left in prefix way in the end of data
       $i++;
       #$limit++; if ($limit == 260) $i = $tree_i+5; # Defend system for ulimited while
       if (!isset($parent[$parent_step])) $i = $tree_i+5; #The End Of While, Bacause Step = -1
    }
    $data .= "</select>";
    return $data;

  }


// End of Parent Select Generator
#----------------------------------------------------------------------------------------------------------------------------- NOT READY!---------------------------

function input_file_img($name, $id, $class, $style_width, $value, $row_img = NULL, $img_folder = NULL)
  {  if (isset($row_img)&&($row_img != ""))
  	{  	if (isset($img_folder)) $link_folder = $img_folder."/";

  	if ($row_img == "error_file") $data .= "<font color=\"darkred\">pics/".$link_folder.$row_img."</font>";
  	else $data .= "<a href=\"pics/".$link_folder.$row_img."\" target=\"_blank\">pics/".$link_folder.$row_img."</a>";
  		$data .= "
  		<input name=\"del_img_".$name."\" type=\"checkbox\" value=\"1\">Del?
  		<input name=\"".$name."\" type=\"hidden\" value=\"".$value."\">
  		";

  	if (isset($img_folder)) $data .= "<input name=\"".$name."_folder\" type=\"hidden\" value=\"".$img_folder."\">";
  	}
  else
  	{  	$data = "
  	<input type=\"file\" name=\"".$name."\" id=\"".$id."\" class=\"".$class."\" style=\"width:".$style_width."px;\" value=\"".$value."\">
  	";
  	if (isset($img_folder)) $data .= "<input name=\"".$name."_folder\" type=\"hidden\" value=\"".$img_folder."\">";
  	}
  return $data;
  }

?>