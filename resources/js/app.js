// app.js
import "bootstrap/dist/css/bootstrap.css";
import { createApp } from "vue";
import App from "./App.vue";
import routes from "./routes"; // Importa tus rutas desde routes.js

const app = createApp(App);

// Configura las rutas
app.use(routes);

// Monta la aplicación en el elemento con el id "app"
app.mount("#app");
