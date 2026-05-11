<script setup lang="ts">
import { ref, computed, onMounted } from 'vue';
import { Check, Calculator, Store, Palette, Smartphone, Globe, Shield, Headphones, Wrench, Sparkles, ChevronRight, Info } from 'lucide-vue-next';

// Tipe bisnis (untuk konteks/rekomendasi)
const businessTypes = [
    { id: 'kuliner', name: 'Kuliner & F&B', icon: Store, color: '#f59e0b' },
    { id: 'fashion', name: 'Fashion & Retail', icon: Palette, color: '#ec4899' },
    { id: 'jasa', name: 'Jasa & Profesional', icon: Headphones, color: '#3b82f6' },
    { id: 'properti', name: 'Properti & Travel', icon: Globe, color: '#8b5cf6' },
    { id: 'lainnya', name: 'Bisnis Lainnya', icon: Sparkles, color: '#10b981' },
];

const selectedBusinessType = ref('kuliner');

// Fitur dari API
interface Feature {
    id: number;
    name: string;
    slug: string;
    description: string;
    price: number;
    is_recommended: boolean;
}

const contentFeatures = ref<Feature[]>([]);
const supportServices = ref<Feature[]>([]);
const loading = ref(true);
const error = ref('');

// Fetch data dari API
const fetchFeatures = async () => {
    try {
        const response = await fetch('/api/calculator-features');
        if (!response.ok) throw new Error('Failed to fetch');
        const data = await response.json();
        contentFeatures.value = data.contentFeatures || [];
        supportServices.value = data.supportServices || [];
    } catch (err) {
        error.value = 'Gagal memuat data fitur';
        console.error(err);
    } finally {
        loading.value = false;
    }
};

onMounted(fetchFeatures);

const selectedFeatures = ref<Set<number>>(new Set());

const toggleFeature = (id: number) => {
    if (selectedFeatures.value.has(id)) {
        selectedFeatures.value.delete(id);
    } else {
        selectedFeatures.value.add(id);
    }
};

// Total harga
const totalPrice = computed(() => {
    let total = 0;

    contentFeatures.value.forEach(feature => {
        if (selectedFeatures.value.has(feature.id)) {
            total += feature.price;
        }
    });

    supportServices.value.forEach(service => {
        if (selectedFeatures.value.has(service.id)) {
            total += service.price;
        }
    });

    return total;
});

// Ringkasan pesanan
const selectedItems = computed(() => {
    const items: { name: string; price: number }[] = [];

    contentFeatures.value.forEach(feature => {
        if (selectedFeatures.value.has(feature.id)) {
            items.push({ name: feature.name, price: feature.price });
        }
    });

    supportServices.value.forEach(service => {
        if (selectedFeatures.value.has(service.id)) {
            items.push({ name: service.name, price: service.price });
        }
    });

    return items;
});

// Generate pesan WhatsApp
const whatsappMessage = computed(() => {
    const businessName = businessTypes.find(b => b.id === selectedBusinessType.value)?.name || 'Bisnis';

    let message = `Halo DarkandBright! 👋\n\n`;
    message += `Saya tertarik membuat website untuk bisnis saya.\n\n`;
    message += `*Jenis Bisnis:* ${businessName}\n`;
    message += `*Fitur yang dipilih:*\n`;

    if (selectedItems.value.length === 0) {
        message += `- (Belum memilih fitur)\n`;
    } else {
        selectedItems.value.forEach(item => {
            message += `- ${item.name}\n`;
        });
    }

    message += `\n*Estimasi Total:* Rp ${formatPrice(totalPrice.value)}\n\n`;
    message += `Mohon informasi lebih lanjut. Terima kasih! 🙏`;

    return encodeURIComponent(message);
});

const formatPrice = (price: number) => {
    return price.toLocaleString('id-ID');
};

const openWhatsApp = () => {
    const phone = '6285859044929';
    const url = `https://wa.me/${phone}?text=${whatsappMessage.value}`;
    window.open(url, '_blank');
};
</script>

<template>
    <section id="kalkulator" class="calculator-section">
        <div class="calculator-container">
            <div class="calculator-header">
                <div class="badge-mini">Kalkulator Harga</div>
                <h2 class="section-title">Rakit Paket <span>Website Anda</span></h2>
                <p class="section-subtitle">
                    Pilih fitur sesuai kebutuhan bisnis Anda. Tidak ada biaya tersembunyi, transparan sepenuhnya!
                </p>
            </div>

            <div class="calculator-grid">
                <!-- Left: Pilihan Fitur -->
                <div class="calculator-left">
                    <!-- Pilihan Jenis Bisnis -->
                    <div class="selection-group glass-effect">
                        <div class="group-header">
                            <div class="step-num">1</div>
                            <h3 class="group-title">Pilih Jenis Bisnis</h3>
                        </div>
                        <div class="business-types">
                            <button
                                v-for="type in businessTypes"
                                :key="type.id"
                                @click="selectedBusinessType = type.id"
                                :class="['business-btn', { active: selectedBusinessType === type.id }]"
                                :style="{ '--active-color': type.color }"
                            >
                                <component :is="type.icon" class="btn-icon" />
                                <span>{{ type.name }}</span>
                            </button>
                        </div>
                    </div>

                    <!-- Loading State -->
                    <div v-if="loading" class="selection-group glass-effect">
                        <div class="text-center py-12 text-slate-400">
                            <Calculator class="w-10 h-10 mx-auto animate-bounce mb-4 text-slate-300" />
                            <p class="font-bold">Menyiapkan fitur terbaik...</p>
                        </div>
                    </div>

                    <!-- Error State -->
                    <div v-else-if="error" class="selection-group glass-effect">
                        <div class="text-center py-12 text-red-500">
                            <p class="font-bold">{{ error }}</p>
                            <button @click="fetchFeatures" class="mt-4 px-6 py-2 bg-red-100 rounded-full text-red-600 font-bold hover:bg-red-200 transition-colors">Coba Lagi</button>
                        </div>
                    </div>

                    <!-- Fitur Tambahan -->
                    <div v-else class="selection-group glass-effect">
                        <div class="group-header">
                            <div class="step-num">2</div>
                            <h3 class="group-title">Pilih Fitur Website</h3>
                        </div>
                        <div class="features-grid">
                            <label
                                v-for="feature in contentFeatures"
                                :key="feature.id"
                                :class="['feature-card', { selected: selectedFeatures.has(feature.id) }]"
                            >
                                <input
                                    type="checkbox"
                                    :checked="selectedFeatures.has(feature.id)"
                                    @change="toggleFeature(feature.id)"
                                    class="hidden"
                                />
                                <div class="feature-content">
                                    <div class="feature-header">
                                        <div class="checkbox-indicator">
                                            <Check v-if="selectedFeatures.has(feature.id)" class="check-icon" />
                                        </div>
                                        <span class="feature-name">{{ feature.name }}</span>
                                    </div>
                                    <p class="feature-description">{{ feature.description }}</p>
                                    <span class="feature-price">Rp {{ formatPrice(feature.price) }}</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Layanan Dukungan -->
                    <div v-if="!loading && !error" class="selection-group glass-effect">
                        <div class="group-header">
                            <div class="step-num">3</div>
                            <h3 class="group-title">Layanan Dukungan</h3>
                        </div>
                        <div class="features-grid">
                            <label
                                v-for="service in supportServices"
                                :key="service.id"
                                :class="['feature-card', { selected: selectedFeatures.has(service.id), recommended: service.is_recommended }]"
                            >
                                <input
                                    type="checkbox"
                                    :checked="selectedFeatures.has(service.id) || service.is_recommended"
                                    @change="toggleFeature(service.id)"
                                    class="hidden"
                                    :disabled="service.is_recommended"
                                />
                                <div class="feature-content">
                                    <div class="feature-header">
                                        <div class="checkbox-indicator">
                                            <Check v-if="selectedFeatures.has(service.id) || service.is_recommended" class="check-icon" />
                                        </div>
                                        <span class="feature-name">{{ service.name }}</span>
                                        <span v-if="service.is_recommended" class="badge-gratis">GRATIS</span>
                                    </div>
                                    <p class="feature-description">{{ service.description }}</p>
                                    <span class="feature-price">
                                        {{ service.price === 0 ? 'GRATIS' : `Rp ${formatPrice(service.price)}` }}
                                    </span>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Right: Ringkasan -->
                <div class="calculator-right">
                    <div class="summary-card glass-effect">
                        <h3 class="summary-title">Ringkasan Pesanan</h3>

                        <div class="summary-content">
                            <div v-if="selectedItems.length === 0" class="empty-state">
                                <div class="empty-icon">💡</div>
                                <p>Belum ada fitur dipilih</p>
                                <span class="empty-hint">Silakan pilih fitur di sebelah kiri untuk melihat estimasi harga.</span>
                            </div>

                            <div v-else class="summary-list">
                                <div v-for="(item, index) in selectedItems" :key="index" class="summary-item">
                                    <div class="item-info">
                                        <div class="dot"></div>
                                        <span class="item-name">{{ item.name }}</span>
                                    </div>
                                    <span class="item-price">Rp {{ formatPrice(item.price) }}</span>
                                </div>
                            </div>

                            <div class="summary-divider"></div>

                            <div class="summary-total">
                                <span class="total-label">Estimasi Total</span>
                                <div class="total-price-box">
                                    <span class="currency">Rp</span>
                                    <span class="total-price">{{ formatPrice(totalPrice) }}</span>
                                </div>
                            </div>
                        </div>

                        <button @click="openWhatsApp" class="order-btn" :disabled="selectedItems.length === 0">
                            <span>Pesan Website Sekarang</span>
                            <ChevronRight class="btn-arrow" />
                        </button>

                        <div class="info-box">
                            <Info class="info-icon" />
                            <p>Harga final akan dikonfirmasi kembali saat konsultasi.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
.calculator-section {
    padding: 8rem 7%;
    background-color: #ffffff;
    position: relative;
    overflow: hidden;
}

.calculator-container {
    max-width: 1400px;
    margin: 0 auto;
    position: relative;
    z-index: 2;
}

.calculator-header {
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

.calculator-grid {
    display: grid;
    grid-template-columns: 1fr 400px;
    gap: 3rem;
}

/* Glass Effect */
.glass-effect {
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(226, 232, 240, 0.8);
    border-radius: 32px;
    box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.05);
}

/* Left Side */
.calculator-left {
    display: flex;
    flex-direction: column;
    gap: 2.5rem;
}

.selection-group {
    padding: 2.5rem;
    transition: all 0.3s ease;
}

.selection-group:hover {
    box-shadow: 0 20px 40px -15px rgba(0, 33, 71, 0.05);
}

.group-header {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 2rem;
}

.step-num {
    width: 32px;
    height: 32px;
    background: #002147;
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 800;
    font-size: 0.9rem;
}

.group-title {
    font-size: 1.25rem;
    color: #0f172a;
    font-weight: 800;
    letter-spacing: -0.5px;
}

/* Business Types */
.business-types {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
}

.business-btn {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 1rem 1.5rem;
    border: 2px solid #f1f5f9;
    border-radius: 16px;
    background: white;
    color: #64748b;
    font-weight: 700;
    font-size: 0.95rem;
    cursor: pointer;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.business-btn:hover {
    border-color: #e2e8f0;
    transform: translateY(-3px);
}

.business-btn.active {
    border-color: var(--active-color, #002147);
    background: var(--active-color, #002147);
    color: white;
    box-shadow: 0 10px 20px -5px var(--active-color, rgba(0, 33, 71, 0.3));
}

.btn-icon {
    width: 20px;
    height: 20px;
}

/* Features Grid */
.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 1.25rem;
}

.feature-card {
    position: relative;
    border: 2px solid #f1f5f9;
    border-radius: 20px;
    padding: 1.5rem;
    cursor: pointer;
    transition: all 0.3s ease;
    background: white;
}

.feature-card:hover {
    border-color: #cbd5e1;
    transform: translateY(-5px);
}

.feature-card.selected {
    border-color: #3b82f6;
    background: #f0f7ff;
}

.feature-card.recommended {
    border-color: #10b981;
    background: #f0fdf4;
}

.feature-content {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

.feature-header {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.checkbox-indicator {
    width: 24px;
    height: 24px;
    border: 2px solid #e2e8f0;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    transition: all 0.3s ease;
}

.feature-card.selected .checkbox-indicator {
    background: #3b82f6;
    border-color: #3b82f6;
}

.feature-card.recommended .checkbox-indicator {
    background: #10b981;
    border-color: #10b981;
}

.check-icon {
    width: 14px;
    height: 14px;
    color: white;
}

.feature-name {
    font-weight: 800;
    color: #0f172a;
    font-size: 1rem;
}

.badge-gratis {
    background: #10b981;
    color: white;
    font-size: 0.65rem;
    font-weight: 900;
    padding: 0.25rem 0.6rem;
    border-radius: 6px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.feature-description {
    font-size: 0.9rem;
    color: #64748b;
    line-height: 1.5;
    padding-left: 2.25rem;
}

.feature-price {
    font-weight: 800;
    color: #002147;
    font-size: 1.1rem;
    padding-left: 2.25rem;
}

.hidden {
    position: absolute;
    opacity: 0;
    pointer-events: none;
}

/* Right Side: Summary */
.calculator-right {
    position: sticky;
    top: 100px;
    height: fit-content;
}

.summary-card {
    padding: 2.5rem;
    border-color: #3b82f6;
}

.summary-title {
    font-size: 1.5rem;
    color: #0f172a;
    font-weight: 800;
    margin-bottom: 2rem;
    letter-spacing: -0.5px;
}

.summary-content {
    margin-bottom: 2.5rem;
}

.empty-state {
    text-align: center;
    padding: 3rem 0;
}

.empty-icon {
    font-size: 2.5rem;
    margin-bottom: 1rem;
}

.empty-state p {
    font-weight: 800;
    color: #0f172a;
    margin-bottom: 0.5rem;
}

.empty-hint {
    font-size: 0.9rem;
    color: #94a3b8;
    line-height: 1.5;
    display: block;
}

.summary-list {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.summary-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 0.95rem;
}

.item-info {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    flex: 1;
}

.dot {
    width: 6px;
    height: 6px;
    background: #3b82f6;
    border-radius: 50%;
}

.item-name {
    color: #475569;
    font-weight: 600;
}

.item-price {
    color: #0f172a;
    font-weight: 800;
}

.summary-divider {
    height: 1px;
    background: #e2e8f0;
    margin: 2rem 0;
}

.summary-total {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.total-label {
    font-size: 0.9rem;
    font-weight: 700;
    color: #64748b;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.total-price-box {
    display: flex;
    align-items: baseline;
    gap: 0.5rem;
}

.currency {
    font-size: 1.25rem;
    font-weight: 800;
    color: #002147;
}

.total-price {
    font-size: 2.5rem;
    font-weight: 800;
    color: #002147;
    letter-spacing: -2px;
}

.order-btn {
    width: 100%;
    background: linear-gradient(135deg, #002147 0%, #0c3461 100%);
    color: white;
    border: none;
    padding: 1.25rem;
    border-radius: 20px;
    font-weight: 700;
    font-size: 1.1rem;
    cursor: pointer;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.75rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 15px 30px -10px rgba(0, 33, 71, 0.3);
}

.order-btn:not(:disabled):hover {
    transform: translateY(-5px);
    box-shadow: 0 25px 50px -12px rgba(0, 33, 71, 0.4);
}

.order-btn:disabled {
    opacity: 0.5;
    cursor: not-allowed;
    filter: grayscale(1);
}

.btn-arrow {
    width: 20px;
    height: 20px;
}

.info-box {
    display: flex;
    gap: 0.75rem;
    padding: 1rem;
    background: #f8fafc;
    border-radius: 16px;
}

.info-icon {
    width: 18px;
    height: 18px;
    color: #3b82f6;
    flex-shrink: 0;
}

.info-box p {
    font-size: 0.8rem;
    color: #64748b;
    line-height: 1.4;
    margin: 0;
}

/* Responsive */
@media (max-width: 1100px) {
    .calculator-grid {
        grid-template-columns: 1fr;
    }

    .calculator-right {
        position: relative;
        top: 0;
        order: -1;
    }
}

@media (max-width: 768px) {
    .calculator-section { padding: 5rem 5%; }
    .section-title { font-size: 2.25rem; }
    .selection-group { padding: 1.5rem; }
    .features-grid { grid-template-columns: 1fr; }
    .total-price { font-size: 2rem; }
}
</style>
