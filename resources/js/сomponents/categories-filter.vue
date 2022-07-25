<template>
    <div class="d-grid gap-2">
        <button type="button" class="btn" v-for="category in categories"
                :key = category.id
                :class="buttonClass(category.id)"
                @click = 'chooseBrand(category.id)'>
            {{ category.name }}
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
            categories:[],
        }
    },
    methods: {
        chooseBrand(id) {
            this.$store.commit('SET_CATEGORY', id)
        },
        buttonClass(id) {
            if (id === this.$store.getters.CATEGORY) {
                return this.classes.select
            } else {
                return this.classes.noSelect
            }
        }
    },
    mounted() {
        instance('categories')
            .then(categories => {
                this.categories = categories.data.data;
            })
    }
}
</script>
