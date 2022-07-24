<template>
<shop-bar></shop-bar>
</template>

<script>


export default {
    date() {
        return {
            isManager: false,
        }
    },
    methods: {

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
