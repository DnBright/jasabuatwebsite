@extends('dashboard.layouts.app')

@section('header', 'Riwayat Analisis Pasar')

@section('content')
<div class="mb-8 flex items-center justify-between gap-4 flex-wrap">
    <div>
        <h1 class="text-3xl font-bold text-slate-800 tracking-tight">Arsip Prediksi Mingguan</h1>
        <p class="text-slate-500 mt-1">Daftar rekaman prediksi yang pernah Anda buat untuk melihat perbandingan tren.</p>
    </div>
    <a href="{{ route('dashboard.analytics.index') }}" class="px-5 py-2.5 bg-white border border-blue-200 text-blue-600 rounded-xl hover:bg-blue-50 transition-colors flex items-center text-sm font-bold shadow-sm">
        <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i> Kembali ke Analisis Terbaru
    </a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 text-slate-500 text-xs font-bold uppercase tracking-wider border-b border-slate-200">
                    <th class="px-6 py-4">Nama Batch / Pekan Analisis</th>
                    <th class="px-6 py-4">Tanggal Dibuat</th>
                    <th class="px-6 py-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($batches as $batch)
                <tr class="hover:bg-slate-50/50 transition-colors">
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="p-2 bg-blue-100 text-blue-600 rounded-lg mr-3">
                                <i data-lucide="archive" class="w-4 h-4"></i>
                            </div>
                            <span class="font-bold text-slate-800 text-base">{{ $batch->batch_name }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-sm text-slate-500 font-medium">
                        {{ \Carbon\Carbon::parse($batch->created_at)->translatedFormat('d F Y, H:i') }}
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('dashboard.analytics.show', ['batch' => $batch->batch_name]) }}" class="inline-flex items-center px-4 py-2 bg-slate-800 text-white text-sm font-bold rounded-xl hover:bg-slate-700 hover:-translate-y-0.5 shadow-sm hover:shadow transition-all">
                            <i data-lucide="eye" class="w-4 h-4 mr-2"></i> Lihat Data
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="px-6 py-12 text-center">
                        <div class="flex flex-col items-center justify-center text-slate-400">
                            <div class="p-4 bg-slate-50 rounded-full mb-3">
                                <i data-lucide="folder-x" class="w-8 h-8 text-slate-300"></i>
                            </div>
                            <p class="text-base font-medium text-slate-500">Belum ada riwayat analisis yang tersimpan.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
