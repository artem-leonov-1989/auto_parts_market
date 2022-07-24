<template>
    <div class="h2">
        Клиенты
    </div>
</template>

<script>
export default {
    date() {
        return {
            isManager: false
        }
    },
    watch: {
        isManager: function (val) {
            if (val) {
                this.$router.push('/sale');
            }
        },
    },
    computed: {
        isManager() {
            return this.$store.getters.ROLE
        }
    }
}
</script>
