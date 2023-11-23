<template>
    <div>
        <form @submit.prevent="handleSubmit">
            <div>
                <label for="image">Image:</label>
                <input
                    type="file"
                    id="image"
                    @change="handleFileChange"
                    accept="image/*"
                />
            </div>
            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" v-model="formData.name" required />
            </div>
            <div>
                <label for="race">Race:</label>
                <input type="text" id="race" v-model="formData.race" required />
            </div>
            <div>
                <label for="age_months">Age in months:</label>
                <input
                    type="number"
                    id="age_months"
                    v-model="formData.age_months"
                    required
                />
            </div>
            <div>
                <label for="size">Size :</label>
                <input type="text" id="size" v-model="formData.size" required />
            </div>
            <div>
                <label for="hair_color">Hair Color:</label>
                <input
                    type="text"
                    id="hair_color"
                    v-model="formData.hair_color"
                    required
                />
            </div>
            <div>
                <label for="hair_style">Hair Style</label>
                <input
                    type="text"
                    id="hair_style"
                    v-model="formData.hair_style"
                    required
                />
            </div>
            <button type="submit">Create</button>
        </form>
    </div>
</template>

<script>
import api from "../api/index";
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
