<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\GeminiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AiPlannerController extends Controller
{
    /**
     * Display the AI Planner input form & results page.
     */
    public function index()
    {
        return view('dashboard.ai_planner.index');
    }

    /**
     * Process the user's brief, call Gemini for a JSON schema, parse it, and return the data.
     */
    public function generate(Request $request)
    {
        $request->validate([
            'business_name' => 'required|string|max:255',
            'business_description' => 'required|string|max:2000',
        ]);

        $businessName = $request->input('business_name');
        $description = $request->input('business_description');

        $systemInstruction = "Anda adalah Asisten AI PT. DnB (Digital Networks Business) spesialis perancang struktur website profesional (Sitemap & Wireframe Planner).\n"
            ."Tugas Anda adalah memproses profil bisnis dari pengguna dan menghasilkan rancangan website yang terstruktur.\n"
            ."Anda WAJIB memberikan jawaban dalam format JSON valid tanpa tambahan teks penjelasan apa pun. Jangan gunakan markdown block ```json atau tag pembuka lainnya. Hanya kembalikan objek JSON murni.\n\n"
            ."Struktur JSON Schema yang harus Anda kembalikan adalah:\n"
            ."{\n"
            ."  \"business_name\": \"Nama Bisnis\",\n"
            ."  \"hero_title\": \"Judul Utama Headline Landing Page yang Menarik & Menjual\",\n"
            ."  \"hero_subtitle\": \"Sub-headline pendukung yang menjelaskan proposisi nilai\",\n"
            ."  \"color_theme\": {\n"
            ."    \"primary\": \"Warna Utama (Hex Code, misal: #1e3a8a)\",\n"
            ."    \"secondary\": \"Warna Sekunder (Hex Code, misal: #f59e0b)\",\n"
            ."    \"accent\": \"Warna Aksen/Button (Hex Code, misal: #10b981)\"\n"
            ."  },\n"
            ."  \"sections\": [\n"
            ."    {\n"
            ."      \"section_name\": \"Nama Bagian (misal: Hero, Features, Pricing, Contact)\",\n"
            ."      \"content_outline\": \"Rincian materi/konten yang harus ditulis di bagian ini.\"\n"
            ."    }\n"
            ."  ],\n"
            ."  \"marketing_advice\": \"Saran strategi pemasaran digital singkat untuk bisnis ini agar sukses di internet.\"\n"
            .'}';

        $prompt = "Rancanglah struktur landing page untuk bisnis berikut:\n"
            ."Nama Bisnis: {$businessName}\n"
            ."Deskripsi Bisnis: {$description}";

        $aiReply = GeminiService::generate($prompt, $systemInstruction);

        // Bersihkan markdown code block jika Gemini secara tidak sengaja mengembalikannya
        $cleanReply = preg_replace('/^```json\s*/i', '', $aiReply);
        $cleanReply = preg_replace('/```$/', '', $cleanReply);
        $cleanReply = trim($cleanReply);

        $parsedData = json_decode($cleanReply, true);

        if (json_last_error() !== JSON_ERROR_NONE || ! is_array($parsedData)) {
            Log::error('AI Planner failed to parse JSON. Raw Reply: '.$aiReply);

            // Fallback structured data so the user experience doesn't break
            $parsedData = [
                'business_name' => $businessName,
                'hero_title' => 'Solusi Digital Terbaik untuk Bisnis Anda',
                'hero_subtitle' => 'Mulai kembangkan kehadiran online Anda bersama platform profesional kami.',
                'color_theme' => [
                    'primary' => '#1f2937',
                    'secondary' => '#4b5563',
                    'accent' => '#3b82f6',
                ],
                'sections' => [
                    ['section_name' => 'Hero Section', 'content_outline' => 'Headline menarik, latar belakang bisnis, tombol CTA utama.'],
                    ['section_name' => 'Tentang Kami', 'content_outline' => 'Visi misi bisnis, sejarah singkat, dan keunggulan utama.'],
                    ['section_name' => 'Produk/Layanan', 'content_outline' => 'Daftar lengkap layanan digital yang ditawarkan beserta penjelasan singkat.'],
                    ['section_name' => 'Hubungi Kami', 'content_outline' => 'Form kontak, integrasi WhatsApp chat, alamat map, dan email.'],
                ],
                'marketing_advice' => 'Gunakan periklanan media sosial untuk mendatangkan traffic awal ke landing page ini.',
                'is_fallback' => true,
            ];
        }

        return view('dashboard.ai_planner.index', [
            'result' => $parsedData,
            'business_name' => $businessName,
            'business_description' => $description,
        ]);
    }
}
