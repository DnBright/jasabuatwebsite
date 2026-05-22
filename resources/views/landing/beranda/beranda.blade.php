<!-- HERO SECTION - SIMPLE & CLEAN -->
<header id="beranda" class="hero-section">
    <div class="hero-container">
        <div class="hero-content">
            <div class="badge">Jasa Pembuatan Website</div>
            <h1 class="hero-title">{!! $hero->title ?? 'Bikin Website Bisnis,' !!} <br><span>{{ $hero->title_highlight ?? 'Mulai 1jt-an' }}</span></h1>
            <p class="hero-subtitle">
                {!! $hero->description ?? 'Tingkatkan kredibilitas dan orderan bisnis Anda dengan website profesional siap pakai. <strong>Terima beres</strong>, dari nol sampai online!' !!}
            </p>
            
            <div class="hero-features">
                <div class="feature-item">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                    Pengerjaan Cepat
                </div>
                <div class="feature-item">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                    Fitur Lengkap
                </div>
                <div class="feature-item">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                    Support 24/7
                </div>
            </div>

            <div class="hero-actions">
                <a href="{{ $hero->button_link ?? '#kontak' }}" class="btn-primary-custom">{{ $hero->button_text ?? 'Konsultasi Gratis' }}</a>
                <a href="{{ $hero->secondary_button_link ?? '#kategori' }}" class="btn-outline-custom">{{ $hero->secondary_button_text ?? 'Karya Kami' }}</a>
            </div>
        </div>
        
        <div class="hero-visual">
            <div class="image-wrapper">
                <picture>
                    <source srcset="{{ !empty($hero->image) ? (str_starts_with($hero->image, 'http') ? $hero->image : asset($hero->image)) : asset('images/hero/showcase_asia.webp') }}" type="image/webp">
                    <img src="{{ !empty($hero->image) ? (str_starts_with($hero->image, 'http') ? $hero->image : asset($hero->image)) : asset('images/hero/showcase_asia.png') }}" alt="Website Premium UMKM" class="hero-img-simple" loading="eager" />
                </picture>
            </div>
        </div>
    </div>
</header>

<style>
    .hero-section {
        background-color: #f8fafc;
        padding: 5rem 0 4rem;
        position: relative;
        overflow: hidden;
    }

    .hero-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        max-width: 1200px;
        margin: 0 auto;
        gap: 4rem;
        padding: 0 7%;
    }

    .hero-content {
        flex: 1;
        text-align: left;
        max-width: 600px;
        animation: fadeInUp 0.8s ease-out;
    }

    .badge {
        display: inline-block;
        padding: 0.5rem 1.25rem;
        background: #e0f2fe;
        color: #0284c7;
        border-radius: 50px;
        font-size: 0.85rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .hero-title {
        font-size: 3.8rem;
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

    .hero-subtitle {
        font-size: 1.15rem;
        color: #64748b;
        line-height: 1.6;
        margin-bottom: 2rem;
    }

    .hero-subtitle strong {
        color: #0f172a;
    }

    .hero-features {
        display: flex;
        flex-wrap: wrap;
        gap: 1.5rem;
        margin-bottom: 2.5rem;
    }

    .feature-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.95rem;
        font-weight: 600;
        color: #334155;
    }

    .feature-item svg {
        width: 18px;
        height: 18px;
        color: #10b981;
    }

    .hero-actions {
        display: flex;
        gap: 1rem;
    }

    .btn-primary-custom {
        background: linear-gradient(135deg, #002147 0%, #0c3461 100%);
        color: #fff;
        text-decoration: none;
        padding: 1rem 2rem;
        border-radius: 12px;
        font-weight: 700;
        font-size: 1rem;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        box-shadow: 0 4px 15px rgba(0, 33, 71, 0.2);
        display: inline-block;
        text-align: center;
    }

    .btn-primary-custom:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0, 33, 71, 0.3);
    }

    .btn-outline-custom {
        background-color: transparent;
        color: #002147;
        text-decoration: none;
        border: 2px solid #cbd5e1;
        padding: 1rem 2rem;
        border-radius: 12px;
        font-weight: 700;
        font-size: 1rem;
        transition: all 0.2s ease;
        display: inline-block;
        text-align: center;
    }

    .btn-outline-custom:hover {
        border-color: #002147;
        background-color: #f1f5f9;
    }

    .hero-visual {
        flex: 1;
        display: flex;
        justify-content: flex-end;
        position: relative;
        animation: fadeIn 1s ease-out;
    }

    .image-wrapper {
        width: 100%;
        max-width: 550px;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 20px 40px -10px rgba(0,0,0,0.1);
        border: 6px solid #ffffff;
    }

    .hero-img-simple {
        width: 100%;
        height: auto;
        display: block;
        object-fit: cover;
    }

    @@keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @@keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    /* RESPONSIVE */
    @@media (max-width: 1024px) {
        .hero-container { gap: 2rem; }
        .hero-title { font-size: 3rem; }
    }

    @@media (max-width: 768px) {
        .hero-section { padding: 3rem 0 3rem; }
        .hero-container { 
            flex-direction: column; 
            text-align: center; 
            gap: 2.5rem; 
        }
        
        .hero-content { 
            order: 2; 
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        .hero-visual { 
            order: 1; 
            width: 100%; 
        }
        
        .hero-title { 
            font-size: 2.5rem; 
            margin-bottom: 1rem; 
        }
        
        .hero-subtitle { 
            font-size: 1rem; 
            margin-bottom: 1.5rem;
        }

        .hero-features {
            justify-content: center;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .hero-actions { 
            flex-direction: column; 
            width: 100%;
            gap: 0.75rem;
        }
        
        .btn-primary-custom, .btn-outline-custom {
            width: 100%;
        }
    }

    @@media (max-width: 480px) {
        .hero-title { font-size: 2.2rem; }
    }
</style>
