<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jasa Bikin Website Termurah Di Yogyakarta</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    @vite(['resources/css/app.css', 'resources/js/landing.ts'])

    <style>
        /* GLOBAL STYLES FOR LANDING */
        :root {
            --color-primary: #002147;
            --color-primary-light: #0c3461;
            --color-accent: #3b82f6;
            --color-black: #0f172a;
            --color-white: #ffffff;
            --color-background: #f8fafc;
            --color-text: #334155;
            --color-text-muted: #64748b;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Outfit', 'Inter', sans-serif;
            scroll-behavior: smooth;
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
            background-color: var(--color-white);
            border-top: 1px solid #f1f5f9;
            padding: 3rem 7%;
            text-align: center;
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
            color: #64748b;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        .footer-maps:hover {
            color: #002147;
        }
        .footer-maps svg {
            width: 18px;
            height: 18px;
            color: #ef4444;
        }
    </style>
</head>
<body>
    @include('landing.nav.nav')
    @include('landing.beranda.beranda')
    @include('landing.kategori.kategori')
    @include('landing.langkah.langkah')
    @include('landing.kalkulator.kalkulator')
    @include('landing.kontak.kontak')

    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/6285859044929?text=Halo%20DarkandBright,%20saya%20tertarik%20untuk%20membuat%20website." class="floating-wa" target="_blank" aria-label="Chat WhatsApp">
        <div class="wa-tooltip">Chat Kami</div>
        <svg viewBox="0 0 24 24" fill="currentColor">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
        </svg>
    </a>

    <footer class="site-footer">
        <div class="footer-bottom">
            <a href="https://maps.app.goo.gl/gCW7yQagGNKvDVgm8" target="_blank" class="footer-maps">
                <svg viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                </svg>
                Lokasi Kami
            </a>
            <p>&copy; 2026 thedarkandbright.com. All Rights Reserved.</p>
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
            color: #002147;
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

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</body>
</html>
