<template>
    <main-menu></main-menu>
    <router-view></router-view>
</template>

<script>

import {instance} from "../config/axios";
import mainMenu from "./main-menu.vue";

export default {
    components: {
        mainMenu
    },
    mounted() {
        if (localStorage.token) {
            this.$store.commit('SET_TOKEN', localStorage.token)
            instance('/role').then(r => {
                this.$store.commit('SET_ROLE', r.data.role);
                this.$store.commit('SET_USERNAME', r.data.name)
            })
        }
    }
}
</script>
