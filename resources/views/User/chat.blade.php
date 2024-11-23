<x-app-layout>
    <section id="team" class="mt-3 team">
        <div class="container" data-aos="fade-up">
            <header class="section-header p-1">
                <h2 class="text-danger">Chat here</h2>
                <h3 class="font-web fw-bold" style="color: #012970;">Ask here</h3>
            </header>

            {{-- <h3>Chat with Admin: {{ $admin->fname }}</h3> --}}

            <div id="chat-box"
                style="height: calc(85vh - 200px); overflow-y: auto; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                @forelse ($messages as $message)
                    <div
                        style="margin-bottom: 10px; display: flex; {{ $message->sender_id === auth()->id() ? 'justify-content: flex-end;' : '' }}">
                        <div
                            style="max-width: 70%; padding: 5px; border-radius: 1px; background-color: {{ $message->sender_id === auth()->id() ? '#007bff' : '#f1f1f1' }}; color: {{ $message->sender_id === auth()->id() ? '#fff' : '#000' }};">
                            <strong>{{ $message->sender_id === auth()->id() ? 'You' : $admin->fname }}:</strong>
                            <div>{{ $message->message }}</div>
                        </div>
                    </div>
                @empty
                    <p id="no-messages">No messages yet. Start the conversation!</p>
                @endforelse
            </div>


            <form id="chat-form" style="margin-top: 15px;">
                @csrf
                <input type="hidden" id="receiver_id" value="{{ $admin->id }}">
                <div style="display: flex; align-items: center;">
                    <textarea id="message" placeholder="Type your message..." required
                        style="flex: 1; padding: 5px; border: 1px solid #ddd; border-radius: 5px; resize: none;"></textarea>
                    <button type="submit"
                        style="margin-left: 10px; padding: 10px 20px; background-color: #007bff; color: #fff; border: none; border-radius: 5px;">Send</button>
                </div>
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
                        contentDiv.style.borderRadius = '15px';
                        contentDiv.style.backgroundColor = message.sender_id === {{ auth()->id() }} ?
                            '#007bff' : '#f1f1f1';
                        contentDiv.style.color = message.sender_id === {{ auth()->id() }} ? '#fff' : '#000';
                        contentDiv.innerHTML = `<strong>${message.sender_id === {{ auth()->id() }} ? 'You' : '{{ $admin->fname }}'}:</strong>
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
                    document.getElementById('message').value = ''; // Clear message input
                    fetchMessages(); // Fetch updated messages
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
</x-app-layout>
