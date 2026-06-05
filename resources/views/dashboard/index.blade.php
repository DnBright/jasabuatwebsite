@extends('dashboard.layouts.app')

@section('header', 'Overview Dashboard')

@section('content')
<!-- Overview Title -->
<div class="mb-6 animate-fade-in-up">
    <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-800 tracking-tight">Selamat Datang di Workspace Anda</h1>
    <p class="text-slate-500 text-xs sm:text-sm mt-1">Pantau performa layanan, ulasan klien, dan target pasar UMKM secara real-time.</p>
</div>

<!-- Stats Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8 animate-fade-in-up" style="animation-delay: 0.1s;">
    <!-- Stat 1: Total Template -->
    <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300 flex items-center group">
        <div class="p-3 bg-blue-50 text-blue-600 rounded-xl mr-4 border border-blue-100 group-hover:scale-110 transition-transform duration-300">
            <i data-lucide="layout-template" class="w-6 h-6"></i>
        </div>
        <div>
            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-0.5">Total Template</p>
            <h3 class="text-2xl font-extrabold text-slate-800 tracking-tight">{{ $stats['total_templates'] }}</h3>
        </div>
    </div>

    <!-- Stat 2: Prospek Tinggi -->
    <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300 flex items-center group">
        <div class="p-3 bg-indigo-50 text-indigo-600 rounded-xl mr-4 border border-indigo-100 group-hover:scale-110 transition-transform duration-300">
            <i data-lucide="rocket" class="w-6 h-6"></i>
        </div>
        <div>
            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-0.5">Prospek Tinggi</p>
            <h3 class="text-2xl font-extrabold text-slate-800 tracking-tight flex items-baseline gap-1">
                <span>{{ $stats['high_prospects'] }}</span>
                <span class="text-xs font-semibold text-slate-400">UMKM</span>
            </h3>
        </div>
    </div>

    <!-- Stat 3: Total Ulasan -->
    <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300 flex items-center group">
        <div class="p-3 bg-amber-50 text-amber-600 rounded-xl mr-4 border border-amber-100 group-hover:scale-110 transition-transform duration-300">
            <i data-lucide="message-square" class="w-6 h-6"></i>
        </div>
        <div>
            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-0.5">Total Ulasan</p>
            <h3 class="text-2xl font-extrabold text-slate-800 tracking-tight">{{ $stats['total_reviews'] }}</h3>
        </div>
    </div>

    <!-- Stat 4: Review Baru -->
    <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300 flex items-center group">
        <div class="p-3 {{ $stats['pending_reviews'] > 0 ? 'bg-rose-50 text-rose-600 border-rose-100' : 'bg-slate-50 text-slate-500 border-slate-100' }} rounded-xl mr-4 border group-hover:scale-110 transition-transform duration-300">
            <i data-lucide="clock" class="w-6 h-6"></i>
        </div>
        <div>
            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-0.5">Review Baru</p>
            <h3 class="text-2xl font-extrabold text-slate-800 tracking-tight flex items-center gap-2">
                <span>{{ $stats['pending_reviews'] }}</span>
                @if($stats['pending_reviews'] > 0)
                    <span class="inline-flex items-center px-1.5 py-0.5 rounded-full text-[9px] font-bold bg-rose-100 text-rose-700 animate-pulse">Butuh Moderasi</span>
                @endif
            </h3>
        </div>
    </div>
</div>

<!-- Main Panels -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 animate-fade-in-up" style="animation-delay: 0.2s;">
    <!-- Welcome and Visualization Section -->
    <div class="lg:col-span-2 space-y-6">
        <!-- Premium Welcome Banner -->
        <div class="bg-gradient-to-br from-[#0c1329] via-[#111827] to-[#1e3a8a] text-white rounded-3xl p-6 sm:p-8 relative overflow-hidden shadow-xl border border-[#1e293b]">
            <!-- Elegant Abstract SVG Pattern -->
            <div class="absolute inset-0 opacity-10 mix-blend-overlay">
                <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <pattern id="grid" width="30" height="30" patternUnits="userSpaceOnUse">
                            <path d="M 30 0 L 0 0 0 30" fill="none" stroke="white" stroke-width="1" />
                        </pattern>
                    </defs>
                    <rect width="100%" height="100%" fill="url(#grid)" />
                </svg>
            </div>
            <!-- Glowing Radial Accent -->
            <div class="absolute -top-20 -right-20 w-80 h-80 bg-blue-500 rounded-full blur-3xl opacity-20"></div>
            
            <div class="relative z-10">
                <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-white/10 border border-white/10 text-blue-200 text-[10px] font-bold uppercase tracking-wider mb-5">
                    <span class="relative flex h-2 w-2">
                      <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                      <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                    </span>
                    Sistem Online
                </div>
                <h3 class="text-2xl sm:text-3xl font-extrabold mb-3 tracking-tight">Selamat Datang, {{ auth()->user()->name }}!</h3>
                <p class="text-slate-300 mb-6 text-sm sm:text-base leading-relaxed max-w-xl">
                    Kelola konten website **Dark and Bright** dari panel kendali Anda. Analisis prospek pasar, kelola katalog template siap pakai, dan balas pesan konsumen dari satu tempat.
                </p>
                <div class="flex flex-wrap gap-3.5">
                    <a href="{{ route('dashboard.analytics.index') }}" class="px-5 py-2.5 bg-white text-slate-900 hover:bg-slate-100 rounded-xl font-bold text-xs sm:text-sm transition-all shadow-md hover:shadow-lg hover:-translate-y-0.5 flex items-center gap-2">
                        <i data-lucide="line-chart" class="w-4 h-4 text-blue-600"></i> Buka Analitik Pasar
                    </a>
                    <a href="/" target="_blank" class="px-5 py-2.5 bg-white/10 hover:bg-white/20 text-white rounded-xl font-bold text-xs sm:text-sm transition-all border border-white/15 backdrop-blur-sm flex items-center gap-2">
                        <i data-lucide="external-link" class="w-4 h-4"></i> Lihat Landing Page
                    </a>
                </div>
            </div>
            <i data-lucide="zap" class="absolute -bottom-12 -right-12 w-48 h-48 text-white opacity-5 transform rotate-12"></i>
        </div>

        <!-- Target Market Chart Panel -->
        <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-6">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h3 class="text-lg font-bold text-slate-800">Tren Prospek Klien UMKM Teratas</h3>
                    <p class="text-xs text-slate-400">Peluang industri dengan potensi permintaan pembuatan website tertinggi.</p>
                </div>
                <a href="{{ route('dashboard.analytics.index') }}" class="text-xs font-bold text-blue-600 hover:text-blue-700 flex items-center gap-1">
                    Selengkapnya <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                </a>
            </div>

            <div class="space-y-4">
                @forelse($topTrends as $trend)
                    @php
                        $barColor = 'bg-blue-600';
                        if ($trend->score_value >= 90) {
                            $barColor = 'bg-gradient-to-r from-blue-600 to-indigo-600';
                        } elseif ($trend->score_value >= 70) {
                            $barColor = 'bg-gradient-to-r from-emerald-500 to-teal-500';
                        }
                    @endphp
                    <div class="relative p-3 rounded-2xl hover:bg-slate-50/50 transition-colors border border-transparent hover:border-slate-100">
                        <div class="flex justify-between items-start mb-2">
                            <div>
                                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">{{ $trend->category }}</span>
                                <h4 class="text-sm font-bold text-slate-800 mt-0.5">{{ $trend->trend_name }}</h4>
                            </div>
                            <div class="text-right">
                                <span class="text-xs font-extrabold text-blue-600">{{ $trend->website_need_score }}</span>
                                <span class="block text-[9px] text-slate-400 font-semibold mt-0.5">Pertumbuhan {{ $trend->growth_percentage }}</span>
                            </div>
                        </div>
                        <div class="w-full bg-slate-100 rounded-full h-2.5 overflow-hidden">
                            <div class="h-2.5 rounded-full {{ $barColor }} transition-all duration-1000" style="width: {{ $trend->score_value }}%"></div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-6 text-slate-400">
                        <p class="text-sm">Data analisis belum tersedia.</p>
                        <form action="{{ route('dashboard.analytics.refresh') }}" method="POST" class="mt-2">
                            @csrf
                            <button type="submit" class="text-xs text-blue-600 hover:underline font-bold">Inisialisasi Data Sekarang</button>
                        </form>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Shortcuts and Updates Section -->
    <div class="space-y-6">
        <!-- Quick Actions Panel -->
        <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-6 flex flex-col">
            <h3 class="text-lg font-bold text-slate-800 mb-5 flex items-center">
                <div class="p-2 bg-blue-50 rounded-lg mr-3 text-blue-600 border border-blue-100/50">
                    <i data-lucide="compass" class="w-4 h-4"></i>
                </div>
                Aksi Cepat
            </h3>
            <div class="space-y-3.5 flex-1">
                <a href="{{ route('dashboard.template.create') }}" class="group flex items-center justify-between p-4 rounded-2xl border border-slate-100 bg-slate-50/50 hover:bg-white hover:border-blue-200 hover:shadow-md hover:-translate-y-0.5 transition-all duration-200">
                    <div class="flex items-center gap-3.5">
                        <div class="p-2.5 bg-white group-hover:bg-blue-50 rounded-xl text-slate-400 group-hover:text-blue-600 border border-slate-100 group-hover:border-blue-100 shadow-sm transition-all duration-200">
                            <i data-lucide="plus-circle" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <span class="font-bold text-slate-700 group-hover:text-blue-700 block text-sm">Tambah Template</span>
                            <span class="text-[10px] text-slate-400 block mt-0.5">Katalog desain baru</span>
                        </div>
                    </div>
                    <i data-lucide="chevron-right" class="w-4 h-4 text-slate-300 group-hover:text-blue-500 group-hover:translate-x-1 transition-transform"></i>
                </a>
                
                <a href="{{ route('dashboard.beranda.index') }}" class="group flex items-center justify-between p-4 rounded-2xl border border-slate-100 bg-slate-50/50 hover:bg-white hover:border-blue-200 hover:shadow-md hover:-translate-y-0.5 transition-all duration-200">
                    <div class="flex items-center gap-3.5">
                        <div class="p-2.5 bg-white group-hover:bg-blue-50 rounded-xl text-slate-400 group-hover:text-blue-600 border border-slate-100 group-hover:border-blue-100 shadow-sm transition-all duration-200">
                            <i data-lucide="edit" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <span class="font-bold text-slate-700 group-hover:text-blue-700 block text-sm">Ubah Beranda</span>
                            <span class="text-[10px] text-slate-400 block mt-0.5">Teks & gambar utama</span>
                        </div>
                    </div>
                    <i data-lucide="chevron-right" class="w-4 h-4 text-slate-300 group-hover:text-blue-500 group-hover:translate-x-1 transition-transform"></i>
                </a>

                <a href="{{ route('dashboard.packages.index') }}" class="group flex items-center justify-between p-4 rounded-2xl border border-slate-100 bg-slate-50/50 hover:bg-white hover:border-blue-200 hover:shadow-md hover:-translate-y-0.5 transition-all duration-200">
                    <div class="flex items-center gap-3.5">
                        <div class="p-2.5 bg-white group-hover:bg-blue-50 rounded-xl text-slate-400 group-hover:text-blue-600 border border-slate-100 group-hover:border-blue-100 shadow-sm transition-all duration-200">
                            <i data-lucide="package" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <span class="font-bold text-slate-700 group-hover:text-blue-700 block text-sm">Paket Harga</span>
                            <span class="text-[10px] text-slate-400 block mt-0.5">Pricing plan layanan</span>
                        </div>
                    </div>
                    <i data-lucide="chevron-right" class="w-4 h-4 text-slate-300 group-hover:text-blue-500 group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>
        </div>

        <!-- System Updates / Notification Panel -->
        <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-6">
            <h3 class="text-lg font-bold text-slate-800 mb-4 flex items-center">
                <div class="p-2 bg-amber-50 rounded-lg mr-3 text-amber-600 border border-amber-100/50">
                    <i data-lucide="bell" class="w-4 h-4"></i>
                </div>
                Perlu Tindakan
            </h3>
            
            <div class="space-y-4">
                <!-- Action item: Pending reviews -->
                @php
                    $unreadCountTotal = \App\Models\ChatMessage::where('is_from_admin', false)->where('is_read', false)->count();
                @endphp
                <div class="flex items-start gap-3.5 p-3 rounded-2xl {{ $stats['pending_reviews'] > 0 ? 'bg-amber-50/50 border border-amber-100' : 'bg-slate-50/50 border border-transparent' }}">
                    <div class="p-2 rounded-xl {{ $stats['pending_reviews'] > 0 ? 'bg-amber-100 text-amber-700' : 'bg-slate-200 text-slate-500' }} mt-0.5">
                        <i data-lucide="message-square" class="w-4 h-4"></i>
                    </div>
                    <div class="flex-grow min-w-0">
                        <h4 class="text-xs font-bold text-slate-700">Persetujuan Ulasan</h4>
                        <p class="text-[10px] text-slate-400 mt-0.5">
                            @if($stats['pending_reviews'] > 0)
                                Terdapat <strong>{{ $stats['pending_reviews'] }}</strong> ulasan baru yang butuh persetujuan Anda sebelum tampil.
                            @else
                                Semua ulasan pelanggan telah dimoderasi.
                            @endif
                        </p>
                        @if($stats['pending_reviews'] > 0)
                            <a href="{{ route('dashboard.reviews.index') }}" class="inline-flex items-center text-[10px] font-bold text-amber-700 hover:text-amber-800 mt-2 gap-1 bg-amber-100/60 px-2 py-1 rounded-lg">
                                Buka Moderasi <i data-lucide="chevron-right" class="w-3 h-3"></i>
                            </a>
                        @endif
                    </div>
                </div>

                <!-- Action item: Chat Sessions -->
                <div class="flex items-start gap-3.5 p-3 rounded-2xl {{ $unreadCountTotal > 0 ? 'bg-blue-50/50 border border-blue-100' : 'bg-slate-50/50 border border-transparent' }}">
                    <div class="p-2 rounded-xl {{ $unreadCountTotal > 0 ? 'bg-blue-100 text-blue-700' : 'bg-slate-200 text-slate-500' }} mt-0.5">
                        <i data-lucide="message-circle" class="w-4 h-4"></i>
                    </div>
                    <div class="flex-grow min-w-0">
                        <h4 class="text-xs font-bold text-slate-700">Pesan Live Chat</h4>
                        <p class="text-[10px] text-slate-400 mt-0.5">
                            @if($unreadCountTotal > 0)
                                Ada <strong>{{ $unreadCountTotal }}</strong> pesan masuk dari pengunjung yang belum Anda balas.
                            @else
                                Tidak ada pesan baru. Live chat aktif dan siap menerima pesan.
                            @endif
                        </p>
                        @if($unreadCountTotal > 0)
                            <a href="{{ route('dashboard.chat.index') }}" class="inline-flex items-center text-[10px] font-bold text-blue-700 hover:text-blue-850 mt-2 gap-1 bg-blue-100/60 px-2 py-1 rounded-lg">
                                Balas Chat <i data-lucide="chevron-right" class="w-3 h-3"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
