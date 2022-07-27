<template>
    <div class="col">
        <div class="card text-center h-100" style="width: 18rem;">
            <div class="card-header">
                <h5 class="card-title">{{ name }}</h5>
            </div>
            <div class="card-body">
                <div class="h6 fw-bold mb-3" :class="currentClass">{{ availabilityText }}</div>
                <h6 class="card-subtitle mb-3 text-muted">{{ manufacturer_code }}-{{ manufacturer }}</h6>
                <div class="h6 border-bottom border-top pb-3 pt-2">{{ description }}</div>
                <h5 class="card-title">{{ price }} грн.</h5>
                <button type="button" class="btn btn-primary" @click="addPartInBasket" :disabled="disabledButton" v-if="!isManager">Придбати</button>
                <button type="button" class="btn btn-primary" @click="goToEdit" v-if="isManager">Редагувати</button>
            </div>
        </div>
    </div>
</template>

<script>

import isAuth from "./mixins/isAuth";

export default {
    mixins: [
        isAuth
    ],
    props: {
        id: Number,
        name: String,
        manufacturer_code: String,
        manufacturer: String,
        price: Number,
        stock_balance: Number,
        description: String,
    },
    methods: {
        addPartInBasket() {
            let basket;
            let card = [this.id, 1, this.price, this.name , this.manufacturer_code + '-' + this.manufacturer, this.stock_balance];
            if (localStorage.basket) {
                basket = JSON.parse(localStorage.basket);
                let check = true
                basket.forEach((values) => {
                    if (values[0] === this.id) {
                        check = false
                    }
                })
                if (check) {
                    basket.push(card);
                }
                localStorage.basket = JSON.stringify(basket);
            } else {
                basket = [card];
                localStorage.basket = JSON.stringify(basket);
            }
        },
        goToEdit() {
            this.$store.commit('SET_PART',this.id)
        }
    },
    data() {
        return {
            styles: {
                success: 'text-success',
                danger: 'text-danger',
            },
            availability: undefined,
            availabilityText: undefined,
            currentClass: undefined,
            disabledButton: '',
        }
    },
    mounted() {
        this.availability = Number(this.stock_balance) !== 0;
        if (this.availability) {
            this.availabilityText = 'У наявності';
            this.currentClass = this.styles.success;
            this.disabledButton = false;
        } else {
            this.availabilityText = 'Відсутнє';
            this.currentClass = this.styles.danger;
            this.disabledButton = true;
        }
    },
}
</script>
