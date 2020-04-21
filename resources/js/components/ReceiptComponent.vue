<template>
    <div class="">

        <br>

        <div class="center-align top-margin bottom-margin">
            <h3 class="black-text">Thank You!</h3>

            <strong class="grey-text">Your payment was received.</strong>
        </div>

        <div class="rule"></div>

        <div class="row top-margin bottom-margin">
            <div class="col s12 offset-m4 m4 center-align">
                <a target="_blank" :href="'/pdf/receipt/' + transactionDetails.orderId" class="primary btn full-width modal-close">DISMISS</a>
            </div>
        </div>

        <break></break>

    </div>
</template>

<script>
    export default {
        data: function() {
            return {}
        },
        methods: {
          removeFromBasket: function () {
          },
          clearBasket: function () {
              this.$store.commit("clearBasket");
          }
        },
        props: {
            transactionDetails: {
                type: Object,
                required: false
            },
        },
        mounted() {},
        computed: {
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
