<template>
    <div class="row justify-content-around mt-3">
        <div class="col-2">
            <model-filter></model-filter>
        </div>
        <div class="col-6">
            <div class="mb-3 row">
                <label for="searchInput" class="col-sm-1 col-form-label text-uppercase">пошук</label>
                <div class="col-sm-8">
                    <input id="searchInput" class="form-control mb-2 me-auto ms-auto" v-model="searchString" @input="search">
                </div>
            </div>
            <div class="ms-auto me-auto">
                <counter></counter>
            </div>
        </div>
        <div class="col-3">
            <part-editor v-if="isManager"></part-editor>
        </div>
    </div>
</template>

<script>
import isAuth from "./mixins/isAuth";
import modelFilter from "./filter.vue";
import counter from "./counter.vue";
import partEditor from "./part-editor.vue";

export default {
    name: "parts",
    components: {
        modelFilter,
        counter,
        partEditor
    },
    mixins: [
        isAuth
    ],
    data() {
        return {
            searchString: '',
        }
    },
    methods: {
        search() {
            this.$store.commit('SET_SEARCH', this.searchString);
        }
    }
}
</script>
