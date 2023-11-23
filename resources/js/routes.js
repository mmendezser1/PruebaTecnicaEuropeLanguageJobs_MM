// routes.js
import { createRouter, createWebHistory } from "vue-router";
import Home from "./Components/Home.vue";
import About from "./Components/About.vue";
import EditDog from "./Components/EditDog.vue";
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
        path: "/about",
        name: "About",
        component: About,
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
