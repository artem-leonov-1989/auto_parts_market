import { createRouter, createWebHistory } from "vue-router";
import shopPage from "../shop/components/page.vue";
import salePage from "../sale/components/page.vue";
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
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
