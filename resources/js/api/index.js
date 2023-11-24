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
    getDogsForHomeView: () => {
        return axios
            .get("/dogs/3")
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
    getRaces: () => {
        return axios
            .get("/races")
            .then((response) => {
                return response;
            })
            .catch((error) => {
                return error;
            });
    },
    getDogsNumber: () => {
        return axios
            .get("/numberdogs")
            .then((response) => {
                return response;
            })
            .catch((error) => {
                return error;
            });
    },
};

export default api;
