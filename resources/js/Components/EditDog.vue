<template>
    <div>
        <h1>This is To edit the dog info:</h1>
    </div>
</template>

<script>
import api from "../api/index";
export default {
    name: "EditDog",

    props: {
        dogId: {
            type: String,
            required: true,
        },
    },
    data() {
        return {
            dog: {},
        };
    },
    mounted() {
        this.getDog();
    },
    methods: {
        async getDog() {
            // const response = await api.getTaskById(this.dogId);
            // if (response.status === 200) {
            //     this.dog = this.parseElemntToDog(response.data);
            // }
        },

        parseElemntToDog(element) {},

        async submit() {
            // const response = await api.editTask(this.task);
            // if (response.status === 200) {
            //     //Todo mensaje éxito
            // }
        },
    },
};
</script>
