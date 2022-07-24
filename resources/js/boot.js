import {createApp} from "vue";
import router from "./config/router";
import store from "./config/store";

import App from './сomponents/app.vue';
import saleBar from "./sale/components/sale-bar.vue";
import shopBar from "./shop/components/shop-bar.vue";

const app = createApp(App);
app.component('sale-bar', saleBar);
app.component('shop-bar', shopBar);
app.use(store);
app.use(router);
app.mount('#app');
