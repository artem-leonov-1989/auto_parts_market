<template>
    <div>
        <div>{{ name }} ({{ manCode }}-{{ man }})</div>
    </div>
</template>

<script>
import {instance} from "../../config/axios";

export default {
    name: "part-item",
    props: {
        name: String,
        man: String,
        manCode: String
    },
    computed: {
        cost: function () {
            return this.count*this.price
        }
    },
    mounted() {
        instance()
    }
}
</script>

<style scoped>

</style>
