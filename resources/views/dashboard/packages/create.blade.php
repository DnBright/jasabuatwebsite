@extends('dashboard.layouts.app')

@section('header', 'Tambah Paket Harga')

@section('content')
<div class="max-w-4xl mx-auto bg-white rounded-lg shadow-sm border border-gray-200 p-6">
    <form action="{{ route('dashboard.packages.store') }}" method="POST">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Paket</label>
                <input type="text" name="name" value="{{ old('name') }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required placeholder="Contoh: Paket Basic">
            </div>
            
            <div class="flex items-center pt-6">
                <input type="checkbox" name="is_popular" id="is_popular" value="1" {{ old('is_popular') ? 'checked' : '' }} class="h-5 w-5 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                <label for="is_popular" class="ml-2 block text-sm text-gray-900 font-medium">
                    Tandai sebagai "Paling Diminati"
                </label>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Harga (Angka)</label>
                <input type="text" name="price" value="{{ old('price') }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required placeholder="Contoh: 2.5">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Satuan/Periode</label>
                <input type="text" name="period" value="{{ old('period', 'Juta') }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Keterangan Cicilan</label>
                <input type="text" name="payment_terms" value="{{ old('payment_terms') }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required placeholder="Contoh: Bisa dicicil 3x bayar per bulan">
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Teks Tombol</label>
                <input type="text" name="button_text" value="{{ old('button_text', 'Pilih Paket') }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Link WhatsApp Tombol</label>
                <input type="text" name="button_link" value="{{ old('button_link', '#') }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                <p class="text-xs text-gray-500 mt-1">Contoh: https://wa.me/628123...?text=Halo...</p>
            </div>
        </div>

        <div class="mb-6 border-t pt-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Fitur Paket</h3>
            <p class="text-sm text-gray-500 mb-4">Tambahkan fitur-fitur yang termasuk dalam paket ini. Centang "Aktif" jika fitur tersebut didapatkan.</p>
            
            <div id="features-container" class="space-y-3">
                <div class="feature-row flex items-center gap-3">
                    <input type="text" name="features[0][text]" class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required placeholder="Contoh: Website Terima Jadi">
                    <select name="features[0][is_active]" class="rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <option value="1">Aktif (Tencentang)</option>
                        <option value="0">Tidak Aktif (Dicoret)</option>
                    </select>
                    <button type="button" class="remove-feature bg-red-100 text-red-600 px-3 py-2 rounded-md hover:bg-red-200">Hapus</button>
                </div>
            </div>
            
            <button type="button" id="add-feature" class="mt-4 text-sm bg-gray-100 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-200 font-medium">
                + Tambah Fitur Lainnya
            </button>
        </div>

        <div class="flex justify-end gap-3 border-t pt-6">
            <a href="{{ route('dashboard.packages.index') }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 font-medium">Batal</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 font-medium">Simpan Paket</button>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let featureIndex = 1;
        const container = document.getElementById('features-container');
        const addButton = document.getElementById('add-feature');

        addButton.addEventListener('click', function() {
            const html = `
                <div class="feature-row flex items-center gap-3">
                    <input type="text" name="features[${featureIndex}][text]" class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required placeholder="Deskripsi fitur...">
                    <select name="features[${featureIndex}][is_active]" class="rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <option value="1">Aktif (Tencentang)</option>
                        <option value="0">Tidak Aktif (Dicoret)</option>
                    </select>
                    <button type="button" class="remove-feature bg-red-100 text-red-600 px-3 py-2 rounded-md hover:bg-red-200">Hapus</button>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', html);
            featureIndex++;
        });

        container.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-feature')) {
                if (container.querySelectorAll('.feature-row').length > 1) {
                    e.target.closest('.feature-row').remove();
                } else {
                    alert('Minimal harus ada 1 fitur.');
                }
            }
        });
    });
</script>
@endsection
