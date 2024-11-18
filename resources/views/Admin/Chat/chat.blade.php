@extends('adminlte::page')

@section('title', 'DR.MENDOZA MULTI-SPECIALIST CLINIC')
@section('css')
    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('Image/logo/mendoza.png') }}">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="{{ url('Css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('Css/all.min.css') }}">

    {{-- Add here extra stylesheets --}}
    <link rel="stylesheet" href="{{ url('vendor/adminlte/dist/css/custom-admin.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- Font --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: "Nunito", sans-serif;
        }
    </style>
@stop

@section('content')
    <h5 class="fw-bolder" style="color: #343984;"><i class="fa-solid fa-caret-right me-2"></i>Chat</h5>
    <hr class="mt-0 text-secondary">

    <h3>Chat with {{ $user->fname }}</h3>

    <div id="chat-box"
        style="max-height: 400px; overflow-y: auto; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
        @forelse ($messages as $message)
            <div
                style="margin-bottom: 10px; display: flex; {{ $message->sender_id === auth()->id() ? 'justify-content: flex-end;' : '' }}">
                <div
                    style="max-width: 70%; padding: 10px; border-radius: 15px; background-color: {{ $message->sender_id === auth()->id() ? '#007bff' : '#f1f1f1' }}; color: {{ $message->sender_id === auth()->id() ? '#fff' : '#000' }};">
                    <strong>{{ $message->sender_id === auth()->id() ? 'You' : $message->sender->fname }}:</strong>
                    <div>{{ $message->message }}</div>
                </div>
            </div>
        @empty
            <p id="no-messages">No messages yet. Start the conversation!</p>
        @endforelse
    </div>

    <form id="chat-form" style="margin-top: 15px;">
        @csrf
        <input type="hidden" id="receiver_id" value="{{ $user->id }}">
        <div style="display: flex; align-items: center;">
            <textarea id="message" placeholder="Type your message..." required
                style="flex: 1; padding: 10px; border: 1px solid #ddd; border-radius: 5px; resize: none;"></textarea>
            <button type="submit"
                style="margin-left: 10px; padding: 10px 20px; background-color: #007bff; color: #fff; border: none; border-radius: 5px;">Send</button>
        </div>
    </form>

    <script>
        // Fetch new messages periodically
        function fetchMessages() {
            fetch('{{ route('admin.chat.fetch', ['userId' => $user->id]) }}')
                .then(response => response.json())
                .then(data => {
                    const chatBox = document.getElementById('chat-box');
                    const noMessages = document.getElementById('no-messages');

                    // Clear "No messages" text
                    if (noMessages) noMessages.remove();

                    chatBox.innerHTML = ''; // Clear chat box
                    data.messages.forEach(message => {
                        const messageDiv = document.createElement('div');
                        messageDiv.style.display = 'flex';
                        messageDiv.style.marginBottom = '10px';
                        messageDiv.style.justifyContent = message.sender_id === {{ auth()->id() }} ?
                            'flex-end' : 'flex-start';

                        const contentDiv = document.createElement('div');
                        contentDiv.style.maxWidth = '70%';
                        contentDiv.style.padding = '10px';
                        contentDiv.style.borderRadius = '15px';
                        contentDiv.style.backgroundColor = message.sender_id === {{ auth()->id() }} ?
                            '#007bff' : '#f1f1f1';
                        contentDiv.style.color = message.sender_id === {{ auth()->id() }} ? '#fff' : '#000';
                        contentDiv.innerHTML = `<strong>${message.sender_id === {{ auth()->id() }} ? 'You' : '{{ $user->fname }}'}:</strong>
                                            <div>${message.message}</div>`;
                        messageDiv.appendChild(contentDiv);
                        chatBox.appendChild(messageDiv);
                    });

                    chatBox.scrollTop = chatBox.scrollHeight; // Auto-scroll to the bottom
                });
        }

        // Periodically fetch messages
        setInterval(fetchMessages, 2000);

        // Handle form submission
        document.getElementById('chat-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const message = document.getElementById('message').value;
            const receiver_id = document.getElementById('receiver_id').value;

            fetch('{{ route('admin.chat.send') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        message,
                        receiver_id
                    })
                })
                .then(response => response.json())
                .then(data => {
                    document.getElementById('message').value = ''; // Clear message input
                    fetchMessages(); // Fetch updated messages
                })
                .catch(error => console.error('Error:', error));
        });
    </script>

@stop


@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    {{-- <script>
            console.log("Hi, Welcome to E.A MENDOZA APPOINTMENT SYSTEM!");
        </script> --}}
@stop
