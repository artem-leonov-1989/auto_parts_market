<template>
    <div class="container mt-3">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Замовлення</th>
                <th scope="col">Склад</th>
                <th scope="col">Статус</th>
                <th scope="col">Дата створення</th>
                <th scope="col">Дата опрацювання</th>
                <th scope="col">ТТН</th>
                <th scope="col" v-if="isManager">ТТН</th>
            </tr>
            </thead>
            <tbody>
            <table-item v-for="order in ordersId"
                        :key=order.id
                        :id-order=order.id>
            </table-item>
            </tbody>
        </table>
    </div>
</template>

<script>
import tableItem from "./table-item.vue";
import isAuth from "../../сomponents/mixins/isAuth";
import {instance} from "../../config/axios";
export default {
    mixins: [
        isAuth
    ],
    data() {
        return {
            ordersId: [],
        }
    },
    components: {
        tableItem
    },
    mounted() {
        instance.post('/orders/user').then(r => {
            this.ordersId = r.data
        })
    }
}
</script>
