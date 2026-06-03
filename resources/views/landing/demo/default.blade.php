<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo {{ $template['name'] }} - DarkandBright</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --color-primary: #141213;      /* Dark Slate Charcoal */
            --color-primary-light: #1c283e;/* Deep Slate Blue */
            --color-accent: #3b82f6;       /* Blue Accent */
            --color-text: #1c283e;        /* Text color */
            --color-text-muted: #5e6b7e;   /* Muted text */
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Outfit', sans-serif; }
        
        .demo-banner {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background: var(--color-primary);
            color: white;
            padding: 12px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 9999;
            font-size: 14px;
        }
        
        .demo-banner a {
            background: #3b82f6;
            color: white;
            padding: 8px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .demo-banner a:hover {
            background: #2563eb;
            transform: translateY(-2px);
        }
        
        .demo-content {
            margin-top: 50px;
            min-height: calc(100vh - 50px);
        }
        
        /* Template Default Style */
        .hero-section {
            background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-light) 100%);
            color: white;
            padding: 100px 5%;
            text-align: center;
        }
        
        .hero-section h1 {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 20px;
            letter-spacing: -1px;
        }
        
        .hero-section p {
            font-size: 1.25rem;
            opacity: 0.9;
            max-width: 600px;
            margin: 0 auto 30px;
            line-height: 1.6;
        }
        
        .hero-cta {
            display: inline-flex;
            gap: 15px;
        }
        
        .btn-primary {
            background: #3b82f6;
            color: white;
            padding: 15px 35px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 700;
            transition: all 0.3s;
        }
        
        .btn-outline {
            background: transparent;
            color: white;
            padding: 15px 35px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 700;
            border: 2px solid white;
            transition: all 0.3s;
        }
        
        .features-section {
            padding: 80px 5%;
            background: #f8fafc;
        }
        
        .features-section h2 {
            text-align: center;
            font-size: 2.5rem;
            color: var(--color-primary);
            margin-bottom: 50px;
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .feature-card {
            background: white;
            padding: 30px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
        }
        
        .feature-card h3 {
            color: var(--color-primary);
            font-size: 1.3rem;
            margin-bottom: 10px;
        }
        
        .feature-card p {
            color: var(--color-text-muted);
            line-height: 1.6;
        }
        
        .gallery-section {
            padding: 80px 5%;
        }
        
        .gallery-section h2 {
            text-align: center;
            font-size: 2.5rem;
            color: var(--color-primary);
            margin-bottom: 50px;
        }
        
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .gallery-item {
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
        }
        
        .gallery-item img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }
        
        .cta-section {
            background: var(--color-primary);
            color: white;
            padding: 80px 5%;
            text-align: center;
        }
        
        .cta-section h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }
        
        .whatsapp-float {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: #25d366;
            color: white;
            padding: 15px 25px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 4px 12px rgba(37, 211, 102, 0.4);
            transition: all 0.3s;
            z-index: 1000;
        }
        
        .whatsapp-float:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(37, 211, 102, 0.5);
        }
        
        @media (max-width: 768px) {
            .hero-section h1 { font-size: 2.5rem; }
            .hero-cta { flex-direction: column; }
            .demo-banner { flex-wrap: wrap; gap: 10px; }
        }
    </style>
</head>
<body>
    <div class="demo-banner">
        <div>
            <strong>🎨 Demo Template:</strong> {{ $template['name'] }}
        </div>
        <div style="display: flex; gap: 15px; align-items: center;">
            <a href="{{ route('template.details', $template['id']) }}" style="background: transparent; border: 1px solid white; padding: 8px 20px;">Kembali ke Detail</a>
            <a href="https://wa.me/6285190894806?text=Halo%20DarkandBright,%20saya%20tertarik%20dengan%20template%20{{ urlencode($template['name']) }}" target="_blank">Pesan Template Ini</a>
        </div>
    </div>

    <div class="demo-content">
        <!-- Hero Section -->
        <section class="hero-section">
            <h1>Selamat Datang di {{ $template['name'] }}</h1>
            <p>Website profesional untuk bisnis Anda. Desain elegan, responsif, dan siap pakai untuk meningkatkan kredibilitas bisnis Anda.</p>
            <div class="hero-cta">
                <a href="#features" class="btn-primary">Lihat Fitur</a>
                <a href="https://wa.me/6285190894806" class="btn-outline" target="_blank">Hubungi Kami</a>
            </div>
        </section>

        <!-- Features Section -->
        <section class="features-section" id="features">
            <h2>Fitur Unggulan</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <h3>📱 Responsive Design</h3>
                    <p>Tampilan sempurna di semua perangkat - desktop, tablet, dan mobile.</p>
                </div>
                <div class="feature-card">
                    <h3>⚡ Loading Cepat</h3>
                    <p>Optimasi kecepatan untuk pengalaman pengguna yang lebih baik.</p>
                </div>
                <div class="feature-card">
                    <h3>🔒 Keamanan Terjamin</h3>
                    <p>SSL certificate dan proteksi keamanan untuk data Anda.</p>
                </div>
                <div class="feature-card">
                    <h3>📞 WhatsApp Integration</h3>
                    <p>Tombol WhatsApp langsung untuk kemudahan komunikasi dengan pelanggan.</p>
                </div>
                <div class="feature-card">
                    <h3>🎨 Customizable</h3>
                    <p>Mudah dikustomisasi sesuai dengan identitas brand Anda.</p>
                </div>
                <div class="feature-card">
                    <h3>🔍 SEO Friendly</h3>
                    <p>Optimasi mesin pencari untuk visibilitas bisnis online.</p>
                </div>
            </div>
        </section>

        <!-- Gallery Section -->
        <section class="gallery-section">
            <h2>Galeri Produk</h2>
            <div class="gallery-grid">
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=400" alt="Produk 1">
                </div>
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?auto=format&fit=crop&w=400" alt="Produk 2">
                </div>
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?auto=format&fit=crop&w=400" alt="Produk 3">
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta-section">
            <h2>Siap Meningkatkan Bisnis Anda?</h2>
            <p style="font-size: 1.1rem; opacity: 0.9; margin-bottom: 30px;">Dapatkan website profesional dengan harga terjangkau</p>
            <a href="https://wa.me/6285190894806?text=Halo%20DarkandBright,%20saya%20tertarik%20dengan%20template%20{{ urlencode($template['name']) }}" 
               class="btn-primary" target="_blank" style="font-size: 1.1rem; padding: 18px 40px;">
               💬 Pesan via WhatsApp
            </a>
        </section>
    </div>

    <!-- Floating WhatsApp -->
    <a href="https://wa.me/6285190894806" class="whatsapp-float" target="_blank">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
        </svg>
        Chat WhatsApp
    </a>
</body>
</html>
