<template>
    <div class="">
        <div class="black-text container center-align">
            <div class="center-align bottom-margin">
                <h3 class="primary-font">
                    <strong>{{ currencyOptions[currency].symbol }}{{ (( subtotal + shippingDetails.type.price ) * currencyOptions[currency].exchange ).toFixed(2) }}</strong>
                </h3>

                <strong class="grey-text primary-font"><span class="black-text">REF:</span> {{ ref }}</strong>
            </div>

            <div class="rule"></div>

            <break></break>

            <div class="center-align top-margin">
                <form v-on:submit.prevent="makeOrder()" action="" method="POST">
                    <h4 class="primary-font uppercase">Recipient Details</h4>

                    <div class="col s6">
                        <div class="input-field">
                            <label for="name">Full Name</label>
                            <input id="name" class="full-width" type="text" name="name" v-model="shippingDetails.name" required>
                        </div>
                    </div>

                    <div class="col s6">
                        <div class="input-field">
                            <label for="mobile">Mobile Number</label>
                            <input id="mobile" class="full-width" type="text" name="mobile" v-model="shippingDetails.mobile" required>
                        </div>
                    </div>

                    <div v-show="shippingDetails.type.title !== 'Harare CBD'" class="col s12">
                        <div class="input-field">
                            <label for="address">Address</label>
                            <textarea id="address" class="full-width" type="text" name="address" style="height: 100px !important;" v-model="shippingDetails.address"></textarea>
                        </div>
                    </div>

                    <div class="col s12">
                        <div class="flex mobile-flex row no-margin">
                            <div class="col s12">
                                <h5 class="primary-font uppercase">Select Delivery Option</h5>
                            </div>
                        </div>
                        <div v-for="shippingOption of shippingOptions" class="cursor-click bordered flex mobile-flex row no-margin">
                            <div class="col s3 valign-wrapper">
                                <label class="input-field">
                                    <input :id="shippingOption.id" class="with-gap" type="radio" name="text_colour"  @click="setShippingOption(shippingOption)" required>
                                    <span></span>
                                </label>
                            </div>
                            <div class="col s6 valign-wrapper left-align">
                                <span>
                                    <label :for="shippingOption.id">
                                        <span>
                                            {{ shippingOption.title }}
                                        </span>

                                        <br>

                                        <span class="primary-text small-text">*{{ shippingOption.content }} <strong></strong></span>
                                    </label>
                                </span>
                            </div>
                            <div class="col s3 valign-wrapper right-align">
                                <label :for="shippingOption.id">
                                    <strong>
                                        {{ currencyOptions[currency].symbol }}{{ ( shippingOption.price * currencyOptions[currency].exchange ).toFixed(2) }}
                                        <sup class="primary-text">*</sup>
                                    </strong>
                                </label>
                            </div>
                        </div>
                    </div>

                    <break></break>

                    <div v-show="orderPlaced" class="col s12">
                        <div class="input-field">
                            <label for="promoCode">Promo Code <i>(Optional)</i></label>
                            <input id="promoCode" class="full-width" type="text" name="promoCode" v-model="shippingDetails.promoCode">
                        </div>
                    </div>

                    <break></break>

                    <div class="col s12">
                        <i v-show="error" class="material-icons red-text">error</i>
                        <strong v-html="message"></strong>
                    </div>

                    <div v-show="loading" class="col s12">
                        <div class="input-field">
                            <button class="btn-large grey darken-2 full-width" type="submit" :disabled="loading">Processing...</button>
                        </div>
                    </div>

                    <div v-show="!showPayPal" class="col s12">
                        <div class="input-field">
                            <button class="btn-large secondary full-width" type="submit" :disabled="loading">Place Order</button>
                        </div>
                    </div>
                </form>

                <br>

                <div v-show="showPayPal" id="paypal-button-container"></div>
            </div>
        </div>

        <div id="receipt" class="modal">
            <receipt :transactionDetails="transactionDetails"></receipt>
        </div>

    </div>
</template>

<script>
    import {Modal} from "materialize-css";

    export default {
        props: {
            shippingOptions: {
                type: Array,
                required: true,
            }
        },
        data: function() {
            return {
                transactionDetails: {
                    orderId: null
                },
                message: "",
                attempts: 0,
                orderId: "",
                error: false,
                loading: false,
                orderPlaced: false,
                shippingDetails: {
                    name: "",
                    mobile: "263",
                    promoCode: "",
                    total: "",
                    type: {
                        price: 0,
                        title: "",
                    },
                    contact: "",
                    address: "",
                },
            }
        },
        created() {},
        mounted() {

            Modal.init(document.querySelectorAll('.modal'), {
                // onCloseEnd: self.clearBasket()
            });

            paypal.Buttons({
                createOrder: (data, actions) => {

                    this.logToServer('PAYPAL CREATE ORDER', {
                        orderId: this.ref,
                        destination: this.shippingDetails.type.title,
                        subTotal: this.subtotal  + this.shippingDetails.type.price,
                        shippingPrice: this.shippingDetails.type.price,
                        cart: this.basket,
                        data: data,
                        actions: actions,
                        shipping: this.shippingDetails,
                    });

                    heap.track('PAYPAL CREATE ORDER', {
                        orderId: this.ref,
                        subTotal: this.subtotal  + this.shippingDetails.type.price,
                        cart: JSON.stringify(this.basket),
                        data: JSON.stringify(data),
                        actions: JSON.stringify(actions),
                        shipping: JSON.stringify(this.shippingDetails),
                    });

                    this.message = "";
                    this.attempts = 0;

                    const items = [];

                    this.basket.forEach(function (basketItem) {
                        items.push(
                            {
                                name: basketItem.title,
                                description: "",
                                unit_amount: {
                                    value: basketItem.price.toFixed(2),
                                    currency_code: "GBP",
                                },
                                quantity: basketItem.hasOwnProperty("quantity") ? basketItem.quantity : 1,
                                sku: basketItem.id,
                            }
                        );
                    });

                    items.push(
                        {
                            name: "Shipping",
                            description: "Cost of delivery",
                            unit_amount: {
                                value: this.shippingDetails.type.price.toFixed(2),
                                currency_code: "GBP",
                            },
                            quantity: 1,
                            sku: 0,
                        }
                    );

                    const description = "Icons Order ";

                    const purchase_unit = {
                        reference_id: this.ref,
                        amount: {
                            currency_code: "GBP",
                            value: (this.subtotal  + this.shippingDetails.type.price).toFixed(2),
                            breakdown: {
                                item_total: {
                                    value: (this.subtotal + this.shippingDetails.type.price).toFixed(2),
                                    currency_code: "GBP",
                                }
                            }
                        },
                        payee: {
                            "merchant_id": "ELFUHH28NZEEA"
                        },
                        payment_instruction: {
                            disbursement_mode: "INSTANT"
                        },
                        shipping_type: "PICKUP",
                        description: description.substr(0, 125),
                        custom_id: this.ref,
                        invoice_id: this.ref,
                        soft_descriptor: "Icons Groceries",
                        items: items
                    };

                    this.logToServer('PAYPAL PAYMENT INITIATE', {
                        orderId: this.ref,
                        destination: this.shippingDetails.type.title,
                        subTotal: this.subtotal  + this.shippingDetails.type.price,
                        shippingPrice: this.shippingDetails.type.price,
                        details: purchase_unit,
                        cart: this.basket,
                        data: data,
                        shipping: this.shippingDetails,
                        shippingDestination: this.shippingDetails.type.title,
                    });

                    heap.track('PAYPAL PAYMENT INITIATE', {
                        orderId: this.ref,
                        subTotal: this.subtotal  + this.shippingDetails.type.price,
                        shippingPrice: this.shippingDetails.type.price,
                        details: JSON.stringify(purchase_unit),
                        cart: JSON.stringify(this.basket),
                        data: JSON.stringify(data),
                        shipping: JSON.stringify(this.shippingDetails),
                        shippingDestination: this.shippingDetails.type.title,
                    });

                    // Set up the transaction
                    const transaction = actions.order.create({
                        purchase_units: [purchase_unit],
                        application_context: {
                            shipping_preference: 'NO_SHIPPING'
                        }
                    });

                    this.logToServer('PAYPAL PAYMENT CREATE ORDER', {
                        orderId: this.ref,
                        destination: this.shippingDetails.type.title,
                        shippingDestination: this.shippingDetails.type.title,
                        subTotal: this.subtotal  + this.shippingDetails.type.price,
                        shippingPrice: this.shippingDetails.type.price,
                        purchaseUnit: purchase_unit,
                        orderResponse: transaction,
                        cart: this.basket,
                        shipping: this.shippingDetails,
                        actions: actions,
                    });

                    heap.track('PAYPAL PAYMENT CREATE ORDER', {
                        orderId: this.ref,
                        shippingDestination: this.shippingDetails.type.title,
                        subTotal: this.subtotal  + this.shippingDetails.type.price,
                        purchaseUnit: JSON.stringify(purchase_unit),
                        orderResponse: JSON.stringify(transaction),
                        cart: JSON.stringify(this.basket),
                        shipping: JSON.stringify(this.shippingDetails),
                        actions: JSON.stringify(actions),
                    });

                    return transaction;

                },
                onApprove: (data, actions) => {
                    return actions.order.capture().then((details) => {

                        this.transactionDetails = details;

                        this.logToServer('PAYPAL PAYMENT SUCCESS', {
                            details: details,
                            cart: details.basket,
                            data: data,
                            actions: actions,
                            shipping: this.shippingDetails,
                        });

                        heap.track('PAYPAL PAYMENT SUCCESS', {
                            details: JSON.stringify(details),
                            cart: JSON.stringify(details.basket),
                            data: JSON.stringify(data),
                            actions: JSON.stringify(actions),
                            shipping: JSON.stringify(this.shippingDetails),
                        });

                        // update order
                        this.updateOrder(data);

                    });
                },
                onError: (err) => {

                    this.logToServer('PAYPAL PAYMENT ERROR', {
                        details: err,
                        cart: this.basket,
                        shipping: this.shippingDetails,
                    });

                    heap.track('PAYPAL PAYMENT ERROR', {
                        details: JSON.stringify(err),
                        cart: JSON.stringify(this.basket),
                        shipping: JSON.stringify(this.shippingDetails),
                    });

                    this.error = true;
                    this.message = "Oops. Failed to capture payment: " + err;

                },
                style: {
                }
            }).render('#paypal-button-container');
        },
        methods: {
            setShippingOption(shippingOption) {
                this.shippingDetails.type = shippingOption;
            },
            logToServer(name, payload) {
                axios.post("/api/logger", {
                    name: name,
                    payload: JSON.stringify(payload)
                }, {})
                    .then(response => {})
                    .catch(error => {})
                    .finally( _ => {});
            },
            makeOrder() {
                this.loading = true;
                this.error = false;
                this.orderPlaced = false;
                this.message = "";
                this.attempts = 0;

                // add additional fields to payload
                this.shippingDetails.cart = JSON.stringify(this.basket);
                this.shippingDetails.total = this.subtotal + this.shippingDetails.type.price;
                this.shippingDetails.shipping_price = this.shippingDetails.type.price;
                this.shippingDetails.shipping = this.shippingDetails.type.title;

                axios.post("/api/orders", this.shippingDetails, {})
                    .then(response => {

                        if (response.status === 200) {
                            if (response.data.code === "00") {
                                this.orderId = response.data.description;
                                this.transactionDetails.orderId = response.data.description;
                                this.orderPlaced = true;

                                this.logToServer('MAKE ORDER SUCCESS', {
                                    message: this.message,
                                    orderId: this.orderId,
                                    total: this.subtotal,
                                    cart: this.basket,
                                    shipping: this.shippingDetails,
                                });

                                heap.track('MAKE ORDER SUCCESS', {
                                    message: this.message,
                                    orderId: this.orderId,
                                    total: this.subtotal,
                                    cart: JSON.stringify(this.basket),
                                    shipping: JSON.stringify(this.shippingDetails),
                                });

                            } else {
                                this.message = response.data.description;
                                this.error = true;

                                this.logToServer('MAKE ORDER ERROR', {
                                    message: this.message,
                                    orderId: this.orderId,
                                    total: this.subtotal,
                                    cart: this.basket,
                                    shipping: this.shippingDetails,
                                });

                                heap.track('MAKE ORDER ERROR', {
                                    message: this.message,
                                    orderId: this.orderId,
                                    total: this.subtotal,
                                    cart: JSON.stringify(this.basket),
                                    shipping: JSON.stringify(this.shippingDetails),
                                });
                            }
                        } else {
                            this.message = "Whoops. Something went wrong. Please contact our Customer Care if the problem persists.";
                            this.error = true;

                            this.logToServer('MAKE ORDER ERROR', {
                                message: this.message,
                                orderId: this.orderId,
                                total: this.subtotal,
                                cart: this.basket,
                                shipping: this.shippingDetails,
                            });

                            heap.track('MAKE ORDER ERROR', {
                                message: this.message,
                                orderId: this.orderId,
                                total: this.subtotal,
                                cart: JSON.stringify(this.basket),
                                shipping: JSON.stringify(this.shippingDetails),
                            });
                        }
                    })
                    .catch(error => {
                        this.message = "Oops. Something went wrong. Please contact our Customer Care if the problem persists.";
                        this.error = true;

                        this.logToServer('MAKE ORDER ERROR', {
                            message: this.message,
                            orderId: this.orderId,
                            total: this.subtotal,
                            cart: this.basket,
                            error: error,
                            shipping: this.shippingDetails,
                        });

                        heap.track('MAKE ORDER ERROR', {
                            message: this.message,
                            orderId: this.orderId,
                            total: this.subtotal,
                            cart: JSON.stringify(this.basket),
                            error: JSON.stringify(error),
                            shipping: JSON.stringify(this.shippingDetails),
                        });

                    })
                    .finally( _ => {
                        this.loading = false;

                    });
            },
            makePayPalOrder() {

                this.loading = true;
                this.error = false;
                this.message = "";

                // add additional fields to payload
                this.shippingDetails.cart = JSON.stringify(this.basket);
                this.shippingDetails.shipping = this.shippingDetails.type;

                axios.post("/api/orders", this.shippingDetails)
                    .then(response => {
                        if (response.status === 200) {
                            if (response.data.code === "00") {
                                this.orderId = response.data.description;

                                M.Modal.getInstance(document.getElementById("receipt")).open();

                                this.clearBasket();

                            } else {
                                this.message = response.data.friendly;
                                this.error = true;

                                // this.updateOrder(payload);

                            }
                        } else {
                            this.message = "Failed to update order. Trying again....";
                            this.error = true;

                            // this.updateOrder(payload);
                        }
                    })
                    .catch(error => {
                        this.message = error.response.data.message ? error.response.data.message : "";
                        this.error = true;

                        // this.updateOrder(payload);

                    })
                    .finally( _ => {
                        this.loading = false;

                        heap.track('UPDATE ORDER', {
                            message: this.message,
                            orderId: this.orderId,
                            cart: JSON.stringify(this.basket),
                            shipping: JSON.stringify(this.shippingDetails),
                            payload: JSON.stringify(payload),
                        });

                    });
            },
            updateOrder(payload) {

                this.loading = true;
                this.error = false;
                this.message = "";

                // add additional fields to payload
                this.shippingDetails.cart = JSON.stringify(this.basket);
                this.shippingDetails.shipping = this.shippingDetails.type;

                axios.put("/api/orders/" + this.orderId, {
                    paypal_response: JSON.stringify(payload)
                    }, {})
                    .then(response => {

                        if (response.status === 200) {
                            if (response.data.code === "00") {
                                this.orderId = response.data.description;
                                // this.transactionDetails.orderId = response.data.description;

                                M.Modal.getInstance(document.getElementById("receipt")).open();

                                this.clearBasket();

                            } else {
                                this.message = response.data.friendly;
                                this.error = true;

                                // this.updateOrder(payload);

                            }
                        } else {
                            this.message = "Failed to update order. Trying again....";
                            this.error = true;

                            // this.updateOrder(payload);
                        }
                    })
                    .catch(error => {
                        this.message = error.response.data.message ? error.response.data.message : "";
                        this.error = true;

                        // this.updateOrder(payload);

                    })
                    .finally( _ => {
                        this.loading = false;

                        heap.track('UPDATE ORDER', {
                            message: this.message,
                            orderId: this.orderId,
                            cart: JSON.stringify(this.basket),
                            shipping: JSON.stringify(this.shippingDetails),
                            payload: JSON.stringify(payload),
                        });
                    });
            },
            checkShippingDetails() {
                return !!(this.shippingDetails.name && this.shippingDetails.mobile.length >= 12 && (this.shippingDetails.type === "CBD Pickup" || (this.shippingDetails.type === "Home Delivery") && this.shippingDetails.address));
            },
            today: function() {
                const today = new Date();
                let dd = today.getDate();

                let mm = today.getMonth()+1;
                const yyyy = today.getFullYear();

                if(dd<10)
                {
                    dd='0'+dd;
                }

                if(mm<10)
                {
                    mm='0'+mm;
                }

                return mm+'-'+dd+'-'+yyyy;
            },
            clearBasket: function () {
                this.loading = false;
                this.orderPlaced = false;
                this.error = false;
                this.message = "";
                this.orderId = "";
                this.attempts = 0;

                this.$store.commit("clearBasket");

            },
        },
        computed: {
            showPayPal() {
                if (this.orderPlaced && !this.loading)
                    return true;
                else
                    return false;
            },
            currency() {
                return this.$store.getters.currency;
            },
            currencyOptions() {
                return this.$store.getters.currencyOptions;
            },
            basket() {
                return this.$store.getters.basket;
            },
            ref: function () {
                return this.orderId;
            },
            subtotal: function () {

                let total = 0;

                Object.keys(this.basket).forEach((key) => {

                    const quantity = this.basket[key].quantity ? this.basket[key].quantity : 1;

                    total += (this.basket[key].price * quantity);
                });

                return total;
            },
        }
    }
</script>
