<template>
    <div class="white">
        <div class="container">
            <p>
                <strong>{{ item.name }}</strong>
            </p>
            <h5 class="primary-font">
                {{ currencyOptions[currency].symbol }}{{ ( item.amount * currencyOptions[currency].exchange ).toFixed(2) }}
            </h5>
        </div>

        <div class="">
            <div class="">
                <button @click="addToBasket()" id="add-to-cart" class="primary-font btn full-width secondary">
                    <span class="animated zoomIn" v-show="!loading">Add to Trolley</span>
                    <loading v-if="loading"></loading>
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "AddQuantityComponent",
        data: function() {
            return {
                quantity: 1,
                loading: false,
                payload: {
                    price: this.item.amount,
                    post: this.post,
                    item: this.item,
                },
            }
        },
        methods: {
            adjustQuantity(quantity) {
                if (this.quantity + quantity > 0)
                    this.quantity += quantity;
            },
            addToBasket: function () {

                this.loading = true;

                setTimeout(_ => {
                    this.loading = false;
                    const payload = this.post;

                    payload.price = this.item.amount;
                    payload.item = this.item;
                    payload.quantity = this.quantity;

                    this.$store.commit("addToCart", payload);

                }, 500);
            }
        },
        props: {
            item: {
                required: true,
                type: Object
            },
            post: {
                required: true,
                type: Object
            }
        },
        mounted() {
        },
        computed: {
            currency: function() {
                return this.$store.getters.currency;
            },
            currencyOptions: function() {
              return this.$store.getters.currencyOptions;
            },
            price: function() {
                return this.quantity * this.item.price;
            },
            ready: function() {

                let output = true;

                Object.keys(this.payload).forEach((value, index, i) => {

                    if (this.payload[value] === null) {

                        output = false;

                    }

                });

                return output;
            }
        }
    }
</script>
