<!-- Debug -->
<div id="debug">
</div>

<!-- Pop Up -->
<div id="real_time_pop_up" style="z-index:10000;width:200px; height:100px; bottom:0px; right:100px; position:fixed; background:#eee; opacity:0.8; border:1px #337 solid; padding:10px;">
<b>Pop Up Window Working Now.</b> <br /><br />Click Here To Chat - <a id="chat_link" style="cursor:pointer">Link</a><br />
<br />Or <a id="popup_close" style="cursor:pointer;">Click Here to Close</a> PopUp
</div>
<!-- Chat -->
<div id="site_chat" style="width: 340px; display:none; background:#eee; opacity:0.95; border:0px #337 solid; padding:10px; text-align:center;">
<b>If you have questions, asking now!</b>
<br /><br />

<div id="chat_list" style="width: 260px; height:300px; overflow-y:auto; border:1px solid black;margin-left:30px;text-align:left;">
<b>Jessi</b>: Hi, how can I help you?<br />
</div>
<br />
<b>Your Message:</b><br /><br />
<textarea id="chat_message" name="chat_message" rows=3 cols=30>
</textarea>
<br /><br />
<input id="chat_send" type="submit" value="Send" style="width:100px;">
</div>