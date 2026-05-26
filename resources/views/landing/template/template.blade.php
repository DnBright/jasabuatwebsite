<!-- TEMPLATE SHOWCASE SECTION -->
<section id="template" class="template-section">
    <div class="section-container">
        <div class="section-heading">
            <div class="badge-mini">Koleksi Desain</div>
            <h2 class="section-title">Pilih <span>Template Website</span> Anda</h2>
            <p class="section-subtitle">Tersedia beragam pilihan desain elegan yang siap tayang untuk mendongkrak jualan UMKM Anda.</p>
        </div>

        <div class="template-scroll-wrapper">
            <div class="template-grid">
                @foreach($templatesDB as $tmpl)
                <div class="card-template">
                    <div class="template-image-box">
                        <a href="{{ route('template.details', $tmpl->id) }}">
                            <img src="{{ Str::startsWith($tmpl->image, 'http') ? $tmpl->image : asset($tmpl->image) }}" alt="{{ $tmpl->name }}" loading="lazy" width="512" height="512" />
                        </a>
                        @if($loop->first)
                        <div class="template-badge">Terlaris</div>
                        @elseif($loop->iteration == 3 || $loop->iteration == 5)
                        <div class="template-badge badge-new">Baru</div>
                        @endif
                        <div class="template-overlay">
                            <a href="{{ route('template.demo', $tmpl->id) }}" class="btn-preview" target="_blank" rel="noopener">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                Lihat Demo
                            </a>
                        </div>
                    </div>
                    <div class="template-info">
                        <div class="template-meta">
                            <span class="category-tag">Premium UMKM</span>
                        </div>
                        <h3>{{ $tmpl->name }}</h3>
                        <div class="price-box">
                            <span class="price-label">Mulai dari</span>
                            <p class="template-price">Rp {{ number_format(intval(str_replace(['.', ','], '', $tmpl->packages['basic']['price'] ?? '1000000')), 0, ',', '.') }}</p>
                        </div>
                        <div class="template-actions">
                            <a href="{{ route('template.details', $tmpl->id) }}" class="btn-template-primary">Detail & Pesan</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="scroll-hint">
            <span class="hint-icon">↔</span>
            <span>Geser untuk melihat koleksi lainnya</span>
        </div>
    </div>
</section>

<style>
    .template-section {
        padding: 8rem 0;
        background-color: #ffffff;
        position: relative;
    }

    .section-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 7%;
    }

    .section-title {
        font-size: 3rem;
        color: #0f172a;
        margin-bottom: 1.5rem;
        font-weight: 800;
        letter-spacing: -2px;
        text-align: center;
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
        text-align: center;
    }

    .template-scroll-wrapper {
        margin: 0 -7%;
        padding: 0 7% 3rem 7%;
        overflow-x: auto;
        scrollbar-width: none;
        -ms-overflow-style: none;
        cursor: grab;
    }

    .template-scroll-wrapper::-webkit-scrollbar {
        display: none;
    }

    .template-grid {
        display: flex;
        gap: 2.5rem;
        padding-bottom: 1rem;
    }

    .card-template {
        background: #ffffff;
        border-radius: 32px;
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid #f1f5f9;
        flex: 0 0 380px;
        overflow: hidden;
        box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.05);
        position: relative;
    }

    .card-template:hover {
        transform: translateY(-15px);
        box-shadow: 0 40px 80px -20px rgba(0, 33, 71, 0.15);
        border-color: #3b82f6;
    }

    .template-image-box {
        position: relative;
        height: 240px;
        background-color: #f8fafc;
        overflow: hidden;
    }

    .template-image-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.8s ease;
    }

    .card-template:hover .template-image-box img {
        transform: scale(1.1);
    }

    .template-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 33, 71, 0.4);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: all 0.3s ease;
        backdrop-filter: blur(4px);
    }

    .card-template:hover .template-overlay {
        opacity: 1;
    }

    .btn-preview {
        background: white;
        color: #002147;
        padding: 0.75rem 1.5rem;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        transform: translateY(20px);
        transition: all 0.4s ease;
    }

    .btn-preview svg {
        width: 20px;
        height: 20px;
    }

    .card-template:hover .btn-preview {
        transform: translateY(0);
    }

    .template-badge {
        position: absolute;
        top: 20px;
        left: 20px;
        background: #ef4444;
        color: white;
        padding: 0.5rem 1.25rem;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 800;
        z-index: 10;
        box-shadow: 0 10px 20px -5px rgba(239, 68, 68, 0.4);
    }

    .badge-new {
        background: #3b82f6;
        box-shadow: 0 10px 20px -5px rgba(59, 130, 246, 0.4);
    }

    .template-info {
        padding: 2.5rem;
    }

    .category-tag {
        color: #3b82f6;
        font-size: 0.8rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .template-info h3 {
        color: #0f172a;
        font-size: 1.5rem;
        margin: 0.5rem 0 1.5rem 0;
        font-weight: 800;
    }

    .price-box {
        margin-bottom: 2rem;
    }

    .price-label {
        font-size: 0.85rem;
        color: #64748b;
        font-weight: 600;
        display: block;
        margin-bottom: 0.25rem;
    }

    .template-price {
        color: #002147;
        font-size: 2rem;
        font-weight: 800;
        margin-bottom: 0;
        letter-spacing: -1px;
    }

    .btn-template-primary {
        display: block;
        width: 100%;
        background: linear-gradient(135deg, #002147 0%, #0c3461 100%);
        color: #fff;
        text-decoration: none;
        padding: 1.1rem;
        border-radius: 16px;
        font-weight: 700;
        text-align: center;
        transition: all 0.3s ease;
        box-shadow: 0 10px 20px -5px rgba(0, 33, 71, 0.3);
    }

    .btn-template-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 20px 35px -10px rgba(0, 33, 71, 0.4);
    }

    @@media (max-width: 768px) {
        .template-section { padding: 4rem 0; }
        .section-title { font-size: 2.25rem; }
        .section-subtitle { font-size: 1rem; margin-bottom: 3rem; padding: 0 5%; }
        .card-template { flex: 0 0 300px; border-radius: 24px; }
        .template-image-box { height: 180px; }
        .template-info { padding: 1.5rem; }
        .template-info h3 { font-size: 1.25rem; margin-bottom: 1rem; }
        .price-box { margin-bottom: 1.5rem; }
        .template-price { font-size: 1.5rem; }
        .btn-template-primary { padding: 0.85rem; font-size: 0.9rem; border-radius: 12px; }
        .scroll-hint { font-size: 0.8rem; margin-top: 1.5rem; }
    }
</style>
