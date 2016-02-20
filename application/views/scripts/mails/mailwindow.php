<div class="msgup" id="div_msg" style="left: 100%/2; top: 185px; display: none; ">
<!--<div class="msg-head"  onmousemove="move(event, this);" onmousedown="moving = true;" onmouseup="moving = false;" onmouseout="moving = false;">Новое сообщение</div>-->
<div class="msg-head" id="msg-head">Новое сообщение</div>
<div class="msg">
  <table>
  <tbody><tr>
   <!--<td style="text-align:right;width:50px;"><span class="left"></span></td>-->
   <td id='who' colspan="3">Кому:&nbsp;</td>
   <div>Тема сообщения:&nbsp;<input type="text" id="msg_title_to" value="" style="width: 100%;"></div>
  </tr>
  <tr>
   <!--<td style="text-align:right;vertical-align:top;"><span class="left"></span></td>-->
   <td>
    <div id="msg_div_result" style="text-align: center; display: none;">Сообщение отправлено.</div>
    <textarea id="msg_txt" rows="7" onkeypress="ctrlEnter(event);" style="display: block;"></textarea></td>
  </tr>
 </tbody></table>
</div>

<div class="msg-bottom">
 <table>
 <tbody><tr>
  <td style="text-align:left;">
   <input type="hidden" id="msg_user_to" value="kill you">
   <input type="hidden" id="msg_user_from" value="kill you">
   <input type="hidden" id="msg_user_title" value="kill you">
   
  </td>
  <td style="text-align:right;">
   <input id="msg_button1" type="button" value="Отправить" onclick="sendMessage();" style="visibility: visible;">
   <input id="msg_button2" type="button" value="Отмена" onclick="document.getElementById('div_msg').style.display = 'none';">
  </td>
 </tr>
 </tbody></table>
</div>
</div>