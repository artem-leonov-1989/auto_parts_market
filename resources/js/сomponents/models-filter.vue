<template>
    <div class="d-grid gap-2">
        <button type="button" class="btn" v-for="type in filterTypes"
                :key = type.id
                :class="buttonClass(type.id)"
                @click = 'chooseBrand(type.id)'>
            {{ type.name }}
        </button>
    </div>
    <form class="d-flex justify-content-around mt-2" v-if="isManager && selectBrand">
        <input class="form-control" type="text" v-model="newType">
        <button class="btn btn-success ms-1" type="button" @click="addType">Додати</button>
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
            types:[],
            newType: '',
        }
    },
    methods: {
        chooseBrand(id) {
            this.$store.commit('SET_TYPE', id)
        },
        buttonClass(id) {
            if (id === this.$store.getters.TYPE) {
                return this.classes.select
            } else {
                return this.classes.noSelect
            }
        },
        addType() {
            if (this.newType.length > 1) {
                instance.post('types/store', {
                    name: this.newType,
                    brand_id: this.$store.getters.BRAND
                }).then(newType => {
                        if (newType.status === 200){
                            this.newType = ''
                            instance('types')
                                .then(types => {
                                    this.types = types.data.data;
                                })
                        }
                    }
                )
            }
        },
    },
    computed: {
        filterTypes() {
            return this.types.filter(types => {
                if (this.$store.getters.BRAND !== undefined){
                    if(types.brand_id === this.$store.getters.BRAND) {
                        return types
                    }
                }
            })
        },
        selectBrand() {
            return this.$store.getters.BRAND !== undefined
        }
    },
    mounted() {
        instance('types')
            .then(types => {
                this.types = types.data.data;
            })
    }
}
</script>
