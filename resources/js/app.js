require('./bootstrap');

import { createApp } from 'vue'

// Libraries -----------------------------------------------------------------------------------------------------------
import PrimeVue from 'primevue/config'
import ToastService from 'primevue/toastservice'
import Toast from 'primevue/toast'

// Components ----------------------------------------------------------------------------------------------------------
import App from 'cmp/App'

// Options -------------------------------------------------------------------------------------------------------------
import router from 'app/router'
import store from 'app/store'

// Application ---------------------------------------------------------------------------------------------------------
const app = createApp(App)

app.use(PrimeVue)
app.use(ToastService)
app.use(router)
app.use(store)

app.component('Toast', Toast)

app.mount("#app");
