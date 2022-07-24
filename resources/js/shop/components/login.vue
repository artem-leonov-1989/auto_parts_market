<template>
    <form class="d-flex">
        <input v-model="email" type="email" placeholder="e-mail" class="form-control me-2">
        <input v-model="password" type="password" placeholder="пароль" class="form-control me-2">
        <button type="button" class="btn btn-success me-2" @click="login">Увійти</button>
    </form>
    <form class="d-flex align-content-center">
        <button type="button" class="btn btn-danger me-2" @click="logout">Вийти</button>
    </form>
</template>

<script>

import {instance} from "../../config/axios";

export default {
    data() {
        return {
            email: '',
            password: '',
            userName: ''
        }
    },
    methods: {
        login() {
            if (this.email.length > 0 && this.password.length > 0) {
                instance.post('/login', {
                    email: this.email,
                    password: this.password
                })
                    .then(response => {
                        if (response.data.status === 'success') {
                            this.$store.commit('SET_TOKEN', response.data.authorisation.token);
                            console.log(response.data.user.role);
                            localStorage.token = response.data.authorisation.token;
                            this.$store.commit('SET_ROLE', response.data.user.role);
                        } else {
                            this.error = response.data.message
                        }
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            }
        },
    },
    /*computed: {
        registered: function () {
            this.$store.dispatch('GET_USER');
            return this.$store.getters.USERNAME !== undefined;
        },
    },*/
}
</script>
