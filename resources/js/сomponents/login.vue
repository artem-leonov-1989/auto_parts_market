<template>
    <div class="d-flex justify-content-end w-25">
        <input v-if="!isAuthorized" v-model="email" type="email" placeholder="e-mail" class="form-control me-2">
        <input v-if="!isAuthorized" v-model="password" type="password" placeholder="пароль" class="form-control me-2">
        <button v-if="!isAuthorized" type="button" class="btn btn-success me-2" @click="login">Увійти</button>
        <div class="user-name me-5" v-if="isAuthorized">{{ nameUser }}</div>
        <button type="button" v-if="isAuthorized" class="btn btn-danger me-2" @click="logout">Вийти</button>
    </div>
</template>

<script>

import {instance} from "../config/axios";
import isAuth from "./mixins/isAuth";

export default {
    mixins: [
        isAuth
    ],
    data() {
        return {
            email: '',
            password: '',
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
                            this.$store.commit('SET_USERNAME', response.data.user.name)
                            if(response.data.user.role === 'manager') {
                                this.$router.push('/sale')
                            }
                        } else {
                            this.error = response.data.message
                        }
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            }
        },
        logout() {
            instance('logout').then(() => {
                this.$store.commit('SET_TOKEN', undefined);
                this.$store.commit('SET_ROLE', 'buyer');
                this.$store.commit('SET_USERNAME', undefined);
                localStorage.removeItem('token')
                this.$router.push('/')
            }).catch(e => {
                console.log(e);
            })
        }
    },
}
</script>
