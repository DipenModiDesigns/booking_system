import './bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';

import {createApp} from 'vue'
import router from './routes';

import App from './App.vue'

const appInstance = createApp(App);
appInstance.use(router);

appInstance.mount('#app');