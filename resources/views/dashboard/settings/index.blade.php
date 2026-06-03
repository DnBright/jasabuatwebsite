@extends('dashboard.layouts.app')

@section('header', 'Pengaturan Umum')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-slate-800 tracking-tight">Pengaturan Umum</h1>
    <p class="text-slate-500 mt-1">Kelola konfigurasi dasar aplikasi seperti kontak dan integrasi.</p>
</div>

<div class="max-w-4xl bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
    <div class="bg-slate-50 px-8 py-5 border-b border-slate-100 flex items-center">
        <div class="p-2 bg-blue-100 text-blue-600 rounded-lg mr-3">
            <i data-lucide="settings" class="w-5 h-5"></i>
        </div>
        <h2 class="text-lg font-bold text-slate-700">Pengaturan Kontak & WhatsApp</h2>
    </div>

    <form action="{{ route('dashboard.settings.update') }}" method="POST" class="p-8">
        @csrf
        
        <div class="space-y-6">
            <div class="bg-blue-50/50 p-6 rounded-2xl border border-blue-100 shadow-sm relative overflow-hidden">
                <i data-lucide="message-circle" class="absolute -bottom-4 -right-4 w-32 h-32 text-blue-500/10 transform -rotate-12"></i>
                <div class="relative z-10">
                    <label class="block text-sm font-bold text-blue-800 mb-2">Nomor WhatsApp Utama</label>
                    <div class="flex">
                        <span class="inline-flex items-center px-4 rounded-l-xl border border-r-0 border-blue-200 bg-blue-100 text-blue-700 font-bold">
                            +62
                        </span>
                        <input type="text" name="whatsapp_number" value="{{ old('whatsapp_number', $settings['whatsapp_number'] ?? '85190894806') }}" class="flex-1 w-full rounded-none rounded-r-xl border-blue-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors" placeholder="81234567890">
                    </div>
                    <div class="flex items-start mt-3 text-blue-600/80">
                        <i data-lucide="info" class="w-4 h-4 mr-1.5 mt-0.5 flex-shrink-0"></i>
                        <p class="text-xs font-medium leading-relaxed">Gunakan format mulai dari angka 8 (tanpa 0 atau 62 di depan). Nomor ini akan digunakan untuk semua tombol Chat/Pesan di Landing Page.</p>
                    </div>
                </div>
            </div>

            <!-- SEO & Identitas Website -->
            <div class="bg-slate-50 p-6 rounded-2xl border border-slate-200 shadow-sm">
                <h3 class="font-bold text-slate-700 mb-4 flex items-center"><i data-lucide="globe" class="w-4 h-4 mr-2"></i> Identitas Website</h3>
                <div class="grid grid-cols-1 gap-y-4">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Nama Website</label>
                        <input type="text" name="website_name" value="{{ old('website_name', $settings['website_name'] ?? 'DnBright') }}" class="w-full rounded-xl border border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Meta Deskripsi (Untuk SEO)</label>
                        <textarea name="website_description" rows="3" class="w-full rounded-xl border border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors">{{ old('website_description', $settings['website_description'] ?? 'Jasa Buat Website Profesional') }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Kontak Lainnya -->
            <div class="bg-slate-50 p-6 rounded-2xl border border-slate-200 shadow-sm">
                <h3 class="font-bold text-slate-700 mb-4 flex items-center"><i data-lucide="map-pin" class="w-4 h-4 mr-2"></i> Kontak & Sosial Media</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Link Instagram</label>
                        <input type="text" name="social_instagram" value="{{ old('social_instagram', $settings['social_instagram'] ?? 'https://instagram.com/') }}" class="w-full rounded-xl border border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors" placeholder="https://instagram.com/...">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Alamat Perusahaan</label>
                        <input type="text" name="company_address" value="{{ old('company_address', $settings['company_address'] ?? 'Jakarta') }}" class="w-full rounded-xl border border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors">
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-end gap-3 pt-8 mt-8 border-t border-slate-100">
            <button type="submit" class="btn-yellow px-6 py-2.5 rounded-xl shadow-lg hover:shadow-xl hover:-translate-y-0.5 transition-all flex items-center">
                <i data-lucide="save" class="w-4 h-4 mr-2"></i> Simpan Pengaturan
            </button>
        </div>
    </form>
</div>
@endsection
