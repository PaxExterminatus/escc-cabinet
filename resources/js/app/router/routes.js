import MemberSection from 'cmp/page/member/MemberSection'
import MemberHomeContent from 'cmp/page/member/MemberHomeContent'
import AuthSection from 'cmp/page/auth/AuthLoginContent'
import AuthLoginContent from 'cmp/page/auth/AuthLoginContent'
import PaySection from 'cmp/page/pay/PaySection'

export default [
    {
        path: '/',
        name: 'home',
        component: MemberSection,
        children: [
            {
                path: '/',
                name: 'home',
                component: MemberHomeContent,
            },
            {
                path: '/courses',
                name: 'courses',
                component: () => import(/* webpackChunkName: "chunk.page.member.courses" */ 'page/member/CoursesContent'),
            },
            {
                path: '/course/:courseId',
                name: 'course',
                component: () => import(/* webpackChunkName: "chunk.page.member.courses" */ 'page/member/CourseContent'),
                props: true,
            },
            {
                path: '/profile',
                name: 'profile',
                component: () => import(/* webpackChunkName: "chunk.page.member.profile" */ 'page/member/ProfileContent'),
            },
            {
                path: '/payments',
                name: 'payments',
                component: () => import(/* webpackChunkName: "chunk.page.member.payment" */ 'page/UserPayments/PaymentContent'),
                children: [
                    {
                        path: '/payments',
                        name: 'payments.site',
                        component: () => import(/* webpackChunkName: "chunk.page.member.payment.site" */ 'page/UserPayments/PaymentHistorySite'),
                        meta: {
                            label: 'Сайт',
                            icon: 'pi pi-fw pi-file',
                        },
                    },
                    {
                        path: '/payments/all',
                        name: 'payments.all',
                        component: () => import(/* webpackChunkName: "chunk.page.member.payment.all" */ 'page/UserPayments/PaymentHistoryAll'),
                        meta: {
                            label: 'Все',
                            icon: 'pi pi-fw pi-file',
                        },
                    },
                ],
            },
        ],
    },
    {
        path: '/auth',
        name: 'auth',
        component: AuthSection,
        children: [
            {
                path: '/auth/login',
                name: 'login',
                component: AuthLoginContent,
            }
        ],
    },
    {
        path: '/pay/:code?/:amount?/:name?/:surname?/:phone?/:email?/',
        name: 'pay',
        component: PaySection,
        props: true,
    },
];
