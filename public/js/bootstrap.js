//function showMessagePanel(userId, userName, userFrom, urlFrom)
//{
//  var userAdmin = 0;
// if (!userAdmin) {
//         $.ajax({
//                url: '/ajax/ajax_message.php',
//                type: 'POST',
//                data: 'ajax_key=1&op=1&checkAvailPrivateMsgs=1&msg_to='+userId,
//                success: function(result) {
//                        if (result == 1) {
//                                alert('Пользователь запретил приём личных сообщений');
//                        } else {
//                                getMsgForm(userId, userName, userFrom, urlFrom);
//                        }
//                }
//         });
// } else {
//        getMsgForm(userId, userName, userFrom, urlFrom);
// }
// }
//
//function ctrlEnter(event)
//{
// if((event.ctrlKey) && ((event.keyCode == 0xA)||(event.keyCode == 0xD)))
// {
//  sendMessage();
// }
//}
//function getMsgForm(userId, userName, userFrom, urlFrom) {
//        showStatus(0);
//        var a = document.getElementById('msg_user_link');
//        a.setAttribute('href', '/user/'+userId+'/');
//        a.innerHTML = userName;
//        document.getElementById('msg_link_all_msg').setAttribute('href', '/profile/message/'+userId+'/');
//        var msg = document.getElementById('div_msg');
//        document.getElementById('msg_txt').value = '';
//        document.getElementById('msg_user_to').value = userId;
//        document.getElementById('msg_user_from').value = userFrom;
//        document.getElementById('msg_url_from').value = urlFrom;
//
//        var myWidth = 0, myHeight = 0;
//        if( typeof( window.innerWidth ) == 'number' ) {
//        //Non-IE
//        myWidth = window.innerWidth;
//        myHeight = window.innerHeight;
//        } else if( document.documentElement && ( document.documentElement.clientWidth || document.documentElement.clientHeight ) ) {
//        //IE 6+ in 'standards compliant mode'
//        myWidth = document.documentElement.clientWidth;
//        myHeight = document.documentElement.clientHeight;
//        } else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) {
//        //IE 4 compatible
//        myWidth = document.body.clientWidth;
//        myHeight = document.body.clientHeight;
//        }
//        var scrOfX = 0, scrOfY = 0;
//        if( typeof( window.pageYOffset ) == 'number' ) {
//        //Netscape compliant
//        scrOfY = window.pageYOffset;
//        scrOfX = window.pageXOffset;
//        } else if( document.body && ( document.body.scrollLeft || document.body.scrollTop ) ) {
//        //DOM compliant
//        scrOfY = document.body.scrollTop;
//        scrOfX = document.body.scrollLeft;
//        } else if( document.documentElement && ( document.documentElement.scrollLeft || document.documentElement.scrollTop ) ) {
//        //IE6 standards compliant mode
//        scrOfY = document.documentElement.scrollTop;
//        scrOfX = document.documentElement.scrollLeft;
//        }
//
//        var top = Math.round((myHeight - 300) / 2) + scrOfY;
//        var left = Math.round((myWidth - 600) / 2) + scrOfX;
//
//        msg.style.left = left + 'px';
//        msg.style.top = top + 'px';
//        msg.style.display = 'block';
//        document.getElementById('msg_txt').focus();
//}
//
//
//
//function sendMessage()
//{
// if(document.getElementById('msg_txt').value.replace(/^\s+|\s+$/g, '') == '') return false;
// var ajax = new Ajax('/ajax/ajax_message.php');
// ajax.addParam('op', 'send');
// ajax.addParam('msg', document.getElementById('msg_txt').value);
// ajax.addParam('msg_from', document.getElementById('msg_user_from').value);
// ajax.addParam('msg_to', document.getElementById('msg_user_to').value);
// ajax.addParam('url_from', document.getElementById('msg_url_from').value);
// ajax.run();
//}
//
//function callback_sendMessage()
//{
// showStatus(1);
//}
//function showStatus(s)
//{
// document.getElementById('msg_link_all_msg').style.visibility = s == 0 ? 'hidden' : (document.getElementById('msg_user_to').value != 'IL01000801' ? 'visible' : 'hidden');
// document.getElementById('msg_button1').style.visibility = s == 1 ? 'hidden' : 'visible';
// document.getElementById('msg_button2').value = s == 0 ? 'Отмена' : 'Закрыть';
// document.getElementById('msg_div_result').style.display = s == 0 ? 'none' : 'block';
// document.getElementById('msg_txt').style.display = s == 1 ? 'none' : 'block';
//}
