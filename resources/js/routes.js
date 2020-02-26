import home from './pages/home.vue';
import login from './pages/login.vue';
import register from './pages/register.vue';
import shipping from './pages/shipping.vue';
import contact from './pages/contact.vue';

export default [
    { path: '', name: 'home', component: home },
    { path: '/', name: 'home', component: home },
    { path: '/login', name: 'login', component: login },
    { path: '/register', name: 'register', component: register },
    { path: '/shipping', name: 'shipping', component: shipping },
    { path: '/contact', name: 'contact', component: contact },
    { path: '*', redirect: '/' }
]