<template>
    <div class="row justify-content-around mt-3">
        <div class="col-2">
            <model-filter></model-filter>
        </div>
        <div class="col-6">
            <counter></counter>
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
}
</script>
