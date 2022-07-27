<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">

            <div v-if="isManager" class="d-flex justify-content-end w-100">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <router-link to="/" class="nav-link my-nav-link me-5">Комплектуючі</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/sale" class="nav-link my-nav-link me-5">Замовлення</router-link>
                    </li>
                </ul>
            </div>

            <div v-else class="d-flex justify-content-end w-100">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <router-link to="/" class="nav-link my-nav-link me-5">Магазин</router-link>
                    </li>
                    <li class="nav-item me-5" v-if="isAuthorized">
                        <router-link to="/sale" class="nav-link my-nav-link">{{ nameUser }}</router-link>
                    </li>
                </ul>
            </div>
            <login></login>
        </div>
    </nav>
</template>

<script>
import login from "./login.vue";
import isAuth from "./mixins/isAuth";

export default {
    name: "main-menu",
    mixins: [
        isAuth
    ],
    components: {
        login
    },
}
</script>
