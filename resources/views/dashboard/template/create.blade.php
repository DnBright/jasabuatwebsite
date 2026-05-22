@extends('dashboard.layouts.app')

@section('header', 'Tambah Template Baru')

@section('content')
<div class="mb-8">
    <a href="{{ route('dashboard.template.index') }}" class="inline-flex items-center text-sm font-medium text-slate-500 hover:text-blue-600 mb-2 transition-colors">
        <i data-lucide="arrow-left" class="w-4 h-4 mr-1"></i> Kembali ke Daftar Template
    </a>
    <h1 class="text-3xl font-bold text-slate-800 tracking-tight">Tambah Template Baru</h1>
    <p class="text-slate-500 mt-1">Tambahkan portofolio desain website baru ke dalam koleksi Anda.</p>
</div>

<div class="max-w-4xl bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
    <form action="{{ route('dashboard.template.store') }}" method="POST">
        @csrf
        
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
                    <input type="text" name="name" value="{{ old('name') }}" required class="w-full rounded-xl border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors @error('name') border-red-500 @enderror" placeholder="Contoh: Kuliner Prima">
                    @error('name') <p class="text-red-500 text-xs font-medium mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Kategori</label>
                    <input type="text" name="category" value="{{ old('category') }}" required class="w-full rounded-xl border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors @error('category') border-red-500 @enderror" placeholder="Web Design > F&B">
                    @error('category') <p class="text-red-500 text-xs font-medium mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">URL Gambar Thumbnail</label>
                <div class="flex">
                    <span class="inline-flex items-center px-4 rounded-l-xl border border-r-0 border-slate-200 bg-slate-50 text-slate-500 font-medium">URL</span>
                    <input type="text" name="image" value="{{ old('image') }}" required class="flex-1 w-full rounded-none rounded-r-xl border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors @error('image') border-red-500 @enderror" placeholder="/images/template_food.png atau https://...">
                </div>
                @error('image') <p class="text-red-500 text-xs font-medium mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Rating (Awal)</label>
                    <div class="relative">
                        <input type="text" name="rating" value="5.0" class="w-full rounded-xl border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <i data-lucide="star" class="w-4 h-4 text-amber-500 fill-amber-500"></i>
                        </div>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Jumlah Review Awal</label>
                    <input type="number" name="reviews_count" value="0" class="w-full rounded-xl border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors">
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Deskripsi Lengkap</label>
                <textarea name="description" rows="4" required class="w-full rounded-xl border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                @error('description') <p class="text-red-500 text-xs font-medium mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="border-t border-slate-100 pt-8">
                <div class="flex items-center mb-6">
                    <div class="p-2 bg-indigo-100 text-indigo-600 rounded-lg mr-3">
                        <i data-lucide="package" class="w-5 h-5"></i>
                    </div>
                    <h3 class="text-lg font-bold text-slate-700">Informasi Paket Penjualan (Opsional)</h3>
                </div>
                
                <div class="space-y-6">
                    <!-- Basic Package -->
                    <div class="bg-slate-50 p-6 rounded-2xl border border-slate-200 shadow-sm">
                        <p class="font-bold text-slate-700 mb-4 flex items-center"><span class="w-2 h-2 rounded-full bg-slate-400 mr-2"></span> Paket Basic</p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4 mb-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-600 mb-1.5">Harga (Cth: 150.000)</label>
                                <input type="text" name="packages[basic][price]" class="w-full rounded-lg border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-600 mb-1.5">Durasi Pengerjaan (Cth: 1 Hari)</label>
                                <input type="text" name="packages[basic][delivery]" class="w-full rounded-lg border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-600 mb-1.5">Fitur Khusus (Pisahkan dengan koma)</label>
                            <input type="text" name="packages[basic][features]" placeholder="Katalog Simple, Integrasi WA, Hosting..." class="w-full rounded-lg border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                        </div>
                    </div>

                    <!-- Standard Package -->
                    <div class="bg-blue-50/50 p-6 rounded-2xl border border-blue-100 shadow-sm relative overflow-hidden">
                        <div class="absolute top-0 right-0 bg-blue-500 text-white text-[10px] font-bold px-3 py-1 rounded-bl-lg uppercase tracking-wider">Populer</div>
                        <p class="font-bold text-blue-700 mb-4 flex items-center"><span class="w-2 h-2 rounded-full bg-blue-500 mr-2"></span> Paket Standard</p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4 mb-4">
                            <div>
                                <label class="block text-xs font-bold text-blue-800 mb-1.5">Harga</label>
                                <input type="text" name="packages[standard][price]" class="w-full rounded-lg border-blue-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-blue-800 mb-1.5">Durasi Pengerjaan</label>
                                <input type="text" name="packages[standard][delivery]" class="w-full rounded-lg border-blue-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-blue-800 mb-1.5">Fitur Khusus (Pisahkan dengan koma)</label>
                            <input type="text" name="packages[standard][features]" class="w-full rounded-lg border-blue-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                        </div>
                    </div>

                    <!-- Premium Package -->
                    <div class="bg-indigo-50/50 p-6 rounded-2xl border border-indigo-100 shadow-sm">
                        <p class="font-bold text-indigo-700 mb-4 flex items-center"><span class="w-2 h-2 rounded-full bg-indigo-500 mr-2"></span> Paket Premium</p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4 mb-4">
                            <div>
                                <label class="block text-xs font-bold text-indigo-800 mb-1.5">Harga</label>
                                <input type="text" name="packages[premium][price]" class="w-full rounded-lg border-indigo-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-indigo-800 mb-1.5">Durasi Pengerjaan</label>
                                <input type="text" name="packages[premium][delivery]" class="w-full rounded-lg border-indigo-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-indigo-800 mb-1.5">Fitur Khusus (Pisahkan dengan koma)</label>
                            <input type="text" name="packages[premium][features]" class="w-full rounded-lg border-indigo-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                        </div>
                    </div>
                </div>
            </div>

            <div class="border-t border-slate-100 pt-8">
                <div class="flex items-center mb-6">
                    <div class="p-2 bg-amber-100 text-amber-600 rounded-lg mr-3">
                        <i data-lucide="message-square" class="w-5 h-5"></i>
                    </div>
                    <h3 class="text-lg font-bold text-slate-700">Testimoni Klien (Opsional)</h3>
                </div>
                
                <div class="bg-slate-50 p-6 rounded-2xl border border-slate-200 shadow-sm">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-x-6 gap-y-4 mb-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-600 mb-1.5">Nama Klien</label>
                            <input type="text" name="reviews[0][user]" class="w-full rounded-lg border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm" placeholder="Contoh: Bpk. Ahmad">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-600 mb-1.5">Inisial Avatar</label>
                            <input type="text" name="reviews[0][avatar]" class="w-full rounded-lg border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm" placeholder="AH">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-600 mb-1.5">Jumlah Bintang (1-5)</label>
                            <input type="number" name="reviews[0][stars]" value="5" min="1" max="5" class="w-full rounded-lg border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-600 mb-1.5">Komentar / Ulasan</label>
                        <input type="text" name="reviews[0][comment]" class="w-full rounded-lg border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm" placeholder="Desain websitenya sangat profesional!">
                    </div>
                </div>
            </div>

            <div class="pt-6 flex justify-end gap-3 border-t border-slate-100">
                <a href="{{ route('dashboard.template.index') }}" class="px-6 py-2.5 bg-white border border-slate-300 text-slate-700 rounded-xl hover:bg-slate-50 font-bold transition-colors">Batal</a>
                <button type="submit" class="btn-yellow px-6 py-2.5 rounded-xl shadow-lg hover:shadow-xl hover:-translate-y-0.5 transition-all flex items-center">
                    <i data-lucide="save" class="w-4 h-4 mr-2"></i> Simpan Template
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
