import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';

import {createApp} from 'vue'

const app = createApp({

})

import Wallet from '@/components/Wallet.vue'
import Wallet2 from '@/components/Wallet2.vue'
import Rates from '@/components/Rates.vue'
import Buy from '@/components/users/Buy.vue'

import Rates2 from '@/components/admin/Rates2.vue'
import Transactions from '@/components/admin/Transactions.vue'
import Users from '@/components/admin/Users.vue'
import Payments from '@/components/admin/Payments.vue'
import Rate from '@/components/admin/Rate.vue'

app.component('Wallet', Wallet)
app.component('Wallet2', Wallet2)
app.component('Rates', Rates)
app.component('Buy', Buy)

app.component('Rates2', Rates2)
app.component('Rate', Rate)
app.component('Transactions', Transactions)
app.component('Users', Users)
app.component('Payments', Payments)

app.mount("#app")

window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();




