<template>
    <tr>
        <td>{{ name }}</td>
        <td>{{ number }}</td>
        <td><input class="form-control table-input" type="number" v-model="newCount"></td>
        <td>{{ price }}</td>
        <td><button class="btn btn-danger" @click="del">X</button></td>
    </tr>
</template>

<script>

export default {
    name: "basket-item",
    props: {
        idPart: Number,
        count: Number,
        price: Number,
        name: String,
        number: String,
        maxCount: Number,
    },
    data() {
        return {
            newCount: this.count
        }
    },
    methods: {
        del() {
            let basket = JSON.parse(localStorage.basket)
            for (let i=0; i < basket.length; i++) {
                if (basket[i][0] === this.idPart) {
                    basket.splice(i, 1)
                }
            }
            localStorage.basket = JSON.stringify(basket);
        }
    },
    watch: {
        newCount: function (val) {
            if (val > this.maxCount) {
                this.newCount = this.maxCount
            }
            if (val <= 0 || !Number.isInteger(val)) {
                this.newCount = 1
            }
            let basket = JSON.parse(localStorage.basket);
            basket.forEach((val) => {
                if (val[0] === this.idPart) {
                    val[1] = this.newCount
                }
            })
            localStorage.basket = JSON.stringify(basket);
        },
    },
}
</script>

<style scoped>

</style>
