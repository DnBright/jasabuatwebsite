<!-- NAVBAR -->
<nav class="navbar">
    <div class="nav-container">
        <div class="nav-brand" onclick="window.location.href='#beranda'">
            <img src="{{ asset('images/logo.png') }}" alt="DarkandBright Logo" class="nav-logo" />
        </div>
        
        <ul class="nav-links">
            <li><a href="#beranda" class="nav-link">Beranda</a></li>
            <li><a href="#kategori" class="nav-link">Kategori</a></li>
            <li><a href="#template" class="nav-link">Template</a></li>
            <li><a href="#kalkulator" class="nav-link">Kalkulator</a></li>
            <li><a href="#kontak" class="nav-link">Kontak</a></li>
        </ul>
        
        <div class="nav-actions">
            <a href="https://wa.me/6281234567890?text=Halo%20DarkandBright,%20saya%20tertarik%20memesan%20layanan%20Anda." target="_blank" class="btn-nav" style="text-decoration: none;">
                Pesan Sekarang
            </a>
        </div>
    </div>
</nav>

<style>
    .navbar {
        position: sticky;
        top: 0;
        z-index: 1000;
        background-color: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        border-bottom: 1px solid rgba(241, 245, 249, 0.7);
        transition: all 0.3s ease;
    }

    .nav-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1.25rem 7%;
        max-width: 1400px;
        margin: 0 auto;
    }

    .nav-brand {
        display: flex;
        align-items: center;
        cursor: pointer;
    }

    .nav-logo {
        height: 40px; /* Adjust height as needed */
        width: auto;
        object-fit: contain;
    }

    .nav-links {
        display: flex;
        list-style: none;
        gap: 3rem;
    }

    .nav-link {
        text-decoration: none;
        color: #64748b;
        font-weight: 600;
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
        background-color: #002147;
        transition: width 0.3s ease;
    }

    .nav-link:hover {
        color: #002147;
    }

    .nav-link:hover::after {
        width: 100%;
    }

    .btn-nav {
        background-color: #002147;
        color: #fff;
        border: none;
        padding: 0.75rem 1.75rem;
        border-radius: 12px;
        font-weight: 700;
        font-size: 0.9rem;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        box-shadow: 0 4px 6px -1px rgba(0, 33, 71, 0.15);
    }

    .btn-nav:hover {
        background-color: #0c3461;
        transform: translateY(-2px);
        box-shadow: 0 10px 15px -3px rgba(0, 33, 71, 0.2);
    }

    @media (max-width: 900px) {
        .nav-links { display: none; }
        .nav-container { padding: 1.25rem 5%; }
    }
</style>
