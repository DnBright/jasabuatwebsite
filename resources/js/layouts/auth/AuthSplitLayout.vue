<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';
import AppLogoIcon from '@/components/AppLogoIcon.vue';
import { home } from '@/routes';

const page = usePage();
const name = page.props.name || 'DnBright';

defineProps<{
    title?: string;
    description?: string;
}>();
</script>

<template>
    <div class="relative grid min-h-screen grid-cols-1 overflow-hidden lg:grid-cols-2">
        <!-- LEFT SIDE: Premium Branding Panel -->
        <div class="relative hidden flex-col items-center justify-between p-12 text-white lg:flex bg-[#0c0e17] overflow-hidden border-r border-slate-800/50">
            <!-- Background Gradients & Mesh -->
            <div class="absolute inset-0 bg-[linear-gradient(to_right,#1e293b_1px,transparent_1px),linear-gradient(to_bottom,#1e293b_1px,transparent_1px)] bg-[size:4rem_4rem] opacity-[0.07]" />
            <div class="absolute top-[-20%] left-[-20%] w-[70%] h-[70%] rounded-full bg-violet-600/20 blur-[130px]" />
            <div class="absolute bottom-[-20%] right-[-20%] w-[70%] h-[70%] rounded-full bg-blue-600/20 blur-[130px]" />
            <div class="absolute top-[40%] left-[30%] w-[300px] h-[300px] rounded-full bg-indigo-500/10 blur-[100px]" />

            <!-- Brand Header -->
            <div class="relative z-10 w-full flex items-center justify-between">
                <Link :href="home()" class="flex items-center gap-3 group">
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-gradient-to-tr from-violet-600 to-indigo-600 p-2.5 shadow-lg shadow-indigo-500/30 group-hover:scale-105 transition-transform duration-300">
                        <AppLogoIcon class="size-full fill-current text-white" />
                    </div>
                    <span class="text-xl font-bold tracking-tight bg-gradient-to-r from-white via-slate-200 to-slate-400 bg-clip-text text-transparent">
                        {{ name }}
                    </span>
                </Link>
                <span class="text-xs font-semibold uppercase tracking-widest text-indigo-400/80 bg-indigo-500/10 px-3 py-1 rounded-full border border-indigo-500/20">
                    v1.0.0
                </span>
            </div>

            <!-- Content Center: Floating Glass Dashboard Preview -->
            <div class="relative z-10 my-auto max-w-lg w-full text-center lg:text-left space-y-8">
                <div class="space-y-4">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 text-xs font-medium text-indigo-300 bg-indigo-500/10 rounded-full border border-indigo-500/20">
                        <span class="h-1.5 w-1.5 rounded-full bg-indigo-400 animate-ping" />
                        Admin Portal
                    </span>
                    <h2 class="text-4xl font-extrabold tracking-tight leading-tight text-white">
                        Kelola Website <span class="bg-gradient-to-r from-violet-400 via-indigo-300 to-cyan-300 bg-clip-text text-transparent">Lebih Cepat</span> & Efisien.
                    </h2>
                    <p class="text-base text-slate-400 leading-relaxed">
                        Satu dashboard untuk mengelola seluruh template portofolio, review klien, paket harga, analitik pengunjung, dan integrasi WhatsApp.
                    </p>
                </div>

                <!-- Floating Glassmorphic Stats Card -->
                <div class="p-6 rounded-2xl bg-white/[0.03] border border-white/[0.08] backdrop-blur-md shadow-2xl flex flex-col gap-4">
                    <div class="flex items-center justify-between border-b border-white/[0.08] pb-3">
                        <span class="text-sm font-semibold text-slate-300">Statistik Sistem</span>
                        <span class="text-xs font-medium text-emerald-400 bg-emerald-500/10 px-2 py-0.5 rounded-full">Server Aktif</span>
                    </div>
                    <div class="grid grid-cols-3 gap-4 text-left">
                        <div>
                            <p class="text-2xl font-bold text-white">12+</p>
                            <p class="text-xs text-slate-400">Template</p>
                        </div>
                        <div>
                            <p class="text-2xl font-bold text-white">99.9%</p>
                            <p class="text-xs text-slate-400">Uptime</p>
                        </div>
                        <div>
                            <p class="text-2xl font-bold text-white">&lt; 1s</p>
                            <p class="text-xs text-slate-400">Respon</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Info -->
            <div class="relative z-10 w-full flex items-center justify-between text-xs text-slate-500">
                <p>&copy; {{ new Date().getFullYear() }} {{ name }}. All rights reserved.</p>
                <div class="flex gap-4">
                    <a href="#" class="hover:text-slate-300 transition-colors">Privacy Policy</a>
                    <a href="#" class="hover:text-slate-300 transition-colors">Support</a>
                </div>
            </div>
        </div>

        <!-- RIGHT SIDE: Elegant Login Form -->
        <div class="relative flex items-center justify-center p-8 lg:p-12 bg-[#030712] text-white">
            <!-- Glowing background accents for the right side (subtle) -->
            <div class="absolute top-[-10%] right-[-10%] w-[50%] h-[50%] rounded-full bg-indigo-500/5 blur-[120px]" />
            <div class="absolute bottom-[-10%] left-[-10%] w-[50%] h-[50%] rounded-full bg-violet-500/5 blur-[120px]" />

            <div class="w-full max-w-[400px] space-y-8 relative z-10">
                <!-- Mobile Logo Header -->
                <div class="flex flex-col items-center gap-2 lg:hidden text-center">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-tr from-violet-600 to-indigo-600 p-2.5 shadow-lg shadow-indigo-500/30 mb-2">
                        <AppLogoIcon class="size-full fill-current text-white" />
                    </div>
                    <h2 class="text-2xl font-bold tracking-tight">{{ name }}</h2>
                </div>

                <div class="space-y-2 text-center lg:text-left">
                    <h1 class="text-3xl font-extrabold tracking-tight text-white">
                        Selamat Datang
                    </h1>
                    <p class="text-sm text-slate-400">
                        {{ description || 'Silakan masukkan email dan password untuk masuk ke dashboard.' }}
                    </p>
                </div>

                <!-- Glass Card wrapper for form on desktop/mobile for high premium look -->
                <div class="p-6 sm:p-8 rounded-2xl bg-white/[0.02] border border-white/[0.05] shadow-2xl backdrop-blur-sm">
                    <slot />
                </div>
            </div>
        </div>
    </div>
</template>

