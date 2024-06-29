import { createRouter, createWebHistory } from 'vue-router';
import About from '../views/About.vue';
import Cuisine from '../views/Cuisine.vue';
import Menus from '../views/Menus.vue';
import Reservations from '../views/Reservations.vue';
import PrivateDining from '../views/PrivateDining.vue';

const routes = [
  { path: '/about', name: 'About', component: About },
  { path: '/cuisine', name: 'Cuisine', component: Cuisine },
  { path: '/menus', name: 'Menus', component: Menus },
  { path: '/reservations', name: 'Reservations', component: Reservations },
  { path: '/private-dining', name: 'PrivateDining', component: PrivateDining },
];

const router = createRouter({
  history: createWebHistory('/'), // Utilisation d'un chemin de base statique
  routes,
});

export default router;
