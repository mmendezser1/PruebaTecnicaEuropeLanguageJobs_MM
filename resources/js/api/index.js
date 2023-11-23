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
};

export default api;
