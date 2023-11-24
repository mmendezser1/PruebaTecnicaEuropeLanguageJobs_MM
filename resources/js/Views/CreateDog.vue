<template>
    <div class="create_dog_tittle">
        <h1>Create new dog!</h1>
    </div>
    <div class="form-container">
        <form @submit.prevent="handleSubmit" class="form">
            <div class="form-row">
                <div class="form-group">
                    <label for="image" class="form-label">Image:</label>
                    <input
                        type="file"
                        id="image"
                        @change="handleFileChange"
                        accept="image/*"
                        class="form-input"
                    />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="name" class="form-label">Name:</label>
                    <input
                        class="form-input"
                        type="text"
                        id="name"
                        v-model="formData.name"
                        required
                    />
                </div>

                <div class="form-group">
                    <label for="race" class="form-label">Race:</label>
                    <input
                        class="form-input"
                        type="text"
                        id="race"
                        v-model="formData.race"
                        required
                    />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="age_months" class="form-label"
                        >Age in months:</label
                    >
                    <input
                        type="number"
                        id="age_months"
                        class="form-input"
                        v-model="formData.age_months"
                        required
                    />
                </div>

                <div class="form-group">
                    <label for="size" class="form-label">Size:</label>
                    <input
                        type="text"
                        class="form-input"
                        id="size"
                        v-model="formData.size"
                        required
                    />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="hair_color" class="form-label"
                        >Hair Color:</label
                    >
                    <input
                        type="text"
                        id="hair_color"
                        class="form-input"
                        v-model="formData.hair_color"
                        required
                    />
                </div>
                <div class="form-group">
                    <label for="hair_style" class="form-label"
                        >Hair Style:</label
                    >
                    <input
                        type="text"
                        id="hair_style"
                        class="form-input"
                        v-model="formData.hair_style"
                        required
                    />
                </div>
            </div>

            <button class="button-form" type="submit">Create</button>
        </form>
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
                this.showSuccessMessage();
            } else {
                this.showErrorMessage(response.message);
            }
        },
        showSuccessMessage() {
            this.$swal
                .fire({
                    title: "Succes!",
                    text: "The dog was saved succesly!",
                    icon: "success",
                    timer: 2500,
                    timerProgressBar: true,
                    showConfirmButton: false,
                })
                .then((result) => {
                    this.$router.go(-1);
                });
        },
        showErrorMessage(message) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Something went wrong! " + message,
            });
        },
    },
};
</script>
