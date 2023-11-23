<template>
    <div>
        <img :src="'/images/' + dog.image" />
        <p>{{ dog.name }} - {{ dog.race }}</p>
        <button class="button" @click="editDog(dog.id)">EDIT</button>
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
            console.log(id);
            this.$router.push({
                name: "EditComponent",
                params: { dogId: id },
            });
        },
    },
});
</script>
