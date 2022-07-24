import {createApp} from "vue";
import router from "./config/router";
import store from "./config/store";

import App from './сomponents/app.vue';

const app = createApp(App);
app.use(store);
app.use(router);
app.mount('#app');
