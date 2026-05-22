@extends('dashboard.layouts.app')

@section('header', 'Paket Harga')

@section('content')
<div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
    <div>
        <h1 class="text-3xl font-bold text-slate-800 tracking-tight">Daftar Paket Harga</h1>
        <p class="text-slate-500 mt-1">Kelola dan atur paket layanan yang ditawarkan ke pelanggan.</p>
    </div>
    <a href="{{ route('dashboard.packages.create') }}" class="btn-yellow px-5 py-2.5 rounded-xl shadow-lg hover:shadow-xl hover:-translate-y-0.5 transition-all flex items-center">
        <i data-lucide="plus" class="w-5 h-5 mr-2"></i> Tambah Paket
    </a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-slate-200">
            <thead class="bg-slate-50">
                <tr>
                    <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Nama Paket</th>
                    <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Harga</th>
                    <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Paling Diminati</th>
                    <th scope="col" class="px-6 py-4 text-right text-xs font-bold text-slate-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-slate-100">
                @forelse($packages as $package)
                <tr class="hover:bg-slate-50/50 transition-colors">
                    <td class="px-6 py-5 whitespace-nowrap">
                        <div class="font-bold text-slate-800 text-lg">{{ $package->name }}</div>
                    </td>
                    <td class="px-6 py-5 whitespace-nowrap">
                        <div class="text-sm font-semibold text-slate-800">Rp {{ number_format($package->price, 0, ',', '.') }} <span class="text-slate-400 font-normal">{{ $package->period }}</span></div>
                        <div class="text-xs text-blue-500 font-medium mt-1 bg-blue-50 inline-block px-2 py-0.5 rounded">{{ $package->payment_terms }}</div>
                    </td>
                    <td class="px-6 py-5 whitespace-nowrap">
                        @if($package->is_popular)
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full bg-blue-100 text-blue-700 border border-blue-200">
                            Ya, Pilihan Utama
                        </span>
                        @else
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-slate-100 text-slate-500 border border-slate-200">
                            Tidak
                        </span>
                        @endif
                    </td>
                    <td class="px-6 py-5 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('dashboard.packages.edit', $package->id) }}" class="inline-flex items-center px-3 py-1.5 bg-slate-100 hover:bg-blue-50 text-slate-600 hover:text-blue-600 rounded-lg transition-colors border border-slate-200 hover:border-blue-200">
                                <i data-lucide="edit-2" class="w-4 h-4 mr-1.5"></i> Edit
                            </a>
                            <form action="{{ route('dashboard.packages.destroy', $package->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus paket ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center px-3 py-1.5 bg-red-50 hover:bg-red-100 text-red-600 hover:text-red-700 rounded-lg transition-colors border border-red-100 hover:border-red-200">
                                    <i data-lucide="trash-2" class="w-4 h-4 mr-1.5"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-12 text-center">
                        <div class="flex flex-col items-center justify-center text-slate-400">
                            <i data-lucide="package-x" class="w-12 h-12 mb-3 text-slate-300"></i>
                            <p class="text-base font-medium text-slate-500">Belum ada paket harga</p>
                            <p class="text-sm">Klik tombol "Tambah Paket" untuk membuat paket baru.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
