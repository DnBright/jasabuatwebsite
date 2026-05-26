import { createApp } from 'vue';
import OrderSteps from '@/components/OrderSteps.vue';

// Mount OrderSteps ke DOM jika elemen tersedia
document.addEventListener('DOMContentLoaded', () => {
    const stepsMountPoint = document.getElementById('order-steps-vue');
    if (stepsMountPoint) {
        const app = createApp(OrderSteps);
        app.mount(stepsMountPoint);
    }
});
