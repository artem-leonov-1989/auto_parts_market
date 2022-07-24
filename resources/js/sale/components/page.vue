<template>
<div class="h3">
    Продажа
</div>
</template>

<script>
export default {
   mounted() {
       if (this.$store.getters.ROLE === 'buyer')
       this.$router.push('/')
   }
}
</script>
