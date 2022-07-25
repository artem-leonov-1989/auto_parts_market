<template>
    <div class="accordion" id="accordionBrands">
        <h2 class="accordion-header" id="headingBrands">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBrand" aria-expanded="true" aria-controls="collapseBrand">
                Марки авто
            </button>
        </h2>
        <div id="collapseBrand" class="accordion-collapse collapse" aria-labelledby="headingBrands">
            <div class="accordion-body">
                <brands-filter></brands-filter>
            </div>
        </div>
    </div>
</template>

<script>
import {instance} from "../config/axios";
import brandsFilter from "./brands-filter.vue";

export default {
    components: {
        brandsFilter
    },
    name: "model-filter",
    data() {
        return {
            brands: [],
            types: [],
            categories: [],
            selectBrand: undefined,
            selectType: undefined,
            selectCategory: undefined
        }
    },
    methods: {
        chooseBrand(id) {
            this.selectBrand = id
        }
    },
    computed: {

    },
    mounted() {
        instance('brands').then(brands =>{
            instance('types').then(types => {
                instance('categories').then(categories => {
                    this.categories = categories.data.data
                })
                this.types = types.data.data
            })
            this.brands = brands.data.data;
        })
    }
}
</script>

<style scoped>

</style>
