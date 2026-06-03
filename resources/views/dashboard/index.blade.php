@extends('dashboard.layouts.app')

@section('header', 'Overview Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Stat 1 -->
    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-shadow flex items-center">
        <div class="p-4 bg-blue-50/50 rounded-xl mr-5 text-blue-600 border border-blue-100">
            <i data-lucide="layout-template" class="w-7 h-7"></i>
        </div>
        <div>
            <p class="text-sm font-semibold text-slate-500 mb-1 uppercase tracking-wider">Total Template</p>
            <h3 class="text-3xl font-bold text-slate-800 tracking-tight">{{ $stats['total_templates'] }}</h3>
        </div>
    </div>

    <!-- Stat 2 -->
    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-shadow flex items-center">
        <div class="p-4 bg-indigo-50/50 rounded-xl mr-5 text-indigo-600 border border-indigo-100">
            <i data-lucide="rocket" class="w-7 h-7"></i>
        </div>
        <div>
            <p class="text-sm font-semibold text-slate-500 mb-1 uppercase tracking-wider">Prospek Tinggi</p>
            <h3 class="text-3xl font-bold text-slate-800 tracking-tight">{{ $stats['high_prospects'] }} <span class="text-lg font-medium text-slate-500">UMKM</span></h3>
        </div>
    </div>

    <!-- Stat 3 -->
    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-shadow flex items-center">
        <div class="p-4 bg-amber-50/50 rounded-xl mr-5 text-amber-600 border border-amber-100">
            <i data-lucide="message-square" class="w-7 h-7"></i>
        </div>
        <div>
            <p class="text-sm font-semibold text-slate-500 mb-1 uppercase tracking-wider">Total Ulasan</p>
            <h3 class="text-3xl font-bold text-slate-800 tracking-tight">{{ $stats['total_reviews'] }}</h3>
        </div>
    </div>

    <!-- Stat 4 -->
    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-shadow flex items-center">
        <div class="p-4 bg-orange-50/50 rounded-xl mr-5 text-orange-600 border border-orange-100">
            <i data-lucide="clock" class="w-7 h-7"></i>
        </div>
        <div>
            <p class="text-sm font-semibold text-slate-500 mb-1 uppercase tracking-wider">Review Baru</p>
            <h3 class="text-3xl font-bold text-slate-800 tracking-tight">{{ $stats['pending_reviews'] }}</h3>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <div class="lg:col-span-2 bg-gradient-to-br from-[#002147] to-blue-700 text-white rounded-3xl p-10 relative overflow-hidden shadow-xl border border-[#001229]">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0MCIgaGVpZ2h0PSI0MCI+CjxwYXRoIGQ9Ik0wIDBoNDB2NDBIMHoiIGZpbGw9Im5vbmUiLz4KPHBhdGggZD0iTTAgMTBoNDBNMCAzMGg0ME0xMCAwdjQwTTMwIDB2NDAiIHN0cm9rZT0icmdiYSsyNTUsMjU1LDI1NSwwLjA1KSIgc3Ryb2tlLXdpZHRoPSIxIi8+Cjwvc3ZnPg==')] opacity-30"></div>
        <div class="relative z-10">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 border border-white/20 text-blue-100 text-xs font-semibold uppercase tracking-wider mb-6">
                <span class="relative flex h-2 w-2">
                  <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                  <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                </span>
                Sistem Online
            </div>
            <h3 class="text-3xl md:text-4xl font-bold mb-4 tracking-tight">Selamat Datang, {{ auth()->user()->name }}!</h3>
            <p class="text-blue-100 mb-8 max-w-xl text-lg leading-relaxed">
                Kelola konten website Dark and Bright Anda dari sini. Pantau prospek, atur paket harga, dan sesuaikan template untuk menarik lebih banyak klien UMKM.
            </p>
            <div class="flex flex-wrap gap-4">
                <a href="{{ route('dashboard.analytics.index') }}" class="px-6 py-3 bg-white text-[#002147] hover:bg-blue-50 rounded-xl font-bold transition-all shadow-lg hover:shadow-xl hover:-translate-y-0.5 flex items-center">
                    <i data-lucide="pie-chart" class="w-5 h-5 mr-2"></i> Buka Analitik
                </a>
                <a href="/" target="_blank" class="px-6 py-3 bg-white/10 hover:bg-white/20 text-white rounded-xl font-bold transition-all border border-white/20 backdrop-blur-sm flex items-center">
                    <i data-lucide="external-link" class="w-5 h-5 mr-2"></i> Lihat Landing Page
                </a>
            </div>
        </div>
        <i data-lucide="zap" class="absolute -bottom-16 -right-16 w-64 h-64 text-white opacity-5 transform rotate-12 drop-shadow-2xl"></i>
    </div>

    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-8 flex flex-col">
        <h3 class="text-xl font-bold text-slate-800 mb-6 flex items-center">
            <div class="p-2 bg-blue-50 rounded-lg mr-3 text-blue-600">
                <i data-lucide="zap" class="w-5 h-5"></i>
            </div>
            Pintasan Cepat
        </h3>
        <div class="space-y-4 flex-1">
            <a href="{{ route('dashboard.template.create') }}" class="group flex items-center justify-between p-5 rounded-2xl border border-slate-100 bg-slate-50 hover:bg-white hover:border-blue-200 hover:shadow-md transition-all duration-200">
                <div class="flex items-center gap-4">
                    <div class="p-3 bg-white group-hover:bg-blue-50 rounded-xl text-slate-400 group-hover:text-blue-600 shadow-sm transition-colors">
                        <i data-lucide="plus-circle" class="w-6 h-6"></i>
                    </div>
                    <span class="font-bold text-slate-700 group-hover:text-blue-700">Tambah Template</span>
                </div>
                <i data-lucide="chevron-right" class="w-5 h-5 text-slate-300 group-hover:text-blue-500 group-hover:translate-x-1 transition-transform"></i>
            </a>
            
            <a href="{{ route('dashboard.beranda.index') }}" class="group flex items-center justify-between p-5 rounded-2xl border border-slate-100 bg-slate-50 hover:bg-white hover:border-blue-200 hover:shadow-md transition-all duration-200">
                <div class="flex items-center gap-4">
                    <div class="p-3 bg-white group-hover:bg-blue-50 rounded-xl text-slate-400 group-hover:text-blue-600 shadow-sm transition-colors">
                        <i data-lucide="edit" class="w-6 h-6"></i>
                    </div>
                    <span class="font-bold text-slate-700 group-hover:text-blue-700">Ubah Beranda</span>
                </div>
                <i data-lucide="chevron-right" class="w-5 h-5 text-slate-300 group-hover:text-blue-500 group-hover:translate-x-1 transition-transform"></i>
            </a>

            <a href="{{ route('dashboard.packages.index') }}" class="group flex items-center justify-between p-5 rounded-2xl border border-slate-100 bg-slate-50 hover:bg-white hover:border-blue-200 hover:shadow-md transition-all duration-200">
                <div class="flex items-center gap-4">
                    <div class="p-3 bg-white group-hover:bg-blue-50 rounded-xl text-slate-400 group-hover:text-blue-600 shadow-sm transition-colors">
                        <i data-lucide="package" class="w-6 h-6"></i>
                    </div>
                    <span class="font-bold text-slate-700 group-hover:text-blue-700">Atur Paket Harga</span>
                </div>
                <i data-lucide="chevron-right" class="w-5 h-5 text-slate-300 group-hover:text-blue-500 group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>
    </div>
</div>
@endsection
