<template>
    <div class="d-flex flex-column">
        <div class="accordion mb-3" id="accordionBrands">
            <h2 class="accordion-header" id="headingBrands">
                <button class="accordion-button fs-4" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseBrand" aria-expanded="true" aria-controls="collapseBrand">
                    Автомобільні бренди
                </button>
            </h2>
            <div id="collapseBrand" class="accordion-collapse collapse show" aria-labelledby="headingBrands">
                <div class="accordion-body">
                    <brands-filter></brands-filter>
                </div>
            </div>
            <h2 class="accordion-header" id="headingTypes">
                <button class="accordion-button fs-4" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTypes" aria-expanded="true" aria-controls="collapseTypes">
                    Автомобільні марки
                </button>
            </h2>
            <div id="collapseTypes" class="accordion-collapse collapse show" aria-labelledby="headingTypes">
                <div class="accordion-body">
                    <models-filter></models-filter>
                </div>
            </div>
            <h2 class="accordion-header" id="headingCategories">
                <button class="accordion-button fs-4" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseCategories" aria-expanded="true" aria-controls="collapseCategories">
                    Категорії товарів
                </button>
            </h2>
            <div id="collapseCategories" class="accordion-collapse collapse show" aria-labelledby="headingCategories">
                <div class="accordion-body">
                    <categories-filter></categories-filter>
                </div>
            </div>
        </div>
        <button class="btn btn-danger w-75 mb-3 ms-auto me-auto fs-5" @click="resetFilter">Скинути фільтр</button>
    </div>
</template>

<script>
import brandsFilter from "./brands-filter.vue";
import categoriesFilter from "./categories-filter.vue";
import modelsFilter from "./models-filter.vue";

export default {
    components: {
        brandsFilter,
        categoriesFilter,
        modelsFilter
    },
    mixins: [

    ],
    data() {
        return {
            newBrand: '',
        }
    },
    methods: {
        resetFilter() {
            this.$store.commit('SET_BRAND', undefined)
            this.$store.commit('SET_CATEGORY', undefined)
            this.$store.commit('SET_TYPE', undefined)
        },
    },
    computed: {

    },
    mounted() {

    }
}
</script>

<style scoped>

</style>
