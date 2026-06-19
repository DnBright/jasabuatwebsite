<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GeminiService
{
    /**
     * Generate content using Google Gemini API.
     */
    public static function generate(string $prompt, ?string $systemInstruction = null): string
    {
        $apiKey = env('GEMINI_API_KEY');

        if (empty($apiKey)) {
            Log::warning('Gemini API key is not configured in .env file.');

            return 'Mohon maaf, asisten AI kami sedang offline karena kendala konfigurasi. Silakan hubungi admin kami secara langsung.';
        }

        try {
            $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key={$apiKey}";

            $payload = [
                'contents' => [
                    [
                        'parts' => [
                            ['text' => $prompt],
                        ],
                    ],
                ],
            ];

            if ($systemInstruction) {
                $payload['systemInstruction'] = [
                    'parts' => [
                        ['text' => $systemInstruction],
                    ],
                ];
            }

            $response = Http::timeout(10)
                ->withHeaders(['Content-Type' => 'application/json'])
                ->post($url, $payload);

            if ($response->failed()) {
                Log::error('Gemini API request failed: '.$response->body());

                return 'Mohon maaf, asisten AI sedang mengalami gangguan koneksi. Silakan kirim pesan Anda kembali beberapa saat lagi.';
            }

            $data = $response->json();
            $text = $data['candidates'][0]['content']['parts'][0]['text'] ?? null;

            if (empty($text)) {
                Log::warning('Gemini API returned an empty response structure.');

                return 'Mohon maaf, asisten AI tidak dapat memproses jawaban saat ini.';
            }

            return trim($text);

        } catch (\Throwable $e) {
            Log::error('Exception in GeminiService: '.$e->getMessage());

            return 'Maaf, terjadi kesalahan internal saat menghubungkan ke asisten AI.';
        }
    }
}
