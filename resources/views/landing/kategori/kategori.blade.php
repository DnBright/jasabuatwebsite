<!-- PORTFOLIO / KATEGORI SECTION -->
<section id="kategori" class="categories-section">
    <div class="category-bg-pattern"></div>
    <div class="section-container">
        <div class="section-heading">
            <div class="badge-mini">Portfolio Unggulan</div>
            <h2 class="section-title">Karya Terbaik untuk <span>Bisnis Anda</span></h2>
            <p class="section-subtitle">Lihat bagaimana kami mentransformasi bisnis F&B menjadi lebih profesional dan modern dengan website kelas dunia.</p>
        </div>

        <div class="portfolio-showcase">
            <div class="portfolio-card glass-premium">
                <div class="portfolio-image-wrapper">
                    <img src="{{ asset('images/FNB.png') }}" alt="Portfolio F&B DarkandBright" class="portfolio-img" />
                    <div class="portfolio-overlay">
                        <div class="overlay-content">
                            <span class="category-tag">F&B Industry</span>
                            <h3>Website Restoran & Cafe</h3>
                            <p>Desain responsif, integrasi menu digital, dan optimasi order WhatsApp.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="portfolio-card glass-premium">
                <div class="portfolio-image-wrapper">
                    <img src="{{ asset('images/kecantikan.png') }}" alt="Portfolio Klinik Kecantikan" class="portfolio-img" />
                    <div class="portfolio-overlay">
                        <div class="overlay-content">
                            <span class="category-tag">Beauty & Wellness</span>
                            <h3>Website Klinik Kecantikan</h3>
                            <p>Tampilan elegan, integrasi booking layanan, dan galeri treatment eksklusif.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="portfolio-card glass-premium">
                <div class="portfolio-image-wrapper">
                    <img src="{{ asset('images/petshop.png') }}" alt="Portfolio Pet Shop" class="portfolio-img" />
                    <div class="portfolio-overlay">
                        <div class="overlay-content">
                            <span class="category-tag">Pet Shop & Care</span>
                            <h3>Website Pet Shop</h3>
                            <p>Katalog produk lengkap, informasi grooming, dan kemudahan layanan pelanggan.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="portfolio-card glass-premium">
                <div class="portfolio-image-wrapper">
                    <img src="{{ asset('images/potografi_.png') }}" alt="Portfolio Fotografi" class="portfolio-img" />
                    <div class="portfolio-overlay">
                        <div class="overlay-content">
                            <span class="category-tag">Photography</span>
                            <h3>Website Portofolio Fotografi</h3>
                            <p>Galeri foto memukau, tampilan paket layanan profesional, dan form booking.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="portfolio-card glass-premium">
                <div class="portfolio-image-wrapper">
                    <img src="{{ asset('images/retail atau marketplace.png') }}" alt="Portfolio Retail" class="portfolio-img" />
                    <div class="portfolio-overlay">
                        <div class="overlay-content">
                            <span class="category-tag">Retail & E-Commerce</span>
                            <h3>Website Toko Online</h3>
                            <p>Katalog produk dinamis, navigasi mudah, dan optimasi konversi penjualan.</p>
                        </div>
                    </div>
                </div>
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
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
        gap: 2rem;
        perspective: 1000px;
    }

    .portfolio-card {
        width: 100%;
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 40px;
        padding: 2rem;
        box-shadow: 0 40px 100px -20px rgba(0, 33, 71, 0.15);
        transition: all 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        transform-style: preserve-3d;
    }

    .portfolio-card:hover {
        transform: translateY(-20px) rotateX(5deg);
        box-shadow: 0 60px 120px -30px rgba(0, 33, 71, 0.25);
    }

    .portfolio-image-wrapper {
        position: relative;
        width: 100%;
        border-radius: 24px;
        overflow: hidden;
        aspect-ratio: 16/9;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }

    .portfolio-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 1s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .portfolio-card:hover .portfolio-img {
        transform: scale(1.05);
    }

    .portfolio-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to top, rgba(0, 33, 71, 0.9), transparent);
        display: flex;
        align-items: flex-end;
        padding: 3rem;
        opacity: 0;
        transition: all 0.4s ease;
    }

    .portfolio-card:hover .portfolio-overlay {
        opacity: 1;
    }

    .overlay-content {
        transform: translateY(20px);
        transition: all 0.5s ease 0.1s;
    }

    .portfolio-card:hover .overlay-content {
        transform: translateY(0);
    }

    .category-tag {
        display: inline-block;
        padding: 0.5rem 1rem;
        background: #3b82f6;
        color: white;
        border-radius: 50px;
        font-size: 0.8rem;
        font-weight: 800;
        margin-bottom: 1rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .overlay-content h3 {
        color: white;
        font-size: 2rem;
        margin-bottom: 0.5rem;
        font-weight: 800;
    }

    .overlay-content p {
        color: rgba(255, 255, 255, 0.8);
        font-size: 1.1rem;
        font-weight: 500;
        max-width: 500px;
    }

    @media (max-width: 768px) {
        .categories-section { padding: 4rem 0; }
        .section-title { font-size: 2.25rem; }
        .section-subtitle { font-size: 1rem; margin-bottom: 3rem; padding: 0 5%; }
        .portfolio-card { padding: 1rem; border-radius: 24px; }
        .portfolio-showcase { grid-template-columns: 1fr; gap: 1.5rem; }
        .portfolio-image-wrapper { aspect-ratio: 4/3; }
        .portfolio-overlay { padding: 1.5rem; }
        .overlay-content h3 { font-size: 1.5rem; }
        .overlay-content p { font-size: 0.9rem; }
    }
</style>
</style>