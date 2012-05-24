function check_it_field(input_id)
{
  //alert (input_id);
  $.getJSON('ajax/validation/check/'+input_id, function(data) {
  $("#auth_reg_login_text").html(' ('+data.html+')');
});

}

var valid_timer; // Variable for validation timer