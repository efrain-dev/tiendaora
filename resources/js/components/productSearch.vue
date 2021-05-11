<template>
    <div>
        <multiselect  v-model="value" :options="products" @select="setData"
                      @search-change="autoComplete" id="producto"
                      :internal-search="false" :custom-label="customLabel"
                      deselectLabel="Click para volver a seleccionar"
                      placeholder="Seleccione un producto"></multiselect>
        <input name="product" id="product" style="display: none">
    </div>
</template>

<script>

export default {


    name: "productSearch",
    data : () => {
        return  {
            products : [],
            value : null
        }
    },
    methods: {
        autoComplete(query) {
            query !== '' ? axios.get('/obtener-productos-crud/' + query).then(res => {
                this.products = res.data;
            }).catch(err => {
            }) : ''
        },
        customLabel({id_producto, nombre_producto}) {
            return `${id_producto} – ${nombre_producto}`
        },
        setData: function (value) {
            document.getElementById('product').value = value.id_producto
        }
    }
}
</script>

<style scoped>

</style>
