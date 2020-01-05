<html>
    <head>
        <style>
            .chat-area {
                /*text-align: center;*/
                width: 30%;
                margin: auto;
                height: 300px;
                background: aliceblue;
                border-radius: 10px;
                margin-bottom: 15px;
            }

            .chat{
                padding: 15px;
            }

            .chat-design{
                width: 30%;
                height: 50px;
                border-radius: 10px;
                margin: auto;

            }
        </style>
    </head>

<body>

<div class="chat-area">
    <div class="chat" id="chat-box">
        <br>
    </div>
</div>

<div style="text-align: center">
    <textarea id="msg" class="chat-design">
    </textarea>
</div>


<script>

    //triggers onOpen and onMessage of backend
    conn = new WebSocket('ws://localhost:8080');

    //if success
    conn.onopen = function(e) {
        console.log('Online')
    };

    //sending message to server
    let msg = document.getElementById('msg');
    msg.addEventListener('keyup', function (e) {
        if(e.keyCode === 13){
            if( msg.value != null){
                document.getElementById('chat-box').append('Me: ' + msg.value);
                document.getElementById('chat-box').appendChild(document.createElement('br'));
                //conn.send(msg.value);
                msg.value = '';
            }
        }
    });

    //receiving message from server
    conn.onmessage = function (e) {
        document.getElementById('friend').innerText = 'Friend: ' + e.data;
    };
    //if connection closed
    conn.onclose = function(error) {
        console.log('connection is in offline')
    };

</script>

</body>


</html>