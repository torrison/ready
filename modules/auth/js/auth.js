// Login
$("#c7_auth_send").click(function () {
$('#dialog').dialog({ autoOpen: true, title: 'Вход на сайт', width: 540, height: 80 })
$.getJSON('ajax/auth/login/', function(data) {$('#dialog').html(data.html);});

});

// Registration

$("#c7_auth_reg").click(function () {

$('#dialog').dialog({ autoOpen: true, title: 'Регистрация', width: 400, height: 250 })
$.getJSON('ajax/auth/reg/', function(data) {$('#dialog').html(data.html);});

});

// Logout

$("#c7_auth_logout").click(function () {
$('#dialog').dialog({ autoOpen: true, title: 'Выход из аккаунта', width: 600, height: 150 })
$.getJSON('ajax/auth/logout/', function(data) {$('#dialog').html(data.html);});

});

// Send Reg. Form

function submit_reg()
{
$.getJSON('ajax/auth/reg_send/', function(data) {$('#dialog').html(data.html);});
}

// Validation Functions and Variables ------------------------------------------|

$("#auth_reg_login").live("keydown", function(){
  if (valid_timer !== undefined) clearTimeout(valid_timer);
  valid_timer=setTimeout("check_it_field('"+this.id+"')",1000);
});