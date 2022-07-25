export default {
    data() {
        return {
            classes:{
                select: 'btn-dark',
                noSelect: 'btn-outline-dark',
            },
            selectId: null,
        }
    },
    methods: {
        buttonClass(id) {
            if (id === this.selectId) {
                return this.classes.select
            } else {
                return this.classes.noSelect
            }
        }
    }
}
