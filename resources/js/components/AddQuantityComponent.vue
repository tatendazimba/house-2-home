<template>
    <div class="">
        <div class="">
            <h5 class="primary-text primary-font">
                {{ currencyOptions[currency].symbol }}{{ ( post.price * currencyOptions[currency].exchange ).toFixed(2) }}
            </h5>
        </div>

        <div class="">
            <div class="">
                <div class="right-align inline-block ">
                    <h5 class="black-text primary-font inline-block">
                        <a href="#" v-on:click.prevent="adjustQuantity(-1)">
                            <i class="material-icons grey-text big-text">indeterminate_check_box</i>
                        </a>
                        {{ quantity }}
                        <a href="#"  v-on:click.prevent="adjustQuantity(1)">
                            <i class="material-icons grey-text big-text">add_box</i>
                        </a>
                    </h5>
                </div>
                <div class="right inline-block">
                    <h5 class="flow-text grey-text primary-font inline-block right-align">
                        = {{ currencyOptions[currency].symbol }}{{ ( price * currencyOptions[currency].exchange ).toFixed(2) }}
                    </h5>
                </div>
            </div>
            <div class="">

                <div class="amber lighten-5 black-text left-align top-small-padding bottom-small-padding">

                    <div class="col s12">
                        <i class="material-icons">info</i>
                        <strong>Notice</strong>
                        <p>Ordering has been closed until <strong>December 28th, 2019</strong>.</p>
                    </div>
                </div>

<!--                <button @click="addToBasket()" id="add-to-cart" class="primary-font btn full-width secondary">-->
<!--                    <span class="animated zoomIn" v-show="!loading">Add to Trolley</span>-->
<!--                    <loading v-if="loading"></loading>-->
<!--                </button>-->
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
                    price: this.post.price,
                    post: this.post
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
                    payload.quantity = this.quantity;

                    this.$store.commit("addToCart", payload);

                }, 500);
            }
        },
        props: {
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
                return this.quantity * this.post.price;
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
