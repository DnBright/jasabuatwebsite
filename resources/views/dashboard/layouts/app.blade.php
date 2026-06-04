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
            --color-black: #001229; /* Deep Dark Blue */
            --color-black-light: #002147; /* Dark and Bright Primary Dark */
            --color-yellow: #3b82f6; /* Bright Blue */
            --color-yellow-hover: #2563eb; /* Darker Bright Blue */
        }
        body {
            background-color: #f8fafc; /* Slate 50 */
        }
        .sidebar {
            background: linear-gradient(180deg, var(--color-black) 0%, var(--color-black-light) 100%);
            color: white;
            min-height: 100vh;
        }
        .sidebar a {
            color: #94a3b8; /* Slate 400 */
        }
        .sidebar a:hover, .sidebar .active {
            background-color: rgba(59, 130, 246, 0.1); /* Subtle Blue */
            color: #ffffff;
            border-left: 4px solid var(--color-yellow);
        }
        .btn-yellow {
            background-color: var(--color-yellow);
            color: #ffffff;
            font-weight: bold;
        }
        .btn-yellow:hover {
            background-color: var(--color-yellow-hover);
        }
        
        /* Glassmorphism Header */
        .glass-header {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border-bottom: 1px solid rgba(226, 232, 240, 0.8);
        }
        
        /* Content Container */
        .content-container {
            max-width: 80rem; /* 1280px */
            margin: 0 auto;
            width: 100%;
        }
    </style>
</head>
<body class="flex">

    <!-- Sidebar -->
    <aside class="sidebar w-64 flex flex-col fixed inset-y-0 shadow-xl z-20">
        <div class="h-16 flex items-center justify-center border-b border-white/10">
            <h1 class="text-2xl font-bold text-white tracking-tight">DarkandBright <i data-lucide="zap" class="inline text-blue-500"></i></h1>
        </div>
        <nav class="flex-1 px-3 py-6 space-y-1 overflow-y-auto">
            <p class="px-4 text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Main Menu</p>
            
            <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('dashboard') ? 'active shadow-md' : '' }}">
                <i data-lucide="layout-dashboard" class="mr-3 w-5 h-5 {{ request()->routeIs('dashboard') ? 'text-blue-500' : '' }}"></i> Dashboard
            </a>
            
            <a href="{{ route('dashboard.analytics.index') }}" class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('dashboard.analytics.*') ? 'active shadow-md' : '' }}">
                <i data-lucide="line-chart" class="mr-3 w-5 h-5 {{ request()->routeIs('dashboard.analytics.*') ? 'text-blue-500' : '' }}"></i> Prospek Target
            </a>

            <a href="{{ route('dashboard.beranda.index') }}" class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('dashboard.beranda.*') ? 'active shadow-md' : '' }}">
                <i data-lucide="monitor" class="mr-3 w-5 h-5 {{ request()->routeIs('dashboard.beranda.*') ? 'text-blue-500' : '' }}"></i> Beranda / Hero
            </a>
            
            <a href="{{ route('dashboard.template.index') }}" class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('dashboard.template.*') ? 'active shadow-md' : '' }}">
                <i data-lucide="layout-template" class="mr-3 w-5 h-5 {{ request()->routeIs('dashboard.template.*') ? 'text-blue-500' : '' }}"></i> Templates
            </a>

            <a href="{{ route('dashboard.reviews.index') }}" class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('dashboard.reviews.*') ? 'active shadow-md' : '' }}">
                <i data-lucide="message-square" class="mr-3 w-5 h-5 {{ request()->routeIs('dashboard.reviews.*') ? 'text-blue-500' : '' }}"></i> Ulasan
            </a>

            <a href="{{ route('dashboard.chat.index') }}" class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('dashboard.chat.*') ? 'active shadow-md' : '' }}">
                <i data-lucide="message-circle" class="mr-3 w-5 h-5 {{ request()->routeIs('dashboard.chat.*') ? 'text-blue-500' : '' }}"></i> Live Chat
                @php
                    $unreadCountTotal = \App\Models\ChatMessage::where('is_from_admin', false)->where('is_read', false)->count();
                @endphp
                @if($unreadCountTotal > 0)
                    <span class="ml-auto bg-blue-500 text-white text-xs font-bold px-2 py-0.5 rounded-full shadow-sm animate-pulse">{{ $unreadCountTotal }}</span>
                @endif
            </a>

            <a href="{{ route('dashboard.packages.index') }}" class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('dashboard.packages.*') ? 'active shadow-md' : '' }}">
                <i data-lucide="package" class="mr-3 w-5 h-5 {{ request()->routeIs('dashboard.packages.*') ? 'text-blue-500' : '' }}"></i> Paket Harga
            </a>

            <a href="{{ route('dashboard.settings.index') }}" class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('dashboard.settings.*') ? 'active shadow-md' : '' }}">
                <i data-lucide="settings" class="mr-3 w-5 h-5 {{ request()->routeIs('dashboard.settings.*') ? 'text-blue-500' : '' }}"></i> Pengaturan
            </a>
        </nav>
        <div class="p-4 border-t border-white/10 bg-black/10">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center px-4 py-2.5 rounded-lg bg-white/5 text-slate-300 hover:text-white hover:bg-red-500/80 transition-colors shadow-sm">
                    <i data-lucide="log-out" class="mr-2 w-4 h-4"></i> Keluar
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 ml-64 min-h-screen flex flex-col relative z-10">
        <!-- Topbar -->
        <header class="h-16 glass-header sticky top-0 z-30 flex items-center justify-between px-8">
            <div class="content-container flex justify-between items-center">
                <h2 class="text-xl font-bold text-slate-800 tracking-tight flex items-center">
                    @yield('header', 'Dashboard')
                </h2>
                <div class="flex items-center gap-3">
                    <a href="/" target="_blank" class="text-sm font-semibold text-blue-600 bg-blue-50 hover:bg-blue-100 px-3 py-1.5 rounded-full transition-colors flex items-center">
                        <i data-lucide="external-link" class="w-4 h-4 mr-1.5"></i> Lihat Website
                    </a>
                    <div class="h-6 w-px bg-slate-200 mx-1"></div>
                    <span class="text-sm font-medium text-slate-600 flex items-center">
                        <div class="w-8 h-8 rounded-full bg-slate-200 text-slate-600 flex items-center justify-center mr-2 font-bold border border-slate-300 shadow-sm">
                            {{ substr(auth()->user()->name ?? 'A', 0, 1) }}
                        </div>
                        {{ auth()->user()->name ?? 'Admin' }}
                    </span>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <div class="p-8 flex-1 overflow-x-hidden">
            <div class="content-container">
                @if (session('success'))
                    <div class="bg-green-50 border border-green-200 text-green-700 px-5 py-4 rounded-xl shadow-sm flex items-center mb-6" role="alert">
                        <i data-lucide="check-circle" class="w-5 h-5 mr-3 text-green-500"></i>
                        <span class="block sm:inline font-medium">{{ session('success') }}</span>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="bg-red-50 border border-red-200 text-red-700 px-5 py-4 rounded-xl shadow-sm mb-6 flex items-start" role="alert">
                        <i data-lucide="alert-circle" class="w-5 h-5 mr-3 mt-0.5 text-red-500"></i>
                        <div>
                            <strong class="font-bold block mb-1">Oops! Terdapat Kesalahan:</strong>
                            <ul class="list-disc pl-5 space-y-1 text-sm">
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
    </script>
</body>
</html>
