<template>
    <div class="d-grid gap-2">
        <button type="button" class="btn" v-for="type in filterTypes"
                :key = type.id
                :class="buttonClass(type.id)"
                @click = 'chooseBrand(type.id)'>
            {{ type.name }}
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
            types:[],
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
        }
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
