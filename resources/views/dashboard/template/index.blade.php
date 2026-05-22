@extends('dashboard.layouts.app')

@section('header', 'Kelola Template')

@section('content')
<div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
    <div>
        <h1 class="text-3xl font-bold text-slate-800 tracking-tight">Daftar Template</h1>
        <p class="text-slate-500 mt-1">Kelola portofolio template website yang ditawarkan ke pelanggan.</p>
    </div>
    <a href="{{ route('dashboard.template.create') }}" class="btn-yellow px-5 py-2.5 rounded-xl shadow-lg hover:shadow-xl hover:-translate-y-0.5 transition-all flex items-center">
        <i data-lucide="plus" class="w-5 h-5 mr-2"></i> Tambah Template
    </a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 text-slate-500 text-xs font-bold uppercase tracking-wider border-b border-slate-200">
                    <th class="px-6 py-4">Gambar</th>
                    <th class="px-6 py-4">Nama Template</th>
                    <th class="px-6 py-4">Kategori</th>
                    <th class="px-6 py-4">Rating</th>
                    <th class="px-6 py-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($templates as $template)
                <tr class="hover:bg-slate-50/50 transition-colors">
                    <td class="px-6 py-4">
                        <img src="{{ Str::startsWith($template->image, 'http') ? $template->image : asset($template->image) }}" class="w-20 h-14 object-cover rounded-lg shadow-sm border border-slate-200" alt="img">
                    </td>
                    <td class="px-6 py-4 font-bold text-slate-800 text-base">{{ $template->name }}</td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 bg-slate-100 text-slate-600 rounded-lg text-sm font-medium border border-slate-200">{{ $template->category }}</span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center px-3 py-1 rounded-lg text-xs font-bold bg-amber-50 text-amber-600 border border-amber-100">
                            <i data-lucide="star" class="w-3.5 h-3.5 mr-1 fill-amber-500"></i> {{ $template->rating }} <span class="text-amber-500/70 ml-1 font-medium">({{ $template->reviews_count }} rev)</span>
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('dashboard.template.edit', $template->id) }}" class="inline-flex items-center px-3 py-1.5 bg-slate-100 hover:bg-blue-50 text-slate-600 hover:text-blue-600 rounded-lg transition-colors border border-slate-200 hover:border-blue-200 text-sm font-medium">
                                <i data-lucide="edit-2" class="w-4 h-4 mr-1.5"></i> Edit
                            </a>
                            <form action="{{ route('dashboard.template.destroy', $template->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus template ini?');">
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
                    <td colspan="5" class="px-6 py-12 text-center">
                        <div class="flex flex-col items-center justify-center text-slate-400">
                            <i data-lucide="layout-template" class="w-12 h-12 mb-3 text-slate-300"></i>
                            <p class="text-base font-medium text-slate-500">Belum ada template</p>
                            <p class="text-sm mt-1">Klik tombol "Tambah Template" untuk menambahkan ke portofolio.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
