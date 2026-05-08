{{-- ================================================
   resources/views/chatbot/widget.blade.php
   এই file টা তোমার main layout এ include করো:
   @include('chatbot.widget')
   ================================================ --}}

<style>
/* ===== Chatbot Floating Button ===== */
#chatbot-btn {
    position: fixed;
    bottom: 24px;
    left: 24px;
    width: 56px;
    height: 56px;
    background: #e8192c; /* Blood bank এর red color */
    border-radius: 50%;
    border: none;
    cursor: pointer;
    box-shadow: 0 4px 16px rgba(232, 25, 44, 0.45);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
    transition: transform 0.2s, box-shadow 0.2s;
}
#chatbot-btn:hover {
    transform: scale(1.1);
    box-shadow: 0 6px 20px rgba(232, 25, 44, 0.55);
}
#chatbot-btn svg { width: 26px; height: 26px; fill: white; }

/* ===== Notification Badge ===== */
#chat-badge {
    position: absolute;
    top: -4px;
    right: -4px;
    background: #fff;
    color: #e8192c;
    font-size: 10px;
    font-weight: 700;
    width: 18px;
    height: 18px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1.5px solid #e8192c;
}

/* ===== Chat Window ===== */
#chatbot-window {
    position: fixed;
    bottom: 90px;
    right: 24px;
    width: 360px;
    height: 480px;
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 8px 40px rgba(0,0,0,0.18);
    display: flex;
    flex-direction: column;
    z-index: 9998;
    overflow: hidden;
    /* Initially hidden */
    opacity: 0;
    pointer-events: none;
    transform: translateY(12px) scale(0.97);
    transition: opacity 0.22s ease, transform 0.22s ease;
}
#chatbot-window.open {
    opacity: 1;
    pointer-events: all;
    transform: translateY(0) scale(1);
}

/* ===== Header ===== */
#chat-header {
    background: #e8192c;
    color: white;
    padding: 14px 16px;
    display: flex;
    align-items: center;
    gap: 10px;
}
#chat-header .avatar {
    width: 36px;
    height: 36px;
    background: rgba(255,255,255,0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    flex-shrink: 0;
}
#chat-header .info { flex: 1; }
#chat-header .name { font-weight: 700; font-size: 14px; line-height: 1.2; }
#chat-header .status {
    font-size: 11px;
    opacity: 0.85;
    display: flex;
    align-items: center;
    gap: 4px;
}
#chat-header .status::before {
    content: '';
    width: 7px;
    height: 7px;
    background: #4ade80;
    border-radius: 50%;
    display: inline-block;
}
#chat-close {
    background: none;
    border: none;
    color: white;
    cursor: pointer;
    font-size: 22px;
    line-height: 1;
    padding: 0;
    opacity: 0.8;
}
#chat-close:hover { opacity: 1; }

/* ===== Messages Area ===== */
#chat-messages {
    flex: 1;
    overflow-y: auto;
    padding: 16px;
    display: flex;
    flex-direction: column;
    gap: 10px;
    background: #f8f9fb;
}
/* Scrollbar style */
#chat-messages::-webkit-scrollbar { width: 4px; }
#chat-messages::-webkit-scrollbar-thumb { background: #ddd; border-radius: 4px; }

/* Message bubbles */
.msg {
    max-width: 82%;
    padding: 9px 13px;
    border-radius: 14px;
    font-size: 13.5px;
    line-height: 1.5;
    word-break: break-word;
}
.msg.user {
    background: #e8192c;
    color: white;
    align-self: flex-end;
    border-bottom-right-radius: 4px;
}
.msg.bot {
    background: white;
    color: #222;
    align-self: flex-start;
    border-bottom-left-radius: 4px;
    box-shadow: 0 1px 4px rgba(0,0,0,0.08);
}

/* Typing indicator */
#typing-indicator {
    align-self: flex-start;
    background: white;
    padding: 10px 14px;
    border-radius: 14px;
    border-bottom-left-radius: 4px;
    box-shadow: 0 1px 4px rgba(0,0,0,0.08);
    display: none; /* JS দিয়ে show করবে */
}
#typing-indicator span {
    display: inline-block;
    width: 7px;
    height: 7px;
    background: #bbb;
    border-radius: 50%;
    margin: 0 2px;
    animation: bounce 1.2s infinite;
}
#typing-indicator span:nth-child(2) { animation-delay: 0.2s; }
#typing-indicator span:nth-child(3) { animation-delay: 0.4s; }
@keyframes bounce {
    0%, 80%, 100% { transform: translateY(0); }
    40% { transform: translateY(-6px); }
}

/* Quick action buttons */
#quick-actions {
    padding: 8px 16px;
    display: flex;
    gap: 6px;
    flex-wrap: wrap;
    background: #f8f9fb;
    border-top: 1px solid #f0f0f0;
}
.quick-btn {
    background: white;
    border: 1px solid #e8192c;
    color: #e8192c;
    padding: 5px 10px;
    border-radius: 20px;
    font-size: 11.5px;
    cursor: pointer;
    transition: background 0.15s, color 0.15s;
    white-space: nowrap;
}
.quick-btn:hover { background: #e8192c; color: white; }

/* ===== Input Area ===== */
#chat-input-area {
    padding: 12px 14px;
    border-top: 1px solid #eee;
    display: flex;
    gap: 8px;
    background: white;
}
#chat-input {
    flex: 1;
    border: 1.5px solid #e0e0e0;
    border-radius: 22px;
    padding: 9px 14px;
    font-size: 13.5px;
    outline: none;
    resize: none;
    font-family: inherit;
    transition: border-color 0.15s;
    max-height: 80px;
}
#chat-input:focus { border-color: #e8192c; }
#chat-send {
    width: 40px;
    height: 40px;
    background: #e8192c;
    border: none;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    transition: background 0.15s;
    align-self: flex-end;
}
#chat-send:hover { background: #c0121f; }
#chat-send svg { width: 18px; height: 18px; fill: white; }
#chat-send:disabled { background: #ddd; cursor: not-allowed; }

/* Mobile responsive */
@media (max-width: 400px) {
    #chatbot-window { width: calc(100vw - 24px); right: 12px; bottom: 80px; }
}
</style>

{{-- ===== Floating Button ===== --}}
<button id="chatbot-btn" onclick="toggleChat()" title="Blood Bank AI Assistant">
    <span id="chat-badge">1</span>
    {{-- Chat icon --}}
    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path d="M12 2C6.48 2 2 6.48 2 12c0 1.85.5 3.58 1.37 5.06L2 22l4.94-1.37C8.42 21.5 10.15 22 12 22c5.52 0 10-4.48 10-10S17.52 2 12 2zm0 18c-1.66 0-3.2-.46-4.53-1.25l-.32-.19-3.33.87.87-3.32-.2-.33C3.46 15.2 3 13.66 3 12c0-4.97 4.03-9 9-9s9 4.03 9 9-4.03 9-9 9zm4.5-6.75c-.25-.12-1.47-.72-1.69-.8-.23-.08-.39-.12-.56.12-.16.25-.63.8-.77.96-.14.17-.29.19-.54.06-.25-.12-1.04-.38-1.99-1.22-.73-.65-1.23-1.46-1.37-1.71-.14-.25-.02-.38.1-.51.11-.11.25-.29.37-.43.12-.14.16-.25.25-.41.08-.16.04-.31-.02-.43-.06-.12-.56-1.34-.76-1.84-.2-.48-.4-.41-.56-.42h-.47c-.16 0-.43.06-.66.31-.23.25-.86.84-.86 2.05s.88 2.38 1 2.54c.12.16 1.73 2.64 4.19 3.7.59.25 1.04.4 1.4.52.59.19 1.12.16 1.54.1.47-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.14-1.18-.07-.11-.23-.17-.48-.29z"/>
    </svg>
</button>

{{-- ===== Chat Window ===== --}}
<div id="chatbot-window">

    {{-- Header --}}
    <div id="chat-header">
        <div class="avatar">🩸</div>
        <div class="info">
            <div class="name">LPI Blood Bank AI</div>
            <div class="status">সর্বদা সক্রিয় (24/7)</div>
        </div>
        <button id="chat-close" onclick="toggleChat()">×</button>
    </div>

    {{-- Messages --}}
    <div id="chat-messages">
        {{-- Welcome message (static) --}}
        <div class="msg bot">
            স্বাগতম! 🩸 আমি LPI Blood Bank এর AI assistant।<br><br>
            আপনি কি blood donor খুঁজছেন? অথবা blood donation সম্পর্কে জানতে চান?
        </div>

        {{-- Typing indicator --}}
        <div id="typing-indicator">
            <span></span><span></span><span></span>
        </div>
    </div>

    {{-- Quick Action Buttons --}}
    <div id="quick-actions">
        <button class="quick-btn" onclick="sendQuick('O+ blood donor দরকার')">O+ Donor খুঁজি</button>
        <button class="quick-btn" onclick="sendQuick('Blood donation এর নিয়ম কি?')">Donation Rules</button>
        <button class="quick-btn" onclick="sendQuick('Emergency blood দরকার')">Emergency</button>
    </div>

    {{-- Input Area --}}
    <div id="chat-input-area">
        <textarea
            id="chat-input"
            placeholder="আপনার প্রশ্ন লিখুন..."
            rows="1"
            onkeydown="handleKey(event)"
            oninput="autoResize(this)"
        ></textarea>
        <button id="chat-send" onclick="sendMessage()">
            <svg viewBox="0 0 24 24"><path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/></svg>
        </button>
    </div>
</div>

<script>
// ===== CSRF Token (Laravel এর জন্য দরকার) =====
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

// ===== Unique Session ID তৈরি করো =====
// localStorage ব্যবহার করছি যাতে browser বন্ধ করে খুললেও session থাকে
let sessionId = localStorage.getItem('blood_chat_session');
if (!sessionId) {
    sessionId = 'sess_' + Date.now() + '_' + Math.random().toString(36).slice(2, 9);
    localStorage.setItem('blood_chat_session', sessionId);
}

// ===== Chat open/close toggle =====
function toggleChat() {
    const win = document.getElementById('chatbot-window');
    const badge = document.getElementById('chat-badge');

    win.classList.toggle('open');

    // Badge hide করো যখন chat খুলবে
    if (win.classList.contains('open')) {
        badge.style.display = 'none';
        // Chat খুললে input focus করো
        setTimeout(() => document.getElementById('chat-input').focus(), 250);
    }
}

// ===== Quick action button থেকে message পাঠাও =====
function sendQuick(text) {
    document.getElementById('chat-input').value = text;
    sendMessage();
}

// ===== Enter key দিয়ে send (Shift+Enter = new line) =====
function handleKey(e) {
    if (e.key === 'Enter' && !e.shiftKey) {
        e.preventDefault();
        sendMessage();
    }
}

// ===== Textarea auto-resize =====
function autoResize(el) {
    el.style.height = 'auto';
    el.style.height = Math.min(el.scrollHeight, 80) + 'px';
}

// ===== MAIN: Message পাঠাও =====
async function sendMessage() {
    const input   = document.getElementById('chat-input');
    const sendBtn = document.getElementById('chat-send');
    const message = input.value.trim();

    if (!message) return; // Empty message ignore করো

    // UI update
    input.value = '';
    input.style.height = 'auto';
    sendBtn.disabled = true;

    // User message দেখাও
    appendMessage('user', message);

    // Typing indicator দেখাও
    showTyping(true);

    try {
        // Laravel API তে POST request
        const response = await fetch('/chatbot/message', {
            method: 'POST',
            headers: {
                'Content-Type':  'application/json',
                'X-CSRF-TOKEN':  csrfToken, // Laravel CSRF
                'Accept':        'application/json',
            },
            body: JSON.stringify({
                message:    message,
                session_id: sessionId,
            }),
        });

        const data = await response.json();

        // Typing indicator বন্ধ করো
        showTyping(false);

        if (data.success) {
            appendMessage('bot', data.reply);
        } else {
            appendMessage('bot', 'দুঃখিত, কোনো সমস্যা হয়েছে। আবার চেষ্টা করুন।');
        }

    } catch (error) {
        showTyping(false);
        appendMessage('bot', 'Connection সমস্যা। অনুগ্রহ করে আবার চেষ্টা করুন।');
        console.error('Chat error:', error);
    }

    sendBtn.disabled = false;
    input.focus();
}

// ===== Message bubble add করো =====
function appendMessage(type, text) {
    const container = document.getElementById('chat-messages');
    const typing    = document.getElementById('typing-indicator');

    const div = document.createElement('div');
    div.classList.add('msg', type === 'user' ? 'user' : 'bot');

    // Newline → <br> convert করো
    div.innerHTML = text.replace(/\n/g, '<br>');

    // Typing indicator এর আগে insert করো
    container.insertBefore(div, typing);

    // Auto scroll to bottom
    container.scrollTop = container.scrollHeight;
}

// ===== Typing indicator show/hide =====
function showTyping(show) {
    const indicator = document.getElementById('typing-indicator');
    const container = document.getElementById('chat-messages');

    indicator.style.display = show ? 'block' : 'none';

    if (show) {
        container.scrollTop = container.scrollHeight;
    }
}
</script>
