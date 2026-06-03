<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DashboardDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Hero::create([
            'title' => 'Jasa Desain Website',
            'title_highlight' => 'Murah & Mewah',
            'description' => 'Khusus buat UMKM: Tingkatkan orderan WA Anda dengan website profesional siap pakai. Sekali bayar, langsung online, hasil pasti memuaskan!',
            'button_text' => 'Pesan Sekarang',
            'button_link' => 'https://wa.me/6285190894806?text=Halo%20DarkandBright,%20saya%20tertarik%20buat%20website%20murah.',
            'secondary_button_text' => 'Lihat Desain',
            'secondary_button_link' => '#template',
            'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&q=80&w=300'
        ]);

        $templates = [
            [
                'name' => 'Kuliner Prima',
                'category' => 'Web Design > F&B Landing Page',
                'image' => '/images/template_food.png',
                'rating' => '5.0',
                'reviews_count' => 124,
                'description' => 'Tingkatkan omset warung atau restoran Anda dengan tampilan website yang menggugah selera. Desain ini dikhususkan untuk menampilkan menu andalan dan memudahkan pelanggan memesan lewat WhatsApp.',
                'packages' => [
                    'basic' => ['price' => '150.000', 'delivery' => '1 Hari', 'features' => ['Landing Page 1 Halaman', 'Integrasi WhatsApp', 'Hosting 1 Tahun', 'Domain .web.id']],
                    'standard' => ['price' => '250.000', 'delivery' => '2 Hari', 'features' => ['3 Halaman Utama', 'Galeri Foto Menu', 'Domain .com', 'Cloud Hosting', 'SSL Aman']],
                    'premium' => ['price' => '350.000', 'delivery' => '3 Hari', 'features' => ['Website Full Fitur', 'Booking System WA', 'SEO Google Pro', 'Domain .com', 'Support 24/7']]
                ],
                'reviews' => [
                    ['user' => 'Siti Aminah', 'avatar' => 'SA', 'comment' => 'Website warung saya jadi jauh lebih profesional! Pelanggan makin percaya.', 'stars' => 5],
                    ['user' => 'Budi Santoso', 'avatar' => 'BS', 'comment' => 'Pengerjaannya sangat cepat, respon admin oke banget.', 'stars' => 5]
                ]
            ],
            [
                'name' => 'Fashion Boutique Pro',
                'category' => 'Web Design > Fashion & Retail',
                'image' => '/images/template_fashion.png',
                'rating' => '4.9',
                'reviews_count' => 86,
                'description' => 'Desain minimalis dan elegan untuk butik fashion Anda. Fokus pada keindahan foto produk agar pelanggan tertarik untuk segera checkout.',
                'packages' => [
                    'basic' => ['price' => '150.000', 'delivery' => '1 Hari', 'features' => ['Katalog Produk Simple', 'Tombol Order WA', 'Hosting Cepat', 'Domain .web.id']],
                    'standard' => ['price' => '250.000', 'delivery' => '2 Hari', 'features' => ['Katalog Pro', 'Galeri Koleksi', 'Domain .com', 'Hosting Pro', 'SSL']],
                    'premium' => ['price' => '350.000', 'delivery' => '3 Hari', 'features' => ['Full Catalog System', 'Cart WhatsApp', 'SEO Fashion Pro', 'Domain .com', 'Bantuan Update Produk']]
                ],
                'reviews' => [
                    ['user' => 'Rina Hijab', 'avatar' => 'RH', 'comment' => 'Tampilannya elegan banget, cocok buat brand fashion premium!', 'stars' => 5]
                ]
            ],
            [
                'name' => 'Jasa Servis Digital',
                'category' => 'Web Design > Services',
                'image' => '/images/elegant_service_mobile.png',
                'rating' => '5.0',
                'reviews_count' => 42,
                'description' => 'Cocok untuk bengkel, salon, atau jasa lainnya. Tampilkan layanan unggulan Anda dan mudahkan pelanggan untuk melakukan booking lewat ponsel.',
                'packages' => [
                    'basic' => ['price' => '100.000', 'delivery' => '1 Hari', 'features' => ['Halaman Jasa Simple', 'Hubungi via WA', 'Hosting 1 Tahun']],
                    'standard' => ['price' => '200.000', 'delivery' => '2 Hari', 'features' => ['Pricelist Jasa Pro', 'Form Booking WA', 'Domain .com', 'Hosting']],
                    'premium' => ['price' => '300.000', 'delivery' => '3 Hari', 'features' => ['Multipage System', 'Testimoni Galeri', 'SEO Lokal Google', 'Domain .com']]
                ],
                'reviews' => [
                    ['user' => 'Andi Motor', 'avatar' => 'AM', 'comment' => 'Bengkel saya sekarang punya web, pelanggan makin ramai!', 'stars' => 5]
                ]
            ]
        ];

        foreach ($templates as $t) {
            \App\Models\Template::create($t);
        }
    }
}
