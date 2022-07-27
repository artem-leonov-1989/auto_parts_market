<template>
    <div class="h4">Кошик</div>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th scope="col" style="width: 60px">Назва</th>
            <th scope="col" style="width: 80px">Номер</th>
            <th scope="col" style="width: 80px">Кіл-ть</th>
            <th scope="col" style="width: 30px">Ціна</th>
            <th style="width: 30px"></th>
        </tr>
        </thead>
        <tbody>
        <basket-item v-for="part in basketData"
                     :key="part[0]"
                     :id-part="part[0]"
                     :count="part[1]"
                     :price="part[2]"
                     :name="part[3]"
                     :number="part[4]"
                     :maxCount="part[5]">
        </basket-item>
        <tr>
            <td colspan="5">
                <div class="d-flex justify-content-end">
                    <div class="fs-4">Разом: {{ getSum }} грн.</div>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
    <div class="h6 text-center text-danger" v-if="!isAuthorized">Для замовлення треба увійти до аккаунту.</div>
    <button class="btn btn-success mt-3 w-100" @click="makeOrder" :disabled="disabledButton">Замовити</button>
    <button class="btn btn-danger mt-3 w-100" @click="clear">Очистити</button>
</template>

<script>
import basketItem from "./basket-item.vue";
import isAuth from "../../сomponents/mixins/isAuth";
import {instance} from "../../config/axios";

export default {
    name: "basket",
    mixins: [
        isAuth
    ],
    components: {
        basketItem,
    },
    methods: {
        getBasket() {
            if (localStorage.basket) {
                return this.basketData = JSON.parse(localStorage.basket)
            } else {
                return []
            }
        },
        clear() {
            localStorage.removeItem('basket')
            this.basketData =[]
        },
        makeOrder() {
            instance.post('/orders/store', {
                basket: localStorage.basket
            })
                .then(r => {
                    console.log(r.data.order_number)
                    this.clear()
                }).catch(function (error) {
                console.log(error);
            })
        }
    },
    data() {
        return {
            basketData: [],
        }
    },
    computed: {
        getSum: function () {
            let sum = 0
            this.basketData.forEach((val) => {
                sum = Number(sum + (val[1] * val[2]));
            })
            return sum.toFixed(2);
        },
        basketClear: function () {
            return this.basketData.length === 0 ;
        },
        disabledButton: function () {
            if (this.isAuthorized && this.basketClear) {
                return true
            }
            if (this.isAuthorized && !this.basketClear) {
                return false
            }
            if (!this.isAuthorized) {
                return true
            }
        }
    },
    mounted() {
        setInterval(()=> { this.getBasket() }, 250);
    }
}
</script>

