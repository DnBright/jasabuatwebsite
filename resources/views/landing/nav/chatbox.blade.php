<!-- Floating Live Chatbox Widget -->
<div class="chat-widget-container">
    <!-- Chatbox Toggle Button -->
    <button class="chat-toggle-btn" id="chatToggleBtn" aria-label="Buka Chat">
        <span class="chat-unread-badge" id="chatUnreadBadge" style="display: none;">0</span>
        <svg class="chat-icon-open" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
        </svg>
        <svg class="chat-icon-close" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="display: none;">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
    </button>

    <!-- Chat Window -->
    <div class="chat-window shadow-2xl" id="chatWindow" style="display: none;">
        <!-- Chat Header -->
        <div class="chat-header">
            <div class="chat-admin-info">
                <div class="chat-avatar">
                    <span class="avatar-dot"></span>
                    <i data-lucide="user" class="avatar-icon"></i>
                </div>
                <div>
                    <h4 class="chat-title">Tanya Admin</h4>
                    <span class="chat-status">Online • Siap Membantu</span>
                </div>
            </div>
            <button class="chat-close-btn" id="chatCloseBtn" aria-label="Tutup Chat">&times;</button>
        </div>

        <!-- Chat Onboarding / Welcome Form (Show first if session name is empty) -->
        <div class="chat-onboarding-form" id="chatOnboardingForm">
            <div class="onboarding-welcome">
                <span class="welcome-emoji">👋</span>
                <p>Halo! Ingin tanya-tanya seputar pembuatan website? Tulis nama dan kontak Anda untuk memulai konsultasi langsung.</p>
            </div>
            <form id="chatStartForm">
                <div class="form-group">
                    <label for="chatVisitorName">Nama Anda <span class="text-red-500">*</span></label>
                    <input type="text" id="chatVisitorName" placeholder="Contoh: Budi Santoso" required>
                </div>
                <div class="form-group">
                    <label for="chatVisitorContact">No. WhatsApp / Email <span class="text-red-500">*</span></label>
                    <input type="text" id="chatVisitorContact" placeholder="Contoh: 08123456789" required>
                </div>
                <div class="form-group">
                    <label for="chatFirstMessage">Pesan Pertanyaan <span class="text-red-500">*</span></label>
                    <textarea id="chatFirstMessage" rows="3" placeholder="Tulis pertanyaan Anda di sini..." required></textarea>
                </div>
                <button type="submit" class="btn-start-chat">Mulai Konsultasi</button>
            </form>
        </div>

        <!-- Chat Thread Area (Hidden until onboarding completes) -->
        <div class="chat-thread-container" id="chatThreadContainer" style="display: none;">
            <div class="chat-messages-area" id="chatMessagesArea">
                <!-- Messages will be injected here -->
            </div>

            <!-- Chat Footer Input -->
            <form class="chat-input-form" id="chatInputForm">
                <input type="text" id="chatMessageInput" placeholder="Ketik pesan di sini..." required autocomplete="off">
                <button type="submit" class="btn-send-message" aria-label="Kirim Pesan">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <line x1="22" y1="2" x2="11" y2="13"></line>
                        <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                    </svg>
                </button>
            </form>
        </div>
    </div>
</div>

<style>
    /* CSS Styling for Chat Widget */
    .chat-widget-container {
        position: fixed;
        bottom: 110px; /* Positioned slightly above WhatsApp bubble */
        right: 30px;
        z-index: 1000;
        font-family: 'Outfit', 'Inter', sans-serif;
    }

    .chat-toggle-btn {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, var(--color-primary-light, #1c283e) 0%, var(--color-primary, #141213) 100%);
        border: 2px solid rgba(255, 255, 255, 0.15);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        position: relative;
    }

    .chat-toggle-btn:hover {
        transform: scale(1.08) translateY(-3px);
        box-shadow: 0 15px 35px rgba(59, 130, 246, 0.25);
        border-color: #3b82f6;
    }

    .chat-toggle-btn svg {
        width: 26px;
        height: 26px;
    }

    .chat-unread-badge {
        position: absolute;
        top: -3px;
        right: -3px;
        background-color: #ef4444;
        color: white;
        font-size: 0.75rem;
        font-weight: 800;
        width: 22px;
        height: 22px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 2px solid #ffffff;
        animation: pulseBadge 2s infinite;
    }

    @keyframes pulseBadge {
        0% { transform: scale(1); }
        50% { transform: scale(1.15); }
        100% { transform: scale(1); }
    }

    .chat-window {
        position: absolute;
        bottom: 75px;
        right: 0;
        width: 380px;
        height: 520px;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 24px;
        display: flex;
        flex-direction: column;
        overflow: hidden;
        animation: chatSlideUp 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }

    @keyframes chatSlideUp {
        0% { transform: translateY(30px); opacity: 0; }
        100% { transform: translateY(0); opacity: 1; }
    }

    .chat-header {
        background: linear-gradient(135deg, var(--color-primary-light, #1c283e) 0%, var(--color-primary, #141213) 100%);
        color: white;
        padding: 1.25rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .chat-admin-info {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .chat-avatar {
        width: 40px;
        height: 40px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        border: 1.5px solid rgba(255, 255, 255, 0.2);
    }

    .avatar-icon {
        width: 20px;
        height: 20px;
        color: #94a3b8;
    }

    .avatar-dot {
        width: 10px;
        height: 10px;
        background: #10b981;
        border-radius: 50%;
        position: absolute;
        bottom: 0;
        right: 0;
        border: 2px solid var(--color-primary, #141213);
    }

    .chat-title {
        font-size: 1rem;
        font-weight: 800;
        margin: 0;
        letter-spacing: -0.5px;
    }

    .chat-status {
        font-size: 0.75rem;
        color: #94a3b8;
        font-weight: 500;
    }

    .chat-close-btn {
        background: transparent;
        border: none;
        color: rgba(255, 255, 255, 0.6);
        font-size: 1.75rem;
        cursor: pointer;
        line-height: 1;
        transition: color 0.2s ease;
    }

    .chat-close-btn:hover {
        color: white;
    }

    /* Onboarding State */
    .chat-onboarding-form {
        padding: 1.5rem;
        flex-grow: 1;
        overflow-y: auto;
        display: flex;
        flex-direction: column;
        gap: 1.25rem;
        background-color: #f8fafc;
    }

    .onboarding-welcome {
        display: flex;
        gap: 0.75rem;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        padding: 1rem;
        border-radius: 16px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02);
    }

    .welcome-emoji {
        font-size: 1.5rem;
        line-height: 1;
    }

    .onboarding-welcome p {
        font-size: 0.85rem;
        color: var(--color-text-muted, #5e6b7e);
        line-height: 1.45;
        margin: 0;
        font-weight: 500;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 0.35rem;
        margin-bottom: 1rem;
    }

    .form-group label {
        font-size: 0.8rem;
        font-weight: 700;
        color: var(--color-primary, #141213);
    }

    .form-group input, .form-group textarea {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1.5px solid #cbd5e1;
        border-radius: 12px;
        font-size: 0.85rem;
        font-family: inherit;
        background-color: white;
        transition: border-color 0.2s ease;
    }

    .form-group input:focus, .form-group textarea:focus {
        outline: none;
        border-color: #3b82f6;
    }

    .btn-start-chat {
        width: 100%;
        padding: 0.95rem;
        background: linear-gradient(135deg, var(--color-primary, #141213) 0%, var(--color-primary-light, #1c283e) 100%);
        color: white;
        border: none;
        border-radius: 12px;
        font-weight: 700;
        font-size: 0.9rem;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(20, 18, 19, 0.15);
    }

    .btn-start-chat:hover {
        opacity: 0.95;
        transform: translateY(-1px);
    }

    /* Thread State */
    .chat-thread-container {
        display: flex;
        flex-direction: column;
        flex-grow: 1;
        height: calc(100% - 73px); /* Subtract header height */
    }

    .chat-messages-area {
        flex-grow: 1;
        padding: 1.25rem;
        overflow-y: auto;
        display: flex;
        flex-direction: column;
        gap: 1rem;
        background-color: #f8fafc;
    }

    .message-bubble {
        max-width: 80%;
        padding: 0.85rem 1.1rem;
        border-radius: 18px;
        font-size: 0.85rem;
        line-height: 1.4;
        word-wrap: break-word;
        position: relative;
    }

    .message-bubble.visitor {
        align-self: flex-end;
        background: #3b82f6;
        color: white;
        border-bottom-right-radius: 4px;
        box-shadow: 0 4px 10px rgba(59, 130, 246, 0.15);
    }

    .message-bubble.admin {
        align-self: flex-start;
        background: #ffffff;
        color: var(--color-primary, #141213);
        border: 1px solid #e2e8f0;
        border-bottom-left-radius: 4px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.02);
    }

    .message-time {
        font-size: 0.65rem;
        color: rgba(0, 0, 0, 0.35);
        display: block;
        margin-top: 0.35rem;
        text-align: right;
    }

    .message-bubble.visitor .message-time {
        color: rgba(255, 255, 255, 0.7);
    }

    /* Chat Input */
    .chat-input-form {
        display: flex;
        padding: 0.85rem;
        background: white;
        border-top: 1px solid #e2e8f0;
        align-items: center;
        gap: 0.5rem;
    }

    #chatMessageInput {
        flex-grow: 1;
        border: none;
        padding: 0.65rem 1rem;
        border-radius: 20px;
        background: #f1f5f9;
        font-size: 0.85rem;
        font-family: inherit;
    }

    #chatMessageInput:focus {
        outline: none;
        background: #e2e8f0;
    }

    .btn-send-message {
        background: #3b82f6;
        color: white;
        border: none;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.2s ease;
        flex-shrink: 0;
    }

    .btn-send-message:hover {
        background: #2563eb;
        transform: scale(1.05);
    }

    .btn-send-message svg {
        width: 16px;
        height: 16px;
        margin-left: 2px;
        margin-top: -1px;
    }

    @media (max-width: 480px) {
        .chat-widget-container {
            bottom: 95px;
            right: 20px;
        }
        .chat-window {
            width: calc(100vw - 40px);
            height: 480px;
            bottom: 70px;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const chatToggleBtn = document.getElementById('chatToggleBtn');
        const chatCloseBtn = document.getElementById('chatCloseBtn');
        const chatWindow = document.getElementById('chatWindow');
        const chatOnboardingForm = document.getElementById('chatOnboardingForm');
        const chatThreadContainer = document.getElementById('chatThreadContainer');
        const chatStartForm = document.getElementById('chatStartForm');
        const chatInputForm = document.getElementById('chatInputForm');
        const chatMessagesArea = document.getElementById('chatMessagesArea');
        const chatMessageInput = document.getElementById('chatMessageInput');
        const chatUnreadBadge = document.getElementById('chatUnreadBadge');
        
        const openIcon = chatToggleBtn.querySelector('.chat-icon-open');
        const closeIcon = chatToggleBtn.querySelector('.chat-icon-close');

        let sessionId = localStorage.getItem('chat_session_id');
        let visitorName = localStorage.getItem('chat_visitor_name');
        let visitorContact = localStorage.getItem('chat_visitor_contact');
        let pollingInterval = null;
        let lastMessageCount = 0;

        // Generate session ID if not exists
        if (!sessionId) {
            sessionId = 'sess_' + Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15);
            localStorage.setItem('chat_session_id', sessionId);
        }

        // Toggle chat visibility
        chatToggleBtn.addEventListener('click', function() {
            const isOpened = chatWindow.style.display !== 'none';
            if (isOpened) {
                closeChat();
            } else {
                openChat();
            }
        });

        chatCloseBtn.addEventListener('click', closeChat);

        function openChat() {
            chatWindow.style.display = 'flex';
            openIcon.style.display = 'none';
            closeIcon.style.display = 'block';
            chatUnreadBadge.style.display = 'none';
            chatUnreadBadge.textContent = '0';

            // Check if user has completed onboarding
            if (visitorName) {
                chatOnboardingForm.style.display = 'none';
                chatThreadContainer.style.display = 'flex';
                loadChatHistory();
            } else {
                chatOnboardingForm.style.display = 'flex';
                chatThreadContainer.style.display = 'none';
            }

            // Start polling when open
            startPolling();
        }

        function closeChat() {
            chatWindow.style.display = 'none';
            openIcon.style.display = 'block';
            closeIcon.style.display = 'none';
            
            // Stop polling when closed
            stopPolling();
        }

        // Submit onboarding form
        chatStartForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            visitorName = document.getElementById('chatVisitorName').value.trim();
            visitorContact = document.getElementById('chatVisitorContact').value.trim();
            const firstMessage = document.getElementById('chatFirstMessage').value.trim();

            if (!visitorName || !visitorContact || !firstMessage) return;

            // Save details to localStorage
            localStorage.setItem('chat_visitor_name', visitorName);
            localStorage.setItem('chat_visitor_contact', visitorContact);

            // Send first message to server
            fetch("{{ route('api.chat.send') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    session_id: sessionId,
                    name: visitorName,
                    email_whatsapp: visitorContact,
                    message: firstMessage
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    // Switch UI to chat area
                    chatOnboardingForm.style.display = 'none';
                    chatThreadContainer.style.display = 'flex';
                    
                    // Clear onboarding inputs
                    document.getElementById('chatFirstMessage').value = '';
                    
                    // Load conversation
                    loadChatHistory();
                }
            })
            .catch(err => console.error('Error starting chat:', err));
        });

        // Submit message form (subsequent messages)
        chatInputForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const text = chatMessageInput.value.trim();
            if (!text) return;

            chatMessageInput.value = '';

            // Send message to server
            fetch("{{ route('api.chat.send') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    session_id: sessionId,
                    message: text
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    appendMessage(data.message);
                    scrollToBottom();
                }
            })
            .catch(err => console.error('Error sending message:', err));
        });

        // Load chat history from server
        function loadChatHistory(silent = false) {
            fetch("{{ route('api.chat.messages') }}?session_id=" + sessionId)
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    const messages = data.messages;
                    
                    if (messages.length > lastMessageCount) {
                        chatMessagesArea.innerHTML = '';
                        messages.forEach(msg => {
                            appendMessage(msg);
                        });
                        scrollToBottom();

                        // If loaded silently (polling) and window is closed, show unread count
                        if (silent && chatWindow.style.display === 'none') {
                            const newAdminMsgs = messages.filter(m => m.is_from_admin && !m.is_read);
                            if (newAdminMsgs.length > 0) {
                                chatUnreadBadge.textContent = newAdminMsgs.length;
                                chatUnreadBadge.style.display = 'flex';
                            }
                        }

                        lastMessageCount = messages.length;
                    }
                }
            })
            .catch(err => console.error('Error loading messages:', err));
        }

        // Append message to DOM
        function appendMessage(msg) {
            const isVisitor = !msg.is_from_admin;
            const bubble = document.createElement('div');
            bubble.className = `message-bubble ${isVisitor ? 'visitor' : 'admin'}`;
            
            // Format time (HH:MM)
            const date = new Date(msg.created_at);
            const timeStr = date.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' });

            bubble.innerHTML = `
                <div class="message-text">${escapeHTML(msg.message)}</div>
                <span class="message-time">${timeStr}</span>
            `;
            chatMessagesArea.appendChild(bubble);
        }

        // Helper functions
        function scrollToBottom() {
            chatMessagesArea.scrollTop = chatMessagesArea.scrollHeight;
        }

        function escapeHTML(str) {
            return str
                .replace(/&/g, "&amp;")
                .replace(/</g, "&lt;")
                .replace(/>/g, "&gt;")
                .replace(/"/g, "&quot;")
                .replace(/'/g, "&#039;");
        }

        function startPolling() {
            stopPolling(); // Reset
            loadChatHistory();
            pollingInterval = setInterval(function() {
                loadChatHistory(true);
            }, 5000); // Poll every 5 seconds
        }

        function stopPolling() {
            if (pollingInterval) {
                clearInterval(pollingInterval);
                pollingInterval = null;
            }
        }

        // Check for unreads immediately on page load (silent check)
        if (visitorName) {
            loadChatHistory(true);
            // We can also poll silently in background when page is open but chat widget is closed
            setInterval(function() {
                if (chatWindow.style.display === 'none') {
                    loadChatHistory(true);
                }
            }, 10000); // 10 seconds background check
        }
    });
</script>
