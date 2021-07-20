require('./bootstrap');

import { createApp } from 'vue'
import App from './components/App'

// Options
import { router } from 'app/router'

createApp(App)
    .use(router)
    .mount("#app");
