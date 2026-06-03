@extends('dashboard.layouts.app')

@section('header', 'Edit Template: ' . $template->name)

@section('content')
<div class="mb-8">
    <a href="{{ route('dashboard.template.index') }}" class="inline-flex items-center text-sm font-medium text-slate-500 hover:text-blue-600 mb-2 transition-colors">
        <i data-lucide="arrow-left" class="w-4 h-4 mr-1"></i> Kembali ke Daftar Template
    </a>
    <h1 class="text-3xl font-bold text-slate-800 tracking-tight">Edit Template: {{ $template->name }}</h1>
    <p class="text-slate-500 mt-1">Perbarui informasi dan paket penjualan untuk portofolio ini.</p>
</div>

<div class="max-w-4xl bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
    <form action="{{ route('dashboard.template.update', $template->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="bg-slate-50 px-8 py-5 border-b border-slate-100 flex items-center">
            <div class="p-2 bg-blue-100 text-blue-600 rounded-lg mr-3">
                <i data-lucide="layout-template" class="w-5 h-5"></i>
            </div>
            <h2 class="text-lg font-bold text-slate-700">Informasi Dasar Template</h2>
        </div>

        <div class="p-8 space-y-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Nama Template</label>
                    <input type="text" name="name" value="{{ old('name', $template->name) }}" required class="w-full rounded-xl border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors @error('name') border-red-500 @enderror">
                    @error('name') <p class="text-red-500 text-xs font-medium mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Kategori</label>
                    <input type="text" name="category" value="{{ old('category', $template->category) }}" required class="w-full rounded-xl border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors @error('category') border-red-500 @enderror">
                    @error('category') <p class="text-red-500 text-xs font-medium mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Upload Gambar Thumbnail (Opsional)</label>
                <div class="flex items-center gap-4">
                    @if($template->image)
                        <img src="{{ str_starts_with($template->image, 'http') ? $template->image : asset($template->image) }}" alt="Current Image" class="w-16 h-16 object-cover rounded-lg border border-slate-200">
                    @endif
                    <input type="file" name="image" accept="image/*" class="w-full rounded-xl border border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 @error('image') border-red-500 @enderror">
                </div>
                <p class="text-xs text-slate-500 mt-2">Biarkan kosong jika tidak ingin mengubah gambar.</p>
                @error('image') <p class="text-red-500 text-xs font-medium mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Rating</label>
                    <div class="relative">
                        <input type="text" name="rating" value="{{ old('rating', $template->rating) }}" class="w-full rounded-xl border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <i data-lucide="star" class="w-4 h-4 text-amber-500 fill-amber-500"></i>
                        </div>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Jumlah Review</label>
                    <input type="number" name="reviews_count" value="{{ old('reviews_count', $template->reviews_count) }}" class="w-full rounded-xl border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors">
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Deskripsi Lengkap</label>
                <textarea name="description" rows="4" required class="w-full rounded-xl border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors @error('description') border-red-500 @enderror">{{ old('description', $template->description) }}</textarea>
                @error('description') <p class="text-red-500 text-xs font-medium mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="border-t border-slate-100 pt-8">
                <div class="flex items-center mb-6">
                    <div class="p-2 bg-indigo-100 text-indigo-600 rounded-lg mr-3">
                        <i data-lucide="package" class="w-5 h-5"></i>
                    </div>
                    <h3 class="text-lg font-bold text-slate-700">Informasi Paket Penjualan</h3>
                </div>
                
                @php
                    $pkgs = is_array($template->packages) ? $template->packages : json_decode($template->packages, true);
                    $revs = is_array($template->reviews) ? $template->reviews : json_decode($template->reviews, true);
                    
                    // Helpers
                    $getPkg = function($type, $key) use ($pkgs) {
                        if($key == 'features') {
                            $feats = $pkgs[$type][$key] ?? [];
                            return is_array($feats) ? implode(', ', $feats) : $feats;
                        }
                        return $pkgs[$type][$key] ?? '';
                    };

                    $getRev = function($index, $key) use ($revs) {
                        return $revs[$index][$key] ?? '';
                    };
                @endphp
                
                <div class="space-y-6">
                    <!-- Basic Package -->
                    <div class="bg-slate-50 p-6 rounded-2xl border border-slate-200 shadow-sm">
                        <p class="font-bold text-slate-700 mb-4 flex items-center"><span class="w-2 h-2 rounded-full bg-slate-400 mr-2"></span> Paket Basic</p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4 mb-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-600 mb-1.5">Harga (Cth: 150.000)</label>
                                <input type="text" name="packages[basic][price]" value="{{ old('packages.basic.price', $getPkg('basic', 'price')) }}" class="w-full rounded-lg border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-600 mb-1.5">Durasi Pengerjaan (Cth: 1 Hari)</label>
                                <input type="text" name="packages[basic][delivery]" value="{{ old('packages.basic.delivery', $getPkg('basic', 'delivery')) }}" class="w-full rounded-lg border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-600 mb-1.5">Fitur Khusus (Pisahkan dengan koma)</label>
                            <input type="text" name="packages[basic][features]" value="{{ old('packages.basic.features', $getPkg('basic', 'features')) }}" class="w-full rounded-lg border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                        </div>
                    </div>

                    <!-- Standard Package -->
                    <div class="bg-blue-50/50 p-6 rounded-2xl border border-blue-100 shadow-sm relative overflow-hidden">
                        <div class="absolute top-0 right-0 bg-blue-500 text-white text-[10px] font-bold px-3 py-1 rounded-bl-lg uppercase tracking-wider">Populer</div>
                        <p class="font-bold text-blue-700 mb-4 flex items-center"><span class="w-2 h-2 rounded-full bg-blue-500 mr-2"></span> Paket Standard</p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4 mb-4">
                            <div>
                                <label class="block text-xs font-bold text-blue-800 mb-1.5">Harga</label>
                                <input type="text" name="packages[standard][price]" value="{{ old('packages.standard.price', $getPkg('standard', 'price')) }}" class="w-full rounded-lg border-blue-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-blue-800 mb-1.5">Durasi Pengerjaan</label>
                                <input type="text" name="packages[standard][delivery]" value="{{ old('packages.standard.delivery', $getPkg('standard', 'delivery')) }}" class="w-full rounded-lg border-blue-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-blue-800 mb-1.5">Fitur Khusus (Pisahkan dengan koma)</label>
                            <input type="text" name="packages[standard][features]" value="{{ old('packages.standard.features', $getPkg('standard', 'features')) }}" class="w-full rounded-lg border-blue-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                        </div>
                    </div>

                    <!-- Premium Package -->
                    <div class="bg-indigo-50/50 p-6 rounded-2xl border border-indigo-100 shadow-sm">
                        <p class="font-bold text-indigo-700 mb-4 flex items-center"><span class="w-2 h-2 rounded-full bg-indigo-500 mr-2"></span> Paket Premium</p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4 mb-4">
                            <div>
                                <label class="block text-xs font-bold text-indigo-800 mb-1.5">Harga</label>
                                <input type="text" name="packages[premium][price]" value="{{ old('packages.premium.price', $getPkg('premium', 'price')) }}" class="w-full rounded-lg border-indigo-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-indigo-800 mb-1.5">Durasi Pengerjaan</label>
                                <input type="text" name="packages[premium][delivery]" value="{{ old('packages.premium.delivery', $getPkg('premium', 'delivery')) }}" class="w-full rounded-lg border-indigo-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-indigo-800 mb-1.5">Fitur Khusus (Pisahkan dengan koma)</label>
                            <input type="text" name="packages[premium][features]" value="{{ old('packages.premium.features', $getPkg('premium', 'features')) }}" class="w-full rounded-lg border-indigo-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                        </div>
                    </div>
                </div>
            </div>

            <div class="border-t border-slate-100 pt-8">
                <div class="flex items-center mb-6">
                    <div class="p-2 bg-amber-100 text-amber-600 rounded-lg mr-3">
                        <i data-lucide="message-square" class="w-5 h-5"></i>
                    </div>
                    <h3 class="text-lg font-bold text-slate-700">Testimoni Klien</h3>
                </div>
                
                <div class="bg-slate-50 p-6 rounded-2xl border border-slate-200 shadow-sm">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-x-6 gap-y-4 mb-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-600 mb-1.5">Nama Klien</label>
                            <input type="text" name="reviews[0][user]" value="{{ old('reviews.0.user', $getRev(0, 'user')) }}" class="w-full rounded-lg border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-600 mb-1.5">Inisial Avatar</label>
                            <input type="text" name="reviews[0][avatar]" value="{{ old('reviews.0.avatar', $getRev(0, 'avatar')) }}" class="w-full rounded-lg border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-600 mb-1.5">Jumlah Bintang (1-5)</label>
                            <input type="number" name="reviews[0][stars]" value="{{ old('reviews.0.stars', $getRev(0, 'stars')) }}" min="1" max="5" class="w-full rounded-lg border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-600 mb-1.5">Komentar / Ulasan</label>
                        <input type="text" name="reviews[0][comment]" value="{{ old('reviews.0.comment', $getRev(0, 'comment')) }}" class="w-full rounded-lg border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                    </div>
                </div>
            </div>

            <div class="pt-6 flex justify-end gap-3 border-t border-slate-100">
                <a href="{{ route('dashboard.template.index') }}" class="px-6 py-2.5 bg-white border border-slate-300 text-slate-700 rounded-xl hover:bg-slate-50 font-bold transition-colors">Batal</a>
                <button type="submit" class="btn-yellow px-6 py-2.5 rounded-xl shadow-lg hover:shadow-xl hover:-translate-y-0.5 transition-all flex items-center">
                    <i data-lucide="save" class="w-4 h-4 mr-2"></i> Update Template
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
