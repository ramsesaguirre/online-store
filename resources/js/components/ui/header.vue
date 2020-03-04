<template>
    <div class="spec bounceIn animated">
        <h3>{{ name }}</h3>
        <div class="ser-t">
            <b></b>
            <span><i></i></span>
            <b class="line"></b>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            name: String
        }
    }
</script>