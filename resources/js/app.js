require('./bootstrap');
window.Vue = require('vue');

import Vue from 'vue';
import VueRouter from 'vue-router';
import Vuex from 'vuex';
import Vuetify from 'vuetify';

Vue.use(Vuetify);
Vue.use(VueRouter);
Vue.use(Vuex);

import home from './pages/home.vue';
import login from './pages/login.vue';
import register from './pages/register.vue';
import shipping from './pages/shipping.vue';
import contact from './pages/contact.vue';

const routes = [
    { path: '', name: 'home', component: home },
    { path: '/', name: 'home', component: home },
    { path: '/login', name: 'login', component: login },
    { path: '/register', name: 'register', component: register },
    { path: '/shipping', name: 'shipping', component: shipping },
    { path: '/contact', name: 'contact', component: contact },
    { path: '*', redirect: '/' }
];

const router = new VueRouter({
    routes: routes
});

Vue.component('navbar', require('./components/layout/navbar.vue').default);

const app = new Vue({
    el: '#app',
    router: router
});