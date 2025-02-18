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
    <div class="container-fluid">
        <div class="row bg-secondary bg-opacity-25" style="height: 90vh; overflow: hidden;">
            <!-- Left Column: Messages List -->
            <div class="col-4 p-0">
                <div class="bg-secondary bg-opacity-25 p-0 rounded-1 text-black">
                    <h5 class="text-center">All Messages</h5>
                </div>
                @forelse ($list as $data)
                    <div class="clickable-container position-relative border border-1">
                        <a href="{{ route('chat.user', $data->sender->id) }}" class="stretched-link text-decoration-none">
                            <div class="d-flex align-items-center bg-secondary bg-opacity-25 rounded-1 px-3">
                                <div class="me-3">
                                    <img src="{{ asset($data->sender->image) }}" class="border border-1 border-secondary"
                                        height="50" width="50" alt="{{ $data->sender->fname }}"
                                        style="border-radius:50%; object-fit:cover;">
                                </div>
                                <div class="list-group">
                                    <div class="p-2">
                                        <div class="flex-grow-1">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <h6 class="mb-0 text-dark fw-bold">
                                                            {{ $data->sender->fname }} {{ $data->sender->lname }}
                                                        </h6>
                                                        <small class="text-muted">
                                                            {{ $data->created_at->format('h:i A') }}
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <p class="mb-0 text-muted">
                                                        {{ strlen($data->message) > 30 ? substr($data->message, 0, 30) . '...' : $data->message }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="row d-flex justify-content-center">
                        <div class="col-5">
                            <div class="bg-secondary bg-opacity-50 rounded-1 shadow-sm">
                                <h5 class="text-center text-black">No Message</h5>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Right Column: Chat Area -->
            <div class="col-8 bg-secondary bg-opacity-25" style="display: flex; flex-direction: column; height: 87vh;">
                <!-- User Info Section -->
                <div class="row mt-1 mb-1">
                    <div class="col-12">
                        <div class="d-flex align-items-center bg-secondary bg-opacity-25 rounded-1">
                            <div class="me-3">
                                <img src="{{ asset($user->image) }}" class="border border-1 border-secondary"
                                    height="50" width="50" alt=""
                                    style="border-radius:50%; object-fit:cover;">
                            </div>
                            <div class="list-group">
                                <div class="p-2">
                                    <div class="flex-grow-1">
                                        <div class="row">
                                            <div class="col-12">
                                                <h6 class="mb-0 text-dark fw-bold">{{ $user->fname }} {{ $user->mname }}
                                                    {{ $user->lname }} {{ $user->suffix }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-outline-danger ms-auto py-0 px-2 me-2" type="button" aria-label="Close"
                                onclick="window.location.href='{{ route('chat.list') }}'">
                                <span aria-hidden="true" class="h4">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>



                <!-- Chat Messages Section -->
                <div class="row flex-grow-1">
                    <div class="col-12">
                        <div id="chat-box" class="card border-secondary h-100">
                            <div class="card-body p-1" style="max-height: 67vh; overflow-y: auto;">
                                @forelse ($messages as $message)
                                    <div
                                        class="d-flex mb-1 {{ $message->sender_id === auth()->id() ? 'justify-content-end' : 'justify-content-start' }}">
                                        <div class="p-1 rounded
                                                    {{ $message->sender_id === auth()->id() ? 'bg-primary text-white' : 'bg-light text-dark' }}"
                                            style="max-width: 70%; border: 1px solid #ddd;">
                                            <small class="d-block fw-bold">
                                                {{ $message->sender_id === auth()->id() ? '' : '' }}
                                            </small>
                                            <div>{{ $message->message }}</div>
                                        </div>
                                    </div>
                                @empty
                                    <p id="no-messages" class="text-center text-muted">No messages yet. Start the
                                        conversation!</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Chat Form Section -->
                <div class="row">
                    <div class="col-12">
                        <form id="chat-form"
                            style="display: flex; padding: 5px; border-top: 1px solid #ddd; background: #ffffff00; position: sticky; bottom: 0;">
                            @csrf
                            <input type="hidden" id="receiver_id" value="{{ $user->id }}">
                            <textarea id="message" placeholder="Type your message..." required rows="1"
                                style="flex: 1; padding: 5px; border: 1px solid #ddd; border-radius: 5px; resize: none; overflow: hidden;"></textarea>
                            <button type="submit"
                                style="margin-left: 10px; padding: 5px 20px; background-color: #007bff; color: #fff; border: none; border-radius: 5px;">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        function fetchMessages() {
            fetch('{{ route('admin.chat.fetch', ['userId' => $user->id]) }}')
                .then(response => response.json())
                .then(data => {
                    const chatBox = document.getElementById('chat-box').querySelector('.card-body');
                    const noMessages = document.getElementById('no-messages');

                    // Clear "No messages" text
                    if (noMessages) noMessages.remove();

                    chatBox.innerHTML = ''; // Clear chat box
                    data.messages.forEach(message => {
                        const messageDiv = document.createElement('div');
                        messageDiv.style.display = 'flex';
                        messageDiv.style.marginBottom = '5px';
                        messageDiv.style.justifyContent = message.sender_id === {{ auth()->id() }} ?
                            'flex-end' : 'flex-start';

                        const contentDiv = document.createElement('div');
                        contentDiv.style.maxWidth = '70%';
                        contentDiv.style.padding = '5px';
                        contentDiv.style.borderRadius = '5px';
                        contentDiv.style.backgroundColor = message.sender_id === {{ auth()->id() }} ?
                            '#007bff' : '#f1f1f1';
                        contentDiv.style.color = message.sender_id === {{ auth()->id() }} ? '#fff' : '#000';
                        contentDiv.innerHTML = `<small>${message.sender_id === {{ auth()->id() }} ? '' : ''}</small>
                                        <div>${message.message}</div>`;
                        messageDiv.appendChild(contentDiv);
                        chatBox.appendChild(messageDiv);
                    });

                    // Auto-scroll to the bottom
                    chatBox.scrollTop = chatBox.scrollHeight;
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
