<template>
    <div class="d-grid gap-2">
        <button type="button" class="btn" v-for="brand in brands"
                :key = brand.id
                :class="buttonClass(brand.id)"
                @click = 'chooseBrand(brand.id)'>
            {{ brand.name }}
        </button>
    </div>
</template>

<script>
import filterButtonSelect from "./mixins/filterButtonSelect";
import {instance} from "../config/axios";

export default {
    mixins: [
        filterButtonSelect,
    ],
    data() {
        return {
            brands:[],
            refresh: false,
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
        }
    },
    mounted() {
        instance('brands')
            .then(brands => {
                this.brands = brands.data.data;
            })
    },
}
</script>
