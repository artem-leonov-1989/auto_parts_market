<template>
<sale-bar></sale-bar>

</template>

<script>
export default {
    components: {

    },
    mounted() {
        if (this.$store.getters.ROLE === 'buyer')
            this.$router.push('/')
    }
}
</script>
