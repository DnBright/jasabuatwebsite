<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DarkandBright - Website Elegan & Terpercaya untuk UMKM</title>
    
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
    @include('landing.template.template')
    @include('landing.kalkulator.kalkulator')
    @include('landing.kontak.kontak')

    <footer class="site-footer">
        <div class="footer-bottom">
            <a href="https://maps.app.goo.gl/gCW7yQagGNKvDVgm8" target="_blank" class="footer-maps">
                <svg viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                </svg>
                Lokasi Kami
            </a>
            <p>&copy; 2026 DarkandBright. Solusi Website Terjangkau untuk UMKM Indonesia.</p>
        </div>
    </footer>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</body>
</html>
