<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">

            <div v-if="isManager" class="d-flex justify-content-between w-75">
                <ul class="navbar-nav" v-if="isManager">
                    <li class="nav-item">
                        <router-link to="/sale" class="nav-link my-nav-link">Замовлення</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/sale/handbook" class="nav-link my-nav-link">Розділи</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/sale" class="nav-link my-nav-link">Комплектуючі</router-link>
                    </li>
                </ul>
            </div>

            <div v-else class="d-flex justify-content-between w-50">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <router-link to="/" class="nav-link my-nav-link">Магазин</router-link>
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
