<template>
    <NavBar />
    <div class="mainContent">
        <router-view></router-view>
    </div>
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
