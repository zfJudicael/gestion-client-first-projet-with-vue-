import './assets/style.css'

import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import axios from 'axios';
import VueAxios from 'vue-axios';
import { createPinia } from 'pinia'

const app = createApp(App)
const pinia = createPinia()

app.use(pinia);
app.use(router);
app.use(VueAxios, axios);

app.mount('#app')
