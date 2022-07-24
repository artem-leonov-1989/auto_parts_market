<template>
<div class="h3">
    Продажа
</div>
</template>

<script>
export default {
    mounted() {
        console.log(this.$store.getters.ROLE)
        if (this.$store.getters.ROLE === 'buyer')
            this.$router.push('/')
    }
}
</script>
