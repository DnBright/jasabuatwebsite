<!-- PORTFOLIO / KATEGORI SECTION -->
<section id="kategori" class="categories-section">
    <div class="category-bg-pattern"></div>
    <div class="section-container">
        <div class="section-heading">
            <div class="badge-mini">Portfolio Unggulan</div>
            <h2 class="section-title">Karya Terbaik untuk <span>Bisnis Anda</span></h2>
            <p class="section-subtitle">Lihat bagaimana kami mentransformasi bisnis F&B menjadi lebih profesional dan modern dengan website kelas dunia.</p>
        </div>

        <div class="swiper kategori-swiper portfolio-showcase">
            <div class="swiper-wrapper">
                <!-- F&B -->
                <div class="swiper-slide">
                    <div class="umkm-card glass-premium">
                        <div class="umkm-img-wrap">
                            <img src="{{ asset('images/FNB.png') }}" alt="Website Restoran & Cafe" />
                        </div>
                        <div class="umkm-content">
                            <span class="umkm-tag">Kuliner / F&B</span>
                            <h3>Website Restoran & Cafe</h3>
                            <p>Tampilkan menu digital Anda dan terima pesanan langsung via WhatsApp. Sangat cocok untuk cafe, warung makan, dan katering.</p>
                            <a href="#kontak" class="btn-outline umkm-btn">Konsultasi Sekarang</a>
                        </div>
                    </div>
                </div>

                <!-- Kecantikan -->
                <div class="swiper-slide">
                    <div class="umkm-card glass-premium">
                        <div class="umkm-img-wrap">
                            <img src="{{ asset('images/kecantikan.png') }}" alt="Website Klinik Kecantikan" />
                        </div>
                        <div class="umkm-content">
                            <span class="umkm-tag">Klinik / Salon</span>
                            <h3>Website Kecantikan</h3>
                            <p>Jadikan klinik atau salon Anda lebih profesional. Pelanggan bisa melihat layanan dan melakukan reservasi dengan mudah.</p>
                            <a href="#kontak" class="btn-outline umkm-btn">Konsultasi Sekarang</a>
                        </div>
                    </div>
                </div>

                <!-- Pet Shop -->
                <div class="swiper-slide">
                    <div class="umkm-card glass-premium">
                        <div class="umkm-img-wrap">
                            <img src="{{ asset('images/petshop.png') }}" alt="Website Pet Shop" />
                        </div>
                        <div class="umkm-content">
                            <span class="umkm-tag">Pet Shop & Care</span>
                            <h3>Website Pet Shop</h3>
                            <p>Tampilkan katalog produk, layanan grooming, dan informasi klinik hewan peliharaan untuk menjangkau lebih banyak pelanggan.</p>
                            <a href="#kontak" class="btn-outline umkm-btn">Konsultasi Sekarang</a>
                        </div>
                    </div>
                </div>

                <!-- Fotografi -->
                <div class="swiper-slide">
                    <div class="umkm-card glass-premium">
                        <div class="umkm-img-wrap">
                            <img src="{{ asset('images/potografi_.png') }}" alt="Website Fotografi" />
                        </div>
                        <div class="umkm-content">
                            <span class="umkm-tag">Jasa / Profesional</span>
                            <h3>Website Portofolio</h3>
                            <p>Tunjukkan hasil karya terbaik dan paket harga Anda. Permudah calon klien untuk melihat portofolio dan menyewa jasa Anda.</p>
                            <a href="#kontak" class="btn-outline umkm-btn">Konsultasi Sekarang</a>
                        </div>
                    </div>
                </div>

                <!-- Retail -->
                <div class="swiper-slide">
                    <div class="umkm-card glass-premium">
                        <div class="umkm-img-wrap">
                            <img src="{{ asset('images/retail atau marketplace.png') }}" alt="Website Toko Online" />
                        </div>
                        <div class="umkm-content">
                            <span class="umkm-tag">Retail / Olshop</span>
                            <h3>Website Toko Online</h3>
                            <p>Punya produk fisik? Kami buatkan toko online agar Anda bisa berjualan 24 jam dengan tampilan katalog yang rapi dan menarik.</p>
                            <a href="#kontak" class="btn-outline umkm-btn">Konsultasi Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Swiper Navigation & Pagination -->
            <div class="swiper-nav-wrapper">
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </div>
</section>

<style>
    .categories-section {
        padding: 8rem 0;
        text-align: center;
        background-color: #fcfdfe;
        position: relative;
        overflow: hidden;
    }

    .category-bg-pattern {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 100%;
        background-image: radial-gradient(#e2e8f0 1px, transparent 1px);
        background-size: 30px 30px;
        opacity: 0.3;
        pointer-events: none;
    }

    .section-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 7%;
        position: relative;
        z-index: 1;
    }

    .badge-mini {
        display: inline-block;
        padding: 0.5rem 1.25rem;
        background: #f1f5f9;
        color: #002147;
        border-radius: 50px;
        font-size: 0.8rem;
        font-weight: 800;
        margin-bottom: 1.5rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        border: 1px solid #e2e8f0;
    }

    .section-title {
        font-size: 3rem;
        color: #0f172a;
        margin-bottom: 1.5rem;
        font-weight: 800;
        letter-spacing: -2px;
    }

    .section-title span {
        background: linear-gradient(90deg, #002147, #3b82f6);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .section-subtitle {
        color: #64748b;
        font-size: 1.2rem;
        margin-bottom: 5rem;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
        line-height: 1.6;
    }

    .portfolio-showcase {
        margin-top: 2rem;
        padding-bottom: 4rem;
        position: relative;
    }

    .kategori-swiper .swiper-slide {
        height: auto;
    }
    
    .kategori-swiper .swiper-wrapper {
        align-items: stretch;
    }

    .umkm-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 24px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        height: 100%;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .umkm-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px -10px rgba(0, 33, 71, 0.1);
    }

    .umkm-img-wrap {
        width: 100%;
        aspect-ratio: 16/10;
        overflow: hidden;
        border-bottom: 1px solid #f1f5f9;
    }

    .umkm-img-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .umkm-card:hover .umkm-img-wrap img {
        transform: scale(1.05);
    }

    .umkm-content {
        padding: 2rem;
        text-align: left;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .umkm-tag {
        display: inline-block;
        padding: 0.4rem 1rem;
        background: #f1f5f9;
        color: #3b82f6;
        border-radius: 50px;
        font-size: 0.8rem;
        font-weight: 700;
        margin-bottom: 1rem;
        text-transform: uppercase;
        align-self: flex-start;
    }

    .umkm-content h3 {
        color: #0f172a;
        font-size: 1.4rem;
        font-weight: 800;
        margin-bottom: 0.75rem;
        line-height: 1.3;
    }

    .umkm-content p {
        color: #64748b;
        font-size: 1rem;
        line-height: 1.6;
        margin-bottom: 1.5rem;
        flex-grow: 1;
    }
    
    .umkm-btn {
        width: 100%;
        text-align: center;
        padding: 0.7rem 1rem;
        font-size: 0.95rem;
        border-radius: 10px;
    }

    .swiper-nav-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 1.5rem;
        margin-top: 2.5rem;
    }

    .swiper-button-prev, .swiper-button-next {
        position: static !important;
        margin: 0 !important;
        width: 45px !important;
        height: 45px !important;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 50%;
        color: #002147 !important;
        box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .swiper-button-prev::after, .swiper-button-next::after {
        font-size: 1rem !important;
        font-weight: bold;
    }

    .swiper-pagination {
        position: static !important;
        width: auto !important;
    }

    .swiper-pagination-bullet-active {
        background: #3b82f6 !important;
    }

    @media (max-width: 768px) {
        .categories-section { padding: 4rem 0; }
        .section-title { font-size: 2.25rem; }
        .section-subtitle { font-size: 1rem; margin-bottom: 3rem; padding: 0 5%; }
        .portfolio-showcase { padding-bottom: 2rem; }
        .umkm-content { padding: 1.5rem; }
        .umkm-content h3 { font-size: 1.25rem; }
        .umkm-content p { font-size: 0.95rem; margin-bottom: 1.2rem; }
        .swiper-button-prev, .swiper-button-next { display: none !important; }
        .swiper-nav-wrapper { margin-top: 1.5rem; }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (typeof Swiper !== 'undefined') {
            new Swiper('.kategori-swiper', {
                slidesPerView: 1.1,
                spaceBetween: 16,
                loop: false,
                grabCursor: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                    dynamicBullets: true,
                },
                breakpoints: {
                    640: {
                        slidesPerView: 1.5,
                        spaceBetween: 20,
                    },
                    768: {
                        slidesPerView: 2.2,
                        spaceBetween: 24,
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 30,
                    }
                }
            });
        }
    });
</script>