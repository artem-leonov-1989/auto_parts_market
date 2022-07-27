<template>
    <div class="d-flex justify-content-center" v-if="loading">
        <div class="spinner-grow text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-lg-3 g-3 overflow-scroll" v-else>
        <card v-for="card in showCards"
              :key=card.id
              :id=card.id
              :name=card.name
              :manufacturer_code=card.manufacturer_code
              :manufacturer=card.manufacturer
              :price=card.price
              :stock_balance=card.stock_balance>
        </card>
    </div>
</template>
<script>
import card from "./card.vue";
import {instance} from "../config/axios";

export default {
    components: {
        card
    },
    data() {
        return {
            parts:[],
            loading: false,
        }
    },
    methods: {
        loadParts() {
            this.loading = true;
            instance('parts')
                .then(parts=>{
                    this.parts = parts.data.data
                    this.$router.push('/');
                })
                .finally(()=>{
                    this.loading = false
                    this.$store.commit('SET_UPDATE', false);
                })
        }
    },
    computed: {
        showCards: function () {
            return this.parts.filter((value) => {
                if (this.$store.getters.CATEGORY !== undefined) {
                    if (value.category_id === this.$store.getters.CATEGORY) {
                        return value
                    }
                } else {
                    return value
                }
            }).filter((value) => {
                if (this.$store.getters.TYPE !== undefined) {
                    if (value.type_id === this.$store.getters.TYPE) {
                        return value
                    }
                } else {
                    return value
                }
            }).filter((value) => {
                if(this.$store.getters.SEARCH !== '') {
                    if (value.name.includes(this.$store.getters.SEARCH)) {
                        return value
                    }
                } else {
                    return value
                }
            })
        },
        update: function () {
            return this.$store.getters.UPDATE
        }
    },
    watch: {
        update: function (val) {
            if (val) {
                this.loadParts();
            }

        },
    },
    mounted() {
        this.loadParts();
        /*let loadDate = setInterval(() => this.loadParts(), 10000);*/
       /* setTimeout(() => { clearInterval(loadDate); alert('stop'); }, 5000);*/
    }
}
</script>
