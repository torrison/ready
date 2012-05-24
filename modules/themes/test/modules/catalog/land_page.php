<?php
if ($input_data ['page_row']['fullimg'] == 1)
$left_img = "<img src=\"pics/".$input_data ['page_row']['img']."\" align=\"right\" alt=\"".$input_data ['page_row']['short_text']."\" border=\"0\" style=\"margin:10px;\"/>";
else $left_img = "";
?>
<div>

<?php echo $input_data ['backstep_code'];?>

<br /><br />
<!--id = <?php echo $view_page_id;?>-->
    <h2><?php echo $input_data ['page_row']['page_name'];?></h2>
    <br />
    <?php echo $left_img;?>
    <?php echo $input_data ['page_row']['content'];?>
    <?php if ($input_data ['page_row']['leadmaker']) {?>
    <div id="leadmaker_div"></div><div id="leadmaker_dialog"></div>
    <?php } ?>
    <br /><br /><?php echo $input_data ['social'];?>

</div>