<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PricingPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Setting::updateOrCreate(
            ['key' => 'whatsapp_number'],
            ['value' => '85859044929']
        );

        // Clear existing packages before re-seeding
        \App\Models\PricingPackage::truncate();

        $packages = [
            [
                'name' => 'Paket Starter',
                'price' => '2.500.000',
                'period' => '',
                'payment_terms' => 'Bisa dicicil <strong>3x pembayaran</strong>',
                'is_popular' => false,
                'button_text' => 'Pilih Paket Starter',
                'button_link' => 'https://wa.me/6285859044929?text=Halo%20DarkandBright,%20saya%20tertarik%20dengan%20Paket%20Starter%20seharga%20Rp%202.500.000.',
                'features' => [
                    ['text' => 'Website profesional', 'is_active' => true],
                    ['text' => 'Mobile friendly', 'is_active' => true],
                    ['text' => 'Desain modern', 'is_active' => true],
                    ['text' => 'Gratis domain', 'is_active' => true],
                    ['text' => 'Basic SEO', 'is_active' => true],
                    ['text' => 'Integrasi WhatsApp', 'is_active' => true],
                    ['text' => 'Form kontak', 'is_active' => true],
                ],
            ],
            [
                'name' => 'Paket Business',
                'price' => '3.000.000',
                'period' => '',
                'payment_terms' => 'Bisa dicicil <strong>3x pembayaran</strong>',
                'is_popular' => true,
                'button_text' => 'Pilih Paket Business',
                'button_link' => 'https://wa.me/6285859044929?text=Halo%20DarkandBright,%20saya%20tertarik%20dengan%20Paket%20Business%20seharga%20Rp%203.000.000.',
                'features' => [
                    ['text' => 'Semua fitur Paket Starter', 'is_active' => true],
                    ['text' => '<strong>Gratis domain + hosting 1 tahun</strong>', 'is_active' => true],
                    ['text' => 'Optimasi kecepatan website', 'is_active' => true],
                    ['text' => 'Halaman produk / layanan lebih lengkap', 'is_active' => true],
                    ['text' => 'Integrasi Google Maps', 'is_active' => true],
                    ['text' => 'Optimasi SEO dasar', 'is_active' => true],
                    ['text' => 'Support revisi', 'is_active' => true],
                ],
            ],
            [
                'name' => 'Paket Premium',
                'price' => '4.000.000',
                'period' => '',
                'payment_terms' => 'Bisa dicicil <strong>4x pembayaran</strong>',
                'is_popular' => false,
                'button_text' => 'Pilih Paket Premium',
                'button_link' => 'https://wa.me/6285859044929?text=Halo%20DarkandBright,%20saya%20tertarik%20dengan%20Paket%20Premium%20seharga%20Rp%204.000.000.',
                'features' => [
                    ['text' => 'Semua fitur Paket Business', 'is_active' => true],
                    ['text' => '<strong>Gratis domain + hosting 1 tahun</strong>', 'is_active' => true],
                    ['text' => 'Dashboard admin', 'is_active' => true],
                    ['text' => 'Sistem SEO management', 'is_active' => true],
                    ['text' => 'Dashboard pendukung tim marketing', 'is_active' => true],
                    ['text' => 'Artikel / blog management', 'is_active' => true],
                    ['text' => 'Tracking performa website', 'is_active' => true],
                    ['text' => 'Optimasi SEO lanjutan', 'is_active' => true],
                    ['text' => '<strong>Prioritas support</strong>', 'is_active' => true],
                ],
            ],
        ];

        foreach ($packages as $pkg) {
            \App\Models\PricingPackage::create($pkg);
        }
    }
}
