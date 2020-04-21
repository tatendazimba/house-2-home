<template>
    <div class="">
        <div class="divide"></div>

        <br>

        <div class="flex row no-margin">
            <div class="col s4">
                <img class="full-width" :src="'/uploads/' + basketItem.images[0].url">
            </div>
            <div class="col s8">
                <strong class="">{{ basketItem.item.name }}</strong> IN <a class="primary-text" :href="'/story/' + basketItem.id">{{ basketItem.title }}</a>
                <div class="top-small-padding bottom-small-padding">
                    {{ currencyOptions[currency].symbol }}{{ ( basketItem.price * currencyOptions[currency].exchange ).toFixed(2) }}
                </div>

                <a v-on:click.stop="removeFromBasket(basketItem)" class="grey-text small-text cursor-click">
                    <u>REMOVE</u>
                </a>
            </div>
        </div>

        <br>

        <div class="divide"></div>
    </div>

</template>

<script>
    export default {
        props: {
            rawBasketItem: {
                type: Object,
                required: true
            },
        },
        data() {
            return {
                basketItem: this.rawBasketItem,
            }
        },
        watch: {
            rawBasketItem: {
                handler (newValue, oldValue) {
                    this.basketItem = newValue
                },
                deep: true
            },
        },
        methods: {
            adjustQuantity(quantity) {

                if (this.q + quantity > 0) {
                    this.q += quantity;

                    // const newBasketItem = this.basketItem;
                    // newBasketItem.quantity += quantity;
                    //
                    // this.basketItem = newBasketItem;

                    // Vue.set(this.basketItem, "quantity", this.basketItem.quantity + quantity);
                    // this.basketItem.quantity = this.basketItem.quantity + quantity;

                }

                this.$store.commit("adjustQuantity", {
                    basketItem: this.basketItem,
                    quantity: quantity,
                });
            },
            removeFromBasket: function (basketItem) {
                this.$store.commit("removeFromBasket", basketItem);
            },
            add: function () {

            },
            subtract: function () {

            }
        },
        mounted() {
        },
        computed: {
            computedBasketItem() {
                return this.rawBasketItem;
            },
            currency() {
                return this.$store.getters.currency;
            },
            quantity() {
                return  this.rawBasketItem.quantity;
            },
            currencyOptions() {
                return this.$store.getters.currencyOptions;
            }
        }
    }
</script>
