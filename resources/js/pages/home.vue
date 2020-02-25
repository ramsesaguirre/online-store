<template>
    <div>
        <videoComponent></videoComponent>
        <productsComponent></productsComponent>
        <sectionsComponent></sectionsComponent>
        <bannnersComponent></bannnersComponent>
    </div>
</template>

<script>
    import videoComponent from '../components/layout/video.vue';
    import productsComponent from '../components/layout/products.vue';
    import sectionsComponent from '../components/layout/sections.vue';
    import bannnersComponent from '../components/layout/banners.vue';

    export default {
        components: {
            videoComponent,
            productsComponent,
            sectionsComponent,
            bannnersComponent
        },
    }
</script>