<x-app-layout>
    <section id="team" class="mt-3 team">
        <div class="container" data-aos="fade-up">
            <header class="section-header p-1 text-center">
                <h2 class="text-danger">Chat here</h2>
                <h3 class="font-web fw-bold" style="color: #012970;">Ask here</h3>
            </header>

            <div id="chat-box"
                style="height: calc(70vh); overflow-y: auto; padding: 15px; border: 1px solid #ddd; border-radius: 10px; background-color: #f9f9f9; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
                @forelse ($messages as $message)
                    <div
                        style="margin-bottom: 10px; display: flex; {{ $message->sender_id === auth()->id() ? 'justify-content: flex-end;' : '' }}">
                        <div
                            style="max-width: 70%; padding: 10px; border-radius: 5px; background-color: {{ $message->sender_id === auth()->id() ? '#007bff' : '#e9ecef' }}; color: {{ $message->sender_id === auth()->id() ? '#fff' : '#000' }}; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);">
                            <div>{{ $message->message }}</div>
                        </div>
                    </div>

                @empty
                    <p id="no-messages" style="text-align: center; color: #888;">No messages yet. Start the
                        conversation!</p>
                @endforelse
            </div>

            <form id="chat-form" style="margin-top: 15px; display: flex; align-items: center;">
                @csrf
                <input type="hidden" id="receiver_id" value="{{ $admin->id }}">
                <textarea id="message" placeholder="Type your message..." required
                    style="flex: 1; padding: 10px; border: 1px solid #ddd; border-radius: 5px; resize: none; font-size: 14px; height: 40px; overflow: hidden;"></textarea>
                <button type="submit" class="btn btn-primary">Send</button>
            </form>

        </div>
    </section>

    <script>
        // Fetch new messages periodically
        function fetchMessages() {
            fetch('{{ route('chat.fetch', ['admin_id' => $admin->id]) }}')
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
                        contentDiv.style.borderRadius = '5px'; // Reduced border radius
                        contentDiv.style.backgroundColor = message.sender_id === {{ auth()->id() }} ?
                            '#007bff' : '#e9ecef';
                        contentDiv.style.color = message.sender_id === {{ auth()->id() }} ? '#fff' : '#000';
                        contentDiv.style.boxShadow = '0 1px 3px rgba(0, 0, 0, 0.1)';
                        contentDiv.innerHTML = `<div>${message.message}</div>`;

                        messageDiv.appendChild(contentDiv);
                        chatBox.appendChild(messageDiv);
                    });

                    chatBox.scrollTop = chatBox.scrollHeight; // Auto-scroll to the bottom
                });
        }

        // Periodically fetch messages
        setInterval(fetchMessages, 2000);

        // Handle form submission or pressing Enter
        const chatForm = document.getElementById('chat-form');
        const messageInput = document.getElementById('message');

        chatForm.addEventListener('submit', function(e) {
            e.preventDefault();
            sendMessage();
        });

        messageInput.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault(); // Prevent new line
                sendMessage();
            }
        });

        function sendMessage() {
            const message = messageInput.value.trim();
            const receiver_id = document.getElementById('receiver_id').value;

            if (!message) return;

            fetch('{{ route('chat.send') }}', {
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
                    messageInput.value = ''; // Clear message input
                    fetchMessages(); // Fetch updated messages
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
</x-app-layout>
