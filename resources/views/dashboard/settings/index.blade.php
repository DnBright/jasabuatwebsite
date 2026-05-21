@extends('dashboard.layouts.app')

@section('header', 'Pengaturan Umum')

@section('content')
<div class="max-w-4xl mx-auto bg-white rounded-lg shadow-sm border border-gray-200 p-6">
    <form action="{{ route('dashboard.settings.update') }}" method="POST">
        @csrf
        
        <div class="mb-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4 border-b pb-2">Pengaturan Kontak & WhatsApp</h3>
            
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Nomor WhatsApp Utama</label>
                <div class="flex">
                    <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                        +62
                    </span>
                    <input type="text" name="whatsapp_number" value="{{ old('whatsapp_number', $settings['whatsapp_number'] ?? '85859044929') }}" class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none rounded-r-md border-gray-300 focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="81234567890">
                </div>
                <p class="text-xs text-gray-500 mt-1">Gunakan format mulai dari angka 8 (tanpa 0 atau 62 di depan). Nomor ini akan digunakan untuk semua tombol Chat/Pesan di Landing Page.</p>
            </div>
        </div>

        <div class="flex justify-end gap-3 border-t pt-6">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 font-medium">Simpan Pengaturan</button>
        </div>
    </form>
</div>
@endsection
