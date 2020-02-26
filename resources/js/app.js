require('./bootstrap');

window.Vue = require('vue');

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

Vue.component('navbar', require('./components/layout/navbar.vue').default);

const app = new Vue({
    el: '#app',
    router: router
});