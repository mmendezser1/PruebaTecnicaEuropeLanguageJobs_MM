import "bootstrap/dist/css/bootstrap.css";
import Swal from "sweetalert2";

import { createApp } from "vue";
import App from "./App.vue";
import routes from "./routes";
const app = createApp(App);

app.config.globalProperties.$swal = Swal; // Esto permite usarlo fácilmente en tus componentes Vue

app.use(routes);

app.mount("#app");
