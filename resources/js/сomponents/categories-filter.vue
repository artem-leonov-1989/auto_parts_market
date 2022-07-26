<template>
    <div class="d-grid gap-2">
        <button type="button" class="btn" v-for="category in categories"
                :key = category.id
                :class="buttonClass(category.id)"
                @click = 'chooseBrand(category.id)'>
            {{ category.name }}
        </button>
    </div>
    <form class="d-flex justify-content-around mt-2" v-if="isManager">
        <input class="form-control" type="text" v-model="newCategory">
        <button class="btn btn-success ms-1" type="button" @click="addCategory">Додати</button>
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
            categories:[],
            newCategory: '',
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
        },
        addCategory() {
            if (this.newCategory.length > 3) {
                instance.post('categories/store', {
                    name: this.newCategory
                }).then(newCategory => {
                        if (newCategory.status === 200){
                            this.newCategory = ''
                            instance('categories')
                                .then(categories => {
                                    this.categories = categories.data.data;
                                })
                        }
                    }
                )
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
