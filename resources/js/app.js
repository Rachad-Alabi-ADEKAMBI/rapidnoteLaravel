import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';

import {createApp} from 'vue'

const app = createApp({

})

import Rates from '@/components/Rates.vue'

app.component('Rates', Rates)
app.mount("#app")

window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();




