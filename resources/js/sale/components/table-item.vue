<template>
    <tr>
        <th scope="row">{{ dataDB.order_number }}</th>
        <td>
            <div class="d-flex flex-column">
                <part-item v-for="part in dataDB.parts"
                           :key="part.id"
                           :name="part.name"
                           :man="part.manufacturer"
                           :man-code="part.manufacturer_code">
                </part-item>
            </div>
        </td>
        <td>{{ dataDB.status }}</td>
        <td>{{ getDate(dataDB.created_at) }}</td>
        <td>{{ getDate(dataDB.updated_at) }}</td>
        <td>{{ dataDB.post_ttn }}</td>
    </tr>
</template>

<script>
import {instance} from "../../config/axios";
import isAuth from "../../сomponents/mixins/isAuth";
import partItem from "./part-item.vue";

export default {
    name: "table-item",
    components: {
        partItem
    },
    mixins: [
        isAuth
    ],
    props: {
        idOrder: Number
    },
    data() {
        return {
            dataDB: [],
        }
    },
    methods: {
        getDate(date) {
            let customDate = new Date(date)
            let numMonth = customDate.getMonth();
            if (numMonth.length === 1) {
                numMonth = '0' + numMonth
            }
            return customDate.getDate() + '-' + numMonth + '-' + customDate.getFullYear()
        }
    },
    computed: {

    },
    mounted() {
        instance(`orders/${this.idOrder}`).then(r => {
            this.dataDB = r.data.data
        })
    }
}
</script>

