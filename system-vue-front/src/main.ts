import { createApp } from 'vue'
import { createPinia } from 'pinia'


import router  from '@/router'
// Bootstrap
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap/dist/js/bootstrap.bundle.min.js'

// FontAwesome
import '@fortawesome/fontawesome-free/css/all.min.css'

import './assets/css/main.css'
import App from './App.vue'

createApp(App)
.use(createPinia())
.use(router)

.mount('#app')
