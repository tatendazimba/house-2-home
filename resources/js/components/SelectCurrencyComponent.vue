<template>
    <div class="">

        <br>

        <div class="row no-margin">
            <div class="col s12 no-margin">
                <div class="bottom-small-padding right-align">
                    <span class="primary-font uppercase">Show Prices In:</span>
                    <span>
                        <span v-for="currencyOption of currencies">
                            <span @click="selectCurrency(currencyOption)" :class="currency === currencyOption ? 'primary white-text' : 'bordered grey-text'" class="label cursor-click">{{ currencyOption }}</span>&nbsp;
                        </span>
                    </span>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: "SelectCurrencyComponent",
        data() {
            return {
                currencies: ["GBP", "ZAR", "USD"],
            }
        },
        methods: {
            selectCurrency(currency) {
                this.$store.commit("selectCurrency", currency);
            }
        },
        computed: {
            currency() {
                return this.$store.getters.currency;
            }
        }
    }
</script>

<style scoped>

</style>
