<template>
    <div>
        <bannnersComponent></bannnersComponent>
        <allProductsComponent></allProductsComponent>
    </div>
</template>

<script>
    import bannnersComponent from '../components/layout/banners.vue';
    import allProductsComponent from '../components/layout/allProducts.vue';

    export default {
        components: {
            bannnersComponent,
            allProductsComponent
        },
    }
</script>