require('./bootstrap');
window.Vue = require('vue');
Vue.config.debug = true;

import Vue from 'vue';
import VueRouter from 'vue-router';
//import Vuex from 'vuex';
//import Vuetify from 'vuetify';
//import 'vuetify/dist/vuetify.min.css';

import store from './admin/store'
import './admin/plugins/base'
import './admin/plugins/vee-validate'
import './admin/plugins/chartist'
import vuetify from './admin/plugins/vuetify';
import i18n from './admin/i18n'

//Vue.use(Vuetify);
Vue.use(VueRouter);
//Vue.use(Vuex);

import Router from './routes.js';

const router = new VueRouter({
    mode: 'hash',
    base: process.env.BASE_URL,
    routes: Router
});

Vue.component('nav-bar', require('./components/layout/navbar.vue').default);
Vue.component('footer-page', require('./components/layout/footer.vue').default);


const app = new Vue({
    el: '#app',
    store,
    vuetify,
    i18n,
    router: router,
});