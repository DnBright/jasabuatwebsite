@extends('dashboard.layouts.app')

@section('header', 'Edit Fitur Kalkulator')

@section('content')
<div class="mb-8">
    <a href="{{ route('dashboard.calculator-features.index') }}" class="inline-flex items-center text-sm font-medium text-slate-500 hover:text-blue-600 mb-2 transition-colors">
        <i data-lucide="arrow-left" class="w-4 h-4 mr-1"></i> Kembali ke Daftar Fitur
    </a>
    <h1 class="text-3xl font-bold text-slate-800 tracking-tight">Edit Fitur Kalkulator</h1>
    <p class="text-slate-500 mt-1">Mengubah detail fitur atau layanan: <span class="font-bold text-blue-600">{{ $calculatorFeature->name }}</span></p>
</div>

<div class="max-w-3xl bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
    <!-- Alert Errors -->
    @if($errors->any())
    <div class="m-6 bg-red-50 border border-red-200 text-red-700 px-5 py-4 rounded-xl flex items-start shadow-sm">
        <i data-lucide="alert-circle" class="w-5 h-5 mr-3 mt-0.5 flex-shrink-0"></i>
        <ul class="list-disc list-inside text-sm font-medium">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="bg-slate-50 px-8 py-5 border-b border-slate-100 flex items-center">
        <div class="p-2 bg-blue-100 text-blue-600 rounded-lg mr-3">
            <i data-lucide="edit-3" class="w-5 h-5"></i>
        </div>
        <h2 class="text-lg font-bold text-slate-700">Form Update Fitur</h2>
    </div>

    <form action="{{ route('dashboard.calculator-features.update', $calculatorFeature->id) }}" method="POST" class="p-8">
        @csrf
        @method('PUT')

        <div class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Nama Fitur <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name', $calculatorFeature->name) }}" required
                        class="w-full rounded-xl border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors">
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Slug <span class="text-red-500">*</span></label>
                    <input type="text" name="slug" value="{{ old('slug', $calculatorFeature->slug) }}" required
                        class="w-full rounded-xl border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors">
                    <p class="text-xs font-medium text-slate-500 mt-2 flex items-start"><i data-lucide="info" class="w-3.5 h-3.5 mr-1 flex-shrink-0"></i> Identifier unik huruf kecil.</p>
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Deskripsi Lengkap</label>
                <textarea name="description" rows="3"
                    class="w-full rounded-xl border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors">{{ old('description', $calculatorFeature->description) }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6 pt-4 border-t border-slate-100">
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Harga Tambahan (Rp) <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <span class="text-slate-500 font-bold">Rp</span>
                        </div>
                        <input type="number" name="price" value="{{ old('price', $calculatorFeature->price) }}" min="0" required
                            class="w-full pl-12 rounded-xl border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors font-bold text-slate-700">
                    </div>
                    <p class="text-xs font-medium text-slate-500 mt-2 flex items-start"><i data-lucide="info" class="w-3.5 h-3.5 mr-1 flex-shrink-0"></i> Gunakan 0 untuk fitur gratis.</p>
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Kategori <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <select name="category" required
                            class="w-full rounded-xl border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors appearance-none bg-white">
                            <option value="feature" {{ old('category', $calculatorFeature->category) == 'feature' ? 'selected' : '' }}>Fitur Website</option>
                            <option value="service" {{ old('category', $calculatorFeature->category) == 'service' ? 'selected' : '' }}>Layanan Dukungan</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="pt-4 border-t border-slate-100">
                <label class="block text-sm font-bold text-slate-700 mb-2">Urutan Tampilan</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $calculatorFeature->sort_order) }}" min="0"
                    class="w-32 rounded-xl border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors text-center font-bold">
                <p class="text-xs font-medium text-slate-500 mt-2 flex items-start"><i data-lucide="arrow-up-down" class="w-3.5 h-3.5 mr-1 flex-shrink-0"></i> Semakin kecil angka, semakin atas posisi di kalkulator.</p>
            </div>

            <div class="bg-slate-50 p-6 rounded-xl border border-slate-200 flex flex-col sm:flex-row gap-6">
                <label class="flex items-start space-x-3 cursor-pointer group">
                    <div class="flex items-center h-5">
                        <input type="checkbox" name="is_recommended" value="1" {{ old('is_recommended', $calculatorFeature->is_recommended) ? 'checked' : '' }}
                            class="w-5 h-5 text-blue-600 border-slate-300 rounded focus:ring-blue-500 transition-colors cursor-pointer">
                    </div>
                    <div class="flex flex-col">
                        <span class="text-sm font-bold text-slate-700 group-hover:text-blue-600 transition-colors">Tandai sebagai Rekomendasi</span>
                        <span class="text-xs text-slate-500 font-medium">Akan ditandai bintang/highlight di kalkulator.</span>
                    </div>
                </label>

                <label class="flex items-start space-x-3 cursor-pointer group">
                    <div class="flex items-center h-5">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $calculatorFeature->is_active) ? 'checked' : '' }}
                            class="w-5 h-5 text-emerald-500 border-slate-300 rounded focus:ring-emerald-500 transition-colors cursor-pointer">
                    </div>
                    <div class="flex flex-col">
                        <span class="text-sm font-bold text-slate-700 group-hover:text-emerald-600 transition-colors">Status Aktif</span>
                        <span class="text-xs text-slate-500 font-medium">Tampilkan fitur ini ke klien.</span>
                    </div>
                </label>
            </div>

            <div class="pt-6 flex justify-end gap-3 border-t border-slate-100">
                <a href="{{ route('dashboard.calculator-features.index') }}" class="px-6 py-2.5 bg-white border border-slate-300 text-slate-700 rounded-xl hover:bg-slate-50 font-bold transition-colors">Batal</a>
                <button type="submit" class="btn-yellow px-6 py-2.5 rounded-xl shadow-lg hover:shadow-xl hover:-translate-y-0.5 transition-all flex items-center">
                    <i data-lucide="save" class="w-4 h-4 mr-2"></i> Update Fitur
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
