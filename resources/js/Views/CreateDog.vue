<template>
    <div class="form">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <form @submit.prevent="handleSubmit">
                    <div class="col-md-6">
                        <div class="form-group text-center">
                            <label for="image">Image:</label>
                            <input
                                type="file"
                                id="image"
                                @change="handleFileChange"
                                accept="image/*"
                                class="form-control"
                            />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- Primer grupo de campos -->
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input
                                class="form-control"
                                type="text"
                                id="name"
                                v-model="formData.name"
                                required
                            />
                        </div>
                        <div class="form-group">
                            <label for="race">Race:</label>
                            <input
                                class="form-control"
                                type="text"
                                id="race"
                                v-model="formData.race"
                                required
                            />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="age_months">Age in months:</label>
                            <input
                                type="number"
                                id="age_months"
                                class="form-control"
                                v-model="formData.age_months"
                                required
                            />
                        </div>

                        <!-- Segundo grupo de campos -->
                        <div class="form-group">
                            <label for="size">Size:</label>
                            <input
                                type="text"
                                class="form-control"
                                id="size"
                                v-model="formData.size"
                                required
                            />
                        </div>
                        <div class="form-group">
                            <label for="hair_color">Hair Color:</label>
                            <input
                                type="text"
                                id="hair_color"
                                class="form-control"
                                v-model="formData.hair_color"
                                required
                            />
                        </div>
                        <div class="form-group">
                            <label for="hair_style">Hair Style:</label>
                            <input
                                type="text"
                                id="hair_style"
                                class="form-control"
                                v-model="formData.hair_style"
                                required
                            />
                        </div>

                        <button class="btn btn-primary btn-block" type="submit">
                            Create
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import api from "../api/index";
import "../assets/createdog.css";
export default {
    name: "CreateDog",

    data() {
        return {
            formData: {
                image: null,
                name: "",
                race: "",
                age_months: "",
                size: "",
                hair_color: "",
                hair_style: "",
            },
        };
    },

    methods: {
        handleFileChange(event) {
            this.formData.image = event.target.files[0];
        },
        async handleSubmit() {
            let formData = new FormData();
            formData.append("name", this.formData.name);
            formData.append("image", this.formData.image);
            formData.append("race", this.formData.race);
            formData.append("age_months", this.formData.age_months);
            formData.append("size", this.formData.size);
            formData.append("hair_color", this.formData.hair_color);
            formData.append("hair_style", this.formData.hair_style);

            const response = await api.createDog(formData);
            if (response.status === 200) {
                this.$router.go(-1);
            }
        },
    },
};
</script>
