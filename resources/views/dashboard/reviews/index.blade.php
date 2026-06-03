@extends('dashboard.layouts.app')

@section('header', 'Moderasi Ulasan')

@section('content')
<div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
    <div>
        <h1 class="text-3xl font-bold text-slate-800 tracking-tight">Daftar Ulasan</h1>
        <p class="text-slate-500 mt-1">Kelola dan moderasi ulasan yang masuk untuk setiap template.</p>
    </div>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden mb-6">
    <div class="p-4 border-b border-slate-100 flex flex-col md:flex-row gap-4 justify-between items-center bg-slate-50">
        <form method="GET" action="{{ route('dashboard.reviews.index') }}" class="flex gap-3">
            <select name="status" class="py-2 px-4 rounded-xl border border-slate-200 text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm transition-all text-slate-600">
                <option value="">Semua Status</option>
                <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Disetujui</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Disembunyikan</option>
            </select>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-xl text-sm font-medium transition-colors shadow-sm">Filter</button>
            @if(request('status'))
                <a href="{{ route('dashboard.reviews.index') }}" class="bg-slate-200 hover:bg-slate-300 text-slate-700 px-4 py-2 rounded-xl text-sm font-medium transition-colors shadow-sm text-center">Reset</a>
            @endif
        </form>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 text-slate-500 text-xs font-bold uppercase tracking-wider border-b border-slate-200">
                    <th class="px-6 py-4">Tanggal</th>
                    <th class="px-6 py-4">Template</th>
                    <th class="px-6 py-4">Nama/Email</th>
                    <th class="px-6 py-4">Rating & Komentar</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($reviews as $review)
                <tr class="hover:bg-slate-50/50 transition-colors">
                    <td class="px-6 py-4 text-sm text-slate-500 whitespace-nowrap">
                        {{ $review->created_at->format('d M Y, H:i') }}
                    </td>
                    <td class="px-6 py-4 font-medium text-slate-700">
                        {{ $review->template->name ?? 'Terhapus' }}
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-bold text-slate-800 text-sm">{{ $review->name }}</div>
                        <div class="text-xs text-slate-500">{{ $review->email ?? '-' }}</div>
                    </td>
                    <td class="px-6 py-4 max-w-xs">
                        <div class="flex items-center mb-1">
                            @for($i = 1; $i <= 5; $i++)
                                <i data-lucide="star" class="w-3.5 h-3.5 {{ $i <= $review->rating ? 'fill-amber-500 text-amber-500' : 'text-slate-300' }}"></i>
                            @endfor
                        </div>
                        <p class="text-sm text-slate-600 line-clamp-2" title="{{ $review->comment }}">{{ $review->comment }}</p>
                    </td>
                    <td class="px-6 py-4">
                        @if($review->is_approved)
                            <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-green-50 text-green-700 border border-green-200">Disetujui</span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-slate-100 text-slate-700 border border-slate-200">Disembunyikan</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right whitespace-nowrap">
                        <div class="flex items-center justify-end gap-2">
                            <form action="{{ route('dashboard.reviews.toggle', $review->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="inline-flex items-center px-3 py-1.5 {{ $review->is_approved ? 'bg-amber-50 hover:bg-amber-100 text-amber-600 border-amber-200' : 'bg-green-50 hover:bg-green-100 text-green-600 border-green-200' }} rounded-lg transition-colors border text-sm font-medium">
                                    @if($review->is_approved)
                                        <i data-lucide="eye-off" class="w-4 h-4 mr-1.5"></i> Sembunyikan
                                    @else
                                        <i data-lucide="eye" class="w-4 h-4 mr-1.5"></i> Setujui
                                    @endif
                                </button>
                            </form>
                            
                            <form action="{{ route('dashboard.reviews.destroy', $review->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus ulasan ini permanen?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center px-3 py-1.5 bg-red-50 hover:bg-red-100 text-red-600 hover:text-red-700 rounded-lg transition-colors border border-red-100 hover:border-red-200 text-sm font-medium">
                                    <i data-lucide="trash-2" class="w-4 h-4"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center">
                        <div class="flex flex-col items-center justify-center text-slate-400">
                            <i data-lucide="message-square" class="w-12 h-12 mb-3 text-slate-300"></i>
                            <p class="text-base font-medium text-slate-500">Belum ada ulasan</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($reviews->hasPages())
    <div class="p-4 border-t border-slate-100">
        {{ $reviews->links('pagination::tailwind') }}
    </div>
    @endif
</div>
@endsection
