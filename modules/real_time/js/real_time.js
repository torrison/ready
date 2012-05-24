// Dubug
$("#debug").dialog({ autoOpen: true, height: 200, width:200, title: 'Debug', position: ["left","bottom"]});
// Chat and PopUp
$("#site_chat").dialog({ autoOpen: false, height: 570, width:340, title: 'Real-Time Chat'});
$("#chat_link").live("click", function(){	//alert(111); // Debug
    $("#site_chat").dialog('open');
	});

$("#chat_send").live("click", function(){
    	$("#chat_list").append('<b>Alex</b>: '+$("#chat_message").val()+'<br />');
    	$("#chat_list").scrollTop($("#chat_list")[0].scrollHeight);
    	$("#chat_message").val("");
});

$("#popup_close").live("click", function(){
  		$("#real_time_pop_up").css("display", "none");});

// Real Time Timer
var real_timer = setTimeout("real_time()", 1000);

function real_time()
{$("#debug").append("Time is Runing now...<br />");
$.getJSON('ajax/real_time/port/?now_url='+window.location, function(data) {	$('#debug').append(data.debug);
	$('#real_time_admin_div').html(data.on_line_user);
	});

real_timer = setTimeout("real_time()", 1000);
}


