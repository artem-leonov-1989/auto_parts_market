export default {
    computed: {
        isManager: function () {
            return this.$store.getters.ROLE === 'manager';
        },
        isAuthorized: function () {
            return this.$store.getters.USERNAME !== undefined;
        },
        nameUser: function () {
            return this.$store.getters.USERNAME;
        }
    }
}
