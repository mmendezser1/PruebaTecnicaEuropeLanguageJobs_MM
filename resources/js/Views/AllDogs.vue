<template>
    <article class="article_all_dogs">
        <form @submit.prevent="handleSubmit" class="container_search">
            <div class="row">
                <div class="col">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Dog name"
                        v-model="formData.name"
                    />
                </div>
                <div class="col">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Race"
                        v-model="formData.race"
                    />
                </div>
                <div class="col">
                    <input
                        type="number"
                        class="form-control"
                        placeholder="Age in Months"
                        v-model="formData.age_months"
                    />
                </div>
                <div class="col">
                    <select
                        class="form-control"
                        v-model="formData.size"
                        id="inputSize"
                    >
                        <option value="" selected>Size</option>
                        <option value="small">Small</option>
                        <option value="medium">Medium</option>
                        <option value="big">Big</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-button-search">
                    <button class="btn btn-primary" type="submit">
                        Search
                    </button>
                    <button
                        class="btn btn-danger clear"
                        type="button"
                        @click="clearForm"
                    >
                        Clear
                    </button>
                </div>
            </div>
        </form>
        <div class="container_add_dog">
            <button @click="addDog" class="btn btn-primary">+</button>
        </div>
        <div v-if="dogs.length > 0" class="container_all_dogs">
            <div v-for="item in dogs" :key="item.id" class="container_dog">
                <div class="dog-header">
                    <div class="dog-image">
                        <img :src="'/images/' + item.image" alt="Dog Image" />
                    </div>
                    <div class="dog-info">
                        <h2 class="dog-name">
                            {{ item.name }}
                        </h2>
                        <p>{{ item.age_months }} months old</p>
                    </div>
                    <div class="dog-details">
                        <strong> Size:</strong> {{ item.size }}
                        <strong> Hair Color: </strong>
                        {{ item.hair_color }} <strong> Hair Style:</strong>
                        {{ item.hair_style }}
                    </div>
                </div>
            </div>
        </div>
        <div v-else class="container_no_dogs">
            <p>No results!</p>
        </div>
    </article>
</template>

<script>
import { defineComponent } from "vue";
import api from "../api/index";
import DogModel from "../Models/Dog";
import "../assets/alldogs.css";

export default defineComponent({
    name: "Dogs",
    mounted() {
        this.getDogs();
    },
    data() {
        return {
            formData: {
                name: "",
                race: "",
                age_months: null,
                size: "",
            },
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
                console.log(this.dogs.size);
            }
        },

        parseElemntToDog(element) {
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

        async handleSubmit() {
            let formData = new FormData();
            formData.append("name", this.formData.name);
            formData.append("race", this.formData.race);
            formData.append("age_months", this.formData.age_months);
            formData.append("size", this.formData.size);

            const response = await api.getDogsFiltered(formData);
            if (response.status === 200) {
                console.log(response.data);
                this.dogs = response.data.dogs;
            }
        },
        clearForm() {
            this.formData = {
                name: "",
                race: "",
                age_months: null,
                size: "",
            };
            this.handleSubmit();
        },

        addDog() {
            this.$router.push("/create");
        },
    },
});
</script>
