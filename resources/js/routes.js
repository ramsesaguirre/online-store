export default [{
        path: '/',
        name: 'home',
        component: () =>
            import ('./pages/home.vue')
    },
    {
        path: '/login',
        name: 'login',
        component: () =>
            import ('./pages/login.vue')
    },
    {
        path: '/register',
        name: 'register',
        component: () =>
            import ('./pages/register.vue')
    },
    {
        path: '/shipping',
        name: 'shipping',
        component: () =>
            import ('./pages/shipping.vue')
    },
    {
        path: '/contact',
        name: 'contact',
        component: () =>
            import ('./pages/contact.vue')
    },
    {
        path: '/terms',
        name: 'terms',
        component: () =>
            import ('./pages/terms.vue')
    },
    {
        path: '/faqs',
        name: 'faqs',
        component: () =>
            import ('./pages/faqs.vue')
    },
    {
        path: '/special',
        name: 'special',
        component: () =>
            import ('./pages/special.vue')
    },
    {
        path: '*',
        redirect: '/'
    }
]