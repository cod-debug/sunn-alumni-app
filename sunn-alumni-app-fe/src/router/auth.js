const authRoutes = [
    {
        path: '/auth',
        component: () => import('layouts/AuthLayout.vue'),
        children: [
            {
                path: 'login',
                name: 'auth-login',
                meta: {
                    notRequiredAuth: true,
                },
                component: () => import('pages/auth/LoginPage.vue'),
            },
            {
                path: 'register',
                name: 'auth-register',
                meta: {
                    notRequiredAuth: true,
                },
                component: () => import('pages/auth/RegisterPage.vue')
            }
        ]
    }
]


export default authRoutes;