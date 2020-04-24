<template>
    <a href="#" data-target="basket" :class="dark_text ? 'black-text' : 'white-text'" class="sidenav-trigger cursor-click valign-wrapper full-height no-margin" style="display: flex;">
        <img :src="dark_text ? '/images/icons/add-to-cart.svg' : '/images/icons/cart.svg'" style="height: 100px;">
        &nbsp;
        <strong>({{ itemsCount }})</strong>

    </a>
</template>

<script>
    import * as M from "materialize-css";

    export default {
        props: {
            dark_text: {
                type: Boolean,
                default: false
            }
        },
        data: function() {
            return {}
        },
        methods: {
          showBasket: function () {
          }
        },
        mounted() {
            M.Sidenav.init(document.querySelectorAll('#mobile-menu'), {});
            M.Sidenav.init(document.querySelectorAll('#basket'), { edge: "right" });
        },
        computed: {
            itemsCount() {
                return Object.keys(this.basket).length;
            },
            basket() {
                return this.$store.getters.basket;
            }
        }
    }
</script>

<style scoped>
    sup {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        display: inline-block;
        font-weight: bold;
    }
</style>
