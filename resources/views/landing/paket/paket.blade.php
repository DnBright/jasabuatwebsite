<!-- PAKET HARGA SECTION -->
<section id="paket" class="pricing-section">
    <div class="pricing-container">
        <div class="pricing-header">
            <span class="badge-mini">Investasi Fleksibel</span>
            <h2 class="section-title">Pilih Paket Sesuai <span>Kebutuhan Bisnis</span> Anda</h2>
            <p class="section-subtitle">Semua paket dirancang "Terima Jadi". Anda cukup fokus pada bisnis, kami urus semua teknisnya. Pembayaran juga bisa dicicil!</p>
            
            <div class="pricing-toggle-container">
                <span class="toggle-label text-full active">Bayar Penuh</span>
                <label class="switch">
                    <input type="checkbox" id="pricing-toggle" aria-label="Toggle Cicilan">
                    <span class="slider round"></span>
                </label>
                <span class="toggle-label text-installment">Cicilan Bulanan <span class="badge-installment">Mulai 800rb-an</span></span>
            </div>
        </div>

        <div class="pricing-grid">
            @forelse($packages as $package)
            <!-- Paket -->
            <div class="pricing-card {{ $package->is_popular ? 'popular' : '' }}">
                @if($package->is_popular)
                <div class="popular-badge">Paling Diminati</div>
                @endif
                <div class="pricing-card-header">
                    <h3>{{ $package->name }}</h3>
                    <div class="price-box">
                        <span class="currency">Rp</span>
                        <span class="amount">{{ $package->price }}</span>
                        <span class="period">{{ $package->period }}</span>
                    </div>
                    <p class="payment-terms">{!! $package->payment_terms !!}</p>
                </div>
                <div class="pricing-card-body">
                    <ul class="features-list">
                        @if(is_array($package->features))
                            @foreach($package->features as $feature)
                            <li class="{{ isset($feature['is_active']) && !$feature['is_active'] ? 'disabled' : '' }}">
                                @if(isset($feature['is_active']) && !$feature['is_active'])
                                <svg viewBox="0 0 24 24" fill="none" stroke="#cbd5e1" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                @else
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                @endif
                                {!! $feature['text'] !!}
                            </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                <div class="pricing-card-footer">
                    <a href="{{ $package->button_link }}" target="_blank" class="btn-pricing {{ $package->is_popular ? 'btn-solid' : 'btn-outline' }}">{{ $package->button_text }}</a>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center text-gray-500 py-10">
                Data paket harga belum ditambahkan di dashboard admin.
            </div>
            @endforelse
        </div>
    </div>
</section>

<style>
    .pricing-section {
        padding: 6rem 0;
        background-color: #ffffff;
        position: relative;
    }

    .pricing-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 7%;
    }

    .pricing-header {
        text-align: center;
        max-width: 700px;
        margin: 0 auto 4rem;
    }

    .pricing-header .badge-mini {
        display: inline-block;
        padding: 0.5rem 1.25rem;
        background: #f1f5f9;
        color: #002147;
        border-radius: 50px;
        font-size: 0.85rem;
        font-weight: 800;
        margin-bottom: 1.5rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        border: 1px solid #e2e8f0;
    }

    .pricing-header .section-title {
        font-size: 3rem;
        color: #0f172a;
        margin-bottom: 1.5rem;
        font-weight: 800;
        letter-spacing: -1.5px;
        line-height: 1.2;
    }

    .pricing-header .section-title span {
        background: linear-gradient(90deg, #002147, #3b82f6);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .pricing-header .section-subtitle {
        font-size: 1.15rem;
        color: #64748b;
        line-height: 1.6;
    }

    .pricing-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2rem;
        align-items: center;
    }

    .pricing-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 24px;
        padding: 2.5rem;
        position: relative;
        transition: all 0.3s ease;
        box-shadow: 0 10px 25px -5px rgba(0,0,0,0.02);
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .pricing-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px -10px rgba(0, 33, 71, 0.1);
        border-color: #cbd5e1;
    }

    .pricing-card.popular {
        border: 2px solid #3b82f6;
        box-shadow: 0 25px 50px -12px rgba(59, 130, 246, 0.15);
        padding: 3rem 2.5rem;
        z-index: 10;
        transform: scale(1.05);
        background: #002147;
        color: white;
    }

    .pricing-card.popular:hover {
        transform: scale(1.05) translateY(-5px);
        box-shadow: 0 30px 60px -15px rgba(59, 130, 246, 0.25);
    }

    .popular-badge {
        position: absolute;
        top: -15px;
        left: 50%;
        transform: translateX(-50%);
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        color: white;
        padding: 0.5rem 1.5rem;
        border-radius: 50px;
        font-size: 0.85rem;
        font-weight: 800;
        letter-spacing: 1px;
        text-transform: uppercase;
        box-shadow: 0 4px 10px rgba(59, 130, 246, 0.3);
    }

    .pricing-card-header {
        text-align: center;
        margin-bottom: 2rem;
        padding-bottom: 2rem;
        border-bottom: 1px solid #e2e8f0;
    }

    .pricing-card.popular .pricing-card-header {
        border-bottom-color: rgba(255, 255, 255, 0.1);
    }

    .pricing-card-header h3 {
        font-size: 1.35rem;
        color: #0f172a;
        margin-bottom: 1rem;
        font-weight: 700;
    }

    .pricing-card.popular .pricing-card-header h3 {
        color: #e0f2fe;
    }

    .price-box {
        display: flex;
        align-items: flex-start;
        justify-content: center;
        gap: 0.25rem;
        margin-bottom: 1rem;
    }

    .currency {
        font-size: 1.25rem;
        font-weight: 700;
        color: #64748b;
        margin-top: 0.5rem;
    }

    .amount {
        font-size: 4rem;
        font-weight: 800;
        color: #0f172a;
        line-height: 1;
        letter-spacing: -2px;
    }

    .pricing-card.popular .currency,
    .pricing-card.popular .amount {
        color: white;
    }

    .period {
        font-size: 1rem;
        font-weight: 600;
        color: #64748b;
        align-self: flex-end;
        margin-bottom: 0.75rem;
    }

    .pricing-card.popular .period {
        color: #94a3b8;
    }

    .payment-terms {
        font-size: 0.95rem;
        color: #3b82f6;
        background: #eff6ff;
        display: inline-block;
        padding: 0.4rem 1rem;
        border-radius: 8px;
        font-weight: 500;
    }

    .pricing-card.popular .payment-terms {
        background: rgba(59, 130, 246, 0.2);
        color: #93c5fd;
    }

    .pricing-card-body {
        flex-grow: 1;
        margin-bottom: 2.5rem;
    }

    .features-list {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
        gap: 1.25rem;
    }

    .features-list li {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-size: 1.05rem;
        color: #334155;
    }

    .pricing-card.popular .features-list li {
        color: #f1f5f9;
    }

    .features-list li svg {
        width: 22px;
        height: 22px;
        color: #10b981;
        flex-shrink: 0;
    }

    .pricing-card.popular .features-list li svg {
        color: #34d399;
    }

    .features-list li.disabled {
        color: #94a3b8;
    }

    .pricing-card.popular .features-list li.disabled {
        color: #475569;
    }

    .pricing-card-footer {
        margin-top: auto;
    }

    .btn-pricing {
        display: block;
        width: 100%;
        text-align: center;
        padding: 1.1rem;
        border-radius: 12px;
        font-weight: 700;
        font-size: 1.05rem;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .btn-outline {
        background: transparent;
        color: #002147;
        border: 2px solid #cbd5e1;
    }

    .btn-outline:hover {
        border-color: #002147;
        background: #f8fafc;
    }

    .btn-solid {
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        color: white;
        border: 2px solid transparent;
        box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
    }

    .btn-solid:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(59, 130, 246, 0.4);
    }

    @@media (max-width: 1024px) {
        .pricing-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 2.5rem;
        }
        .pricing-card.popular {
            transform: none;
            padding: 2.5rem;
            grid-column: 1 / -1;
            max-width: 500px;
            margin: 0 auto;
            width: 100%;
        }
        .pricing-card.popular:hover {
            transform: translateY(-5px);
        }
    }

    @@media (max-width: 768px) {
        .pricing-section {
            padding: 4rem 0;
        }
        .pricing-header .section-title {
            font-size: 2.25rem;
        }
        .pricing-grid {
            grid-template-columns: 1fr;
            gap: 2rem;
        }
        .pricing-card.popular {
            grid-column: auto;
        }
        .amount {
            font-size: 3.5rem;
        }
    }

    /* PREMIUM INSTALLMENT SWITCH & ANIMATIONS */
    .pricing-toggle-container {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 1rem;
        margin: 2.5rem auto 0;
        background: #f8fafc;
        padding: 0.65rem 1.5rem;
        border-radius: 50px;
        width: fit-content;
        border: 1px solid #e2e8f0;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), inset 0 2px 4px rgba(0, 0, 0, 0.02);
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 50px;
        height: 28px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #cbd5e1;
        transition: .3s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 20px;
        width: 20px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        transition: .3s;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    input:checked + .slider {
        background-color: #3b82f6;
    }

    input:checked + .slider:before {
        transform: translateX(22px);
    }

    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }

    .toggle-label {
        font-size: 0.95rem;
        font-weight: 700;
        color: #64748b;
        cursor: pointer;
        transition: color 0.3s ease;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        user-select: none;
    }

    .toggle-label.active {
        color: #002147;
    }

    .badge-installment {
        background: #3b82f6;
        color: white;
        font-size: 0.75rem;
        padding: 0.15rem 0.5rem;
        border-radius: 50px;
        font-weight: 800;
        text-transform: uppercase;
        animation: pulseBadge 2.5s infinite;
    }

    @@keyframes pulseBadge {
        0% { transform: scale(1); box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.4); }
        70% { transform: scale(1.05); box-shadow: 0 0 0 6px rgba(59, 130, 246, 0); }
        100% { transform: scale(1); box-shadow: 0 0 0 0 rgba(59, 130, 246, 0); }
    }

    .payment-terms {
        transition: all 0.3s ease;
        border: 2px dashed transparent;
    }

    .payment-terms.highlight-installment {
        background: #eff6ff;
        color: #1d4ed8;
        border-color: #3b82f6;
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(59, 130, 246, 0.1);
        font-weight: 700;
        animation: pulseHighlight 2.5s infinite;
    }

    .pricing-card.popular .payment-terms.highlight-installment {
        background: rgba(255, 255, 255, 0.15);
        color: white;
        border-color: rgba(255, 255, 255, 0.3);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    @@keyframes pulseHighlight {
        0% { transform: translateY(-2px) scale(1.02); }
        50% { transform: translateY(-2px) scale(1.06); }
        100% { transform: translateY(-2px) scale(1.02); }
    }

    .amount, .period {
        transition: opacity 0.15s ease, transform 0.15s ease;
    }

    .pricing-animate {
        opacity: 0;
        transform: scale(0.92);
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const cards = document.querySelectorAll('.pricing-card');
    const toggle = document.getElementById('pricing-toggle');
    
    if (!toggle) return;
    
    // Parse cards data
    cards.forEach(card => {
        const amountEl = card.querySelector('.amount');
        const periodEl = card.querySelector('.period');
        const termsEl = card.querySelector('.payment-terms');
        
        if (!amountEl || !termsEl) return;
        
        // 1. Get raw price from text
        const rawPriceText = amountEl.textContent.trim();
        let priceNum = parseFloat(rawPriceText.replace(/\./g, '').replace(',', '.'));
        
        // Handle millions
        if (priceNum < 100) {
            priceNum = priceNum * 1000000;
        }
        
        // 2. Parse payments count from terms text (look for digit before 'x')
        const termsText = termsEl.textContent || termsEl.innerText;
        let paymentsCount = 3; // default fallback
        const match = termsText.match(/(\d+)x/);
        if (match) {
            paymentsCount = parseInt(match[1]);
        }
        
        // 3. Calculate monthly installment
        const monthlyPrice = Math.round(priceNum / paymentsCount);
        
        // Format display values
        const fullPriceDisplay = rawPriceText;
        const fullPeriodDisplay = periodEl ? periodEl.textContent.trim() : '';
        
        let monthlyPriceDisplay = '';
        let monthlyPeriodDisplay = '';
        
        if (monthlyPrice >= 1000000) {
            const formatted = (monthlyPrice / 1000000).toFixed(1).replace('.0', '').replace('.', ',');
            monthlyPriceDisplay = formatted;
            monthlyPeriodDisplay = 'Juta/bln';
        } else {
            const formatted = Math.round(monthlyPrice / 1000).toString();
            monthlyPriceDisplay = formatted;
            monthlyPeriodDisplay = 'Ribu/bln';
        }
        
        // Save attributes
        card.dataset.fullPrice = fullPriceDisplay;
        card.dataset.fullPeriod = fullPeriodDisplay;
        card.dataset.monthlyPrice = monthlyPriceDisplay;
        card.dataset.monthlyPeriod = monthlyPeriodDisplay;
    });
    
    // Switch handler
    toggle.addEventListener('change', () => {
        const isInstallment = toggle.checked;
        const fullLabels = document.querySelectorAll('.toggle-label.text-full');
        const instLabels = document.querySelectorAll('.toggle-label.text-installment');
        
        if (isInstallment) {
            fullLabels.forEach(l => l.classList.remove('active'));
            instLabels.forEach(l => l.classList.add('active'));
        } else {
            fullLabels.forEach(l => l.classList.add('active'));
            instLabels.forEach(l => l.classList.remove('active'));
        }
        
        cards.forEach(card => {
            const amountEl = card.querySelector('.amount');
            const periodEl = card.querySelector('.period');
            const termsEl = card.querySelector('.payment-terms');
            
            if (!amountEl) return;
            
            // Trigger animation
            amountEl.classList.add('pricing-animate');
            if (periodEl) periodEl.classList.add('pricing-animate');
            
            setTimeout(() => {
                if (isInstallment) {
                    amountEl.textContent = card.dataset.monthlyPrice;
                    if (periodEl) {
                        periodEl.textContent = card.dataset.monthlyPeriod;
                        periodEl.style.display = 'inline';
                    }
                    if (termsEl) {
                        termsEl.classList.add('highlight-installment');
                    }
                } else {
                    amountEl.textContent = card.dataset.fullPrice;
                    if (periodEl) {
                        if (card.dataset.fullPeriod) {
                            periodEl.textContent = card.dataset.fullPeriod;
                            periodEl.style.display = 'inline';
                        } else {
                            periodEl.style.display = 'none';
                        }
                    }
                    if (termsEl) {
                        termsEl.classList.remove('highlight-installment');
                    }
                }
                
                // Fade back in
                setTimeout(() => {
                    amountEl.classList.remove('pricing-animate');
                    if (periodEl) periodEl.classList.remove('pricing-animate');
                }, 50);
            }, 150);
        });
    });
    
    // Allow clicking the labels to toggle
    const textFull = document.querySelector('.toggle-label.text-full');
    const textInstallment = document.querySelector('.toggle-label.text-installment');
    
    if (textFull && textInstallment) {
        textFull.addEventListener('click', () => {
            if (toggle.checked) {
                toggle.checked = false;
                toggle.dispatchEvent(new Event('change'));
            }
        });
        textInstallment.addEventListener('click', () => {
            if (!toggle.checked) {
                toggle.checked = true;
                toggle.dispatchEvent(new Event('change'));
            }
        });
    }
});
</script>
