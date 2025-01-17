// import './assets/main.css';
import { createApp } from 'vue';
import App from './App.vue';
import router from './router';

import BootstrapVue3 from 'bootstrap-vue-3';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue-3/dist/bootstrap-vue-3.css';

const app = createApp(App);

// Install BootstrapVue
app.use(BootstrapVue3);

// Supprimez cette ligne car IconsPlugin n'existe pas dans bootstrap-vue-3
// app.use(IconsPlugin);

app.use(router);  // Utiliser le routeur

app.mount('#app');
