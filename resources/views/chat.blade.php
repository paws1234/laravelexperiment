@extends('layouts.app')

@section('content')
<head>
    <style>
         body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    #chat-container {
        display: flex;
        flex-wrap: wrap;
        max-width: 800px;
        margin: 0 auto;
        border-radius: 10px;
        overflow: hidden;
        background-color: #ffffff;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    #user-list {
        flex: 1;
        background-color: #eb1010;
        padding: 10px;
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
    }

    #user-list .user-item {
        cursor: pointer;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #cccccc;
        border-radius: 3px;
        background-color: #fff;
        transition: background-color 0.2s;
        font-size: 16px;
        color: #333;
    }

    #user-list .user-item:hover {
        background-color: #e0e0e0;
    }

        #chat {
            display: flex;
            flex-direction: column;
        }

        .chat-messages {
        display: flex;
        flex-direction: column; 
        align-items: flex-end; 
        flex-grow: 1;
        overflow-y: auto;
    }

    .sent-message {
        background-color: blue;
        color: white;
        border-radius: 10px;
        padding: 10px;
        margin: 5px;
        align-self: flex-end; 
    }

    .received-message {
        background-color: yellow;
        border-radius: 10px;
        padding: 10px;
        margin: 5px;
        align-self: flex-start; 
    }

        .message-container {
            display: flex;
            justify-content: space-between;
        }

      
        #message {
            padding: 5px;
            border: 1px solid #cccccc;
            border-radius: 3px;
        }

        #send {
            padding: 5px 10px;
            border: 1px solid #cccccc;
            border-radius: 3px;
        }
    </style>
</head>

<div id="chat">
    <div id="user-list">
        @foreach ($otherUsers as $user)
        <div class="user-item" data-receiver-id="{{ $user->id }}">
            {{ $user->name }}
        </div>
        @endforeach
    </div>
    <div class="chat-messages">
        <!-- Messages will be displayed here -->
    </div>
    <input type="text" id="message" placeholder="Type your message">
    <button id="send">Send</button>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   $(document).ready(function () {
    const messageBox = $('.chat-messages');
    const messageInput = $('#message');
    const sendButton = $('#send');
    const authUser = '{{ auth()->user()->name }}';
    let receiverId;
    let messages = [];

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    let isFetching = false;
  
    function loadChat(receiverId) {
    if (isFetching) {
        return; 
    }

    isFetching = true; 
    $.ajax({
        url: '/get-messages',
        type: 'GET',
        data: { receiver_id: receiverId },
        success: function (response) {
            messages = response.messages;
            processMessages(messages);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.error('AJAX Error:', textStatus, errorThrown);
        },
        complete: function () {
            isFetching = false; 
        }
    }); 
}


    function processMessages(messages) {
    const messageContainer = $('.chat-messages');
    messageContainer.empty();

    messages.forEach((message) => {
        const sender = message.sender.name;
        const messageText = message.message;
        const messageElement = $('<p></p>').text(sender + ': ' + messageText);

      
        if (sender === authUser) {
            messageElement.addClass('sent-message');
        } else {
            messageElement.addClass('received-message');
        }

        messageContainer.append(messageElement);
    });
}

  
    function appendMessage(sender, message) {
        messageBox.append(`<p><strong>${sender}:</strong> ${message}</p>`);
    }

   
    $('.user-item').click(function () {
        receiverId = $(this).data('receiver-id');
        console.log('Receiver ID:', receiverId);
        loadChat(receiverId);
    });

    
    setInterval(function () {
    if (receiverId) {
        loadChat(receiverId);
    }
}, -3000);

    
    sendButton.click(function () {
        const message = messageInput.val();

        if (message.trim() === '' || !receiverId) {
            return;
        }

        $.ajax({
            url: '/send-message',
            type: 'POST',
            data: {
                receiver_id: receiverId,
                message: message,
            },
            success: function (response) {
                appendMessage(authUser, message);
                messageInput.val('');
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error('AJAX Error:', textStatus, errorThrown);
            },
        });
    });

    console.log('Authenticated user:', authUser);
});



</script>
@endsection