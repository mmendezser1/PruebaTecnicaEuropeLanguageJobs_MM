import { createRouter, createWebHistory } from "vue-router";
import Home from "./Views/Home.vue";
import EditDog from "./Views/EditDog.vue";
const routes = [
    {
        path: "/:catchAll(.*)",
        redirect: "/",
    },
    {
        path: "/",
        name: "Home",
        component: Home,
    },
    {
        path: "/edit/:dogId",
        name: "EditDog",
        component: EditDog,
        props: true,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
