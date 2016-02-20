	$(function(){
            relo();  
            setInterval('relo()',3000);  
		var btnUpload=$('#upload');
		var status=$('#status');
		new AjaxUpload(btnUpload, {
			action: '/fallload',
			name: 'uploadfile',
			onSubmit: function(file, ext){
				 if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
                    // extension is not allowed 
					status.text('Only JPG, PNG or GIF files are allowed');
					return false;
				}
				status.text('Uploading...');
			},
			onComplete: function(file, response){
				//On completion clear the status
                                document.getElementById('image').value='http://mails.local/img/users/'+file;
				status.text('');alert(file);
                        
				//Add uploaded file to list
				if(response==="success"){
					$('<li></li>').appendTo('#files').html('<img src="http://mails.local/img/users/'+file+'" alt="" /><br />'+file).addClass('success');
                                        
                                        
				} else{
					$('<li></li>').appendTo('#files').text(file).addClass('error');
				}
			}
		});
		
	});
 
function  sendchat()
{  
    //формируем запрос 
   
       var id_user=document.getElementById('id_user').value,
           id_polychatel=document.getElementById('id_polych').value,
           text=document.getElementById('post_field').value;
 
	$(document).ready(function(){
         $.ajax({
            type:'POST',
            url: '/add',
            data: "id_user="+id_user+"&id_polych="+id_polychatel+"&text="+text,
            datatype: 'json',
             cache: false,
           
            success: function(data){
                             
               alert('Сообщение доставлено!');
              $('#post_field').text(' '); 
              $('#cont_chat').load('');
              window.location.reload();
            }
        });
        return false;
        });
	}
  
function deletecht(msg_id)
{  
 $(document).ready(function(){
        $.ajax({
            type:'POST',
            url: '/delete',
            data: "id="+msg_id,
            datatype: 'json',
            error: function(r){
               alert("ошибка");
            },
            success: function(data){
            alert('Сообщение удалено!');
            window.location.reload();
                           
            }
        });
       
        });
}
        
 
   
       function relo(){ 
            $(document).ready(function(){
        var id_u= document.getElementById('id_user_aut').value;
        if (id_u>0){
        $.ajax({  
               type:'POST',
               url: "/mailnew",
               data: "id="+id_u,
               datatype: 'json',
               
              success: function(data){ 
			  var i = 9;
				$dhtm="";
				data[9]="";
				do {
					$dhtm=$dhtm+data[i];
					i++;
				} while (data[i] >= 0);
/*
			  if ((data[10]>0)&&(data[11]<=0)){$dhtm="+"+data[10]}
			  else{ if ((data[11]>-1))
				{$dhtm="+"+data[10]+data[11]}
			  else {
			  $dhtm=""}}*/
			  
               $('#mail_ups').fadeTo(200,0.1,function(){ 
						
                          $("#mail_ups").html($dhtm).fadeTo(900,1);
                                         });
               }  
           });}
        });
    
     }
    
  

function ctrlEnter(event)
{
 if((event.ctrlKey) && ((event.keyCode == 0xA)||(event.keyCode == 0xD)))
 {
  sendMessage();
 }
}

function sendMessage()
{  
    //формируем запрос 
   
       var id_otprav=document.getElementById('msg_user_from').value,
           id_polychatel=document.getElementById('msg_user_to').value,
           text=document.getElementById('msg_txt').value,
           statys = '1',
           title = document.getElementById('msg_title_to').value;
           
 
	$(document).ready(function(){
         $.ajax({
            type:'POST',
            url: '/ajax',
            data: "otpravitel="+id_otprav+"&poluchatel="+id_polychatel+"&text="+text+"&statys="+statys+"&title="+title,
            datatype: 'json',
            cache: false,
           
            success: function(data){
                             
               alert('Сообщение доставлено!');
              
              window.location.reload();
            }
        });
        return false;
        });
	}


/**/
 
function readMessage(user,txt,id,title,toping)
{
   if (toping=='polychatel') {
updateMessage(id);}

$(document).ready(function(){
document.getElementById('msg_title_to').value=title;
document.getElementById('div_msg').style.display='block';
$('#msg_txt').text(txt);
$('#msg-head').html('Сообщение');
$('#who').html('От кого: '+ user);
$('#msg_button1').hide();
 });
}

function writeMessage(userN,UserTo,userFo,title)
{ document.getElementById('div_msg').style.display='block'; 
$('#msg_txt').html('');    
$(document).ready(function(){
document.getElementById('div_msg').style.display='block';
$('#msg-head').html('Новое сообщение');
$('#who').html('Кому: '+ userN);
document.getElementById('msg_user_to').value=UserTo;
document.getElementById('msg_user_from').value=userFo;
if (title!==''){
document.getElementById('msg_title_to').value=title;}

$('#msg_button1').show();   
 
 });
}


function updateMessage(msg_id)
{
    
$(document).ready(function(){
        $.ajax({
            type:'POST',
            url: '/update/',
            data: "id="+msg_id,
            datatype: 'json',
            error: function(r){
               alert(r);
            },
            success: function(data){
               //alert('Сообщение прочитано!');               
            }
        });
        return false;
        });
}


function selectAll(checked)
{
 var chs = document.getElementsByName('msg_checked');
 for(var i = 0, l = chs.length; i < l; i++)
 {
  chs[i].checked = checked;
 }
}
function deleteMsg(msg_id)
{   
 $(document).ready(function(){
        $.ajax({
            type:'POST',
            url: '/delet',
            data: "id="+msg_id,
            datatype: 'json',
            error: function(r){
               alert("ошибка");
            },
            success: function(data){
            alert('Сообщение удалено!');
          window.location.reload();
                           
            }
        });
       
        });
}
function callback_deleteMsg(msg_id, count_in)
{
 document.getElementById('msg_tr_'+msg_id).style.display = 'none';
 refereshCountMsgIn(count_in);
}

function refereshCountMsgIn(count_in)
{
 if(count_in == -1) return false;
 var ldm = document.getElementById('left_display_message');
 var lcm = document.getElementById('left_count_message');
 if(ldm && lcm)
 {
  if(count_in == 0)
   ldm.innerHTML = '<a class="active">Сообщения</a>';
  else
   lcm.innerHTML = count_in;
 }
 var tdm = document.getElementById('top_display_message');
 if(tdm)
 {
  if(count_in == 0)
   tdm.style.display = 'none';
  else
   tdm.setAttribute('title', 'У Вас есть новые сообщения');
 }
}



       
        
    function scr(msg_id)   {   
    $(document).ready(function(){
     $("#msg_tr_"+msg_id).css({'background-Color':'#F9F6E7'});
  });
    }
        
     
