<!-- HERO SECTION - PREMIUM CREATIVE AGENCY STYLE -->
<header id="beranda" class="hero-section">
    <div class="hero-bg">
        @if(isset($hero) && $hero->image && !str_contains($hero->image, 'section1') && !str_contains($hero->image, 'bg_landscape') && !str_contains($hero->image, 'bg_portrait'))
            @php
                $imgUrl = Str::startsWith($hero->image, 'http') ? $hero->image : asset($hero->image);
            @endphp
            <img src="{{ $imgUrl }}" alt="Website Premium UMKM" class="hero-img-parallax">
        @else
            <picture>
                <!-- Portrait (Mobile) -->
                <source media="(max-aspect-ratio: 13/10)" srcset="{{ asset('images/hero/bg_portrait.webp') }}" type="image/webp">
                <source media="(max-aspect-ratio: 13/10)" srcset="{{ asset('images/hero/BG Potrait .png') }}" type="image/png">
                <!-- Landscape (Desktop) -->
                <source srcset="{{ asset('images/hero/bg_landscape.webp') }}" type="image/webp">
                <img src="{{ asset('images/hero/BG Landscape.png') }}" alt="Website Premium UMKM" class="hero-img-parallax">
            </picture>
        @endif
        <div class="hero-overlay"></div>
    </div>

    <div class="hero-container relative z-10">
        <div class="hero-content" data-aos="fade-up" data-aos-duration="1000">
            <div class="badge" data-aos="zoom-in" data-aos-delay="200">Transformasi Digital Bisnis Anda</div>
            
            <h1 class="hero-title" data-aos="fade-up" data-aos-delay="400">
                <span class="hero-title-pre">{{ $hero->title ?? 'Jasa Desain Website' }}</span>
                <span class="hero-title-highlight">{{ $hero->title_highlight ?? 'Murah & Mewah' }}</span>
            </h1>
            
            <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="600">
                {!! $hero->description ?? 'Khusus buat UMKM: Tingkatkan orderan WA Anda dengan website profesional siap pakai. Sekali bayar, langsung online, hasil pasti memuaskan!' !!}
            </p>
            
            <div class="hero-features" data-aos="fade-up" data-aos-delay="800">
                <div class="feature-item">
                    <span class="feature-number">01</span>
                    <span class="feature-text">Pengerjaan Cepat</span>
                </div>
                <div class="feature-item">
                    <span class="feature-number">02</span>
                    <span class="feature-text">Desain Eksklusif</span>
                </div>
                <div class="feature-item">
                    <span class="feature-number">03</span>
                    <span class="feature-text">Support Penuh</span>
                </div>
            </div>

            <div class="hero-actions" data-aos="fade-up" data-aos-delay="950">
                <a href="{{ $hero->button_link ?? '#template' }}" class="btn-primary-custom">
                    <span>{{ $hero->button_text ?? 'Pesan Sekarang' }}</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="arrow-svg"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </a>
                <a href="{{ $hero->secondary_button_link ?? 'https://wa.me/62' . ($setting['whatsapp_number'] ?? '85190894806') . '?text=Halo%20DarkandBright,%20saya%20tertarik%20untuk%20berkonsultasi%20mengenai%20pembuatan%20website%20UMKM.' }}" class="btn-secondary-custom" target="_blank" rel="noopener">
                    <span>{{ $hero->secondary_button_text ?? 'Lihat Desain' }}</span>
                </a>
            </div>

            <!-- Starting Price Highlights -->
            <div class="hero-pricing-highlights" data-aos="fade-up" data-aos-delay="1050">
                <p class="highlights-title">Penawaran Paket Pembuatan Website (Bisa Dicicil):</p>
                <div class="hero-pricing-grid">
                    <a href="#paket" class="price-highlight-card">
                        <div class="highlight-badge-mini">Starter</div>
                        <div class="highlight-price">
                            <span class="price-val">Rp 2.5jt</span>
                        </div>
                        <span class="highlight-desc">Bisa dicicil 3x (Rp 833rb/bln)</span>
                    </a>
                    <a href="#paket" class="price-highlight-card best-value">
                        <div class="highlight-badge-mini popular">Business</div>
                        <div class="highlight-price">
                            <span class="price-val">Rp 3.0jt</span>
                        </div>
                        <span class="highlight-desc">Bisa dicicil 3x (Rp 1.0jt/bln)</span>
                    </a>
                    <a href="#paket" class="price-highlight-card">
                        <div class="highlight-badge-mini">Premium</div>
                        <div class="highlight-price">
                            <span class="price-val">Rp 4.0jt</span>
                        </div>
                        <span class="highlight-desc">Bisa dicicil 4x (Rp 1.0jt/bln)</span>
                    </a>
                </div>
                <div class="highlights-notice">
                    <span class="notice-icon">💡</span>
                    <p class="notice-text"><strong>*Info Cicilan:</strong> Pembayaran sangat fleksibel. Semua paket di atas dapat dicicil hingga <strong>3x atau 4x</strong> tanpa bunga tambahan.</p>
                </div>
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
        justify-content: flex-start;
        padding: 9rem 7% 5rem;
        overflow: hidden;
        background-color: var(--color-primary);
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
        height: 100%;
        object-fit: cover;
        position: absolute;
        top: 0;
        left: 0;
    }

    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, rgba(20, 18, 19, 0.98) 0%, rgba(20, 18, 19, 0.95) 40%, rgba(20, 18, 19, 0.65) 65%, rgba(20, 18, 19, 0) 100%);
        z-index: 2;
    }

    .hero-container {
        width: 100%;
        max-width: 1200px;
        position: relative;
    }

    .hero-content {
        max-width: 680px;
        text-align: left;
    }

    .badge {
        display: inline-flex;
        align-items: center;
        padding: 0.5rem 1.25rem;
        background: rgba(20, 18, 19, 0.6);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        color: #60a5fa;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 2px;
        border: 1px solid rgba(59, 130, 246, 0.35);
        margin-bottom: 2rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    .hero-title {
        font-size: 4.2rem;
        font-weight: 800;
        color: white;
        line-height: 1.05;
        margin-bottom: 1.5rem;
        letter-spacing: -2.5px;
        display: flex;
        flex-direction: column;
        gap: 0.25rem;
        text-shadow: 0 4px 15px rgba(20, 18, 19, 0.9);
    }

    .hero-title-pre {
        color: #ffffff;
    }

    .hero-title-highlight {
        background: linear-gradient(90deg, #3b82f6, #60a5fa);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .hero-subtitle {
        font-size: 1.15rem;
        color: #cbd5e1;
        margin-bottom: 2.5rem;
        line-height: 1.65;
        max-width: 580px;
        text-shadow: 0 2px 10px rgba(20, 18, 19, 0.9);
    }

    .hero-features {
        display: flex;
        gap: 2.5rem;
        margin-bottom: 3rem;
        border-top: 1px solid rgba(255, 255, 255, 0.08);
        padding-top: 2rem;
        max-width: 580px;
    }

    .feature-item {
        display: flex;
        flex-direction: column;
        gap: 0.25rem;
        text-align: left;
    }

    .feature-number {
        font-size: 0.8rem;
        font-weight: 800;
        color: #3b82f6;
        letter-spacing: 1px;
    }

    .feature-text {
        font-size: 0.95rem;
        font-weight: 600;
        color: #ffffff;
        text-shadow: 0 2px 8px rgba(20, 18, 19, 0.9);
    }

    .hero-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .btn-primary-custom {
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        background: #ffffff;
        color: #141213;
        padding: 0.95rem 2.25rem;
        border-radius: 12px;
        font-weight: 800;
        font-size: 0.95rem;
        text-decoration: none;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        border: 2px solid #ffffff;
    }

    .btn-primary-custom:hover {
        transform: translateY(-2px);
        background: transparent;
        color: #ffffff;
        border-color: #ffffff;
        box-shadow: none;
    }

    .btn-primary-custom:hover .arrow-svg {
        transform: translateX(4px);
    }

    .arrow-svg {
        width: 18px;
        height: 18px;
        transition: transform 0.3s ease;
    }

    .btn-secondary-custom {
        display: inline-flex;
        align-items: center;
        background: transparent;
        color: white;
        padding: 0.95rem 2.25rem;
        border-radius: 12px;
        font-weight: 800;
        font-size: 0.95rem;
        text-decoration: none;
        border: 2px solid rgba(255, 255, 255, 0.15);
        transition: all 0.3s ease;
    }

    .btn-secondary-custom:hover {
        background: rgba(255, 255, 255, 0.05);
        border-color: #ffffff;
        transform: translateY(-2px);
    }

    /* Starting Price Highlights */
    .hero-pricing-highlights {
        margin-top: 3.5rem;
        width: 100%;
        max-width: 580px;
    }

    .highlights-title {
        font-size: 0.75rem;
        color: #94a3b8;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        margin-bottom: 1.25rem;
    }

    .hero-pricing-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1rem;
    }

    .price-highlight-card {
        background: rgba(255, 255, 255, 0.03);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.05);
        border-radius: 16px;
        padding: 1.25rem 1rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.5rem;
        text-decoration: none;
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        text-align: center;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.15);
    }

    .price-highlight-card:hover {
        transform: translateY(-4px);
        background: rgba(255, 255, 255, 0.08);
        border-color: rgba(59, 130, 246, 0.3);
        box-shadow: 0 10px 25px -5px rgba(59, 130, 246, 0.15);
    }

    .price-highlight-card.best-value {
        background: rgba(59, 130, 246, 0.08);
        border-color: rgba(59, 130, 246, 0.2);
    }

    .price-highlight-card.best-value:hover {
        background: rgba(59, 130, 246, 0.12);
        border-color: rgba(59, 130, 246, 0.4);
    }

    .highlight-badge-mini {
        font-size: 0.7rem;
        font-weight: 800;
        text-transform: uppercase;
        color: #94a3b8;
        letter-spacing: 0.5px;
    }

    .highlight-badge-mini.popular {
        color: #60a5fa;
    }

    .highlight-price {
        display: flex;
        align-items: baseline;
        justify-content: center;
    }

    .price-val {
        font-size: 1.45rem;
        font-weight: 800;
        color: white;
        letter-spacing: -0.5px;
    }

    .highlight-desc {
        color: #94a3b8;
        font-size: 0.7rem;
        font-weight: 600;
    }

    .highlights-notice {
        display: flex;
        align-items: flex-start;
        gap: 0.5rem;
        margin-top: 1rem;
        background: rgba(59, 130, 246, 0.08);
        border: 1px solid rgba(59, 130, 246, 0.15);
        border-radius: 12px;
        padding: 0.75rem 1rem;
        max-width: 580px;
        text-align: left;
    }

    .notice-icon {
        font-size: 1rem;
        line-height: 1.4;
    }

    .notice-text {
        color: #cbd5e1;
        font-size: 0.8rem;
        line-height: 1.4;
        margin: 0;
    }

    .notice-text strong {
        color: #60a5fa;
        font-weight: 800;
    }

    /* Tablet Responsive */
    @media (max-width: 1024px) {
        .hero-title { font-size: 3.5rem; }
        .hero-title-highlight { font-size: 3.5rem; }
        .hero-pricing-highlights {
            max-width: 100%;
        }
    }

    /* Mobile Responsive (Flip to centered overlay for maximum readability) */
    @media (max-width: 900px) {
        .hero-section {
            justify-content: center;
            padding: 8rem 5% 5rem;
        }

        .hero-overlay {
            background: linear-gradient(180deg, rgba(20, 18, 19, 0.85) 0%, rgba(20, 18, 19, 0.98) 100%);
        }

        .hero-container {
            text-align: center;
        }

        .hero-content {
            max-width: 100%;
            text-align: center;
            margin: 0 auto;
        }

        .hero-title {
            font-size: 3rem;
            align-items: center;
        }

        .hero-title-highlight {
            font-size: 3rem;
        }

        .hero-subtitle {
            margin: 0 auto 2.5rem;
            text-align: center;
        }

        .hero-features {
            justify-content: center;
            margin: 0 auto 3rem;
        }

        .hero-actions {
            justify-content: center;
        }

        .hero-pricing-highlights {
            margin: 3.5rem auto 0;
            text-align: center;
            max-width: 500px;
        }

        .highlights-notice {
            margin: 1rem auto 0;
            max-width: 500px;
        }
    }

    @media (max-width: 480px) {
        .hero-title {
            font-size: 2.25rem;
        }
        .hero-title-highlight {
            font-size: 2.25rem;
        }
        .hero-features {
            flex-direction: column;
            gap: 1rem;
            align-items: center;
        }
        .hero-pricing-grid {
            grid-template-columns: 1fr;
            gap: 0.75rem;
        }
        .price-highlight-card {
            padding: 1rem;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
        }
        .highlight-price {
            margin-left: auto;
            margin-right: 1.5rem;
        }
        .btn-primary-custom, .btn-secondary-custom {
            width: 100%;
            justify-content: center;
        }
        .hero-actions {
            flex-direction: column;
            gap: 1rem;
        }
    }
</style>
