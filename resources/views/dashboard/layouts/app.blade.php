<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DarkandBright Admin Dashboard</title>
    @vite(['resources/css/app.css'])
    
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        :root {
            --color-black: #0b1329; /* Sophisticated Deep Dark Blue */
            --color-black-light: #1e293b; /* Dark Navy Slate */
            --color-blue-primary: #2563eb; /* Cobalt Blue */
            --color-blue-glow: rgba(37, 99, 235, 0.4);
        }
        body {
            background-color: #f8fafc; /* Slate 50 */
            background-image: 
                radial-gradient(at 0% 0%, rgba(219, 234, 254, 0.3) 0, transparent 50%), 
                radial-gradient(at 50% 0%, rgba(224, 242, 254, 0.2) 0, transparent 50%),
                radial-gradient(at 100% 0%, rgba(243, 244, 246, 0.4) 0, transparent 50%);
            background-attachment: fixed;
        }
        
        /* Premium Custom Scrollbars */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: transparent;
        }
        ::-webkit-scrollbar-thumb {
            background: rgba(148, 163, 184, 0.3);
            border-radius: 99px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: rgba(148, 163, 184, 0.5);
        }

        /* Sidebar Glass & Gradients */
        .sidebar {
            background: linear-gradient(180deg, #090d1a 0%, #0e172a 100%);
            color: #f1f5f9;
            min-height: 100vh;
            border-right: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: 10px 0 30px -15px rgba(0, 0, 0, 0.2);
        }
        
        .sidebar-nav-item {
            color: #94a3b8;
            position: relative;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            font-weight: 500;
        }
        .sidebar-nav-item:hover {
            color: #ffffff;
            background-color: rgba(255, 255, 255, 0.03);
            transform: translateX(4px);
        }
        .sidebar-nav-item.active {
            background: linear-gradient(90deg, rgba(37, 99, 235, 0.15) 0%, rgba(37, 99, 235, 0.02) 100%);
            color: #3b82f6;
            font-weight: 600;
            border-left: 3px solid #3b82f6;
            box-shadow: inset 4px 0 12px -2px rgba(37, 99, 235, 0.15);
        }
        .sidebar-nav-item.active i {
            color: #3b82f6;
            filter: drop-shadow(0 0 5px rgba(59, 130, 246, 0.4));
        }
        
        .btn-yellow {
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            color: #ffffff;
            font-weight: bold;
            box-shadow: 0 4px 12px 0 rgba(37, 99, 235, 0.2);
            transition: all 0.25s ease;
        }
        .btn-yellow:hover {
            background: linear-gradient(135deg, #1d4ed8 0%, #1e40af 100%);
            box-shadow: 0 6px 16px 0 rgba(37, 99, 235, 0.3);
            transform: translateY(-1px);
        }
        
        /* Glassmorphism Header */
        .glass-header {
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(226, 232, 240, 0.7);
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.03);
        }
        
        /* Content Container */
        .content-container {
            max-width: 80rem; /* 1280px */
            margin: 0 auto;
            width: 100%;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(12px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .animate-fade-in-up {
            animation: fadeInUp 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
    </style>
</head>
<body class="flex overflow-x-hidden">

    <!-- Sidebar Backdrop for Mobile -->
    <div id="sidebar-backdrop" class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm z-30 hidden transition-opacity duration-300 opacity-0 lg:hidden"></div>

    <!-- Sidebar -->
    <aside id="sidebar" class="sidebar w-64 flex flex-col fixed inset-y-0 shadow-2xl z-40 transition-transform duration-300 transform -translate-x-full lg:translate-x-0">
        <div class="h-16 flex items-center justify-between px-6 border-b border-white/5">
            <h1 class="text-2xl font-bold text-white tracking-tight flex items-center gap-2">
                <span>DarkandBright</span>
                <span class="inline-flex items-center justify-center w-6 h-6 rounded-lg bg-blue-500/10 text-blue-400 border border-blue-500/20 shadow-[0_0_15px_rgba(59,130,246,0.15)]">
                    <i data-lucide="zap" class="w-4 h-4 fill-current"></i>
                </span>
            </h1>
            <button id="sidebar-close" class="p-1.5 rounded-lg text-slate-400 hover:text-white hover:bg-white/5 lg:hidden focus:outline-none" aria-label="Close Sidebar">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
        </div>
        <nav class="flex-1 px-3 py-6 space-y-1 overflow-y-auto">
            <p class="px-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-3">Menu Utama</p>
            
            <a href="{{ route('dashboard') }}" class="sidebar-nav-item flex items-center px-4 py-2.5 rounded-xl {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i data-lucide="layout-dashboard" class="mr-3 w-5 h-5"></i> Dashboard
            </a>
            
            <a href="{{ route('dashboard.analytics.index') }}" class="sidebar-nav-item flex items-center px-4 py-2.5 rounded-xl {{ request()->routeIs('dashboard.analytics.*') ? 'active' : '' }}">
                <i data-lucide="line-chart" class="mr-3 w-5 h-5"></i> Prospek Target
            </a>

            <a href="{{ route('dashboard.beranda.index') }}" class="sidebar-nav-item flex items-center px-4 py-2.5 rounded-xl {{ request()->routeIs('dashboard.beranda.*') ? 'active' : '' }}">
                <i data-lucide="monitor" class="mr-3 w-5 h-5"></i> Beranda / Hero
            </a>
            
            <a href="{{ route('dashboard.template.index') }}" class="sidebar-nav-item flex items-center px-4 py-2.5 rounded-xl {{ request()->routeIs('dashboard.template.*') ? 'active' : '' }}">
                <i data-lucide="layout-template" class="mr-3 w-5 h-5"></i> Templates
            </a>

            <a href="{{ route('dashboard.reviews.index') }}" class="sidebar-nav-item flex items-center px-4 py-2.5 rounded-xl {{ request()->routeIs('dashboard.reviews.*') ? 'active' : '' }}">
                <i data-lucide="message-square" class="mr-3 w-5 h-5"></i> Ulasan
            </a>

            <a href="{{ route('dashboard.chat.index') }}" class="sidebar-nav-item flex items-center px-4 py-2.5 rounded-xl {{ request()->routeIs('dashboard.chat.*') ? 'active' : '' }}">
                <i data-lucide="message-circle" class="mr-3 w-5 h-5"></i> Live Chat
                @php
                    $unreadCountTotal = \App\Models\ChatMessage::where('is_from_admin', false)->where('is_read', false)->count();
                @endphp
                @if($unreadCountTotal > 0)
                    <span class="ml-auto bg-blue-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-full shadow-sm animate-pulse">{{ $unreadCountTotal }}</span>
                @endif
            </a>

            <a href="{{ route('dashboard.ai-planner.index') }}" class="sidebar-nav-item flex items-center px-4 py-2.5 rounded-xl {{ request()->routeIs('dashboard.ai-planner.*') ? 'active' : '' }}">
                <i data-lucide="sparkles" class="mr-3 w-5 h-5"></i> AI Website Planner
            </a>

            <a href="{{ route('dashboard.packages.index') }}" class="sidebar-nav-item flex items-center px-4 py-2.5 rounded-xl {{ request()->routeIs('dashboard.packages.*') ? 'active' : '' }}">
                <i data-lucide="package" class="mr-3 w-5 h-5"></i> Paket Harga
            </a>

            <a href="{{ route('dashboard.settings.index') }}" class="sidebar-nav-item flex items-center px-4 py-2.5 rounded-xl {{ request()->routeIs('dashboard.settings.*') ? 'active' : '' }}">
                <i data-lucide="settings" class="mr-3 w-5 h-5"></i> Pengaturan
            </a>
        </nav>
        <div class="p-4 border-t border-white/5 bg-slate-950/20">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center px-4 py-2.5 rounded-xl bg-white/5 text-slate-400 hover:text-white hover:bg-red-500/20 hover:border-red-500/30 border border-transparent transition-all shadow-sm font-semibold text-sm">
                    <i data-lucide="log-out" class="mr-2 w-4 h-4"></i> Keluar
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 ml-0 lg:ml-64 min-h-screen flex flex-col relative z-10 w-full overflow-x-hidden">
        <!-- Topbar -->
        <header class="h-16 glass-header sticky top-0 z-30 flex items-center justify-between px-4 sm:px-8">
            <div class="content-container flex justify-between items-center gap-4">
                <div class="flex items-center min-w-0">
                    <button id="sidebar-toggle" class="mr-3 p-1.5 rounded-lg text-slate-600 hover:bg-slate-100 lg:hidden focus:outline-none shrink-0" aria-label="Toggle Sidebar">
                        <i data-lucide="menu" class="w-6 h-6"></i>
                    </button>
                    <h2 class="text-base sm:text-lg font-bold text-slate-800 tracking-tight truncate">
                        @yield('header', 'Dashboard')
                    </h2>
                </div>
                <div class="flex items-center gap-2 sm:gap-3 shrink-0">
                    <a href="/" target="_blank" class="text-xs font-semibold text-blue-600 bg-blue-50/70 hover:bg-blue-100/70 px-3 py-1.8 rounded-xl transition-all flex items-center gap-1.5 border border-blue-100">
                        <i data-lucide="external-link" class="w-3.5 h-3.5"></i> <span class="hidden sm:inline">Lihat Website</span>
                    </a>
                    <div class="h-6 w-px bg-slate-200 mx-0.5 sm:mx-1"></div>
                    <span class="text-sm font-medium text-slate-600 flex items-center">
                        <div class="w-8 h-8 rounded-xl bg-gradient-to-tr from-blue-600 to-indigo-600 text-white flex items-center justify-center font-bold border border-blue-400/20 shadow-sm shrink-0" title="{{ auth()->user()->name ?? 'Admin' }}">
                            {{ substr(auth()->user()->name ?? 'A', 0, 1) }}
                        </div>
                        <span class="hidden md:inline ml-2.5 truncate max-w-[120px] font-semibold text-slate-700">{{ auth()->user()->name ?? 'Admin' }}</span>
                    </span>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <div class="p-4 sm:p-8 flex-1 overflow-x-hidden">
            <div class="content-container">
                @if (session('success'))
                    <div class="bg-green-50 border border-green-200 text-green-700 px-5 py-4 rounded-xl shadow-sm flex items-center mb-6" role="alert">
                        <i data-lucide="check-circle" class="w-5 h-5 mr-3 text-green-500 font-bold"></i>
                        <span class="block sm:inline font-medium text-sm sm:text-base">{{ session('success') }}</span>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="bg-red-50 border border-red-200 text-red-700 px-5 py-4 rounded-xl shadow-sm mb-6 flex items-start" role="alert">
                        <i data-lucide="alert-circle" class="w-5 h-5 mr-3 mt-0.5 text-red-500 font-bold"></i>
                        <div>
                            <strong class="font-bold block mb-1 text-sm sm:text-base">Oops! Terdapat Kesalahan:</strong>
                            <ul class="list-disc pl-5 space-y-1 text-xs sm:text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
                
                <div class="animate-fade-in-up">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>

    <script>
      lucide.createIcons();

      document.addEventListener('DOMContentLoaded', function() {
          const sidebar = document.getElementById('sidebar');
          const backdrop = document.getElementById('sidebar-backdrop');
          const toggleBtn = document.getElementById('sidebar-toggle');
          const closeBtn = document.getElementById('sidebar-close');
          
          function openSidebar() {
              sidebar.classList.remove('-translate-x-full');
              sidebar.classList.add('translate-x-0');
              backdrop.classList.remove('hidden');
              setTimeout(() => {
                  backdrop.classList.add('opacity-100');
              }, 10);
          }
          
          function closeSidebar() {
              sidebar.classList.remove('translate-x-0');
              sidebar.classList.add('-translate-x-full');
              backdrop.classList.remove('opacity-100');
              setTimeout(() => {
                  backdrop.classList.add('hidden');
              }, 300);
          }
          
          if (toggleBtn) {
              toggleBtn.addEventListener('click', openSidebar);
          }
          if (backdrop) {
              backdrop.addEventListener('click', closeSidebar);
          }
          if (closeBtn) {
              closeBtn.addEventListener('click', closeSidebar);
          }
          
          // Auto-close sidebar on window resize if it gets past mobile view
          window.addEventListener('resize', function() {
              if (window.innerWidth >= 1024) {
                  sidebar.classList.remove('translate-x-0');
                  sidebar.classList.add('-translate-x-full');
                  backdrop.classList.add('hidden');
                  backdrop.classList.remove('opacity-100');
              }
          });
      });
    </script>
</body>
</html>
