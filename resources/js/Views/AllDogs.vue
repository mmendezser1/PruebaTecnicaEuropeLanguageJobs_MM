<template>
    <div>
        <button @click="addDog">ADD NEW DOG</button>
    </div>
</template>

<script>
import { defineComponent } from "vue";
export default defineComponent({
    name: "Dogs",
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
});
</script>
