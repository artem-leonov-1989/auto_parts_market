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
        }
    },
    methods: {
        chooseBrand(id) {
            this.$store.commit('SET_BRAND', id)
            this.selectId = id
        },
    },
    computed: {

    },
    mounted() {
        instance('brands')
            .then(brands => {
                this.brands = brands.data.data;
            })
    }
}
</script>
