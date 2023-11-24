<template>
    <NavBar />
    <diV class="mainContent">
        <router-view></router-view>
    </diV>
</template>

<script>
import NavBar from "./Components/NavBar.vue";
export default {
    name: "App",
    components: {
        NavBar,
    },
};
</script>
