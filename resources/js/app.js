require('./bootstrap');
window.Vue = require('vue');
Vue.config.debug = true;

import Vue from 'vue';
import VueRouter from 'vue-router';
import Vuex from 'vuex';
import Vuetify from 'vuetify';

Vue.use(Vuetify);
Vue.use(VueRouter);
Vue.use(Vuex);

import Router from './routes.js';

const router = new VueRouter({
    routes: Router
});

Vue.component('nav-bar', require('./components/layout/navbar.vue').default);
Vue.component('footer-page', require('./components/layout/footer.vue').default);


const app = new Vue({
    el: '#app',
    router: router,
});