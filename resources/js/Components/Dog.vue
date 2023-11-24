<template>
    <div class="card">
        <img
            :src="'/images/' + dog.image"
            class="card-img-top"
            alt="Card image cap"
        />

        <div class="card-body">
            <h5 class="card-title">{{ dog.name }}</h5>
            <p class="card-text">
                Some quick example text to build on the card title and make up
                the bulk of the card's content.
            </p>
            <a href="#" @click="editDog(dog.id)" class="btn btn-primary"
                >Go somewhere</a
            >
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
            console.log(id);
            this.$router.push({
                name: "EditComponent",
                params: { dogId: id },
            });
        },
    },
});
</script>
