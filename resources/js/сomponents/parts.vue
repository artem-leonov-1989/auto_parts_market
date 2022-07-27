<template>
    <div class="row justify-content-around mt-3">
        <div class="col-2">
            <model-filter></model-filter>
        </div>
        <div class="col-6">
            <div class="row">
                <label for="searchInput" class="col-sm-1 col-form-label">Пошук</label>
                <div class="col-sm-7">
                    <input id="searchInput" class="form-control mb-2" v-model="searchString" @input="search">
                </div>
            </div>
            <div class="ms-auto me-auto">
                <counter></counter>
            </div>
        </div>
        <div class="col-3">
            <part-editor v-if="isManager"></part-editor>
            <basket v-else></basket>
        </div>
    </div>
    <div v-if="!isAuthorized" class="offcanvas offcanvas-end offc" tabindex="-1" id="regWindow" aria-labelledby="offcanvasRegLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasRegLabel">Реєстрація</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="mb-3">
                <label for="mailInput" class="form-label">Email адреса</label>
                <input type="email" class="form-control" id="mailInput" placeholder="name@example.com" v-model="regEmail">
                <div class="fs-6 text-danger mt-2 ms-2" v-if="errorEmail">Невірний формат</div>
            </div>
            <div class="mb-3">
                <label for="passwordInput" class="form-label">Пароль</label>
                <input type="password" class="form-control" id="passwordInput" placeholder="Не меньше 6ти символів" v-model="regPassword">
                <div class="fs-6 text-danger mt-2 ms-2" v-if="errorPassword">Паролі не збігаються або замалі</div>
            </div>
            <div class="mb-3">
                <label for="passwordRepeatInput" class="form-label">Повторіть пароль</label>
                <input type="password" class="form-control" id="passwordRepeatInput" placeholder="Повинно співпасти с попереднім" v-model="passwordRepeat">
                <div class="fs-6 text-danger mt-2 ms-2" v-if="errorPassword">Паролі не збігаються або замалі</div>
            </div>
            <div class="mb-3">
                <label for="nameInput" class="form-label">Ім'я</label>
                <input type="text" class="form-control" id="nameInput" placeholder="Не меньше 6ти символів" v-model="regName">
                <div class="fs-6 text-danger mt-2 ms-2" v-if="errorNameUser">Ім'я має бути не меньше 6ти символів.</div>
            </div>
            <button type="button" class="btn btn-primary mb-3 w-100" :disabled="!permissionToReg" @click="reg">Реєстрація</button>
        </div>
    </div>
</template>

<script>
import isAuth from "./mixins/isAuth";
import modelFilter from "./filter.vue";
import counter from "./counter.vue";
import partEditor from "./part-editor.vue";
import basket from "../shop/components/basket.vue";
import {instance} from "../config/axios";

export default {
    name: "parts",
    components: {
        modelFilter,
        counter,
        partEditor,
        basket
    },
    mixins: [
        isAuth
    ],
    data() {
        return {
            searchString: '',
            regEmail: '',
            regPassword: '',
            passwordRepeat: '',
            regName: '',
        }
    },
    methods: {
        search() {
            this.$store.commit('SET_SEARCH', this.searchString);
        },
        reg() {
            instance.post('register', {
                name: this.regName,
                email: this.regEmail,
                password: this.regPassword
            }).then(r => {
                if (r.data.status === 'success') {
                    this.$store.commit('SET_TOKEN', r.data.authorisation.token);
                    localStorage.token = r.data.authorisation.token;
                    this.$store.commit('SET_ROLE', r.data.user.role);
                    this.$store.commit('SET_USERNAME', r.data.user.name)
                    if(r.data.user.role === 'manager') {
                        this.$router.push('/sale')
                    }
                } else {
                    this.error = response.data.message
                }
            })
        },
    },
    computed: {
        errorEmail: function () {
            let pattern  = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return !pattern .test(String(this.regEmail).toLowerCase());
        },
        errorPassword: function () {
            if (this. regPassword.length >= 6) {
                return this.passwordRepeat !== this.regPassword;
            } else {
                return true
            }
        },
        errorNameUser: function () {
            return this.regName.length < 6
        },
        permissionToReg: function () {
            return !this.errorEmail && !this.errorPassword && !this.errorNameUser
        }
    }
}
</script>
