<template>
    <div class="ms-3 me-3">
        <div class="h3 text-center" v-if="newPart">Додати нову запчастину</div>
        <div class="h3 text-center" v-else>Редагувати інформацію</div>
        <div class="mb-3">
            <label for="name" class="form-label">Назва</label>
            <input type="text" class="form-control" id="name" placeholder="Назва запчастини" v-model="name">
            <div class="fs-6 text-danger mt-2 ms-2" v-if="errorName">Назва має бути не меньше 3х символів.</div>
        </div>
        <div class="mb-3">
            <label for="manufacturer" class="form-label">Виробник</label>
            <input type="text" class="form-control" id="manufacturer" placeholder="Виробник запчастини" v-model="manufacturer">
            <div class="fs-6 text-danger mt-2 ms-2" v-if="errorManufacturer">Назва має бути не меньше 2х символів.</div>
        </div>
        <div class="mb-3">
            <label for="manufacturerCode" class="form-label">Ідентифікатор</label>
            <input type="text" class="form-control" id="manufacturerCode" placeholder="Код запчастини" v-model="manufacturerCode">
            <div class="fs-6 text-danger mt-2 ms-2" v-if="errorManufacturerCode">Має бути.</div>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Опис</label>
            <textarea class="form-control" id="description" rows="2" v-model="description"></textarea>
            <div class="fs-6 text-danger mt-2 ms-2" v-if="errorDescription">Опис має бути не більше 100 символів</div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="stockBalance" class="form-label">Залишок</label>
                    <input type="text" class="form-control" id="stockBalance" placeholder="Одиниць" v-model="stockBalance">
                    <div class="fs-6 text-danger mt-2 ms-2" v-if="errorStockBalance">Має бути цілим, невідємним</div>
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="price" class="form-label">Ціна</label>
                    <input type="text" class="form-control" id="price" placeholder="1000,00" v-model="price">
                    <div class="fs-6 text-danger mt-2 ms-2" v-if="errorPrice">Має бути натуральним, невідємним</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <button class="btn btn-success w-100" :disabled = "!disabledButton" @click="save">Збереження</button>
            </div>
            <div class="col-6">
                <button class="btn btn-danger w-100" @click="clear">Очистити</button>
            </div>
        </div>
    </div>
</template>

<script>
import {instance} from "../config/axios";

export default {
    data() {
        return {
            id: undefined,
            name: '',
            manufacturer: '',
            manufacturerCode: '',
            description: '',
            stockBalance: 0,
            price: 0

        }
    },
    methods: {
        clear() {
            this.id = undefined;
            this.name = '';
            this.manufacturer = '';
            this.manufacturerCode = '';
            this.description = '';
            this.stockBalance = 0;
            this.price = 0;
            this.$store.commit('SET_PART', undefined);
        },
        save() {
            if (this.permissionToSave) {
                if (this.newPart && this.id === undefined) {
                    instance.post('parts/store',
                        {
                            name: this.name,
                            manufacturer: this.manufacturer,
                            manufacturer_code: this.manufacturerCode,
                            description: this.description,
                            stock_balance: Number(this.stockBalance),
                            price: this.price,
                            type_id: this.$store.getters.TYPE,
                            category_id: this.$store.getters.CATEGORY
                        }).then(r => {
                            if (r.status === 200) {
                                this.clear()
                                this.$store.commit('SET_UPDATE', true)
                            }
                        }
                    )
                } else {
                    instance.put(`parts/${this.id}`,
                        {
                            name: this.name,
                            manufacturer: this.manufacturer,
                            manufacturer_code: this.manufacturerCode,
                            description: this.description,
                            stock_balance: Number(this.stockBalance),
                            price: this.price,
                            type_id: this.$store.getters.TYPE,
                            category_id: this.$store.getters.CATEGORY
                        }).then(r => {
                            if (r.status === 200) {
                                this.clear()
                                this.$store.commit('SET_UPDATE', true)
                            }
                        }
                    )
                }
            }
        }
    },
    computed: {
        disabledButton: function () {
          return this.$store.getters.CATEGORY !== undefined && this.$store.getters.TYPE !== undefined
        },
        newPart: function () {
            return this.$store.getters.PART === undefined
        },
        errorName: function () {
            return this.name.length < 3;
        },
        errorManufacturer: function () {
            return this.manufacturer.length < 2;
        },
        errorManufacturerCode: function () {
            return this.manufacturerCode.length === 0;
        },
        errorDescription: function () {
            return this.description.length > 100;
        },
        errorStockBalance: function () {
            let value = Number(this.stockBalance);
            if (Number.isInteger(value)) {
                return value < 0;
            } else {
                return true
            }
        },
        errorPrice: function () {
            let value = Number(this.price);
            if (Number.isNaN(value)) {
                return true
            } else {
                return value < 0;
            }
        },
        permissionToSave: function () {
            return !this.errorName && !this.errorManufacturer && !this.errorManufacturerCode && !this.errorDescription && !this.errorStockBalance && !this.errorPrice
        }
    },
    beforeUpdate() {
        if (!this.newPart) {
            instance(`parts/${this.$store.getters.PART}`).then( r => {
                if (r.status === 200) {
                    this.name = r.data.data.name;
                    this.manufacturer = r.data.data.manufacturer;
                    this.manufacturerCode = r.data.data.manufacturer_code;
                    this.description = r.data.data.description;
                    this.stockBalance = r.data.data.stock_balance;
                    this.price = r.data.data.price;
                    this.id = this.$store.getters.PART;
                    this.$store.commit('SET_PART', undefined);
                    this.$store.commit('SET_BRAND', r.data.data.brand_id);
                    this.$store.commit('SET_CATEGORY', r.data.data.category_id);
                    this.$store.commit('SET_TYPE', r.data.data.type_id);
                }
            })
        }
    },
}
</script>
