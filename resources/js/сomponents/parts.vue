<template>
    <div class="row justify-content-between mt-3">
        <div class="col-2">
            <model-filter></model-filter>
        </div>
        <div class="col-5">

        </div>
    </div>
</template>

<script>
import isAuth from "./mixins/isAuth";
import modelFilter from "./filter.vue";

export default {
    name: "parts",
    components: {
        modelFilter,
    },
    mixins: [
        isAuth
    ],
}
</script>

<style scoped>

</style>
