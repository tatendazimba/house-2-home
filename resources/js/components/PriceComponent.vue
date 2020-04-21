<template>
    <span class="primary-text primary-font">
        {{ currencyOptions[currency].symbol }}{{ ( price * currencyOptions[currency].exchange ).toFixed(2) }}
    </span>
</template>

<script>
    export default {
        name: "PriceComponent",
        methods: {},
        props: {
            price: {
                required: true,
                type: Number
            }
        },
        mounted() {},
        computed: {
            currency: function() {
                return this.$store.getters.currency;
            },
            currencyOptions: function() {
              return this.$store.getters.currencyOptions;
            },
        }
    }
</script>
