<template>
    <div class="d-grid gap-2">
        <button type="button" class="btn" v-for="brand in brands"
                :key = brand.id
                :class="buttonClass(brand.id)"
                @click = 'chooseBrand(brand.id)'>
            {{ brand.name }}
        </button>
    </div>
    <form class="d-flex justify-content-around mt-2" v-if="isManager">
        <input class="form-control" type="text" v-model="newBrand">
        <button class="btn btn-success ms-1" type="button" @click="addBrand">Додати</button>
    </form>
</template>

<script>
import filterButtonSelect from "./mixins/filterButtonSelect";
import {instance} from "../config/axios";
import isAuth from "./mixins/isAuth";

export default {
    mixins: [
        filterButtonSelect,
        isAuth
    ],
    data() {
        return {
            brands:[],
            newBrand: ''
        }
    },
    methods: {
        chooseBrand(id) {
            this.$store.commit('SET_BRAND', id)
        },
        buttonClass(id) {
            if (id === this.$store.getters.BRAND) {
                return this.classes.select
            } else {
                return this.classes.noSelect
            }
        },
        addBrand() {
            if (this.newBrand.length > 2) {
                instance.post('brands/store', {
                    name: this.newBrand
                }).then(newBrand => {
                        if (newBrand.status === 200){
                            this.newBrand = ''
                            instance('brands')
                                .then(brands => {
                                    this.brands = brands.data.data;
                                })
                        }
                    }
                )
            }
        },
    },
    mounted() {
        instance('brands')
            .then(brands => {
                this.brands = brands.data.data;
            })
    },
}
</script>
