<!-- PORTFOLIO / KATEGORI SECTION -->
<section id="kategori" class="categories-section">
    <div class="section-container">
        <div class="section-heading">
            <div class="badge-mini">Portfolio Unggulan</div>
            <h2 class="section-title">Karya Terbaik untuk <span>Bisnis Anda</span></h2>
            <p class="section-subtitle">Lihat bagaimana kami mentransformasi berbagai jenis bisnis UMKM menjadi lebih profesional, terpercaya, dan siap bersaing di era digital dengan website kelas dunia.</p>
        </div>

        <div class="swiper kategori-swiper portfolio-showcase">
            <div class="swiper-wrapper">
                <!-- F&B -->
                <div class="swiper-slide">
                    <a href="#kontak" class="umkm-card">
                        <div class="umkm-img-wrap">
                            <picture>
                                <source srcset="{{ asset('images/FNB.webp') }}" type="image/webp">
                                <img src="{{ asset('images/FNB.png') }}" alt="Website Restoran" loading="lazy" decoding="async" width="800" height="571" />
                            </picture>
                        </div>
                        <div class="umkm-content">
                            <span class="umkm-tag">Kuliner / F&B</span>
                            <h3>Website Restoran</h3>
                            <p>Terima pesanan via WhatsApp. Cocok untuk cafe dan katering.</p>
                            <span class="umkm-action">Pilih Paket Ini <span aria-hidden="true">&rarr;</span></span>
                        </div>
                    </a>
                </div>

                <!-- Kecantikan -->
                <div class="swiper-slide">
                    <a href="#kontak" class="umkm-card">
                        <div class="umkm-img-wrap">
                            <picture>
                                <source srcset="{{ asset('images/kecantikan.webp') }}" type="image/webp">
                                <img src="{{ asset('images/kecantikan.png') }}" alt="Website Klinik Kecantikan" loading="lazy" decoding="async" width="800" height="571" />
                            </picture>
                        </div>
                        <div class="umkm-content">
                            <span class="umkm-tag">Klinik / Salon</span>
                            <h3>Website Kecantikan</h3>
                            <p>Tampilkan layanan dan mudahkan pelanggan melakukan reservasi jadwal.</p>
                            <span class="umkm-action">Pilih Paket Ini <span aria-hidden="true">&rarr;</span></span>
                        </div>
                    </a>
                </div>

                <!-- Pet Shop -->
                <div class="swiper-slide">
                    <a href="#kontak" class="umkm-card">
                        <div class="umkm-img-wrap">
                            <picture>
                                <source srcset="{{ asset('images/petshop.webp') }}" type="image/webp">
                                <img src="{{ asset('images/petshop.png') }}" alt="Website Pet Shop" loading="lazy" decoding="async" width="800" height="571" />
                            </picture>
                        </div>
                        <div class="umkm-content">
                            <span class="umkm-tag">Pet Shop & Care</span>
                            <h3>Website Pet Shop</h3>
                            <p>Katalog produk terpusat, layanan grooming, dan info klinik hewan.</p>
                            <span class="umkm-action">Pilih Paket Ini <span aria-hidden="true">&rarr;</span></span>
                        </div>
                    </a>
                </div>

                <!-- Fotografi -->
                <div class="swiper-slide">
                    <a href="#kontak" class="umkm-card">
                        <div class="umkm-img-wrap">
                            <picture>
                                <source srcset="{{ asset('images/potografi_.webp') }}" type="image/webp">
                                <img src="{{ asset('images/potografi_.png') }}" alt="Website Fotografi" loading="lazy" decoding="async" width="800" height="571" />
                            </picture>
                        </div>
                        <div class="umkm-content">
                            <span class="umkm-tag">Jasa / Profesional</span>
                            <h3>Web Portofolio</h3>
                            <p>Tunjukkan portofolio karya terbaik dan kemudahan booking jasa Anda.</p>
                            <span class="umkm-action">Pilih Paket Ini <span aria-hidden="true">&rarr;</span></span>
                        </div>
                    </a>
                </div>

                <!-- Retail -->
                <div class="swiper-slide">
                    <a href="#kontak" class="umkm-card">
                        <div class="umkm-img-wrap">
                            <picture>
                                <source srcset="{{ asset('images/retail atau marketplace.webp') }}" type="image/webp">
                                <img src="{{ asset('images/retail atau marketplace.png') }}" alt="Website Toko Online" loading="lazy" decoding="async" width="800" height="571" />
                            </picture>
                        </div>
                        <div class="umkm-content">
                            <span class="umkm-tag">Retail / Olshop</span>
                            <h3>Toko Online</h3>
                            <p>Jangkau lebih jauh dengan toko online 24 jam dan katalog produk.</p>
                            <span class="umkm-action">Pilih Paket Ini <span aria-hidden="true">&rarr;</span></span>
                        </div>
                    </a>
                </div>
            </div>
            
            <!-- Swiper Navigation & Pagination -->
            <div class="swiper-controls-container">
                <p class="swipe-hint">Geser untuk melihat kategori lain</p>
                <div class="swiper-nav-wrapper">
                    <div class="swiper-button-prev" aria-label="Slide sebelumnya"></div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-next" aria-label="Slide berikutnya"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .categories-section {
        padding: 6rem 0;
        text-align: center;
        background: radial-gradient(circle at top right, rgba(59, 130, 246, 0.03), transparent 45%), 
                    radial-gradient(circle at bottom left, rgba(0, 33, 71, 0.03), transparent 45%), 
                    #f8fafc;
        position: relative;
    }

    .section-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 7%;
        position: relative;
        z-index: 1;
    }

    .badge-mini {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1.25rem;
        background: rgba(59, 130, 246, 0.06);
        color: #3b82f6;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 800;
        margin-bottom: 1.5rem;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        border: 1px solid rgba(59, 130, 246, 0.12);
    }

    .section-title {
        font-size: 3rem;
        color: #0f172a;
        margin-bottom: 1.5rem;
        font-weight: 800;
        letter-spacing: -1.5px;
        line-height: 1.2;
    }

    .section-title span {
        background: linear-gradient(90deg, #002147, #3b82f6);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .section-subtitle {
        color: #64748b;
        font-size: 1.15rem;
        margin-bottom: 4rem;
        max-width: 750px;
        margin-left: auto;
        margin-right: auto;
        line-height: 1.6;
    }

    .portfolio-showcase {
        margin-top: 2rem;
        padding-bottom: 4.5rem;
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
        border: 1px solid rgba(226, 232, 240, 0.8);
        border-radius: 24px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        height: 100%;
        text-decoration: none;
        box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.04), 0 1px 3px rgba(0, 0, 0, 0.02);
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .umkm-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 40px -15px rgba(0, 33, 71, 0.08), 0 1px 3px rgba(0, 0, 0, 0.01);
        border-color: rgba(59, 130, 246, 0.2);
    }

    .umkm-img-wrap {
        width: 100%;
        aspect-ratio: 4/3;
        overflow: hidden;
        border-bottom: 1px solid #f1f5f9;
        background-color: #f8fafc;
        position: relative;
    }

    .umkm-img-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
    }
    
    .umkm-card:hover .umkm-img-wrap img {
        transform: scale(1.05);
    }

    .umkm-content {
        padding: 1.75rem;
        text-align: left;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .umkm-tag {
        display: inline-block;
        align-self: flex-start;
        color: #3b82f6;
        background: rgba(59, 130, 246, 0.08);
        padding: 0.3rem 0.8rem;
        border-radius: 30px;
        font-size: 0.7rem;
        font-weight: 700;
        margin-bottom: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .umkm-content h3 {
        color: #0f172a;
        font-size: 1.35rem;
        font-weight: 800;
        margin-bottom: 0.5rem;
        line-height: 1.3;
    }

    .umkm-content p {
        color: #64748b;
        font-size: 0.95rem;
        line-height: 1.5;
        margin-bottom: 1.75rem;
        flex-grow: 1;
    }
    
    .umkm-action {
        margin-top: auto;
        color: #002147;
        font-size: 0.9rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0.75rem 1.25rem;
        border-radius: 14px;
        background: #f8fafc;
        border: 1px solid #f1f5f9;
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .umkm-card:hover .umkm-action {
        color: #ffffff;
        background: linear-gradient(135deg, #002147, #3b82f6);
        border-color: transparent;
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.25);
    }

    .umkm-action span {
        transition: transform 0.3s ease;
    }

    .umkm-card:hover .umkm-action span {
        transform: translateX(4px);
    }

    .swiper-controls-container {
        margin-top: 3rem;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .swipe-hint {
        color: #64748b;
        font-size: 0.85rem;
        font-weight: 600;
        margin-bottom: 1.25rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        letter-spacing: 0.5px;
    }

    .swipe-hint::before, .swipe-hint::after {
        content: '';
        display: block;
        width: 30px;
        height: 1px;
        background-color: #cbd5e1;
    }

    .swiper-nav-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 1.5rem;
    }

    .swiper-button-prev, .swiper-button-next {
        position: static !important;
        margin: 0 !important;
        width: 48px !important;
        height: 48px !important;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 50%;
        color: #002147 !important;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.03);
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }
    
    .swiper-button-prev:hover, .swiper-button-next:hover {
        background: #002147;
        color: #ffffff !important;
        border-color: #002147;
        box-shadow: 0 6px 15px rgba(0, 33, 71, 0.15);
        transform: translateY(-1px);
    }

    .swiper-button-prev::after, .swiper-button-next::after {
        font-size: 1rem !important;
        font-weight: bold;
    }

    .swiper-pagination {
        position: static !important;
        width: auto !important;
        margin: 0 !important;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .swiper-pagination-bullet {
        width: 8px !important;
        height: 8px !important;
        background: #cbd5e1 !important;
        opacity: 1 !important;
        transition: all 0.3s ease !important;
        border-radius: 4px !important;
    }

    .swiper-pagination-bullet-active {
        width: 24px !important;
        background: #3b82f6 !important;
    }

    @@media (max-width: 768px) {
        .categories-section { padding: 4rem 0; }
        .section-container { padding: 0 5%; }
        .badge-mini { margin-bottom: 1rem; font-size: 0.7rem; padding: 0.4rem 1rem; }
        .section-title { font-size: 1.85rem; margin-bottom: 1rem; letter-spacing: -1px; }
        .section-subtitle { font-size: 0.95rem; margin-bottom: 2.5rem; padding: 0; line-height: 1.5; }
        .portfolio-showcase { padding-bottom: 1.5rem; margin-top: 1rem; }
        
        .umkm-card { border-radius: 20px; box-shadow: 0 6px 20px rgba(0, 0, 0, 0.05); }
        .umkm-img-wrap { aspect-ratio: 16/10; }
        .umkm-content { padding: 1.25rem; }
        .umkm-tag { font-size: 0.65rem; margin-bottom: 0.5rem; padding: 0.25rem 0.7rem; }
        .umkm-content h3 { font-size: 1.15rem; margin-bottom: 0.4rem; }
        .umkm-content p { font-size: 0.85rem; margin-bottom: 1.25rem; line-height: 1.45; }
        .umkm-action { font-size: 0.85rem; padding: 0.65rem 1rem; border-radius: 12px; }
        
        .swiper-button-prev, .swiper-button-next { 
            display: none !important;
        }
        .swiper-controls-container { margin-top: 1.5rem; }
        .swipe-hint { font-size: 0.8rem; margin-bottom: 0.75rem; }
        .swiper-nav-wrapper { gap: 0; }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (typeof Swiper !== 'undefined') {
            new Swiper('.kategori-swiper', {
                slidesPerView: 1.15,
                spaceBetween: 12,
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