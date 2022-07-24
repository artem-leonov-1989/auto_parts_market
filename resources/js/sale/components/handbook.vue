<template>
    <div class="row">
        <div class="col-3">
            Марки
        </div>
        <div class="col-3">
            Модели
        </div>
        <div class="col-3">
            Части авто
        </div>
    </div>
</template>

<script>

import redirectBuyer from "../mixins/redirectBuyer";

export default {
    name: "handbook",
    mixins: [
        redirectBuyer
    ],
}
</script>

<style scoped>

</style>
