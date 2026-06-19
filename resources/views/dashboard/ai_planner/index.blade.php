@extends('dashboard.layouts.app')

@section('header', 'AI Website Planner')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-slate-800 flex items-center gap-2">
                <i data-lucide="sparkles" class="text-blue-600"></i> AI Website Planner
            </h2>
            <p class="text-slate-500 text-sm mt-1">Gunakan kecerdasan buatan Gemini untuk merancang struktur sitemap, wireframe, dan copywriting secara otomatis.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Input Form (Takes 1 Col on Desktop) -->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 space-y-4 h-fit">
            <h3 class="text-base font-bold text-slate-700 flex items-center gap-2">
                <i data-lucide="file-edit" class="text-blue-500 w-5 h-5"></i> Input Profil Bisnis
            </h3>
            <p class="text-slate-500 text-xs leading-relaxed">Masukkan nama dan deskripsi usaha Anda secara detail. AI akan merancang copywriting dan bagian landing page yang optimal.</p>

            <form action="{{ route('dashboard.ai-planner.generate') }}" method="POST" class="space-y-4" id="aiPlannerForm">
                @csrf
                <div>
                    <label for="business_name" class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Nama Usaha / Brand</label>
                    <input type="text" name="business_name" id="business_name" 
                           class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm text-slate-700 focus:outline-none focus:border-blue-500 transition-colors focus:ring-2 focus:ring-blue-150"
                           placeholder="Contoh: Warkop Remen Coffee" 
                           value="{{ $business_name ?? '' }}" required>
                </div>

                <div>
                    <label for="business_description" class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Deskripsi Layanan & Target Pasar</label>
                    <textarea name="business_description" id="business_description" rows="5" 
                              class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm text-slate-700 focus:outline-none focus:border-blue-500 transition-colors focus:ring-2 focus:ring-blue-150"
                              placeholder="Contoh: Kedai kopi lokal dengan vibes tradisional modern, menyajikan kopi robusta khas desa dengan harga terjangkau, menargetkan mahasiswa dan pekerja muda." required>{{ $business_description ?? '' }}</textarea>
                </div>

                <button type="submit" class="w-full btn-yellow flex items-center justify-center gap-2 py-3 px-4 rounded-xl text-sm font-bold text-white transition-all shadow-md" id="submitBtn">
                    <i data-lucide="zap" class="w-4 h-4"></i> Rancang Website Saya
                </button>
            </form>
        </div>

        <!-- Output Result Panel (Takes 2 Cols on Desktop) -->
        <div class="lg:col-span-2 space-y-6">
            @if(isset($result))
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden animate-fade-in">
                    <!-- Result Header -->
                    <div class="px-6 py-5 border-b border-slate-100 flex items-center justify-between bg-gradient-to-r from-blue-50/50 to-indigo-50/10">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-blue-600 flex items-center justify-center text-white shadow-md">
                                <i data-lucide="compass" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <h3 class="text-base font-bold text-slate-800">Rancangan Website: {{ $result['business_name'] }}</h3>
                                <p class="text-xs text-slate-400">Hasil analisis kualifikasi rekayasa AI & parsing output JSON</p>
                            </div>
                        </div>
                        @if(isset($result['is_fallback']))
                            <span class="bg-amber-100 text-amber-700 text-[10px] font-bold px-2.5 py-1 rounded-full border border-amber-200">Mode Fallback</span>
                        @else
                            <span class="bg-green-100 text-green-700 text-[10px] font-bold px-2.5 py-1 rounded-full border border-green-200 flex items-center gap-1">
                                <i data-lucide="check-circle" class="w-3.5 h-3.5"></i> JSON Parsed
                            </span>
                        @endif
                    </div>

                    <div class="p-6 space-y-6">
                        <!-- Branding & Color Palette Section -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pb-6 border-b border-slate-150">
                            <div>
                                <h4 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-3">Copywriting Banner Utama (Hero)</h4>
                                <div class="bg-slate-50 border border-slate-150 rounded-xl p-4 space-y-2">
                                    <h5 class="text-sm font-extrabold text-slate-800">"{{ $result['hero_title'] }}"</h5>
                                    <p class="text-xs text-slate-600">{{ $result['hero_subtitle'] }}</p>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-3">Rekomendasi Skema Warna (Branding)</h4>
                                <div class="grid grid-cols-3 gap-2 text-center text-[10px] font-bold text-slate-700">
                                    <div class="p-3 rounded-xl border border-slate-150 flex flex-col items-center gap-2">
                                        <div class="w-8 h-8 rounded-full border border-slate-200" style="background-color: {{ $result['color_theme']['primary'] }}"></div>
                                        <span>Primary<br><code class="text-[9px] text-slate-400">{{ $result['color_theme']['primary'] }}</code></span>
                                    </div>
                                    <div class="p-3 rounded-xl border border-slate-150 flex flex-col items-center gap-2">
                                        <div class="w-8 h-8 rounded-full border border-slate-200" style="background-color: {{ $result['color_theme']['secondary'] }}"></div>
                                        <span>Secondary<br><code class="text-[9px] text-slate-400">{{ $result['color_theme']['secondary'] }}</code></span>
                                    </div>
                                    <div class="p-3 rounded-xl border border-slate-150 flex flex-col items-center gap-2">
                                        <div class="w-8 h-8 rounded-full border border-slate-200" style="background-color: {{ $result['color_theme']['accent'] }}"></div>
                                        <span>Accent<br><code class="text-[9px] text-slate-400">{{ $result['color_theme']['accent'] }}</code></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Sitemap Sections Outline -->
                        <div>
                            <h4 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-4">Sitemap & Tata Letak Section Landing Page</h4>
                            <div class="space-y-4">
                                @foreach($result['sections'] as $index => $sec)
                                    <div class="flex gap-4">
                                        <div class="flex-shrink-0 w-8 h-8 rounded-full bg-blue-50 border border-blue-200 text-blue-600 font-bold font-mono text-sm flex items-center justify-center">
                                            {{ $index + 1 }}
                                        </div>
                                        <div class="flex-1 bg-slate-50 border border-slate-150 rounded-xl p-4">
                                            <h5 class="text-xs font-bold text-slate-800 uppercase tracking-wider">{{ $sec['section_name'] }}</h5>
                                            <p class="text-xs text-slate-600 mt-1 leading-relaxed">{{ $sec['content_outline'] }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Marketing Advice Callout -->
                        <div class="bg-indigo-50 border border-indigo-150 rounded-xl p-4 flex gap-3">
                            <i data-lucide="info" class="text-indigo-650 w-5 h-5 flex-shrink-0 mt-0.5"></i>
                            <div>
                                <h5 class="text-xs font-bold text-indigo-900">Digital Marketing Advice</h5>
                                <p class="text-xs text-indigo-750 mt-1 leading-relaxed">{{ $result['marketing_advice'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <!-- Welcome/Idle State -->
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-12 text-center flex flex-col items-center justify-center space-y-4 min-h-[350px]">
                    <div class="w-16 h-16 rounded-full bg-blue-50 border border-blue-150 flex items-center justify-center text-blue-600 animate-pulse">
                        <i data-lucide="sparkles" class="w-8 h-8"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-slate-800">Menunggu Rencana Desain</h3>
                        <p class="text-slate-500 text-xs mt-1 max-w-sm mx-auto leading-relaxed">Masukkan profil bisnis atau ide website Anda pada form di sebelah kiri untuk menghasilkan sitemap wireframe instan bertenaga AI.</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Loading Modal Overlay -->
<div id="loadingOverlay" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-[9999] hidden flex items-center justify-center">
    <div class="bg-white rounded-2xl p-8 max-w-sm w-full text-center shadow-2xl border border-slate-100 flex flex-col items-center space-y-4">
        <div class="relative w-12 h-12">
            <div class="absolute inset-0 border-4 border-slate-100 rounded-full"></div>
            <div class="absolute inset-0 border-4 border-t-blue-600 rounded-full animate-spin"></div>
        </div>
        <div>
            <h4 class="text-sm font-bold text-slate-800">Merancang Sitemap AI...</h4>
            <p class="text-slate-500 text-xs mt-1 leading-relaxed">Gemini sedang menganalisis industri Anda, merancang copywriting, dan menyusun sitemap JSON terstruktur.</p>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('aiPlannerForm');
        const overlay = document.getElementById('loadingOverlay');
        
        if (form && overlay) {
            form.addEventListener('submit', function() {
                overlay.classList.remove('hidden');
                overlay.classList.add('flex');
            });
        }
        
        // Re-init lucide icons on layout load
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    });
</script>
@endsection
