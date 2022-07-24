import isAuth from "../../сomponents/mixins/isAuth";

export default {
    mixins: [
        isAuth
    ],
    mounted() {
        if(this.isManager) {
            this.$router.push('/sale');
        }
    }
}
