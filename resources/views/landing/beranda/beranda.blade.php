<!-- HERO SECTION - PREMIUM CAROUSEL -->
<header id="beranda" class="hero-section">
    <div class="swiper hero-swiper">
        <div class="swiper-wrapper">
            <!-- Slide 1: Primary Message -->
            <div class="swiper-slide">
                <div class="hero-container">
                    <div class="hero-content">
                        <div class="badge">🔥 Penawaran Terbatas</div>
                        <h1 class="hero-title">Website Mewah, <br><span>Mulai 500rb-an</span></h1>
                        <div class="hero-article">
                            <p><strong>Khusus buat UMKM:</strong> Tingkatkan orderan WA Anda dengan website profesional siap pakai. Sekali bayar, langsung online, hasil pasti memuaskan!</p>
                        </div>
                        <div class="hero-actions">
                            <a href="{{ $hero->button_link ?? '#' }}" class="btn-primary-custom" target="_blank">{{ $hero->button_text ?? 'Pesan Sekarang' }}</a>
                            <a href="{{ $hero->secondary_button_link ?? '#template' }}" class="btn-outline-custom">{{ $hero->secondary_button_text ?? 'Lihat Desain' }}</a>
                        </div>
                    </div>
                    <div class="hero-visual">
                        <div class="image-wrapper">
                            <img src="{{ asset('images/hero/entrepreneur.png') }}" alt="Sukses UMKM" class="hero-img-premium" />
                            <div class="image-overlay-text">Jasa Pembuatan Website <br>Termurah Di Yogyakarta</div>
                            <div class="floating-card trust-card">
                                <div class="icon">✨</div>
                                <div>
                                    <div class="label">Pasti Online</div>
                                    <div class="sub">Hasil Memuaskan</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2: Trust & Partnership -->
            <div class="swiper-slide">
                <div class="hero-container">
                    <div class="hero-content">
                        <div class="badge">Partner Terpercaya</div>
                        <h1 class="hero-title">Solusi Hemat <br><span>Hanya 500rb-an</span></h1>
                        <div class="hero-article">
                            <p>Kami mengerti kebutuhan UMKM. Dapatkan website yang tidak hanya cantik, tapi juga fungsional untuk mendatangkan pelanggan baru setiap hari.</p>
                        </div>
                        <div class="hero-actions">
                            <a href="{{ $hero->button_link ?? '#' }}" class="btn-primary-custom" target="_blank">Konsultasi Gratis</a>
                            <a href="#kategori" class="btn-outline-custom">Pilihan Kategori</a>
                        </div>
                    </div>
                    <div class="hero-visual">
                        <div class="image-wrapper">
                            <img src="{{ asset('images/hero/collaboration.png') }}" alt="Kolaborasi Profesional" class="hero-img-premium" />
                            <div class="image-overlay-text">Jasa Pembuatan Website <br>Termurah Di Yogyakarta</div>
                            <div class="floating-card support-card">
                                <div class="icon">🤝</div>
                                <div>
                                    <div class="label">Bantuan 24/7</div>
                                    <div class="sub">Siap Melayani</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 3: Quality & Professionalism -->
            <div class="swiper-slide">
                <div class="hero-container">
                    <div class="hero-content">
                        <div class="badge">Kualitas Premium</div>
                        <h1 class="hero-title">Go Digital Hari Ini <br><span>Cuma 500rb-an</span></h1>
                        <div class="hero-article">
                            <p>Website responsif yang memukau di HP, Tablet, dan Laptop. Bangun kredibilitas bisnis Anda dengan tampilan kelas dunia.</p>
                        </div>
                        <div class="hero-actions">
                            <a href="{{ $hero->button_link ?? '#' }}" class="btn-primary-custom" target="_blank">Mulai Sekarang</a>
                            <a href="#template" class="btn-outline-custom">Lihat Koleksi</a>
                        </div>
                    </div>
                    <div class="hero-visual">
                        <div class="image-wrapper">
                            <img src="{{ asset('images/hero/showcase.png') }}" alt="Website Premium" class="hero-img-premium" />
                            <div class="image-overlay-text">Jasa Pembuatan Website <br>Termurah Di Yogyakarta</div>
                            <div class="floating-card device-card">
                                <div class="icon">📱</div>
                                <div>
                                    <div class="label">100% Responsif</div>
                                    <div class="sub">Akses dari Mana Saja</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Swiper Extras -->
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</header>

<style>
    .hero-section {
        position: relative;
        overflow: hidden;
        background: #ffffff;
        padding-top: 2rem;
    }

    .hero-swiper {
        width: 100%;
        padding-bottom: 4rem;
    }

    .hero-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        max-width: 1200px;
        margin: 0 auto;
        gap: 4rem;
        padding: 4rem 7%;
        min-height: 500px;
    }

    .hero-content {
        flex: 1;
        text-align: left;
        animation: fadeInUp 0.8s ease-out;
    }

    .badge {
        display: inline-block;
        padding: 0.5rem 1rem;
        background: rgba(59, 130, 246, 0.1);
        color: #3b82f6;
        border-radius: 50px;
        font-size: 0.85rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .hero-title {
        font-size: 3.5rem;
        color: #0f172a;
        line-height: 1.1;
        margin-bottom: 1.5rem;
        font-weight: 800;
        letter-spacing: -2px;
    }

    .hero-title span {
        background: linear-gradient(90deg, #002147, #3b82f6);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .hero-article {
        margin-bottom: 2.5rem;
    }

    .hero-article p {
        font-size: 1.2rem;
        color: #64748b;
        line-height: 1.6;
        max-width: 600px;
    }

    .hero-article p strong {
        color: #002147;
    }

    .hero-actions {
        display: flex;
        gap: 1.25rem;
    }

    .btn-primary-custom {
        background: linear-gradient(135deg, #002147 0%, #0c3461 100%);
        color: #fff;
        text-decoration: none;
        padding: 1.1rem 2.2rem;
        border-radius: 14px;
        font-weight: 700;
        font-size: 1rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        display: inline-block;
        box-shadow: 0 10px 25px -5px rgba(0, 33, 71, 0.3);
    }

    .btn-primary-custom:hover {
        transform: translateY(-3px);
        box-shadow: 0 20px 35px -10px rgba(0, 33, 71, 0.4);
    }

    .btn-outline-custom {
        background-color: white;
        color: #002147;
        text-decoration: none;
        border: 2px solid #f1f5f9;
        padding: 1.1rem 2.2rem;
        border-radius: 14px;
        font-weight: 700;
        font-size: 1rem;
        transition: all 0.3s ease;
        display: inline-block;
    }

    .btn-outline-custom:hover {
        background-color: #f8fafc;
        border-color: #002147;
    }

    .hero-visual {
        flex: 1;
        display: flex;
        justify-content: flex-end;
        position: relative;
    }

    .image-wrapper {
        position: relative;
        width: 100%;
        max-width: 500px;
    }

    .image-overlay-text {
        position: absolute;
        top: 20px;
        right: 20px;
        background: rgba(0, 33, 71, 0.85);
        color: white;
        padding: 0.75rem 1.25rem;
        border-radius: 15px;
        font-size: 0.9rem;
        font-weight: 700;
        z-index: 5;
        backdrop-filter: blur(5px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        text-align: right;
        line-height: 1.3;
        animation: fadeInRight 1s ease-out;
    }

    .hero-img-premium {
        width: 100%;
        height: auto;
        aspect-ratio: 4/5;
        object-fit: cover;
        border-radius: 30px;
        box-shadow: 0 30px 60px -12px rgba(0,0,0,0.15);
        border: 8px solid #fff;
        transform: rotate(2deg);
        transition: transform 0.5s ease;
    }

    .swiper-slide-active .hero-img-premium {
        transform: rotate(0deg);
    }

    .floating-card {
        position: absolute;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        padding: 1rem 1.5rem;
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        display: flex;
        align-items: center;
        gap: 1rem;
        z-index: 10;
        border: 1px solid rgba(255,255,255,0.2);
        animation: floating 3s ease-in-out infinite;
    }

    .trust-card { bottom: 30px; left: -40px; }
    .support-card { top: 40px; left: -30px; }
    .device-card { bottom: 50px; left: -20px; }

    .floating-card .icon {
        width: 45px;
        height: 45px;
        background: #f8fafc;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }

    .floating-card .label {
        font-weight: 800;
        color: #0f172a;
        font-size: 0.95rem;
    }

    .floating-card .sub {
        font-size: 0.75rem;
        color: #64748b;
        font-weight: 600;
    }

    /* Swiper Navigation Customization */
    .swiper-button-next, .swiper-button-prev {
        color: #002147;
        background: white;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .swiper-button-next:after, .swiper-button-prev:after {
        font-size: 1.2rem;
        font-weight: bold;
    }

    .swiper-pagination-bullet-active {
        background: #002147;
    }

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeInRight {
        from { opacity: 0; transform: translateX(30px); }
        to { opacity: 1; transform: translateX(0); }
    }

    @keyframes floating {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }

    /* RESPONSIVE */
    @media (max-width: 1024px) {
        .hero-container { gap: 2rem; padding: 3rem 5%; }
        .hero-title { font-size: 2.8rem; }
    }

    @media (max-width: 768px) {
        .hero-container { flex-direction: column; text-align: center; gap: 3rem; padding: 2rem 7%; }
        .hero-content { text-align: center; order: 2; }
        .hero-visual { order: 1; justify-content: center; width: 100%; }
        .hero-title { font-size: 2.5rem; }
        .hero-actions { justify-content: center; flex-direction: column; }
        .hero-article p { margin: 0 auto; }
        .trust-card, .support-card, .device-card { left: 50%; transform: translateX(-50%); bottom: -20px; }
        .hero-img-premium { transform: rotate(0); width: 80%; }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const swiper = new Swiper('.hero-swiper', {
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },
        });
    });
</script>
