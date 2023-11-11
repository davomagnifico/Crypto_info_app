import { createRouter, createWebHistory } from "vue-router";
const HomePage = () => import("@/views/Homepage.vue");
const CoinDetail = () => import("@/views/CoinDetail.vue");
const routes = [
    {
        path: '',
        name: 'Home',
        component: HomePage
    },
    {
        path: '/coin/:id',
        name: 'CoinDetail',
        component: CoinDetail,
    }
]
const router = createRouter({
    history: createWebHistory("/"),
    routes,
    scrollBehavior(to, from, savedPosition) {
        if (savedPosition) {
            return savedPosition
        } else {
            return { top: 0 }
        }
    },
})

export default router;
