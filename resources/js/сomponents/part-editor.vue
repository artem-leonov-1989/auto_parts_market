<template>
    <div class="ms-3 me-3">
        <div class="h3 text-center" v-if="newPart">Додати нову запчастину</div>
        <div class="h3 text-center" v-else>Редагувати інформацію</div>
        <div class="mb-3">
            <label for="name" class="form-label">Назва</label>
            <input type="text" class="form-control" id="partName" placeholder="Назва запчастини">
            <div class="valid-feedback fs-4">
                Looks good!
            </div>
        </div>
        <div class="mb-3">
            <label for="manufacturer" class="form-label">Виробник</label>
            <input type="text" class="form-control" id="manufacturer" placeholder="Виробник запчастини">
        </div>
        <div class="mb-3">
            <label for="manufacturerCode" class="form-label">Ідентифікатор</label>
            <input type="text" class="form-control" id="manufacturerCode" placeholder="Код запчастини">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Опис</label>
            <textarea class="form-control" id="description" rows="3"></textarea>
        </div>
        <div class="row g-3">
            <div class="col-5">
                <div class="mb-3">
                    <label for="stock_balance" class="form-label">Залишок</label>
                    <input type="text" class="form-control" id="stock_balance" placeholder="Одиниць">
                </div>
            </div>
            <div class="col-5">
                <div class="mb-3">
                    <label for="price" class="form-label">Ціна</label>
                    <input type="text" class="form-control" id="price" placeholder="1000,00">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-10">
                <button class="btn btn-success w-100" :disabled = "!disabledButton">Збереження</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    computed: {
        disabledButton() {
          return this.$store.getters.BRAND !== undefined && this.$store.getters.CATEGORY !== undefined && this.$store.getters.TYPE !== undefined
        },
        newPart() {
            return this.$store.getters.PART === undefined
        },
    }
}
</script>
