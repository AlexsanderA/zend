	$(document).ready(function(){
    		$("div.m").animate({height: 'hide'}, 0);
    		$("#loading").hide();
    	});    	
    	function show_error_message(c){
    		if(c == -1)$("div.m").html("<div class=error>Ошибка добавления данных. Нельзя так часто жмакать по кнопке (1сбщ/мин).</div><div align=right><a href=# onclick=javascript:hide_message();>Закрыть [хэ]</a></div>");
    		else if(c == -2)$("div.m").html("<div class=error>Ошибка добавления данных. Ошибка базы данных.</div><div align=right><a href=# onclick=javascript:hide_message();>Закрыть [хэ]</a></div>");
    		else $("div.m").html("<div class=error>Ошибка добавления данных.</div><div align=right><a href=# onclick=javascript:hide_message();>Закрыть [хэ]</a></div>");
   			$('div.m').animate({height: 'show'}, 500);
   			$("div#loading").hide();
    	}    	
    	function hide_message(){
    		$('div.m').animate({height: 'hide'}, 500);
    		$("div#loading").hide();
    	}
   		function ajax(m1, m2, formname){
 				$('div.m').animate({height: 'hide'}, 0, function(){
 					$("div#loading").show();
 					$.ajax(
 						{
			  	 		type: "POST",
   				 		url: "insert.php",
   				 		data: "x1=" + m1 + "&x2=" + m2,
   				 		success: function(data){
     			 			if(data <= -1)show_error_message(data);
     						else {     							
     							if(formname.img.value != ""){
     								$.ajaxUpload({
					        	        url:'imageupload.php?k=' + data,
					        	        secureuri:false,
					        	        uploadform: formname,
					        	        dataType: 'json',					        	        																																						
					        	        success: function (img_upload, status){
           	   								$("div#loading").hide();
   														if(img_upload.result != "IMG_UPLOAD_OK")$("div.m").html("<div class=ok>Сообщение успешно добавлено, однако картинку закачать не удалось, по этому используется картинка по умолчанию. Сообщение об ошибке: " + img_upload.result + "</div>Ссылка на это персональное сообщение: <a href=http://idi-v-zhopu.ru/?" + data + ">http://idi-v-zhopu.ru/?" + data + "</a><br>Выглядеть сообщение будет так:<br><br><center>" + m1 + "<br><img src=cartman.jpg><br>" + m2 + "</center><div style='position: absolute; right: 0px; bottom: 0px;'><a href=# onclick='javascript:hide_message();'>Закрыть [хэ]</a></div></div>");
   														else $("div.m").html("<div class=ok>Сообщение успешно добавлено</div>Ссылка на это персональное сообщение: <a href=http://idi-v-zhopu.ru/?" + data + ">http://idi-v-zhopu.ru/?" + data + "</a><br>Выглядеть сообщение будет так:<br><br><center>" + m1 + "<br><img src=./uploadimages/" + img_upload.name + "><br>" + m2 + "</center><div style='position: absolute; right: 0px; bottom: 0px;'><a href=# onclick='javascript:hide_message();'>Закрыть [хэ]</a></div></div>");
   														$('div.m').animate({height: 'show'}, 500);
                  																																							
					        	        },																																						
										        error: function (data, status, e){
          					          $("div.m").html("<div class=error>Ошибка добавления данных. " + e + "</div><div align=right><a href=# onclick=javascript:hide_message();>Закрыть [хэ]</a></div>");
                						}
					        	});
					        }	else {
					        	$("div#loading").hide();
					        	$("div.m").html("<div class=ok>Сообщение успешно добавлено</div>Ссылка на это персональное сообщение: <a href=http://idi-v-zhopu.ru/?" + data + ">http://idi-v-zhopu.ru/?" + data + "</a><br>Выглядеть сообщение будет так:<br><br><center>" + m1 + "<br><img src=cartman.jpg><br>" + m2 + "</center><div style='position: absolute; right: 0px; bottom: 0px;'><a href=# onclick='javascript:hide_message();'>Закрыть [хэ]</a></div></div>");
					        	$('div.m').animate({height: 'show'}, 500);
					        }
     						}     						
     				}
 					});
 				});	

   		}