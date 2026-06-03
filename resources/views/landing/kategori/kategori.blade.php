<!-- PORTFOLIO / KATEGORI SECTION -->
<section id="kategori" class="categories-section">
    <div class="parallax-wrapper">
        <img src="{{ asset('images/hero/collaboration.webp') }}" class="parallax-bg" style="opacity: 0.05;" alt="Background collaboration">
    </div>
    <div class="section-container">
        <div class="section-heading">
            <div class="badge-mini">Portfolio Unggulan</div>
            <h2 class="section-title">Karya Terbaik untuk <span>Bisnis Anda</span></h2>
            <p class="section-subtitle">Lihat bagaimana kami mentransformasi berbagai jenis bisnis UMKM menjadi lebih profesional, terpercaya, dan siap bersaing di era digital dengan website kelas dunia.</p>
        </div>

        <div class="swiper kategori-swiper portfolio-showcase">
            <div class="swiper-wrapper">

                <!-- 1. Roast & Ritual — Coffee House -->
                <div class="swiper-slide">
                    <div class="umkm-card">
                        <div class="umkm-img-wrap">
                            <img src="https://images.unsplash.com/photo-1497935586351-b67a49e012bf?auto=format&fit=crop&q=80&w=800" alt="Website Coffee House" loading="lazy" width="800" height="571" />
                        </div>
                        <div class="umkm-content">
                            <span class="umkm-tag">Kuliner / F&amp;B</span>
                            <h3>Roast &amp; Ritual Coffee</h3>
                            <p>Website premium untuk coffee house dengan menu, galeri, dan sistem reservasi meja online.</p>
                            <div class="umkm-actions">
                                <a href="{{ route('portfolio.show', 'roast_ritual_coffee_house') }}" target="_blank" rel="noopener" class="umkm-btn-portfolio">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                    Lihat Portfolio
                                </a>
                                <a href="#kontak" class="umkm-btn-order">Pesan <span aria-hidden="true">&rarr;</span></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 2. Aurelia Fine Dining -->
                <div class="swiper-slide">
                    <div class="umkm-card">
                        <div class="umkm-img-wrap">
                            <img src="https://images.unsplash.com/photo-1514362545857-3bc16c4c7d1b?auto=format&fit=crop&q=80&w=800" alt="Website Fine Dining" loading="lazy" width="800" height="571" />
                        </div>
                        <div class="umkm-content">
                            <span class="umkm-tag">Restoran Mewah</span>
                            <h3>Aurelia Fine Dining</h3>
                            <p>Website eksklusif untuk restoran fine dining dengan menu degustasi dan reservasi online.</p>
                            <div class="umkm-actions">
                                <a href="{{ route('portfolio.show', 'aurelia_fine_dining') }}" target="_blank" rel="noopener" class="umkm-btn-portfolio">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                    Lihat Portfolio
                                </a>
                                <a href="#kontak" class="umkm-btn-order">Pesan <span aria-hidden="true">&rarr;</span></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 3. Lumière Beauty Studio -->
                <div class="swiper-slide">
                    <div class="umkm-card">
                        <div class="umkm-img-wrap">
                            <img src="https://images.unsplash.com/photo-1560066984-138dadb4c035?auto=format&fit=crop&q=80&w=800" alt="Website Beauty Studio" loading="lazy" width="800" height="571" />
                        </div>
                        <div class="umkm-content">
                            <span class="umkm-tag">Klinik / Salon</span>
                            <h3>Lumière Beauty Studio</h3>
                            <p>Tampilkan layanan kecantikan premium dan mudahkan pelanggan booking jadwal perawatan.</p>
                            <div class="umkm-actions">
                                <a href="{{ route('portfolio.show', 'lumi_re_beauty_studio') }}" target="_blank" rel="noopener" class="umkm-btn-portfolio">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                    Lihat Portfolio
                                </a>
                                <a href="#kontak" class="umkm-btn-order">Pesan <span aria-hidden="true">&rarr;</span></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 4. Vitalis Medical Center -->
                <div class="swiper-slide">
                    <div class="umkm-card">
                        <div class="umkm-img-wrap">
                            <img src="https://images.unsplash.com/photo-1551076805-e1869043e560?auto=format&fit=crop&q=80&w=800" alt="Website Klinik Medis" loading="lazy" width="800" height="571" />
                        </div>
                        <div class="umkm-content">
                            <span class="umkm-tag">Klinik / Kesehatan</span>
                            <h3>Vitalis Medical Center</h3>
                            <p>Website profesional untuk klinik medis dengan profil dokter dan sistem pendaftaran online.</p>
                            <div class="umkm-actions">
                                <a href="{{ route('portfolio.show', 'vitalis_medical_center') }}" target="_blank" rel="noopener" class="umkm-btn-portfolio">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                    Lihat Portfolio
                                </a>
                                <a href="#kontak" class="umkm-btn-order">Pesan <span aria-hidden="true">&rarr;</span></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 5. Paw Haven Pet Care -->
                <div class="swiper-slide">
                    <div class="umkm-card">
                        <div class="umkm-img-wrap">
                            <img src="https://images.unsplash.com/photo-1583337130417-3346a1be7dee?auto=format&fit=crop&q=80&w=800" alt="Website Pet Shop" loading="lazy" width="800" height="571" />
                        </div>
                        <div class="umkm-content">
                            <span class="umkm-tag">Pet Shop &amp; Care</span>
                            <h3>Paw Haven Pet Care</h3>
                            <p>Katalog produk, layanan grooming, dan info klinik hewan dalam satu website lengkap.</p>
                            <div class="umkm-actions">
                                <a href="{{ route('portfolio.show', 'paw_haven_pet_care') }}" target="_blank" rel="noopener" class="umkm-btn-portfolio">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                    Lihat Portfolio
                                </a>
                                <a href="#kontak" class="umkm-btn-order">Pesan <span aria-hidden="true">&rarr;</span></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 6. NovaMart E-Commerce -->
                <div class="swiper-slide">
                    <div class="umkm-card">
                        <div class="umkm-img-wrap">
                            <img src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&fit=crop&q=80&w=800" alt="Website E-Commerce" loading="lazy" width="800" height="571" />
                        </div>
                        <div class="umkm-content">
                            <span class="umkm-tag">Retail / E-Commerce</span>
                            <h3>NovaMart E-Commerce</h3>
                            <p>Toko online modern dengan katalog produk lengkap, keranjang belanja, dan checkout mudah.</p>
                            <div class="umkm-actions">
                                <a href="{{ route('portfolio.show', 'novamart_e_commerce') }}" target="_blank" rel="noopener" class="umkm-btn-portfolio">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                    Lihat Portfolio
                                </a>
                                <a href="#kontak" class="umkm-btn-order">Pesan <span aria-hidden="true">&rarr;</span></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 7. DriveTrust Motors -->
                <div class="swiper-slide">
                    <div class="umkm-card">
                        <div class="umkm-img-wrap">
                            <img src="https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?auto=format&fit=crop&q=80&w=800" alt="Website Showroom Mobil" loading="lazy" width="800" height="571" />
                        </div>
                        <div class="umkm-content">
                            <span class="umkm-tag">Otomotif / Showroom</span>
                            <h3>DriveTrust Motors</h3>
                            <p>Website showroom kendaraan dengan katalog mobil, filter pencarian, dan form test drive.</p>
                            <div class="umkm-actions">
                                <a href="{{ route('portfolio.show', 'drivetrust_motors') }}" target="_blank" rel="noopener" class="umkm-btn-portfolio">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                    Lihat Portfolio
                                </a>
                                <a href="#kontak" class="umkm-btn-order">Pesan <span aria-hidden="true">&rarr;</span></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 8. Torque Garage -->
                <div class="swiper-slide">
                    <div class="umkm-card">
                        <div class="umkm-img-wrap">
                            <img src="https://images.unsplash.com/photo-1635787610093-41dc3f8c8d8b?auto=format&fit=crop&q=80&w=800" alt="Website Bengkel" loading="lazy" width="800" height="571" />
                        </div>
                        <div class="umkm-content">
                            <span class="umkm-tag">Bengkel / Servis</span>
                            <h3>Torque Garage</h3>
                            <p>Website bengkel modern dengan daftar layanan servis, booking online, dan testimoni pelanggan.</p>
                            <div class="umkm-actions">
                                <a href="{{ route('portfolio.show', 'torque_garage') }}" target="_blank" rel="noopener" class="umkm-btn-portfolio">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                    Lihat Portfolio
                                </a>
                                <a href="#kontak" class="umkm-btn-order">Pesan <span aria-hidden="true">&rarr;</span></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 9. Velocity AutoStyle -->
                <div class="swiper-slide">
                    <div class="umkm-card">
                        <div class="umkm-img-wrap">
                            <img src="https://images.unsplash.com/photo-1542282088-fe8426682b8f?auto=format&fit=crop&q=80&w=800" alt="Website Aksesori Mobil" loading="lazy" width="800" height="571" />
                        </div>
                        <div class="umkm-content">
                            <span class="umkm-tag">Aksesori / Modifikasi</span>
                            <h3>Velocity AutoStyle</h3>
                            <p>Toko aksesori dan modifikasi kendaraan dengan galeri karya dan pemesanan yang mudah.</p>
                            <div class="umkm-actions">
                                <a href="{{ route('portfolio.show', 'velocity_autostyle') }}" target="_blank" rel="noopener" class="umkm-btn-portfolio">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                    Lihat Portfolio
                                </a>
                                <a href="#kontak" class="umkm-btn-order">Pesan <span aria-hidden="true">&rarr;</span></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 10. Grand Aruna Residence -->
                <div class="swiper-slide">
                    <div class="umkm-card">
                        <div class="umkm-img-wrap">
                            <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&q=80&w=800" alt="Website Properti" loading="lazy" width="800" height="571" />
                        </div>
                        <div class="umkm-content">
                            <span class="umkm-tag">Properti / Real Estate</span>
                            <h3>Grand Aruna Residence</h3>
                            <p>Website properti eksklusif dengan galeri unit, spesifikasi, dan form konsultasi pembelian.</p>
                            <div class="umkm-actions">
                                <a href="{{ route('portfolio.show', 'grand_aruna_residence') }}" target="_blank" rel="noopener" class="umkm-btn-portfolio">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                    Lihat Portfolio
                                </a>
                                <a href="#kontak" class="umkm-btn-order">Pesan <span aria-hidden="true">&rarr;</span></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 11. Nordhaven Living -->
                <div class="swiper-slide">
                    <div class="umkm-card">
                        <div class="umkm-img-wrap">
                            <img src="https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?auto=format&fit=crop&q=80&w=800" alt="Website Furnitur Interior" loading="lazy" width="800" height="571" />
                        </div>
                        <div class="umkm-content">
                            <span class="umkm-tag">Furnitur / Interior</span>
                            <h3>Nordhaven Living</h3>
                            <p>Website toko furnitur Scandinavian dengan katalog produk, lookbook, dan pemesanan custom.</p>
                            <div class="umkm-actions">
                                <a href="{{ route('portfolio.show', 'nordhaven_living') }}" target="_blank" rel="noopener" class="umkm-btn-portfolio">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                    Lihat Portfolio
                                </a>
                                <a href="#kontak" class="umkm-btn-order">Pesan <span aria-hidden="true">&rarr;</span></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 12. Vertex Global Group -->
                <div class="swiper-slide">
                    <div class="umkm-card">
                        <div class="umkm-img-wrap">
                            <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&q=80&w=800" alt="Website Company Profile" loading="lazy" width="800" height="571" />
                        </div>
                        <div class="umkm-content">
                            <span class="umkm-tag">Company Profile</span>
                            <h3>Vertex Global Group</h3>
                            <p>Website company profile korporat yang elegan untuk membangun kepercayaan klien dan investor.</p>
                            <div class="umkm-actions">
                                <a href="{{ route('portfolio.show', 'vertex_global_group') }}" target="_blank" rel="noopener" class="umkm-btn-portfolio">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                    Lihat Portfolio
                                </a>
                                <a href="#kontak" class="umkm-btn-order">Pesan <span aria-hidden="true">&rarr;</span></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 13. The Dark & Bright Portfolio -->
                <div class="swiper-slide">
                    <div class="umkm-card">
                        <div class="umkm-img-wrap">
                            <img src="https://images.unsplash.com/photo-1550751827-4bd374c3f58b?auto=format&fit=crop&q=80&w=800" alt="Website Web Agency" loading="lazy" width="800" height="571" />
                        </div>
                        <div class="umkm-content">
                            <span class="umkm-tag">Jasa / Web Agency</span>
                            <h3>The Dark &amp; Bright Agency</h3>
                            <p>Website portofolio agency digital yang memukau dengan showcase proyek dan halaman layanan.</p>
                            <div class="umkm-actions">
                                <a href="{{ route('portfolio.show', 'the_dark_bright_portfolio') }}" target="_blank" rel="noopener" class="umkm-btn-portfolio">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                    Lihat Portfolio
                                </a>
                                <a href="#kontak" class="umkm-btn-order">Pesan <span aria-hidden="true">&rarr;</span></a>
                            </div>
                        </div>
                    </div>
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
                    radial-gradient(circle at bottom left, rgba(20, 18, 19, 0.03), transparent 45%), 
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
        color: var(--color-primary);
        margin-bottom: 1.5rem;
        font-weight: 800;
        letter-spacing: -1.5px;
        line-height: 1.2;
    }

    .section-title span {
        background: linear-gradient(90deg, var(--color-primary), #3b82f6);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .section-subtitle {
        color: var(--color-text-muted);
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
        box-shadow: 0 20px 40px -15px rgba(20, 18, 19, 0.08), 0 1px 3px rgba(0, 0, 0, 0.01);
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
        color: var(--color-primary);
        font-size: 1.35rem;
        font-weight: 800;
        margin-bottom: 0.5rem;
        line-height: 1.3;
    }

    .umkm-content p {
        color: var(--color-text-muted);
        font-size: 0.95rem;
        line-height: 1.5;
        margin-bottom: 1.75rem;
        flex-grow: 1;
    }
    
    .umkm-actions {
        margin-top: auto;
        display: flex;
        gap: 0.6rem;
        align-items: center;
    }

    .umkm-btn-portfolio {
        flex: 1;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.4rem;
        padding: 0.65rem 0.9rem;
        border-radius: 12px;
        font-size: 0.8rem;
        font-weight: 700;
        color: #3b82f6;
        background: rgba(59, 130, 246, 0.07);
        border: 1px solid rgba(59, 130, 246, 0.2);
        text-decoration: none;
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        white-space: nowrap;
    }

    .umkm-btn-portfolio:hover {
        background: rgba(59, 130, 246, 0.14);
        border-color: rgba(59, 130, 246, 0.4);
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.15);
    }

    .umkm-btn-order {
        flex: 1;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.4rem;
        padding: 0.65rem 0.9rem;
        border-radius: 12px;
        font-size: 0.8rem;
        font-weight: 700;
        color: #ffffff;
        background: linear-gradient(135deg, var(--color-primary), #3b82f6);
        border: 1px solid transparent;
        text-decoration: none;
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        white-space: nowrap;
    }

    .umkm-btn-order:hover {
        box-shadow: 0 6px 16px rgba(59, 130, 246, 0.3);
        transform: translateY(-1px);
    }

    .umkm-btn-order span {
        transition: transform 0.3s ease;
    }

    .umkm-btn-order:hover span {
        transform: translateX(3px);
    }

    .swiper-controls-container {
        margin-top: 3rem;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .swipe-hint {
        color: var(--color-text-muted);
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
        color: var(--color-primary) !important;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.03);
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }
    
    .swiper-button-prev:hover, .swiper-button-next:hover {
        background: var(--color-primary);
        color: #ffffff !important;
        border-color: var(--color-primary);
        box-shadow: 0 6px 15px rgba(20, 18, 19, 0.15);
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
        margin: 0 5px !important;
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
        .umkm-btn-portfolio, .umkm-btn-order { font-size: 0.75rem; padding: 0.55rem 0.75rem; border-radius: 10px; }
        
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
                    dynamicBullets: false,
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