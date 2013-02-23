$.getJSON('ajax/leadmaker/main_div/', function(data) {$('#leadmaker_div').html(data.html);});

$('#leadmaker_dialog').dialog({ autoOpen: false, height: 230, width:570})

$('#leadmaker_no_button').live ("click", function(){
	//alert(111); // Debug
	$("#leadmaker_dialog").dialog('close');
	$('#leadmaker_dialog').dialog ({title:"Сообщение системы управления сервисом", height: 460, width:520})
	$.getJSON('ajax/leadmaker/answer_no/', function(data) {$('#leadmaker_dialog').html(data.html);});
    $("#leadmaker_dialog").dialog('open');
	});

$('#leadmaker_yes_button').live ("click", function(){
	//alert(111); // Debug
	$("#leadmaker_dialog").dialog('close');
	$('#leadmaker_dialog').dialog ({title:"Спасибо, что заинтересовались нашим продуктом", height: 390, width:520})
	$.getJSON('ajax/leadmaker/answer_yes/', function(data) {$('#leadmaker_dialog').html(data.html);});
    $("#leadmaker_dialog").dialog('open');
	});

$('#leadmaker_no_send').live ("click", function(){
	//alert(111); // Debug
	$("#leadmaker_dialog").dialog('close');
	$('#leadmaker_dialog').dialog ({title:"Спасибо, за интерес к нашему сайту", height: 100, width:500})
	$.getJSON('ajax/leadmaker/send_no_request/', function(data) {$('#leadmaker_dialog').html(data.html);});
    $("#leadmaker_dialog").dialog('open');
	});
$('#leadmaker_yes_send').live ("click", function(){
	//alert(111); // Debug
	$("#leadmaker_dialog").dialog('close');
	$('#leadmaker_dialog').dialog ({title:"Спасибо, за интерес к нашему сайту", height: 100, width:500})
	$.getJSON('ajax/leadmaker/send_yes_request/', function(data) {$('#leadmaker_dialog').html(data.html);});
    $("#leadmaker_dialog").dialog('open');
	});
