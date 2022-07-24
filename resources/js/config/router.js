import { createRouter, createWebHistory } from "vue-router";
import shopPage from "../shop/components/page.vue";
import salePage from "../sale/components/page.vue";
import handbook from "../sale/components/handbook.vue";

const routes = [
    {
        path: '/',
        name: 'shop',
        component: shopPage
    },
    {
        path: '/sale',
        name: 'sale',
        component: salePage,
    },
    {
        path: '/sale/handbook',
        name: 'handbook',
        component: handbook,
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
