@extends('dashboard.layouts.app')

@section('header', 'Kelola Kalkulator')

@section('content')
<div class="mb-8 flex items-center justify-between gap-4 flex-wrap">
    <div>
        <h1 class="text-3xl font-bold text-slate-800 tracking-tight">Kelola Kalkulator</h1>
        <p class="text-slate-500 mt-1">Konfigurasi opsi harga fitur website dan layanan tambahan untuk interaksi klien.</p>
    </div>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md hover:border-blue-200 transition-all">
        <div class="flex items-center">
            <div class="p-3 bg-blue-100 rounded-xl mr-4 text-blue-600">
                <i data-lucide="calculator" class="w-6 h-6"></i>
            </div>
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Total Fitur</p>
                <h3 class="text-2xl font-bold text-slate-800">{{ $stats['total'] }}</h3>
            </div>
        </div>
    </div>
    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md hover:border-indigo-200 transition-all">
        <div class="flex items-center">
            <div class="p-3 bg-indigo-100 rounded-xl mr-4 text-indigo-600">
                <i data-lucide="layout" class="w-6 h-6"></i>
            </div>
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Fitur Website</p>
                <h3 class="text-2xl font-bold text-slate-800">{{ $stats['features'] }}</h3>
            </div>
        </div>
    </div>
    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md hover:border-amber-200 transition-all">
        <div class="flex items-center">
            <div class="p-3 bg-amber-100 rounded-xl mr-4 text-amber-600">
                <i data-lucide="headphones" class="w-6 h-6"></i>
            </div>
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Layanan Dukungan</p>
                <h3 class="text-2xl font-bold text-slate-800">{{ $stats['services'] }}</h3>
            </div>
        </div>
    </div>
    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md hover:border-emerald-200 transition-all">
        <div class="flex items-center">
            <div class="p-3 bg-emerald-100 rounded-xl mr-4 text-emerald-600">
                <i data-lucide="check-circle" class="w-6 h-6"></i>
            </div>
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Fitur Aktif</p>
                <h3 class="text-2xl font-bold text-slate-800">{{ $stats['active'] }}</h3>
            </div>
        </div>
    </div>
</div>

<!-- Alert Messages -->
@if(session('success'))
<div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-5 py-4 rounded-xl mb-8 flex items-center font-medium shadow-sm">
    <i data-lucide="check-circle" class="w-5 h-5 mr-3 flex-shrink-0"></i>
    {{ session('success') }}
</div>
@endif

<!-- Features Table -->
<div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
    <div class="p-6 border-b border-slate-100 flex justify-between items-center bg-slate-50">
        <div class="flex items-center">
            <div class="p-2 bg-blue-100 text-blue-600 rounded-lg mr-3">
                <i data-lucide="list" class="w-5 h-5"></i>
            </div>
            <h3 class="text-lg font-bold text-slate-700">Daftar Fitur Kalkulator</h3>
        </div>
        <a href="{{ route('dashboard.calculator-features.create') }}" class="btn-yellow px-5 py-2.5 rounded-xl shadow-lg hover:shadow-xl hover:-translate-y-0.5 transition-all flex items-center">
            <i data-lucide="plus" class="w-4 h-4 mr-2"></i> Tambah Fitur
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-white text-slate-500 text-xs font-bold uppercase tracking-wider border-b border-slate-200">
                    <th class="px-6 py-4">Nama Fitur</th>
                    <th class="px-6 py-4">Kategori</th>
                    <th class="px-6 py-4">Harga</th>
                    <th class="px-6 py-4 text-center">Status</th>
                    <th class="px-6 py-4 text-center">Urutan</th>
                    <th class="px-6 py-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($features as $feature)
                <tr class="hover:bg-slate-50/50 transition-colors {{ !$feature->is_active ? 'opacity-60 bg-slate-50/30' : '' }}">
                    <td class="px-6 py-4">
                        <div class="font-bold text-slate-800 text-base mb-1">{{ $feature->name }}</div>
                        <div class="text-xs font-medium text-slate-400 bg-slate-100 inline-block px-2 py-0.5 rounded border border-slate-200 mb-1">slug: {{ $feature->slug }}</div>
                        @if($feature->description)
                        <div class="text-sm text-slate-500 mt-1 max-w-[250px] truncate" title="{{ $feature->description }}">{{ $feature->description }}</div>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex flex-wrap gap-2">
                            @if($feature->category === 'feature')
                            <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-bold bg-indigo-50 text-indigo-600 border border-indigo-100">
                                <i data-lucide="layout" class="w-3.5 h-3.5 mr-1.5"></i> Fitur Website
                            </span>
                            @else
                            <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-bold bg-amber-50 text-amber-600 border border-amber-100">
                                <i data-lucide="headphones" class="w-3.5 h-3.5 mr-1.5"></i> Layanan
                            </span>
                            @endif
                            
                            @if($feature->is_recommended)
                            <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-bold bg-yellow-100 text-yellow-700 border border-yellow-200" title="Direkomendasikan">
                                <i data-lucide="star" class="w-3 h-3 fill-yellow-500 text-yellow-500"></i>
                            </span>
                            @endif
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="font-extrabold text-slate-700">Rp {{ number_format($feature->price, 0, ',', '.') }}</span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        @if($feature->is_active)
                        <span class="inline-flex items-center justify-center px-3 py-1 rounded-lg text-xs font-bold bg-emerald-50 text-emerald-600 border border-emerald-100 w-24">
                            <i data-lucide="check-circle" class="w-3.5 h-3.5 mr-1.5"></i> Aktif
                        </span>
                        @else
                        <span class="inline-flex items-center justify-center px-3 py-1 rounded-lg text-xs font-bold bg-slate-100 text-slate-500 border border-slate-200 w-24">
                            <i data-lucide="minus-circle" class="w-3.5 h-3.5 mr-1.5"></i> Nonaktif
                        </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-center">
                        <span class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-slate-100 text-sm font-bold text-slate-600 border border-slate-200">{{ $feature->sort_order }}</span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('dashboard.calculator-features.edit', $feature->id) }}" class="inline-flex items-center px-3 py-1.5 bg-slate-100 hover:bg-blue-50 text-slate-600 hover:text-blue-600 rounded-lg transition-colors border border-slate-200 hover:border-blue-200 text-sm font-medium">
                                <i data-lucide="edit-2" class="w-4 h-4 mr-1.5"></i> Edit
                            </a>
                            <form action="{{ route('dashboard.calculator-features.destroy', $feature->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus fitur ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center px-3 py-1.5 bg-red-50 hover:bg-red-100 text-red-600 hover:text-red-700 rounded-lg transition-colors border border-red-100 hover:border-red-200 text-sm font-medium">
                                    <i data-lucide="trash-2" class="w-4 h-4 mr-1.5"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-16 text-center">
                        <div class="flex flex-col items-center justify-center text-slate-400">
                            <div class="p-4 bg-slate-50 rounded-full mb-3">
                                <i data-lucide="calculator" class="w-10 h-10 text-slate-300"></i>
                            </div>
                            <p class="text-base font-medium text-slate-500">Belum ada fitur kalkulator.</p>
                            <p class="text-sm mt-1">Klik "Tambah Fitur" untuk membuat opsi pertama.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
