<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid justify-content-end">
            <div class="d-flex justify-content-around">
                <router-link to="/" class="nav-link">Магазин</router-link>
<!--                <nav-basket></nav-basket>-->
<!--                <div class="nav-link" v-if="!registered">userName</div>-->
            </div>
            <div class="d-flex justify-content-around align-content-center">
                <login></login>
            </div>
        </div>
    </nav>
</template>

<script>
import login from "./login.vue";
import navBasket from "./nav-basket.vue";
import authUser from "../mixins/authUser";
export default {
    components: {
        login,
        navBasket,
    },
    mixins: [
        authUser,
    ],

}
</script>
