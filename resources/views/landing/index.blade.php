<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- ===== PRIMARY SEO ===== --}}
    <title>Jasa Bikin Website UMKM Murah & Profesional | The Dark and Bright</title>
    <meta name="description" content="Jasa pembuatan website profesional untuk UMKM mulai Rp 2.500.000. Desain modern, mobile friendly, SEO, dan siap dalam 7 hari. Melayani seluruh Indonesia.">
    <meta name="keywords" content="jasa bikin website, jasa website UMKM, jasa pembuatan website murah, website profesional, jasa website Yogyakarta, dark and bright, thedarkandbright">
    <meta name="author" content="The Dark and Bright">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <link rel="canonical" href="https://thedarkandbright.com/">

    {{-- ===== FAVICON ===== --}}
    <link rel="icon" type="image/webp" href="{{ asset('images/logo.webp') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.webp') }}">

    {{-- ===== OPEN GRAPH (Facebook, WhatsApp, LinkedIn) ===== --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://thedarkandbright.com/">
    <meta property="og:title" content="Jasa Bikin Website UMKM Murah & Profesional | The Dark and Bright">
    <meta property="og:description" content="Jasa pembuatan website profesional untuk UMKM mulai Rp 2.500.000. Desain modern, mobile friendly, SEO, dan siap dalam 7 hari.">
    <meta property="og:image" content="{{ asset('images/elegant_hero_umkm.webp') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:locale" content="id_ID">
    <meta property="og:site_name" content="The Dark and Bright">

    {{-- ===== TWITTER CARD ===== --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Jasa Bikin Website UMKM Murah & Profesional | The Dark and Bright">
    <meta name="twitter:description" content="Jasa pembuatan website profesional untuk UMKM mulai Rp 2.500.000. Desain modern, mobile friendly, SEO ready.">
    <meta name="twitter:image" content="{{ asset('images/elegant_hero_umkm.webp') }}">

    {{-- ===== SCHEMA.ORG (Google Rich Results) ===== --}}
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "LocalBusiness",
      "name": "The Dark and Bright",
      "description": "Jasa pembuatan website profesional untuk UMKM. Website modern, mobile friendly, SEO ready mulai Rp 2.500.000.",
      "url": "https://thedarkandbright.com",
      "logo": "{{ asset('images/logo.webp') }}",
      "image": "{{ asset('images/elegant_hero_umkm.webp') }}",
      "telephone": "+6285190894806",
      "priceRange": "Rp 2.500.000 - Rp 4.000.000",
      "address": {
        "@@type": "PostalAddress",
        "addressLocality": "Yogyakarta",
        "addressCountry": "ID"
      },
      "geo": {
        "@@type": "GeoCoordinates",
        "latitude": "-7.7956",
        "longitude": "110.3695"
      },
      "openingHoursSpecification": {
        "@@type": "OpeningHoursSpecification",
        "dayOfWeek": ["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"],
        "opens": "08:00",
        "closes": "22:00"
      },
      "sameAs": [
        "https://wa.me/6285190894806"
      ],
      "offers": [
        @forelse($packages as $package)
        @if(is_string($package) || !is_object($package))
            @continue
        @endif
        @php
            $priceStr = trim($package->price);
            $priceStr = str_replace(',', '.', $priceStr);
            $dotCount = substr_count($priceStr, '.');
            
            if ($dotCount === 1 && strlen($priceStr) <= 5) {
                $priceVal = (float) $priceStr * 1000000;
            } elseif ($dotCount >= 1) {
                $priceVal = (float) str_replace('.', '', $priceStr);
            } else {
                $priceVal = (float) $priceStr;
                if ($priceVal < 100) {
                    $priceVal = $priceVal * 1000000;
                }
            }
        @endphp
        {
          "@@type": "Offer",
          "name": "{{ $package->name }}",
          "price": "{{ (int) $priceVal }}",
          "priceCurrency": "IDR"
        }{{ !$loop->last ? ',' : '' }}
        @empty
        {
          "@@type": "Offer",
          "name": "Jasa Website UMKM",
          "price": "2500000",
          "priceCurrency": "IDR"
        }
        @endforelse
      ]
    }
    </script>

    {{-- ===== PERFORMANCE: PRECONNECT & FONT ===== --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <link rel="preconnect" href="https://wa.me">
    <link rel="dns-prefetch" href="https://fonts.googleapis.com">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">
    <link rel="dns-prefetch" href="https://wa.me">
    <link rel="dns-prefetch" href="https://maps.app.goo.gl">
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Outfit:wght@300;400;600;800&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Outfit:wght@300;400;600;800&display=swap"></noscript>

    {{-- AOS CSS --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    {{-- ===== PRELOAD CRITICAL IMAGES ===== --}}
    @php
        $heroImage = !empty($hero->image) ? (str_starts_with($hero->image, 'http') ? $hero->image : asset($hero->image)) : asset('images/hero/showcase_asia.webp');
    @endphp
    <link rel="preload" as="image" href="{{ $heroImage }}" type="image/webp" fetchpriority="high">

    {{-- Swiper CSS --}}
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"></noscript>

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- simpleParallax JS -->
    <script src="https://cdn.jsdelivr.net/npm/simple-parallax-js@5.5.1/dist/simpleParallax.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize AOS
            AOS.init({
                once: true,
                offset: 50,
                duration: 800,
                easing: 'ease-out-cubic'
            });
        });
    </script>

    @vite(['resources/css/app.css', 'resources/js/landing.ts'])

    <style>
        /* GLOBAL STYLES FOR LANDING - CUSTOM BRAND COLORS */
        :root {
            --color-primary: #141213;      /* Dark Slate Charcoal (from logo) */
            --color-primary-light: #1c283e;/* Deep Slate Blue (from logo) */
            --color-accent: #3b82f6;       /* Blue Accent */
            --color-black: #141213;        /* Black */
            --color-white: #ffffff;
            --color-background: #ffffff;
            --color-text: #1c283e;        /* Deep Slate Blue for optimal readability */
            --color-text-muted: #5e6b7e;
        }

        /* Parallax Background Helper Styles */
        .parallax-wrapper {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
            pointer-events: none;
        }
        .parallax-bg {
            width: 100%;
            height: 130% !important;
            object-fit: cover;
            position: absolute;
            top: 0;
            left: 0;
        }
        .parallax-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 2;
        }
        /* Section adjustments for parallax */
        .categories-section, .pricing-section, .cta-section {
            position: relative;
            overflow: hidden;
            background: transparent !important;
        }

        html {
            scroll-behavior: smooth;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Outfit', 'Inter', sans-serif;
        }

        body {
            background-color: var(--color-white);
            color: var(--color-text);
            overflow-x: hidden;
        }

        .btn-primary {
            background-color: var(--color-primary);
            color: #fff;
            border: none;
            padding: 0.85rem 1.75rem;
            border-radius: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px -1px rgba(0, 33, 71, 0.2);
        }
        .btn-primary:hover {
            background-color: var(--color-primary-light);
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 33, 71, 0.3);
        }

        .btn-outline {
            background-color: transparent;
            color: var(--color-primary);
            border: 2px solid var(--color-primary);
            padding: 0.75rem 1.75rem;
            border-radius: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .btn-outline:hover {
            background-color: var(--color-primary);
            color: #fff;
        }

        .btn-large {
            padding: 1.1rem 2.2rem;
            font-size: 1.1rem;
        }

        .site-footer {
            background-color: #ffffff;
            border-top: 1px solid #e2e8f0;
            padding: 5rem 7% 3rem;
            color: var(--color-primary);
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1.5fr;
            gap: 4rem;
            text-align: left;
            max-width: 1200px;
            margin: 0 auto 3rem;
        }

        .footer-col h4 {
            font-size: 1.1rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            color: var(--color-primary);
            letter-spacing: -0.5px;
        }

        .footer-tagline {
            color: var(--color-text-muted);
            font-size: 0.95rem;
            line-height: 1.6;
            margin-top: 1rem;
            margin-bottom: 2rem;
        }

        .logo-text-main {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--color-primary);
            letter-spacing: -1px;
        }

        .logo-text-main .text-accent {
            color: var(--color-accent);
        }

        .btn-footer-chat {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            background: #25d366;
            color: white;
            padding: 0.8rem 1.5rem;
            border-radius: 12px;
            font-weight: 800;
            font-size: 0.9rem;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(37, 211, 102, 0.2);
        }

        .btn-footer-chat:hover {
            transform: translateY(-2px);
            background: #20ba5a;
            box-shadow: 0 6px 16px rgba(37, 211, 102, 0.3);
        }

        .btn-footer-chat svg {
            width: 20px;
            height: 20px;
        }

        .footer-col ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .footer-col ul li a {
            text-decoration: none;
            color: var(--color-text-muted);
            font-weight: 600;
            font-size: 0.95rem;
            transition: color 0.2s ease;
        }

        .footer-col ul li a:hover {
            color: var(--color-accent);
        }

        .contact-details {
            display: flex;
            flex-direction: column;
            gap: 1.25rem;
        }

        .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            color: var(--color-text);
            font-size: 0.95rem;
            font-weight: 600;
            line-height: 1.5;
            text-decoration: none;
        }

        .contact-item svg {
            width: 20px;
            height: 20px;
            color: var(--color-accent);
            flex-shrink: 0;
            margin-top: 2px;
        }

        .address-item {
            color: var(--color-text);
            transition: color 0.3s ease;
        }

        .address-item:hover {
            color: var(--color-accent);
        }

        .footer-divider {
            height: 1px;
            background-color: #e2e8f0;
            margin-bottom: 2rem;
        }

        .footer-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }
        .footer-bottom p {
            color: #94a3b8;
            font-weight: 600;
            font-size: 0.95rem;
        }
        .footer-maps {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--color-text-muted);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        .footer-maps:hover {
            color: var(--color-primary);
        }
        .footer-maps svg {
            width: 18px;
            height: 18px;
            color: #ef4444;
        }

        @media (max-width: 900px) {
            .footer-grid {
                grid-template-columns: 1fr;
                gap: 2.5rem;
                text-align: center;
            }

            .footer-col {
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .contact-item {
                justify-content: center;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    @include('landing.nav.nav')
    @include('landing.beranda.beranda')
    @include('landing.kategori.kategori')
    @include('landing.langkah.langkah')
    @include('landing.paket.paket')
    @include('landing.kontak.kontak')

    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/62{{ $setting['whatsapp_number'] ?? '85190894806' }}?text=Halo%20DarkandBright,%20saya%20tertarik%20untuk%20membuat%20website." class="floating-wa" target="_blank" rel="noopener" aria-label="Chat WhatsApp">
        <div class="wa-tooltip">Chat Kami</div>
        <svg viewBox="0 0 24 24" fill="currentColor">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
        </svg>
    </a>

    <footer class="site-footer">
        <div class="footer-grid">
            <div class="footer-col brand-col">
                <div class="footer-logo">
                    <span class="logo-text-main">The Dark <span class="text-accent">&</span> Bright</span>
                </div>
                <p class="footer-tagline">Jasa Pembuatan Website UMKM Murah & Mewah. Desain premium, pengerjaan cepat, hasil memuaskan dan siap online!</p>
                <div class="footer-chat-box">
                    <a href="https://wa.me/62{{ $setting['whatsapp_number'] ?? '85190894806' }}?text=Halo%20DarkandBright,%20saya%20tertarik%20untuk%20membuat%20website" target="_blank" rel="noopener" class="btn-footer-chat">
                        <svg viewBox="0 0 24 24" fill="currentColor">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                        </svg>
                        Hubungi WhatsApp
                    </a>
                </div>
            </div>
            <div class="footer-col links-col">
                <h4>Navigasi</h4>
                <ul>
                    <li><a href="#beranda">Beranda</a></li>
                    <li><a href="#kategori">Kategori Desain</a></li>
                    <li><a href="#langkah">Cara Pesan</a></li>
                    <li><a href="#paket">Paket Harga</a></li>
                    <li><a href="#kontak">Hubungi Kami</a></li>
                </ul>
            </div>
            <div class="footer-col contact-col">
                <h4>Kontak & Lokasi</h4>
                <div class="contact-details">
                    <p class="contact-item">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                        </svg>
                        <span>+62 {{ $setting['whatsapp_number_formatted'] ?? '851-9089-4806' }}</span>
                    </p>
                    <a href="https://maps.app.goo.gl/gCW7yQagGNKvDVgm8" target="_blank" rel="noopener" class="contact-item address-item">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                            <circle cx="12" cy="10" r="3"/>
                        </svg>
                        <span class="address-text">Km 9 Gandu, Jl. Wonosari, Gandu, Sendangtirto, Kec. Berbah, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55573</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="footer-divider"></div>
        <div class="footer-bottom">
            <p>&copy; 2026 thedarkandbright.com. All Rights Reserved.</p>
            <a href="https://maps.app.goo.gl/gCW7yQagGNKvDVgm8" target="_blank" rel="noopener" class="footer-maps">
                <svg viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                </svg>
                Buka di Google Maps
            </a>
        </div>
    </footer>

    <style>
        .floating-wa {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 65px;
            height: 65px;
            background: #25d366;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 25px rgba(37, 211, 102, 0.4);
            z-index: 999;
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            animation: bounceIn 0.8s ease;
        }

        .floating-wa:hover {
            transform: scale(1.1) translateY(-5px);
            box-shadow: 0 15px 35px rgba(37, 211, 102, 0.5);
        }

        .floating-wa svg {
            width: 35px;
            height: 35px;
        }

        .wa-tooltip {
            position: absolute;
            right: 80px;
            background: white;
            color: var(--color-primary);
            padding: 0.6rem 1rem;
            border-radius: 12px;
            font-size: 0.9rem;
            font-weight: 800;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            white-space: nowrap;
            opacity: 0;
            transform: translateX(10px);
            transition: all 0.3s ease;
            pointer-events: none;
        }

        .floating-wa:hover .wa-tooltip {
            opacity: 1;
            transform: translateX(0);
        }

        @keyframes bounceIn {
            0% { transform: scale(0); opacity: 0; }
            70% { transform: scale(1.1); }
            100% { transform: scale(1); opacity: 1; }
        }

        @media (max-width: 768px) {
            .floating-wa {
                bottom: 20px;
                right: 20px;
                width: 60px;
                height: 60px;
            }
            .wa-tooltip { display: none; }
        }
    </style>

    <!-- Swiper JS (Deferred for high performance) -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" defer></script>
    
    <!-- Initialize Parallax -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var parallaxBgs = document.getElementsByClassName('parallax-bg');
            if (parallaxBgs.length > 0 && typeof simpleParallax !== 'undefined') {
                new simpleParallax(parallaxBgs, {
                    delay: 0.4,
                    transition: 'cubic-bezier(0,0,0,1)',
                    scale: 1.3,
                    overflow: true
                });
            }
        });
    </script>
</body>
</html>
