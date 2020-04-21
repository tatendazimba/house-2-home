<template>
    <div class="">
        <div class="grey">
            <div class="flow-text container primary-font top-margin grey-text text-darken-4">
                <img class="hide-on-med-and-down" src="/images/icons/add-to-cart.svg" style="height: 30px;">
                <strong>Your Trolley</strong>
                <br>
            </div>
            <div class="container bottom-margin">
                <strong class="">
                    {{ currencyOptions[currency].symbol }}{{ ( subTotal * currencyOptions[currency].exchange ).toFixed(2) }}
                </strong>
            </div>
        </div>

        <basket-item v-for="basketItem of basket" :key="basketItem.id" :rawBasketItem="basketItem"></basket-item>

        <break></break>

        <div class="container">
            <strong>TOTAL</strong>
            <strong class="right small-text">
                {{ currencyOptions[currency].symbol }}{{ ( subTotal * currencyOptions[currency].exchange ).toFixed(2) }}
            </strong>

            <break></break>

            <div class="small-text">
                Shipping, taxes, and discounts calculated at checkout. Orders will be processed in GBP.
            </div>

            <br>

            <a id="checkout" href="/checkout" class="btn full-width primary">Check Out</a>
        </div>

        <break></break>

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
            currency() {
                return this.$store.getters.currency;
            },
            currencyOptions() {
                return this.$store.getters.currencyOptions;
            },
            subTotal: function() {

                let total = 0;

                Object.keys(this.basket).forEach((key) => {
                    const quantity = this.basket[key].quantity ? this.basket[key].quantity : 1;

                    total += (this.basket[key].price * quantity);
                });

                return total;
            },
            basket() {
                return this.$store.getters.basket;
            }
        }
    }
</script>
