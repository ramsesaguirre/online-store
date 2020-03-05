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
    },
    {
        path: '/admin',
        component: () =>
            import ('./admin/views/dashboard/Index.vue'),
        children: [{
                name: 'Dashboard',
                path: '/home',
                component: () =>
                    import ('./admin/views/dashboard/Dashboard.vue'),
            },
            {
                name: 'User Profile',
                path: '/pages/user',
                component: () =>
                    import ('./admin/views/dashboard/pages/UserProfile'),
            },
            {
                name: 'Notifications',
                path: '/components/notifications',
                component: () =>
                    import ('./admin/views/dashboard/component/Notifications'),
            },
            {
                name: 'Icons',
                path: '/components/icons',
                component: () =>
                    import ('./admin/views/dashboard/component/Icons'),
            },
            {
                name: 'Typography',
                path: '/components/typography',
                component: () =>
                    import ('./admin/views/dashboard/component/Typography'),
            },
            {
                name: 'Regular Tables',
                path: '/tables/regular-tables',
                component: () =>
                    import ('./admin/views/dashboard/tables/RegularTables'),
            },
            {
                name: 'Google Maps',
                path: '/maps/google-maps',
                component: () =>
                    import ('./admin/views/dashboard/maps/GoogleMaps'),
            },
        ]
    }
]