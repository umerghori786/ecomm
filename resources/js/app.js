import './bootstrap';


import {createApp} from 'vue'

import App from './App.vue';
import router from './routes.js';
import './assets/css/style.css';
import './assets/css/plugins/swiper-bundle.min.css';
import './assets/img/favicon.ico';
import './assets/css/plugins/glightbox.min.css';
import './assets/js/plugins/swiper-bundle.min.js';
import './assets/js/plugins/glightbox.min.js';
import './assets/js/script.js';


createApp(App).use(router).mount("#app")