<template>
    <nav class="custom_navbar">
        <img
            @click="goToHome"
            src="images/logo.png"
            class="custom_navbar__img"
        />
    </nav>
</template>

<script>
import "../assets/navbar.css";

export default {
    name: "NavBar",
    methods: {
        goToHome: () => {
            //  this.$router.push("/");
            window.location.pathname = "/";
        },
    },
};
</script>
