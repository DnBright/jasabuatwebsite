@extends('dashboard.layouts.app')

@section('header', 'Prospek Target Pasar')

@section('content')
<div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
    <div>
        <h1 class="text-3xl font-bold text-slate-800 tracking-tight">Rekomendasi Prospek Klien UMKM 2025-2026</h1>
        <p class="text-slate-500 mt-1">Menampilkan Analisis: <span class="font-bold text-blue-600">{{ $batch_name }}</span></p>
    </div>
    <div class="flex gap-3">
        <a href="{{ route('dashboard.analytics.history') }}" class="px-5 py-2.5 bg-white border border-slate-300 text-slate-700 rounded-xl hover:bg-slate-50 font-bold transition-colors flex items-center shadow-sm">
            <i data-lucide="history" class="w-4 h-4 mr-2"></i> Lihat Riwayat
        </a>
        <form action="{{ route('dashboard.analytics.refresh') }}" method="POST">
            @csrf
            <button type="submit" class="btn-yellow px-5 py-2.5 rounded-xl shadow-lg hover:shadow-xl hover:-translate-y-0.5 transition-all flex items-center">
                <i data-lucide="refresh-cw" class="w-4 h-4 mr-2"></i> Perbarui Analisis
            </button>
        </form>
    </div>
</div>

<div class="space-y-6">
    @foreach ($trends as $trend)
    <div class="bg-white rounded-2xl shadow-sm p-6 border border-slate-200 transition-all hover:shadow-md hover:border-blue-200">
        <div class="md:flex justify-between items-start">
            <div class="flex-1">
                <div class="flex items-center gap-3 mb-3">
                    <span class="px-3 py-1 bg-slate-100 text-slate-600 rounded-lg text-xs font-bold uppercase tracking-wider border border-slate-200">
                        {{ $trend->category }}
                    </span>
                    <span class="inline-flex items-center text-emerald-600 font-bold text-xs bg-emerald-50 px-2.5 py-1 rounded-lg border border-emerald-100">
                        <i data-lucide="trending-up" class="w-3.5 h-3.5 mr-1"></i> Pertumbuhan {{ $trend->growth_percentage }}
                    </span>
                </div>
                
                <h3 class="text-xl font-bold text-slate-800 mb-2">{{ $trend->trend_name }}</h3>
                <p class="text-slate-600 text-sm mb-5 leading-relaxed max-w-3xl">
                    {{ $trend->description }}
                </p>

                <div class="bg-slate-50 p-4 rounded-xl border border-slate-100 inline-block mb-4 md:mb-0">
                    <p class="text-xs font-bold text-slate-500 mb-1.5 uppercase tracking-wider">Fitur Web Yang Mereka Butuhkan:</p>
                    <p class="text-sm text-slate-700 font-bold flex items-start">
                        <i data-lucide="check-circle" class="w-4 h-4 text-blue-500 mr-2 mt-0.5 flex-shrink-0"></i> {{ $trend->website_features }}
                    </p>
                </div>
            </div>

            <!-- Scoring Bar -->
            <div class="md:w-64 mt-4 md:mt-0 md:ml-6 bg-slate-50 p-5 rounded-2xl border border-slate-100 flex flex-col justify-center items-center text-center">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-3">Peluang Penjualan Web</span>
                
                <!-- Display text logic -->
                @php
                    $colorClass = 'text-emerald-500';
                    $barColor = 'bg-emerald-500';
                    if($trend->score_value >= 90) { $colorClass = 'text-blue-600'; $barColor = 'bg-blue-600'; }
                    elseif($trend->score_value >= 70) { $colorClass = 'text-emerald-500'; $barColor = 'bg-emerald-500'; }
                    else { $colorClass = 'text-amber-500'; $barColor = 'bg-amber-500'; }
                @endphp

                <span class="text-2xl font-extrabold {{ $colorClass }} mb-4 drop-shadow-sm">
                    {{ $trend->website_need_score }}
                </span>
                
                <div class="w-full bg-slate-200 rounded-full h-3 mb-2 overflow-hidden shadow-inner">
                    <div class="{{ $barColor }} h-3 rounded-full shadow" style="width: {{ $trend->score_value }}%"></div>
                </div>
                <span class="text-[10px] text-slate-400 font-bold uppercase tracking-wider mt-1">Akurasi Prediksi {{ $trend->score_value }}%</span>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection
