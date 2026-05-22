@extends('dashboard.layouts.app')

@section('header', 'Edit Beranda (Hero Section)')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-slate-800 tracking-tight">Edit Beranda</h1>
    <p class="text-slate-500 mt-1">Kustomisasi konten utama yang akan muncul pertama kali di Landing Page.</p>
</div>

<div class="max-w-4xl bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
    <div class="bg-slate-50 px-8 py-5 border-b border-slate-100 flex items-center">
        <div class="p-2 bg-blue-100 text-blue-600 rounded-lg mr-3">
            <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
        </div>
        <h2 class="text-lg font-bold text-slate-700">Konten Hero Section</h2>
    </div>

    <form action="{{ route('dashboard.beranda.update') }}" method="POST" class="p-8">
        @csrf
        
        <div class="space-y-8">
            <div class="grid grid-cols-1 gap-y-6">
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Judul Utama</label>
                    <input type="text" name="title" value="{{ old('title', $hero->title ?? '') }}" class="w-full rounded-xl border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors @error('title') border-red-500 @enderror" placeholder="Contoh: Jasa Buat Website">
                    @error('title') <p class="text-red-500 text-xs font-medium mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Teks Sorotan (Highlight)</label>
                    <input type="text" name="title_highlight" value="{{ old('title_highlight', $hero->title_highlight ?? '') }}" class="w-full rounded-xl border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors @error('title_highlight') border-red-500 @enderror" placeholder="Contoh: Murah & Mewah">
                    @error('title_highlight') <p class="text-red-500 text-xs font-medium mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Deskripsi Singkat</label>
                    <textarea name="description" rows="4" class="w-full rounded-xl border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors @error('description') border-red-500 @enderror" placeholder="Deskripsi layanan...">{{ old('description', $hero->description ?? '') }}</textarea>
                    @error('description') <p class="text-red-500 text-xs font-medium mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="bg-slate-50 p-6 rounded-2xl border border-slate-200 shadow-sm">
                <h3 class="text-base font-bold text-slate-800 mb-4 flex items-center"><i data-lucide="mouse-pointer-click" class="w-4 h-4 mr-2 text-blue-500"></i> Pengaturan Tombol (CTA)</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-6 mb-6 pb-6 border-b border-slate-200 border-dashed">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Teks Tombol Utama</label>
                        <input type="text" name="button_text" value="{{ old('button_text', $hero->button_text ?? '') }}" class="w-full rounded-xl border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors @error('button_text') border-red-500 @enderror" placeholder="Contoh: Pesan Sekarang">
                        @error('button_text') <p class="text-red-500 text-xs font-medium mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Link Tombol Utama</label>
                        <input type="text" name="button_link" value="{{ old('button_link', $hero->button_link ?? '') }}" class="w-full rounded-xl border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors @error('button_link') border-red-500 @enderror" placeholder="https://wa.me/...">
                        @error('button_link') <p class="text-red-500 text-xs font-medium mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-6">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Teks Tombol Sekunder</label>
                        <input type="text" name="secondary_button_text" value="{{ old('secondary_button_text', $hero->secondary_button_text ?? '') }}" class="w-full rounded-xl border-slate-200 shadow-sm focus:border-slate-500 focus:ring-slate-500 transition-colors" placeholder="Contoh: Lihat Desain">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Link Tombol Sekunder</label>
                        <input type="text" name="secondary_button_link" value="{{ old('secondary_button_link', $hero->secondary_button_link ?? '') }}" class="w-full rounded-xl border-slate-200 shadow-sm focus:border-slate-500 focus:ring-slate-500 transition-colors" placeholder="#template">
                    </div>
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">URL Gambar Hero</label>
                <div class="flex">
                    <span class="inline-flex items-center px-4 rounded-l-xl border border-r-0 border-slate-200 bg-slate-50 text-slate-500 font-medium">URL</span>
                    <input type="text" name="image" value="{{ old('image', $hero->image ?? '') }}" class="flex-1 w-full rounded-none rounded-r-xl border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors @error('image') border-red-500 @enderror" placeholder="https://...">
                </div>
                @error('image') <p class="text-red-500 text-xs font-medium mt-1">{{ $message }}</p> @enderror
                
                @if(isset($hero) && $hero->image)
                    <div class="mt-4 bg-slate-50 p-4 rounded-xl border border-slate-200 inline-block">
                        <p class="text-xs font-bold text-slate-500 mb-2 uppercase tracking-wider">Preview Gambar Saat Ini:</p>
                        <img src="{{ Str::startsWith($hero->image, 'http') ? $hero->image : asset($hero->image) }}" class="h-40 rounded-lg object-cover shadow-sm" alt="Preview Hero">
                    </div>
                @endif
            </div>

            <div class="pt-6 flex justify-end gap-3 border-t border-slate-100">
                <button type="submit" class="btn-yellow px-6 py-2.5 rounded-xl shadow-lg hover:shadow-xl hover:-translate-y-0.5 transition-all flex items-center">
                    <i data-lucide="save" class="w-4 h-4 mr-2"></i> Simpan Perubahan
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
