@extends('dashboard.layouts.app')

@section('header', 'Live Chat Konsultasi')

@section('content')
<div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden flex h-[calc(100vh-12rem)] min-h-[500px]">
    
    <!-- Left Column: Active Sessions List -->
    <div class="w-full md:w-1/3 border-r border-slate-200 flex flex-col h-full bg-slate-50/50 @if($activeSessionId) hidden md:flex @endif">
        <div class="p-4 border-b border-slate-200 bg-white">
            <h3 class="font-bold text-slate-800 text-lg flex items-center">
                <i data-lucide="message-square" class="w-5 h-5 mr-2 text-blue-500"></i>
                Percakapan Pengunjung
            </h3>
            <p class="text-xs text-slate-500 mt-1">Daftar pengunjung yang menghubungi lewat chatbox website.</p>
        </div>

        <div class="flex-1 overflow-y-auto divide-y divide-slate-100">
            @forelse($sessions as $session)
                @php
                    $isActive = $session->session_id === $activeSessionId;
                    $formattedTime = \Carbon\Carbon::parse($session->latest_message_time)->diffForHumans();
                @endphp
                <div class="flex justify-between items-center group transition-colors duration-150 {{ $isActive ? 'bg-blue-50/60 border-l-4 border-blue-500' : 'hover:bg-slate-100/50' }}">
                    <a href="{{ route('dashboard.chat.index', ['session_id' => $session->session_id]) }}" class="flex-1 p-4 block text-left">
                        <div class="flex justify-between items-start">
                            <span class="font-bold text-slate-800 text-sm block truncate pr-2 max-w-[150px]">
                                {{ $session->name ?? 'Visitor' }}
                            </span>
                            <span class="text-[10px] text-slate-400 font-semibold shrink-0">
                                {{ $formattedTime }}
                            </span>
                        </div>
                        <div class="text-xs text-slate-500 mt-1 truncate max-w-[200px]">
                            @if($session->latest_message_from_admin)
                                <span class="text-slate-400 font-medium">Anda: </span>
                            @endif
                            {{ $session->latest_message }}
                        </div>
                        @if(!empty($session->email_whatsapp))
                            <div class="text-[10px] text-slate-400 font-medium mt-1 truncate flex items-center gap-1">
                                <i data-lucide="info" class="w-3 h-3 text-slate-300"></i>
                                {{ $session->email_whatsapp }}
                            </div>
                        @endif
                    </a>
                    
                    <div class="flex items-center gap-2 pr-4 shrink-0">
                        @if($session->unread_count > 0 && !$isActive)
                            <span class="bg-blue-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-full shadow-sm animate-pulse">
                                {{ $session->unread_count }}
                            </span>
                        @endif

                        <!-- Delete Button -->
                        <form action="{{ route('dashboard.chat.destroy', $session->session_id) }}" method="POST" onsubmit="return confirm('Hapus seluruh riwayat chat untuk pengunjung ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-slate-300 hover:text-red-500 p-1.5 rounded-lg hover:bg-red-50 transition-colors opacity-0 group-hover:opacity-100 focus:opacity-100" title="Hapus Percakapan">
                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="p-8 text-center text-slate-400">
                    <i data-lucide="message-circle" class="w-12 h-12 mx-auto text-slate-300 mb-3"></i>
                    <p class="text-sm font-semibold">Tidak ada chat aktif.</p>
                    <p class="text-xs mt-1 text-slate-400">Chatbox di landing page siap menerima pertanyaan.</p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Right Column: Selected Chat Window -->
    <div class="flex-1 flex flex-col h-full bg-slate-50 @if(!$activeSessionId) hidden md:flex @endif">
        @if($activeSessionId && $activeSession)
            <!-- Active Chat Header -->
            <div class="p-4 border-b border-slate-200 bg-white flex justify-between items-center shadow-sm">
                <div class="flex items-center gap-2 sm:gap-3 min-w-0">
                    <a href="{{ route('dashboard.chat.index') }}" class="md:hidden p-1.5 rounded-lg text-slate-500 hover:bg-slate-100 hover:text-slate-700 transition-colors shrink-0" title="Kembali ke Daftar Chat">
                        <i data-lucide="chevron-left" class="w-6 h-6"></i>
                    </a>
                    <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold border border-blue-200 shrink-0">
                        {{ substr($activeSession->name ?? 'V', 0, 1) }}
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-800 text-sm flex items-center gap-2">
                            {{ $activeSession->name ?? 'Visitor' }}
                            <span class="inline-block w-2.5 h-2.5 bg-emerald-500 rounded-full animate-pulse" title="Sesi Aktif"></span>
                        </h4>
                        <p class="text-xs text-slate-500 flex items-center gap-1 mt-0.5">
                            <i data-lucide="info" class="w-3.5 h-3.5 text-slate-300"></i>
                            ID Sesi: <code class="bg-slate-100 px-1 py-0.5 rounded text-[10px]">{{ $activeSession->session_id }}</code>
                        </p>
                    </div>
                </div>

                <!-- Fast Contact Buttons -->
                @if(!empty($activeSession->email_whatsapp))
                    <div class="flex items-center gap-2">
                        @php
                            $contact = trim($activeSession->email_whatsapp);
                            $isPhone = preg_match('/^[0-9+() \-]{7,18}$/', $contact);
                        @endphp
                        @if($isPhone)
                            @php
                                // Clean up phone number for WhatsApp
                                $cleanPhone = preg_replace('/[^0-9]/', '', $contact);
                                if (str_starts_with($cleanPhone, '0')) {
                                    $cleanPhone = '62' . substr($cleanPhone, 1);
                                }
                            @endphp
                            <a href="https://wa.me/{{ $cleanPhone }}?text=Halo%20{{ urlencode($activeSession->name) }},%20kami%20ingin%20membalas%20pertanyaan%20Anda." target="_blank" rel="noopener" class="flex items-center gap-1.5 px-3 py-1.5 bg-green-50 hover:bg-green-100 text-green-600 text-xs font-bold rounded-xl transition-colors border border-green-200">
                                <i data-lucide="phone" class="w-3.5 h-3.5"></i>
                                Hubungi WhatsApp
                            </a>
                        @else
                            <a href="mailto:{{ $contact }}?subject=Pertanyaan%20Jasa%20Website&body=Halo%20{{ urlencode($activeSession->name) }},%20" class="flex items-center gap-1.5 px-3 py-1.5 bg-blue-50 hover:bg-blue-100 text-blue-600 text-xs font-bold rounded-xl transition-colors border border-blue-200">
                                <i data-lucide="mail" class="w-3.5 h-3.5"></i>
                                Hubungi Email
                            </a>
                        @endif
                    </div>
                @endif
            </div>

            <!-- Messages Log Area -->
            <div class="flex-1 p-6 overflow-y-auto flex flex-col gap-4" id="adminMessagesArea">
                @foreach($activeMessages as $message)
                    @php
                        $isAdmin = $message->is_from_admin;
                    @endphp
                    <div class="flex {{ $isAdmin ? 'justify-end' : 'justify-start' }}">
                        <div class="max-w-[70%] rounded-2xl px-4 py-2.5 text-sm shadow-sm relative {{ $isAdmin ? 'bg-blue-600 text-white rounded-br-none' : 'bg-white text-slate-800 border border-slate-200 rounded-bl-none' }}">
                            <p class="leading-relaxed whitespace-pre-wrap">{{ $message->message }}</p>
                            <span class="text-[9px] block text-right mt-1.5 {{ $isAdmin ? 'text-blue-200' : 'text-slate-400' }} font-medium">
                                {{ $message->created_at->format('H:i') }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Chat Send Input Form -->
            <div class="p-4 border-t border-slate-200 bg-white shadow-inner">
                <form action="{{ route('dashboard.chat.send') }}" method="POST" id="adminChatForm" class="flex items-center gap-3">
                    @csrf
                    <input type="hidden" name="session_id" value="{{ $activeSessionId }}">
                    <input type="text" name="message" id="adminMessageInput" placeholder="Ketik balasan Anda ke {{ $activeSession->name ?? 'pengunjung' }}..." class="flex-grow border-1 border-slate-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500/50 bg-slate-50 hover:bg-slate-100/50" required autocomplete="off">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white rounded-xl px-5 py-3 font-bold text-sm shadow-md shadow-blue-500/10 hover:shadow-blue-500/20 hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center gap-1.5">
                        <span>Balas</span>
                        <i data-lucide="send" class="w-4 h-4"></i>
                    </button>
                </form>
            </div>
        @else
            <!-- Empty State Chat Area -->
            <div class="flex-grow flex items-center justify-center text-center p-8">
                <div>
                    <div class="w-16 h-16 bg-blue-50 text-blue-500 rounded-full flex items-center justify-center mx-auto mb-4 border border-blue-100 shadow-sm animate-bounce">
                        <i data-lucide="message-circle" class="w-8 h-8"></i>
                    </div>
                    <h3 class="font-bold text-slate-700 text-lg">Pilih Percakapan</h3>
                    <p class="text-sm text-slate-400 mt-1 max-w-[320px] mx-auto">Silakan pilih salah satu percakapan pengunjung dari panel sebelah kiri untuk mulai membalas chat secara live.</p>
                </div>
            </div>
        @endif
    </div>
</div>

@if($activeSessionId)
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const messageContainer = document.getElementById('adminMessagesArea');
        const inputField = document.getElementById('adminMessageInput');
        const activeSessionId = "{{ $activeSessionId }}";
        let lastMessageCount = {{ $activeMessages->count() }};

        // Auto scroll to bottom of chat
        function scrollToBottom() {
            messageContainer.scrollTop = messageContainer.scrollHeight;
        }
        
        scrollToBottom();

        // Focus input field automatically
        if (inputField) {
            inputField.focus();
        }

        // Live refresh polling (fetch new messages from user every 4 seconds)
        const chatPollInterval = setInterval(function() {
            fetch("{{ route('api.chat.messages') }}?session_id=" + activeSessionId)
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    const messages = data.messages;
                    
                    if (messages.length > lastMessageCount) {
                        messageContainer.innerHTML = '';
                        messages.forEach(msg => {
                            const isAdmin = msg.is_from_admin;
                            const flexDiv = document.createElement('div');
                            flexDiv.className = `flex ${isAdmin ? 'justify-end' : 'justify-start'}`;
                            
                            // Format time
                            const date = new Date(msg.created_at);
                            const timeStr = date.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' });

                            flexDiv.innerHTML = `
                                <div class="max-w-[70%] rounded-2xl px-4 py-2.5 text-sm shadow-sm relative ${isAdmin ? 'bg-blue-600 text-white rounded-br-none' : 'bg-white text-slate-800 border border-slate-200 rounded-bl-none'}">
                                    <p class="leading-relaxed whitespace-pre-wrap">${escapeHTML(msg.message)}</p>
                                    <span class="text-[9px] block text-right mt-1.5 ${isAdmin ? 'text-blue-200' : 'text-slate-400'} font-medium">
                                        ${timeStr}
                                    </span>
                                </div>
                            `;
                            messageContainer.appendChild(flexDiv);
                        });
                        
                        scrollToBottom();
                        lastMessageCount = messages.length;
                    }
                }
            })
            .catch(err => console.error('Error polling chat messages:', err));
        }, 4000);

        function escapeHTML(str) {
            return str
                .replace(/&/g, "&amp;")
                .replace(/</g, "&lt;")
                .replace(/>/g, "&gt;")
                .replace(/"/g, "&quot;")
                .replace(/'/g, "&#039;");
        }

        // Clean up interval if navigating away
        window.addEventListener('beforeunload', function() {
            clearInterval(chatPollInterval);
        });
    });
</script>
@endif
@endsection
