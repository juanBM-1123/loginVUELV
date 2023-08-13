import './assets/main.css'
import axios from 'axios'
import router from './router'

import { createApp } from 'vue'
import { createPinia } from 'pinia'
import piniaPluginPersistedstate from 'pinia-plugin-persistedstate';

import App from './App.vue'

window.axios = axios;
window.axios.defaults.withCredentials = true;
window.axios.defaults.headers.common["Accept"]="application/json";
window.axios.defaults.headers.common["Content-Type"]="application/json";
window.axios.defaults.headers.common["X-Requested-With"]="XMLHttpRequest";

const pinia = createPinia();
pinia.use(piniaPluginPersistedstate);
const app = createApp(App)
app.use(pinia)
app.use(router)

app.mount('#app')
