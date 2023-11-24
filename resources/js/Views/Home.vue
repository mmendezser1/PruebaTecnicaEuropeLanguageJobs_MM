<template>
    <article class="welcome">
        <div class="row banner-container">
            <div class="col-md-5 col-xs-12">
                <h1 class="title welcome__tittle">
                    Europe languages jobs, also likes dogs!
                </h1>
                <button href="/companies/registry" class="welcome__btn">
                    ADD DOG
                </button>
            </div>
            <div class="col-md-5 offset-md-2 col-xs-12">
                <div class="item-list">
                    <span
                        ><strong class="item-list__strong">+ 2,500</strong
                        ><br />Dogs races
                    </span>
                </div>
                <div class="item-list">
                    <span
                        ><strong class="item-list__strong"
                            >Post with ease</strong
                        ><br />Publish a dog info in just 2 minutes
                    </span>
                </div>
                <div class="item-list">
                    <span
                        ><strong class="item-list__strong">+ 50,000</strong
                        ><br />Dogs added to the platform
                    </span>
                </div>
            </div>
        </div>
    </article>

    <button @click="addDog">CREATE DOG</button>
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
import "../assets/home.css";
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
