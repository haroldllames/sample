<!Doctype html>
<html>
    <head>
    <style>
        #chat{ height: 500px }
        .new_user{color: #999999; font-size: 12px; font-family: arial; padding: 25px; padding-top: 85px}
    </style>
    </head>
    <body class="yusophclass">
    <div id="chat"></div>
    <b id="if_typing"></b>
    <form id="send-message">
        <input type="" size="35" id="message">
        <input type="submit" name="">
    </form>
    <script src='https://code.jquery.com/jquery-latest.min.js' ></script>
    <script src="/socket.io/socket.io.js"></script>
    <script type="text/javascript">
        jQuery(function($){
            var socket = io.connect(); 
            var $messageForm = $("#send-message");
            var $messageBox = $("#message");
            var $chat = $("#chat");
            var $new_user = $("#new_user_b");
            var timeout;
           
            $messageForm.submit(function(e){ 
                e.preventDefault();
                socket.emit('send message', $messageBox.val());
                $messageBox.val('');
            });

            $messageBox.keyup(function(){
                socket.emit('typing');
            });

            socket.on('tell type', function(data){
                    $("#if_typing").text(data + " is typing..... ");
                });

            socket.on('new message', function(data){    
                $chat.append("<b>" + data.userID + "</b>: <i> " + data.msg + "</i> <br/>");
            });

            socket.on('new user', function(data){
                $chat.append(" <span class='new_user'> User <b>" + data + "</b> is in the conversation </span> <br>");
            });

        })
    </script>
    </body>
</html><!Doctype html>
<html>
    <head>
    <style>
        #chat{ height: 500px }
        .new_user{color: #999999; font-size: 12px; font-family: arial; padding: 25px; padding-top: 85px}
    </style>
    </head>
    <body>
    <div id="chat"></div>
    <b id="if_typing"></b>
    <form id="send-message">
        <input type="" size="35" id="message">
        <input type="submit" name="">
    </form>
    <script src='https://code.jquery.com/jquery-latest.min.js' ></script>
    <script src="/socket.io/socket.io.js"></script>
    <script type="text/javascript">
        jQuery(function($){
            var socket = io.connect(); 
            var $messageForm = $("#send-message");
            var $messageBox = $("#message");
            var $chat = $("#chat");
            var $new_user = $("#new_user_b");
            var timeout;
           
            $messageForm.submit(function(e){ 
                e.preventDefault();
                socket.emit('send message', $messageBox.val());
                $messageBox.val('');
            });

            $messageBox.keyup(function(){
                socket.emit('typing');
            });

            socket.on('tell type', function(data){
                    $("#if_typing").text(data + " is typing..... ");
                });

            socket.on('new message', function(data){    
                $chat.append("<b>" + data.userID + "</b>: <i> " + data.msg + "</i> <br/>");
            });

            socket.on('new user', function(data){
                $chat.append(" <span class='new_user'> User <b>" + data + "</b> is in the conversation </span> <br>");
            });

        })
    </script>
    </body>
</html>