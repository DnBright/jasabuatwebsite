<!-- HERO SECTION - ASTRA CORPORATE STYLE -->
<header id="beranda" class="hero-section">
    <div class="hero-bg">
        <picture>
            <source srcset="{{ asset('images/hero/astra_hero.png') }}" type="image/png">
            <img src="{{ asset('images/hero/astra_hero.png') }}" alt="Website Premium UMKM" class="hero-img-parallax">
        </picture>
        <div class="hero-overlay"></div>
    </div>

    <div class="hero-container relative z-10">
        <div class="hero-content text-center mx-auto" data-aos="fade-up" data-aos-duration="1000">
            <div class="badge mx-auto mb-6" data-aos="zoom-in" data-aos-delay="200">Transformasi Digital Bisnis Anda</div>
            <h1 class="hero-title" data-aos="fade-up" data-aos-delay="400">
                {!! $hero->title ?? 'Bikin Website Profesional,' !!} <br>
                <span class="text-blue-400">{{ $hero->title_highlight ?? 'Tingkatkan Penjualan' }}</span>
            </h1>
            <p class="hero-subtitle mx-auto" data-aos="fade-up" data-aos-delay="600">
                {!! $hero->description ?? 'Tingkatkan kredibilitas dan orderan bisnis Anda dengan website profesional siap pakai. Terima beres, dari nol sampai online dengan cepat dan aman.' !!}
            </p>
            
            <div class="hero-features justify-center" data-aos="fade-up" data-aos-delay="800">
                <div class="feature-item">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                    Pengerjaan Cepat
                </div>
                <div class="feature-item">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                    Desain Eksklusif
                </div>
                <div class="feature-item">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                    Support Penuh
                </div>
            </div>

            <div class="hero-actions justify-center" data-aos="fade-up" data-aos-delay="1000">
                <a href="#paket" class="btn-primary">
                    <div class="btn-content">
                        <span>Lihat Paket Harga</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </div>
                </a>
                <a href="#kategori" class="btn-secondary">
                    <span>Lihat Portfolio</span>
                </a>
            </div>
        </div>
    </div>
</header>

<style>
    .hero-section {
        position: relative;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 8rem 5% 5rem;
        overflow: hidden;
    }

    .hero-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
    }

    .hero-img-parallax {
        width: 100%;
        height: 120%;
        object-fit: cover;
        position: absolute;
        top: 0;
        left: 0;
        /* Parallax effect managed by simpleParallax JS or CSS */
    }

    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(180deg, rgba(0, 33, 71, 0.8) 0%, rgba(12, 52, 97, 0.85) 100%);
        z-index: 2;
    }

    .hero-container {
        width: 100%;
        max-width: 1200px;
    }

    .hero-content {
        max-width: 900px;
    }

    .badge {
        display: inline-block;
        padding: 0.5rem 1.5rem;
        background: rgba(255, 255, 255, 0.1);
        color: white;
        border-radius: 50px;
        font-size: 0.85rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 2px;
        backdrop-filter: blur(5px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .hero-title {
        font-size: 4rem;
        font-weight: 800;
        color: white;
        line-height: 1.1;
        margin-bottom: 1.5rem;
        letter-spacing: -2px;
    }

    .hero-subtitle {
        font-size: 1.25rem;
        color: #cbd5e1;
        margin-bottom: 3rem;
        line-height: 1.6;
        max-width: 700px;
    }

    .hero-features {
        display: flex;
        flex-wrap: wrap;
        gap: 1.5rem;
        margin-bottom: 3.5rem;
    }

    .feature-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: white;
        font-weight: 600;
        font-size: 1rem;
        background: rgba(255, 255, 255, 0.1);
        padding: 0.75rem 1.5rem;
        border-radius: 50px;
        backdrop-filter: blur(5px);
    }

    .feature-item svg {
        width: 20px;
        height: 20px;
        color: #60a5fa;
    }

    .hero-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 1.5rem;
    }

    .btn-primary {
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        color: white;
        padding: 1.25rem 2.5rem;
        border-radius: 20px;
        font-weight: 800;
        font-size: 1.1rem;
        text-decoration: none;
        box-shadow: 0 10px 30px rgba(59, 130, 246, 0.4);
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 40px rgba(59, 130, 246, 0.5);
    }

    .btn-secondary {
        background: transparent;
        color: white;
        padding: 1.25rem 2.5rem;
        border-radius: 20px;
        font-weight: 800;
        font-size: 1.1rem;
        text-decoration: none;
        border: 2px solid rgba(255, 255, 255, 0.3);
        transition: all 0.3s ease;
    }

    .btn-secondary:hover {
        background: rgba(255, 255, 255, 0.1);
        border-color: white;
    }

    .btn-content {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .btn-content svg {
        width: 20px;
        height: 20px;
    }

    @media (max-width: 1024px) {
        .hero-title { font-size: 3.5rem; }
    }

    @media (max-width: 768px) {
        .hero-title { font-size: 2.5rem; }
        .hero-subtitle { font-size: 1.1rem; }
        .hero-features { flex-direction: column; align-items: center; gap: 1rem; }
        .hero-actions { flex-direction: column; width: 100%; }
        .btn-primary, .btn-secondary { width: 100%; justify-content: center; display: flex; }
    }
</style>
