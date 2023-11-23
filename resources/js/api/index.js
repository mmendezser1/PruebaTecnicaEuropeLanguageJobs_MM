import axios from "./config/axiosConfig";
const api = {
    getDogs: () => {
        return axios
            .get("/dogs")
            .then((response) => {
                return response;
            })
            .catch((error) => {
                return error;
            });
    },
    createDog: (data) => {
        return axios
            .post("/create/dog", data)
            .then((response) => {
                return response;
            })
            .catch((error) => {
                return error;
            });
    },
};

export default api;
