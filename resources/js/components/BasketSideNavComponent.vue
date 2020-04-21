<template>
    <div id="basket" class="sidenav col s12 m7 l3 black-text white" style="">
        <basket></basket>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {}
        },
        methods: {},
        mounted() {},
        computed: {
            basket() {
                return this.$store.getters.basket;
            }
        }
    }
</script>
