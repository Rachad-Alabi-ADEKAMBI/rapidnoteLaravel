import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';

import {createApp} from 'vue'

const app = createApp({

})

import Wallet from '@/components/Wallet.vue'
import Rates from '@/components/Rates.vue'
import MyTransactions from '@/components/MyTransactions.vue'

app.component('Rates', Rates)
app.component('Wallet', Wallet)
app.component('MyTransactions', MyTransactions)
app.mount("#app")

window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();




