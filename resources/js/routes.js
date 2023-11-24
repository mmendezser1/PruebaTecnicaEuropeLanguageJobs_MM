import { createRouter, createWebHistory } from "vue-router";
import Home from "./Views/Home.vue";
import CreateDog from "./Views/CreateDog.vue";
import AllDogs from "./Views/AllDogs.vue";
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
        path: "/dogs",
        name: "Dogs",
        component: AllDogs,
    },
    {
        path: "/create",
        name: "CreateDog",
        component: CreateDog,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
