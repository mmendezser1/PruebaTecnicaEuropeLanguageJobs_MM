<template>
    <h1>Hello World from Home.vue</h1>
    <button @click="addDog">CREATE DOG</button>
    <article class="welcome">
        <!-- <img> -->
    </article>
    <article class="dogs_items">
        <div v-for="item in dogs" :key="item.id">
            <Dog :dog="item" />
        </div>
    </article>
</template>

<script>
import api from "../api/index";
import Dog from "../Components/Dog.vue";
import DogModel from "../Models/Dog";
export default {
    name: "Home",
    components: { Dog },
    mounted() {
        this.getDogs();
    },
    data() {
        return {
            dogs: [],
        };
    },
    methods: {
        async getDogs() {
            const response = await api.getDogs();
            if (response.status === 200) {
                console.log(response.data.dogs);
                this.dogs = response.data.dogs.map((element) => {
                    return this.parseElemntToDog(element);
                });
            }
        },

        parseElemntToDog(element) {
            console.log(element);

            return new DogModel(
                element.id,
                element.image,
                element.name,
                element.age_months,
                element.race,
                element.size,
                element.hair_color,
                element.hair_style
            );
        },
        addDog() {
            this.$router.push("/create");
        },
    },
};
</script>
