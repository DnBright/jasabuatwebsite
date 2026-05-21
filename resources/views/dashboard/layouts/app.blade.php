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
            --color-black: #0f172a; /* Slate 900 */
            --color-black-light: #1e293b; /* Slate 800 */
            --color-yellow: #3b82f6; /* Blue 500 */
            --color-yellow-hover: #2563eb; /* Blue 600 */
        }
        body {
            background-color: #f3f4f6; /* Gray 100 */
        }
        .sidebar {
            background-color: var(--color-black);
            color: white;
            min-height: 100vh;
        }
        .sidebar a {
            color: #94a3b8; /* Slate 400 */
        }
        .sidebar a:hover, .sidebar .active {
            background-color: var(--color-black-light);
            color: var(--color-yellow);
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
    </style>
</head>
<body class="flex">

    <!-- Sidebar -->
    <aside class="sidebar w-64 flex flex-col fixed inset-y-0 shadow-lg">
        <div class="h-16 flex items-center justify-center border-b border-slate-800">
            <h1 class="text-2xl font-bold text-blue-500">DarkandBright Admin <i data-lucide="zap" class="inline"></i></h1>
        </div>
        <nav class="flex-1 px-2 py-4 space-y-2">
            <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 rounded-md transition-colors {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i data-lucide="layout-dashboard" class="mr-3 w-5 h-5"></i> Dashboard
            </a>
            
            <a href="{{ route('dashboard.analytics.index') }}" class="flex items-center px-4 py-3 rounded-md transition-colors {{ request()->routeIs('dashboard.analytics.*') ? 'active' : '' }}">
                <i data-lucide="line-chart" class="mr-3 w-5 h-5"></i> Prospek Target Pasar
            </a>

            <a href="{{ route('dashboard.beranda.index') }}" class="flex items-center px-4 py-3 rounded-md transition-colors {{ request()->routeIs('dashboard.beranda.*') ? 'active' : '' }}">
                <i data-lucide="monitor" class="mr-3 w-5 h-5"></i> Beranda / Hero
            </a>
            
            <a href="{{ route('dashboard.template.index') }}" class="flex items-center px-4 py-3 rounded-md transition-colors {{ request()->routeIs('dashboard.template.*') ? 'active' : '' }}">
                <i data-lucide="layout-template" class="mr-3 w-5 h-5"></i> Templates
            </a>

            <a href="{{ route('dashboard.packages.index') }}" class="flex items-center px-4 py-3 rounded-md transition-colors {{ request()->routeIs('dashboard.packages.*') ? 'active' : '' }}">
                <i data-lucide="package" class="mr-3 w-5 h-5"></i> Paket Harga
            </a>

            <a href="{{ route('dashboard.settings.index') }}" class="flex items-center px-4 py-3 rounded-md transition-colors {{ request()->routeIs('dashboard.settings.*') ? 'active' : '' }}">
                <i data-lucide="settings" class="mr-3 w-5 h-5"></i> Pengaturan Umum
            </a>
        </nav>
        <div class="p-4 border-t border-gray-800">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center px-4 py-3 text-gray-400 hover:text-white transition-colors">
                    <i data-lucide="log-out" class="mr-3 w-5 h-5"></i> Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 ml-64 min-h-screen flex flex-col">
        <!-- Topbar -->
        <header class="h-16 bg-white shadow-sm flex items-center justify-between px-8 border-b">
            <h2 class="text-xl font-semibold text-gray-800">
                @yield('header', 'Dashboard')
            </h2>
            <div class="flex items-center">
                <span class="text-sm font-medium text-gray-600 bg-gray-100 px-3 py-1 rounded-full"><i data-lucide="user" class="inline w-4 h-4 mr-1"></i> {{ auth()->user()->name ?? 'Admin' }}</span>
            </div>
        </header>

        <!-- Page Content -->
        <div class="p-8 flex-1">
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
                    <strong class="font-bold">Oops!</strong>
                    <span class="block sm:inline">Ada kesalahan pada input Anda. Silakan periksa kembali.</span>
                </div>
            @endif
            
            @yield('content')
        </div>
    </main>

    <script>
      lucide.createIcons();
    </script>
</body>
</html>
