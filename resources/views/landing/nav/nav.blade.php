<!-- NAVBAR -->
<nav class="navbar" id="mainNavbar">
    <div class="nav-container">
        <div class="nav-brand" onclick="window.location.href='#beranda'">
            <picture>
                <source srcset="{{ asset('images/logo.webp') }}" type="image/webp">
                <img src="{{ asset('images/logo.png') }}" alt="DarkandBright Logo" class="nav-logo" width="300" height="275" />
            </picture>
            <div class="brand-seo-text desktop-only">
                <strong>Jasa Pembuatan Website</strong>
                <span>Termurah Di Yogyakarta</span>
            </div>
        </div>
        
        <ul class="nav-links">
            <li><a href="#beranda" class="nav-link">Beranda</a></li>
            <li><a href="#kategori" class="nav-link">Kategori</a></li>
            <li><a href="#paket" class="nav-link">Harga Paket</a></li>
            <li><a href="#kontak" class="nav-link">Kontak</a></li>
        </ul>
        
        <div class="nav-actions">
            <a href="https://wa.me/62{{ $setting['whatsapp_number'] ?? '85190894806' }}?text=Halo%20DarkandBright,%20saya%20tertarik%20memesan%20layanan%20Anda." target="_blank" rel="noopener" class="btn-nav desktop-only" style="text-decoration: none;">
                Pesan Sekarang
            </a>
            
            <!-- Hamburger Button for Mobile -->
            <button class="hamburger" id="hamburgerBtn" aria-label="Menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </button>
        </div>
    </div>
</nav>

<!-- Mobile Menu Overlay -->
<div class="mobile-menu-overlay" id="mobileMenu">
    <div class="mobile-menu-content">
        <div class="mobile-menu-header">
            <picture>
                <source srcset="{{ asset('images/logo.webp') }}" type="image/webp">
                <img src="{{ asset('images/logo.png') }}" alt="DarkandBright Logo" class="mobile-logo" width="300" height="275" />
            </picture>
            <button class="close-menu" id="closeMenuBtn" aria-label="Tutup Menu">&times;</button>
        </div>
        
        <nav class="mobile-nav-links">
            <a href="#beranda" class="mobile-nav-link">Beranda</a>
            <a href="#kategori" class="mobile-nav-link">Kategori</a>
            <a href="#paket" class="mobile-nav-link">Harga Paket</a>
            <a href="#kontak" class="mobile-nav-link">Kontak</a>
        </nav>
        
        <div class="mobile-menu-footer">
            <p class="menu-tagline">Solusi Digital UMKM Naik Kelas</p>
            <a href="https://wa.me/6285190894806" class="btn-mobile-wa" target="_blank" rel="noopener">
                Hubungi WhatsApp
            </a>
            <div class="mobile-socials">
                <!-- Social icons can be added here if needed -->
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const hamburgerBtn = document.getElementById('hamburgerBtn');
        const closeMenuBtn = document.getElementById('closeMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        const mobileLinks = document.querySelectorAll('.mobile-nav-link');
        const navbar = document.getElementById('mainNavbar');

        // Toggle Menu
        function toggleMenu() {
            mobileMenu.classList.toggle('active');
            document.body.classList.toggle('menu-open');
        }

        hamburgerBtn.addEventListener('click', toggleMenu);
        closeMenuBtn.addEventListener('click', toggleMenu);

        // Close menu when clicking a link
        mobileLinks.forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.remove('active');
                document.body.classList.remove('menu-open');
            });
        });

        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    });
</script>

<style>
    .navbar {
        position: sticky;
        top: 0;
        z-index: 1000;
        background-color: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        border-bottom: 1px solid rgba(241, 245, 249, 0.7);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        padding: 0.5rem 0;
    }

    .navbar.scrolled {
        padding: 0.25rem 0;
        background-color: rgba(255, 255, 255, 0.95);
        box-shadow: 0 10px 30px -10px rgba(0, 33, 71, 0.1);
    }

    .nav-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.75rem 7%;
        max-width: 1400px;
        margin: 0 auto;
    }

    .nav-brand {
        display: flex;
        align-items: center;
        cursor: pointer;
        gap: 1rem;
    }

    .brand-seo-text {
        display: flex;
        flex-direction: column;
        border-left: 2px solid #e2e8f0;
        padding-left: 1rem;
        line-height: 1.2;
    }

    .brand-seo-text strong {
        color: #0f172a;
        font-size: 0.85rem;
        font-weight: 800;
    }

    .brand-seo-text span {
        color: #64748b;
        font-size: 0.7rem;
        font-weight: 600;
    }

    .nav-logo {
        height: 40px;
        width: auto;
        object-fit: contain;
        transition: transform 0.3s ease;
    }

    .nav-brand:hover .nav-logo {
        transform: scale(1.05);
    }

    .nav-links {
        display: flex;
        list-style: none;
        gap: 2.5rem;
    }

    .nav-link {
        text-decoration: none;
        color: #64748b;
        font-weight: 700;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        position: relative;
        padding: 0.5rem 0;
    }

    .nav-link::after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background: linear-gradient(90deg, #002147, #3b82f6);
        transition: width 0.3s ease;
    }

    .nav-link:hover {
        color: #002147;
    }

    .nav-link:hover::after {
        width: 100%;
    }

    .nav-actions {
        display: flex;
        align-items: center;
        gap: 1.5rem;
    }

    .btn-nav {
        background: linear-gradient(135deg, #002147 0%, #0c3461 100%);
        color: #fff;
        padding: 0.75rem 1.75rem;
        border-radius: 12px;
        font-weight: 800;
        font-size: 0.9rem;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        box-shadow: 0 10px 20px -5px rgba(0, 33, 71, 0.3);
    }

    .btn-nav:hover {
        transform: translateY(-2px);
        box-shadow: 0 15px 30px -5px rgba(0, 33, 71, 0.4);
    }

    /* Hamburger Button */
    .hamburger {
        display: none;
        flex-direction: column;
        justify-content: space-between;
        width: 48px;
        height: 48px;
        background: transparent;
        border: none;
        cursor: pointer;
        padding: 13px 9px;
        z-index: 1100;
    }

    .bar {
        width: 100%;
        height: 3px;
        background-color: #002147;
        border-radius: 10px;
        transition: all 0.3s ease;
    }

    /* Mobile Menu Overlay */
    .mobile-menu-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 33, 71, 0.95);
        backdrop-filter: blur(10px);
        z-index: 2000;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        visibility: hidden;
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        transform: translateX(100%);
    }

    .mobile-menu-overlay.active {
        opacity: 1;
        visibility: visible;
        transform: translateX(0);
    }

    .mobile-menu-content {
        width: 85%;
        max-width: 400px;
        height: 100%;
        background: white;
        margin-left: auto;
        padding: 2rem;
        display: flex;
        flex-direction: column;
        box-shadow: -10px 0 30px rgba(0, 0, 0, 0.2);
    }

    .mobile-menu-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 3rem;
    }

    .mobile-logo {
        height: 35px;
    }

    .close-menu {
        font-size: 2.5rem;
        background: transparent;
        border: none;
        color: #002147;
        cursor: pointer;
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .mobile-nav-links {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
        margin-bottom: auto;
    }

    .mobile-nav-link {
        font-size: 1.5rem;
        font-weight: 800;
        color: #0f172a;
        text-decoration: none;
        transition: all 0.3s ease;
        padding-left: 0;
    }

    .mobile-nav-link:hover {
        color: #3b82f6;
        padding-left: 10px;
    }

    .mobile-menu-footer {
        margin-top: 3rem;
        padding-top: 2rem;
        border-top: 1px solid #f1f5f9;
    }

    .menu-tagline {
        color: #64748b;
        font-size: 0.9rem;
        margin-bottom: 1.5rem;
        font-weight: 600;
    }

    .btn-mobile-wa {
        display: block;
        width: 100%;
        background: #002147;
        color: white;
        text-align: center;
        padding: 1.25rem;
        border-radius: 16px;
        text-decoration: none;
        font-weight: 800;
        box-shadow: 0 10px 20px rgba(0, 33, 71, 0.2);
    }

    body.menu-open {
        overflow: hidden;
    }

    @@media (max-width: 900px) {
        .nav-links, .desktop-only { display: none; }
        .hamburger { display: flex; }
        .nav-container { padding: 0.75rem 5%; }
        .nav-logo { height: 35px; }
    }
</style>
