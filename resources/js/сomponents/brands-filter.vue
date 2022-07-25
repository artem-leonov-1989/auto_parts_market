<template>
    <div class="d-grid gap-2">
        <button type="button" class="btn" v-for="brand in brands"
                :key = brand.id
                :class="buttonClass(brand.id)"
                @click = 'chooseModel(brand.id)'>
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
        chooseModel(id) {

        },
    },
    mounted() {
        instance('brands')
            .then(brands => {
                this.brands = brands.data.data;
            })
    }
}
</script>
