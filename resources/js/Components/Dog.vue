<template>
    <div class="dog">
        <div class="header">
            <img
                :src="'/images/' + dog.image"
                alt="example_dog_image"
                class="header__dog_img"
            />
        </div>
        <div class="text-center">
            <span class="dog__text">{{ dog.name.toUpperCase() }}</span>
        </div>
    </div>
</template>

<script>
import { defineComponent } from "vue";
import Dog from "../Models/Dog";
import "../assets/dog.css";
export default defineComponent({
    name: "DogComponent",
    props: {
        dog: {
            type: Dog,
        },
    },
    methods: {
        editDog(id) {
            this.$router.push({
                name: "EditComponent",
                params: { dogId: id },
            });
        },
    },
});
</script>
