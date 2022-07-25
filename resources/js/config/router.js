import { createRouter, createWebHistory } from "vue-router";
import salePage from "../sale/components/page.vue";
import parts from "../сomponents/parts.vue";

const routes = [
    {
        path: '/sale',
        name: 'sale',
        component: salePage,
    },
    {
        path: '/',
        name: 'parts',
        component: parts,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
