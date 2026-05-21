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

        $packages = [
            [
                'name' => 'Paket Basic',
                'price' => '2.5',
                'period' => 'Juta',
                'payment_terms' => 'Bisa dicicil <strong>3x bayar</strong> per bulan',
                'is_popular' => false,
                'button_text' => 'Pilih Paket Basic',
                'button_link' => 'https://wa.me/6285859044929?text=Halo%20DarkandBright,%20saya%20tertarik%20dengan%20Paket%20Basic%20seharga%202.5%20Juta.',
                'features' => [
                    ['text' => 'Website <strong>Terima Jadi</strong>', 'is_active' => true],
                    ['text' => '<strong>Gratis</strong> Domain Pilihan', 'is_active' => true],
                    ['text' => 'Desain Responsif & Modern', 'is_active' => true],
                    ['text' => 'Dashboard Admin Khusus', 'is_active' => false],
                    ['text' => 'Support Optimasi SEO', 'is_active' => false],
                ],
            ],
            [
                'name' => 'Paket Premium',
                'price' => '3',
                'period' => 'Juta',
                'payment_terms' => 'Bisa dicicil <strong>3x bayar</strong> tiap bulan',
                'is_popular' => true,
                'button_text' => 'Pilih Paket Premium',
                'button_link' => 'https://wa.me/6285859044929?text=Halo%20DarkandBright,%20saya%20tertarik%20dengan%20Paket%20Premium%20seharga%203%20Juta.',
                'features' => [
                    ['text' => 'Website <strong>Terima Jadi</strong>', 'is_active' => true],
                    ['text' => 'Domain <strong>1 Tahun</strong>', 'is_active' => true],
                    ['text' => 'Hosting <strong>1 Tahun</strong>', 'is_active' => true],
                    ['text' => 'Desain Premium (Cepat & Stabil)', 'is_active' => true],
                    ['text' => 'Support Optimasi SEO', 'is_active' => false],
                ],
            ],
            [
                'name' => 'Paket Eksklusif',
                'price' => '4',
                'period' => 'Juta',
                'payment_terms' => 'Bisa dicicil <strong>4x bayar</strong> tiap bulan',
                'is_popular' => false,
                'button_text' => 'Pilih Paket Eksklusif',
                'button_link' => 'https://wa.me/6285859044929?text=Halo%20DarkandBright,%20saya%20tertarik%20dengan%20Paket%20Eksklusif%20seharga%204%20Juta.',
                'features' => [
                    ['text' => 'Website <strong>Terima Jadi</strong>', 'is_active' => true],
                    ['text' => 'Domain & Hosting <strong>1 Tahun</strong>', 'is_active' => true],
                    ['text' => '<strong>Dashboard Admin</strong> Lengkap', 'is_active' => true],
                    ['text' => '<strong>Support Optimasi SEO</strong>', 'is_active' => true],
                    ['text' => 'Prioritas Support 24/7', 'is_active' => true],
                ],
            ],
        ];

        foreach ($packages as $pkg) {
            \App\Models\PricingPackage::create($pkg);
        }
    }
}
