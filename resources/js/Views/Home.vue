<template>
    <article class="welcome">
        <div class="row banner-container">
            <div class="col-md-5 col-xs-12">
                <h1 class="title welcome__tittle">
                    Europe languages jobs, also likes dogs!
                </h1>
                <button @click="seeAllDogs" class="welcome__btn">
                    SEE ALL DOGS
                </button>
            </div>
            <div class="col-md-5 offset-md-2 col-xs-12">
                <div class="item-list">
                    <span
                        ><strong class="item-list__strong"
                            >+ {{ numberOfRaces }}</strong
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
                        ><strong class="item-list__strong"
                            >+ {{ numberOfDogs }}</strong
                        ><br />Dogs added to the platform
                    </span>
                </div>
            </div>
        </div>
    </article>

    <article class="main_content">
        <div class="dogs_examples">
            <div class="dogs_examples__tittle">
                <h1>They are some dogs!</h1>
            </div>
            <div class="col-md-12 dogs_examples__images">
                <div v-for="item in dogs" :key="item.id" class="col-md-4">
                    <Dog :dog="item" />
                </div>
            </div>
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
        this.getNumberOfRaces();
        this.getNumberOfDogs();
    },
    data() {
        return {
            dogs: [],
            numberOfRaces: 0,
            numberOfDogs: 0,
        };
    },
    methods: {
        async getDogs() {
            const response = await api.getDogsForHomeView(3);
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

        seeAllDogs() {
            this.$router.push("/dogs");
        },
        async getNumberOfRaces() {
            const response = await api.getRaces();
            if (response.status === 200) {
                this.numberOfRaces = response.data.races;
            }
        },
        async getNumberOfDogs() {
            const response = await api.getDogsNumber();
            if (response.status === 200) {
                this.numberOfDogs = response.data.dogs;
            }
        },
    },
};
</script>
