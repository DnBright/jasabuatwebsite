@extends('dashboard.layouts.app')

@section('header', 'Edit Paket Harga')

@section('content')
<div class="mb-8">
    <a href="{{ route('dashboard.packages.index') }}" class="inline-flex items-center text-sm font-medium text-slate-500 hover:text-blue-600 mb-2 transition-colors">
        <i data-lucide="arrow-left" class="w-4 h-4 mr-1"></i> Kembali ke Daftar Paket
    </a>
    <h1 class="text-3xl font-bold text-slate-800 tracking-tight">Edit Paket Harga</h1>
    <p class="text-slate-500 mt-1">Perbarui detail, harga, atau fitur dari paket <strong>{{ $package->name }}</strong>.</p>
</div>

<div class="max-w-4xl bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
    <div class="bg-slate-50 px-8 py-5 border-b border-slate-100 flex items-center">
        <div class="p-2 bg-blue-100 text-blue-600 rounded-lg mr-3">
            <i data-lucide="info" class="w-5 h-5"></i>
        </div>
        <h2 class="text-lg font-bold text-slate-700">Informasi Dasar Paket</h2>
    </div>

    <form action="{{ route('dashboard.packages.update', $package->id) }}" method="POST" class="p-8">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6 mb-8">
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Nama Paket</label>
                <input type="text" name="name" value="{{ old('name', $package->name) }}" class="w-full rounded-xl border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors" required>
            </div>
            
            <div class="flex items-center pt-2 md:pt-8">
                <label class="relative flex items-center cursor-pointer group">
                    <input type="checkbox" name="is_popular" value="1" {{ old('is_popular', $package->is_popular) ? 'checked' : '' }} class="sr-only peer">
                    <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                    <span class="ml-3 text-sm font-bold text-slate-700 group-hover:text-blue-600 transition-colors">Tandai sebagai "Pilihan Utama"</span>
                </label>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Harga (Angka)</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="text-slate-500 font-medium">Rp</span>
                    </div>
                    <input type="text" name="price" value="{{ old('price', $package->price) }}" class="w-full pl-10 rounded-xl border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors" required>
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Satuan/Periode</label>
                <input type="text" name="period" value="{{ old('period', $package->period) }}" class="w-full rounded-xl border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors" required>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-bold text-slate-700 mb-2">Keterangan Cicilan / Pembayaran</label>
                <input type="text" name="payment_terms" value="{{ old('payment_terms', $package->payment_terms) }}" class="w-full rounded-xl border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors" required>
            </div>
            
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Teks Tombol Aksi</label>
                <input type="text" name="button_text" value="{{ old('button_text', $package->button_text) }}" class="w-full rounded-xl border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors" required>
            </div>
            
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Link WhatsApp / Target</label>
                <input type="text" name="button_link" value="{{ old('button_link', $package->button_link) }}" class="w-full rounded-xl border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors" required>
            </div>
        </div>

        <div class="mb-8 pt-8 border-t border-slate-100">
            <h3 class="text-lg font-bold text-slate-800 mb-1">Daftar Fitur Layanan</h3>
            <p class="text-sm text-slate-500 mb-5">Atur fitur apa saja yang pelanggan dapatkan. (Centang Aktif untuk memberikan tanda ceklis hijau)</p>
            
            <div id="features-container" class="space-y-4">
                @php $featureIndex = 0; @endphp
                @if(is_array($package->features) && count($package->features) > 0)
                    @foreach($package->features as $feature)
                    <div class="feature-row flex flex-col md:flex-row items-center gap-3 bg-slate-50 p-3 rounded-xl border border-slate-200">
                        <div class="w-full flex-1">
                            <input type="text" name="features[{{ $featureIndex }}][text]" value="{{ $feature['text'] }}" class="w-full rounded-lg border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm" required>
                        </div>
                        <div class="w-full md:w-auto flex items-center gap-3">
                            <select name="features[{{ $featureIndex }}][is_active]" class="flex-1 md:w-48 rounded-lg border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm font-medium">
                                <option value="1" {{ isset($feature['is_active']) && $feature['is_active'] ? 'selected' : '' }}>Aktif (Tencentang)</option>
                                <option value="0" {{ isset($feature['is_active']) && !$feature['is_active'] ? 'selected' : '' }}>Tidak Aktif (Dicoret)</option>
                            </select>
                            <button type="button" class="remove-feature bg-red-50 text-red-600 p-2.5 rounded-lg hover:bg-red-100 hover:text-red-700 transition-colors border border-red-100" title="Hapus Fitur">
                                <i data-lucide="trash-2" class="w-5 h-5 pointer-events-none"></i>
                            </button>
                        </div>
                    </div>
                    @php $featureIndex++; @endphp
                    @endforeach
                @else
                    <div class="feature-row flex flex-col md:flex-row items-center gap-3 bg-slate-50 p-3 rounded-xl border border-slate-200">
                        <div class="w-full flex-1">
                            <input type="text" name="features[0][text]" class="w-full rounded-lg border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm" required>
                        </div>
                        <div class="w-full md:w-auto flex items-center gap-3">
                            <select name="features[0][is_active]" class="flex-1 md:w-48 rounded-lg border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm font-medium">
                                <option value="1">Aktif (Tencentang)</option>
                                <option value="0">Tidak Aktif (Dicoret)</option>
                            </select>
                            <button type="button" class="remove-feature bg-red-50 text-red-600 p-2.5 rounded-lg hover:bg-red-100 hover:text-red-700 transition-colors border border-red-100" title="Hapus Fitur">
                                <i data-lucide="trash-2" class="w-5 h-5 pointer-events-none"></i>
                            </button>
                        </div>
                    </div>
                    @php $featureIndex = 1; @endphp
                @endif
            </div>
            
            <button type="button" id="add-feature" class="mt-4 w-full md:w-auto inline-flex items-center justify-center px-4 py-2.5 bg-slate-100 text-slate-700 rounded-xl hover:bg-blue-50 hover:text-blue-600 border border-slate-200 hover:border-blue-200 font-bold transition-colors">
                <i data-lucide="plus" class="w-4 h-4 mr-2"></i> Tambah Fitur Lainnya
            </button>
        </div>

        <div class="flex justify-end gap-3 pt-6 border-t border-slate-100">
            <a href="{{ route('dashboard.packages.index') }}" class="px-6 py-2.5 bg-white border border-slate-300 text-slate-700 rounded-xl hover:bg-slate-50 font-bold transition-colors">Batal</a>
            <button type="submit" class="btn-yellow px-6 py-2.5 rounded-xl shadow-lg hover:shadow-xl hover:-translate-y-0.5 transition-all flex items-center">
                <i data-lucide="save" class="w-4 h-4 mr-2"></i> Simpan Perubahan
            </button>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let featureIndex = {{ $featureIndex }};
        const container = document.getElementById('features-container');
        const addButton = document.getElementById('add-feature');

        addButton.addEventListener('click', function() {
            const html = `
                <div class="feature-row flex flex-col md:flex-row items-center gap-3 bg-slate-50 p-3 rounded-xl border border-slate-200">
                    <div class="w-full flex-1">
                        <input type="text" name="features[${featureIndex}][text]" class="w-full rounded-lg border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm" required placeholder="Deskripsi fitur...">
                    </div>
                    <div class="w-full md:w-auto flex items-center gap-3">
                        <select name="features[${featureIndex}][is_active]" class="flex-1 md:w-48 rounded-lg border-slate-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm font-medium">
                            <option value="1">Aktif (Tencentang)</option>
                            <option value="0">Tidak Aktif (Dicoret)</option>
                        </select>
                        <button type="button" class="remove-feature bg-red-50 text-red-600 p-2.5 rounded-lg hover:bg-red-100 hover:text-red-700 transition-colors border border-red-100" title="Hapus Fitur">
                            <i data-lucide="trash-2" class="w-5 h-5 pointer-events-none"></i>
                        </button>
                    </div>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', html);
            featureIndex++;
            lucide.createIcons(); // refresh icons for dynamically added elements
        });

        container.addEventListener('click', function(e) {
            if (e.target.closest('.remove-feature')) {
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
