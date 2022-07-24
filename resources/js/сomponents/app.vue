<template>
    <router-view></router-view>
</template>

<script>

import {instance} from "../config/axios";

export default {
    mounted() {
        if (localStorage.token) {
            this.$store.commit('SET_TOKEN', localStorage.token)
            instance('/role').then(r => {
                this.$store.commit('SET_ROLE', r.data.role);
            })
        }
    }
}
</script>
