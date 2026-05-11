<script setup lang="ts">
import { MessageCircle, Calculator, FileText, Rocket, ArrowRight } from 'lucide-vue-next';

const steps = [
    {
        number: '01',
        icon: Calculator,
        title: 'Rakit Paket Anda',
        description: 'Gunakan kalkulator di atas untuk memilih fitur website sesuai kebutuhan dan budget bisnis Anda.',
        highlight: 'Gratis konsultasi',
    },
    {
        number: '02',
        icon: MessageCircle,
        title: 'Chat WhatsApp',
        description: 'Klik "Pesan Sekarang" untuk langsung terhubung ke WhatsApp kami dengan detail pesanan otomatis terisi.',
        highlight: 'Respon cepat',
    },
    {
        number: '03',
        icon: FileText,
        title: 'Konfirmasi & DP',
        description: 'Kami akan konfirmasi pesanan Anda. Bayar DP 50% untuk memulai pengerjaan website.',
        highlight: 'DP 50%',
    },
    {
        number: '04',
        icon: Rocket,
        title: 'Website Online',
        description: 'Website Anda selesai dalam 3-7 hari. Pelunasan saat website sudah live dan Anda puas.',
        highlight: 'Revisi 3x gratis',
    },
];
</script>

<template>
    <section id="langkah" class="steps-section">
        <div class="steps-container">
            <div class="steps-header">
                <div class="badge-mini">Proses Mudah</div>
                <h2 class="section-title">Cara Pesan Website <span>UMKM Anda</span></h2>
                <p class="section-subtitle">
                    Hanya 4 langkah sederhana untuk memiliki website profesional. Tanpa ribet, tanpa teknis, kami bantu sepenuhnya dari awal sampai online!
                </p>
            </div>

            <div class="steps-grid">
                <div v-for="(step, index) in steps" :key="step.number" class="step-card">
                    <div class="step-number">{{ step.number }}</div>

                    <div class="step-icon-wrapper">
                        <component :is="step.icon" class="step-icon" />
                    </div>

                    <h3 class="step-title">{{ step.title }}</h3>
                    <p class="step-description">{{ step.description }}</p>

                    <div class="step-footer">
                        <span class="step-highlight">{{ step.highlight }}</span>
                    </div>

                    <div v-if="index < steps.length - 1" class="step-arrow-mobile">
                        <ArrowRight class="arrow-icon" />
                    </div>
                </div>
            </div>

            <div class="steps-cta">
                <div class="cta-box glass-effect">
                    <div class="cta-visual">
                        <div class="pulse-icon">💬</div>
                    </div>
                    <div class="cta-content">
                        <h3>Masih bingung memilih fitur?</h3>
                        <p>Jangan ragu untuk berkonsultasi secara gratis. Kami akan bantu rekomendasikan paket yang paling efektif untuk budget dan jenis bisnis Anda.</p>
                    </div>
                    <a href="https://wa.me/6285859044929?text=Halo%20DarkandBright,%20saya%20butuh%20bantuan%20memilih%20paket%20website" target="_blank" class="cta-btn">
                        <span>Konsultasi Gratis Sekarang</span>
                        <ArrowRight class="btn-icon" />
                    </a>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
.steps-section {
    padding: 8rem 7%;
    background-color: #fcfdfe;
    position: relative;
    overflow: hidden;
}

.steps-container {
    max-width: 1400px;
    margin: 0 auto;
    position: relative;
    z-index: 2;
}

.steps-header {
    text-align: center;
    margin-bottom: 5rem;
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
    max-width: 700px;
    margin: 0 auto;
    line-height: 1.6;
}

.steps-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 2.5rem;
    position: relative;
}

.step-card {
    background: white;
    border-radius: 32px;
    padding: 3rem 2rem;
    text-align: center;
    border: 1px solid #f1f5f9;
    position: relative;
    transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02);
    display: flex;
    flex-direction: column;
    height: 100%;
}

.step-card:hover {
    transform: translateY(-15px);
    box-shadow: 0 30px 60px -15px rgba(0, 33, 71, 0.1);
    border-color: #3b82f6;
}

.step-number {
    position: absolute;
    top: 20px;
    right: 25px;
    font-size: 3rem;
    font-weight: 900;
    color: #f1f5f9;
    line-height: 1;
    z-index: 1;
    transition: color 0.3s ease;
}

.step-card:hover .step-number {
    color: #eff6ff;
}

.step-icon-wrapper {
    width: 80px;
    height: 80px;
    background: #f8fafc;
    border-radius: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 2rem;
    transition: all 0.4s ease;
    position: relative;
    z-index: 2;
    border: 1px solid #f1f5f9;
}

.step-card:hover .step-icon-wrapper {
    background: #002147;
    transform: rotate(10deg);
}

.step-icon {
    width: 32px;
    height: 32px;
    color: #002147;
    transition: all 0.4s ease;
}

.step-card:hover .step-icon {
    color: white;
}

.step-title {
    font-size: 1.35rem;
    color: #0f172a;
    font-weight: 800;
    margin-bottom: 1rem;
    position: relative;
    z-index: 2;
}

.step-description {
    font-size: 0.95rem;
    color: #64748b;
    line-height: 1.6;
    margin-bottom: 2rem;
    flex-grow: 1;
}

.step-highlight {
    display: inline-block;
    background: #f0f7ff;
    color: #3b82f6;
    font-size: 0.75rem;
    font-weight: 800;
    padding: 0.5rem 1rem;
    border-radius: 50px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.step-card:hover .step-highlight {
    background: #3b82f6;
    color: white;
}

/* CTA Box */
.steps-cta {
    margin-top: 6rem;
}

.glass-effect {
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(226, 232, 240, 0.8);
    border-radius: 32px;
    box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.05);
}

.cta-box {
    background: linear-gradient(135deg, #002147 0%, #0c3461 100%);
    color: white;
    padding: 3rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 3rem;
    position: relative;
    overflow: hidden;
}

.cta-visual {
    width: 80px;
    height: 80px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.pulse-icon {
    font-size: 2rem;
    animation: pulseIcon 2s infinite;
}

@keyframes pulseIcon {
    0% { transform: scale(1); }
    50% { transform: scale(1.2); }
    100% { transform: scale(1); }
}

.cta-content {
    flex-grow: 1;
}

.cta-content h3 {
    font-size: 1.75rem;
    font-weight: 800;
    margin-bottom: 0.75rem;
    letter-spacing: -0.5px;
}

.cta-content p {
    color: #cbd5e1;
    font-size: 1.1rem;
    line-height: 1.5;
}

.cta-btn {
    background: white;
    color: #002147;
    text-decoration: none;
    padding: 1.25rem 2.5rem;
    border-radius: 20px;
    font-weight: 800;
    font-size: 1.05rem;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 1rem;
    flex-shrink: 0;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
}

.cta-btn:hover {
    transform: scale(1.05);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
}

.btn-icon {
    width: 20px;
    height: 20px;
}

/* Responsive */
@media (max-width: 1200px) {
    .steps-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 2rem;
    }
}

@media (max-width: 900px) {
    .cta-box {
        flex-direction: column;
        text-align: center;
        padding: 3rem 2rem;
    }

    .cta-visual { margin: 0 auto; }

    .cta-btn { width: 100%; justify-content: center; }
}

@media (max-width: 640px) {
    .steps-section { padding: 5rem 5%; }
    .section-title { font-size: 2.25rem; }
    .steps-grid { grid-template-columns: 1fr; }
    .step-card { padding: 3rem 2rem; }
}
</style>
