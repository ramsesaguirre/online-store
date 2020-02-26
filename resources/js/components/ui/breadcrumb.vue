<template>
    <div class="banner-top bounceInRight animated">
        <div class="container">
            <h3 >{{ name }}</h3>
            <h4><router-link :to="{ name: 'home' }">Home</router-link><label>/</label>{{ name }}</h4>
            <div class="clearfix"> </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            name: String
        },
        created: function () {
            console.log(this.name);
        }
    }
</script>