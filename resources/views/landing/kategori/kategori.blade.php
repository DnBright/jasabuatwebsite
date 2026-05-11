<!-- KATEGORI SECTION -->
<section id="kategori" class="categories-section">
    <div class="category-bg-pattern"></div>
    <div class="section-container">
        <div class="section-heading">
            <div class="badge-mini">Bidang Usaha</div>
            <h2 class="section-title">Solusi untuk Berbagai <span>Bidang Usaha</span></h2>
            <p class="section-subtitle">Apapun bisnis Anda, kami punya solusi website yang tepat untuk meningkatkan kredibilitas dan omzet jualan Anda.</p>
        </div>

        <div class="category-scroll-wrapper">
            <div class="category-grid">
                @php
                    $categories = [
                        ['name' => 'Kuliner & Warung', 'img' => 'https://images.unsplash.com/photo-1513104890138-7c749659a591?auto=format&fit=crop&q=80&w=300', 'color' => '#f59e0b'],
                        ['name' => 'Toko Kelontong', 'img' => 'https://images.unsplash.com/photo-1534723452862-4c874018d66d?auto=format&fit=crop&q=80&w=300', 'color' => '#10b981'],
                        ['name' => 'Fashion & Retail', 'img' => 'https://images.unsplash.com/photo-1445205170230-053b83016050?auto=format&fit=crop&q=80&w=300', 'color' => '#ec4899'],
                        ['name' => 'Jasa & Servis', 'img' => 'https://images.unsplash.com/photo-1581092160562-40aa08e78837?auto=format&fit=crop&q=80&w=300', 'color' => '#3b82f6'],
                        ['name' => 'Properti & Kos', 'img' => 'https://images.unsplash.com/photo-1560518883-ce09059eeffa?auto=format&fit=crop&q=80&w=300', 'color' => '#8b5cf6'],
                        ['name' => 'Rental & Otomotif', 'img' => 'https://images.unsplash.com/photo-1494976388531-d1058494cdd8?auto=format&fit=crop&q=80&w=300', 'color' => '#ef4444'],
                        ['name' => 'Laundry & Clean', 'img' => 'https://images.unsplash.com/photo-1545173168-9f1947eebb7f?auto=format&fit=crop&q=80&w=300', 'color' => '#06b6d4'],
                        ['name' => 'Barbershop', 'img' => 'https://images.unsplash.com/photo-1503951914875-452162b0f3f1?auto=format&fit=crop&q=80&w=300', 'color' => '#64748b'],
                        ['name' => 'Pet Shop', 'img' => 'https://images.unsplash.com/photo-1541480605637-296291a24d9f?auto=format&fit=crop&q=80&w=300', 'color' => '#10b981'],
                        ['name' => 'Agen & Sembako', 'img' => 'https://images.unsplash.com/photo-1533227268408-a5eb4bc7a934?auto=format&fit=crop&q=80&w=300', 'color' => '#f59e0b'],
                        ['name' => 'Cafe & Kedai', 'img' => 'https://images.unsplash.com/photo-1453614512568-c4024d13c247?auto=format&fit=crop&q=80&w=300', 'color' => '#78350f'],
                    ];
                @endphp

                @foreach($categories as $cat)
                <div class="card-category">
                    <div class="category-icon-bg" style="--cat-color: {{ $cat['color'] }}">
                        <img src="{{ $cat['img'] }}" alt="{{ $cat['name'] }}" loading="lazy" />
                        <div class="color-overlay"></div>
                    </div>
                    <h3>{{ $cat['name'] }}</h3>
                    <div class="card-hover-indicator"></div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="scroll-hint">
            <span class="hint-icon">↔</span>
            <span>Geser untuk kategori lainnya</span>
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

    .category-scroll-wrapper {
        margin: 0 -7%;
        padding: 0 7% 3rem 7%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        scrollbar-width: none;
        -ms-overflow-style: none;
    }

    .category-scroll-wrapper::-webkit-scrollbar {
        display: none;
    }

    .category-grid {
        display: flex;
        gap: 2rem;
        width: max-content;
        padding: 1rem 0;
    }

    .card-category {
        background: #ffffff;
        padding: 2rem 1.5rem;
        border-radius: 24px;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        border: 1px solid #f1f5f9;
        flex: 0 0 180px;
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 1.25rem;
        position: relative;
        overflow: hidden;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02);
    }

    .card-category:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px -15px rgba(0, 33, 71, 0.1);
        border-color: var(--cat-color, #3b82f6);
    }

    .category-icon-bg {
        width: 80px;
        height: 80px;
        background: #f8fafc;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 24px;
        position: relative;
        overflow: hidden;
        border: 1px solid #f1f5f9;
        transition: all 0.4s ease;
    }

    .card-category:hover .category-icon-bg {
        transform: scale(1.05) rotate(5deg);
        border-color: transparent;
    }

    .category-icon-bg img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .card-category:hover .category-icon-bg img {
        transform: scale(1.1);
    }

    .color-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: var(--cat-color, #3b82f6);
        opacity: 0.1;
        mix-blend-mode: multiply;
        transition: opacity 0.3s ease;
    }

    .card-category:hover .color-overlay {
        opacity: 0.2;
    }

    .card-category h3 {
        color: #0f172a;
        font-size: 1rem;
        margin-bottom: 0;
        font-weight: 700;
        line-height: 1.3;
        transition: color 0.3s ease;
    }

    .card-category:hover h3 {
        color: #002147;
    }

    .card-hover-indicator {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 4px;
        background: var(--cat-color, #3b82f6);
        transition: width 0.4s ease;
    }

    .card-category:hover .card-hover-indicator {
        width: 100%;
    }

    .scroll-hint {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
        margin-top: 2rem;
        color: #94a3b8;
        font-weight: 700;
        font-size: 0.9rem;
    }

    .hint-icon {
        font-size: 1.2rem;
        animation: slideLR 2s infinite;
    }

    @keyframes slideLR {
        0%, 100% { transform: translateX(-5px); }
        50% { transform: translateX(5px); }
    }

    @media (max-width: 768px) {
        .categories-section { padding: 5rem 0; }
        .section-title { font-size: 2.25rem; }
        .card-category { flex: 0 0 150px; padding: 1.5rem 1rem; }
        .category-icon-bg { width: 70px; height: 70px; }
    }
</style>
</style>