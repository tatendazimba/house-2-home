
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import {Carousel, Collapsible, Sidenav} from "materialize-css";
import Vuex from "vuex";
import {GBP, USD, ZAR} from "./rates";
import {camelCase, upperFirst} from "lodash";

require('./bootstrap');

window.Vue = require('vue');
window.$ = require('jquery')
window.JQuery = require('jquery')

Vue.component('idea-view-component', require('./components/IdeaViewComponent').default);
Vue.component('add-quantity-component', require('./components/AddQuantityComponent').default);

Vue.component('message-box', require('./components/BaseMessageBox').default);
Vue.component('contact-component', require('./components/ContactComponent.vue').default);
Vue.component('shopping-item-component', require('./components/AddToCartComponent.vue').default);

Vue.component('select-currency-component', require('./components/SelectCurrencyComponent').default);

Vue.component('break', require('./components/BreakComponent').default);
Vue.component('loading', require('./components/LoadingComponent').default);

Vue.component('basket-summary', require('./components/BasketSummaryComponent').default);
Vue.component('basket', require('./components/BasketComponent').default);
Vue.component('basket-item', require('./components/BasketItemComponent').default);
Vue.component('basket-sidenav', require('./components/BasketSideNavComponent').default);

Vue.component('paypal', require('./components/PayPalComponent').default);
Vue.component('payment-options-component', require('./components/PaymentOptionsComponent').default);

Vue.component('receipt', require('./components/ReceiptComponent').default);

Vue.component('price-component', require('./components/PriceComponent').default);

const store = new Vuex.Store({
    state: {
        basket: localStorage.getItem("basket") ? JSON.parse(localStorage.getItem("basket")) : [],
        currency: localStorage.getItem("currency") ? localStorage.getItem("currency") : "USD",
        currencyOptions: {
            "GBP": {
                symbol: "£",
                exchange: GBP,
            },
            "ZAR": {
                symbol: "R",
                exchange: ZAR,
            },
            "USD": {
                symbol: "$",
                exchange: USD,
            },
        },
    },
    mutations: {
        selectCurrency(state, currency) {
            state.currency = currency;
            localStorage.setItem("currency", state.currency);
        },
        adjustQuantity(state, payload) {

            const basket = state.basket;

            // find basket item in cart
            const index = state.basket.findIndex(x => x.id === payload.basketItem.id);

            // remove existing item
            if (index !== -1) {

                // replace with new basket item
                if (payload.basketItem.quantity + payload.quantity > 0) {

                    const newBasketItem = payload.basketItem;
                    newBasketItem.quantity += payload.quantity;

                    Vue.set(state.basket, index, newBasketItem);

                }

                localStorage.setItem("basket", JSON.stringify(state.basket));

            }

        },
        addToCart(state, basketItem) {

            if (!Array.isArray(state.basket)) {
                state.basket = [];
            }

            // delete existing entry and add new
            const index = state.basket.findIndex(x => x.id === basketItem.id);

            if (index !== -1) {
                state.basket[index] = basketItem;
            } else {
                state.basket.unshift(basketItem);
            }

            localStorage.setItem("basket", JSON.stringify(state.basket));

            heap.track('ADD TO TROLLEY', {
                basketItem: JSON.stringify(basketItem),
                cart: JSON.stringify(state.basket),
                itemName: basketItem.title,
                itemId: basketItem.id,
                quantity: basketItem.quantity,
            });

        },
        removeFromBasket(state, basketItem) {

            const index = state.basket.findIndex(x => x.id === basketItem.id);

            if (index !== -1)
                state.basket.splice(index, 1);

            localStorage.setItem("basket", JSON.stringify(state.basket));

            heap.track('REMOVE FROM TROLLEY', {
                basketItem: JSON.stringify(basketItem),
                cart: JSON.stringify(state.basket),
                itemName: basketItem.title,
                itemId: basketItem.id,
                quantity: basketItem.quantity,
            });
        },
        clearBasket(state) {
            state.basket = [];
            localStorage.setItem("basket", JSON.stringify(state.basket));
        }
    },
    getters: {
        basket: state => {

            // check for errors
            state.basket.forEach((value, index) => {

                // check if value != null, has price set as number, has quantity
                if (value === null)
                    state.basket.splice(index, 1);
                else {
                    if (isNaN(value.price) || isNaN(value.quantity))
                        state.basket.splice(index, 1);
                }
            });

            localStorage.setItem("basket", JSON.stringify(state.basket));

            return state.basket;
        },
        currency: state => {
            return state.currency;
        },
        currencyOptions: state => {
            return state.currencyOptions;
        }
    }
});

const app = new Vue({
    el: '#app',
    store,
    mounted: function() {

        $('.mobile-idea-view-slick').slick({
            autoplay: false,
            slidesPerRow: 1,
            slidesToShow: 1,
            swipeToSlide: true,
            adaptiveHeight: true,
            arrows: true,
            prevArrow: '#previous-mobile',
            nextArrow: '#next-mobile',
        });

        $('.hero-slick').slick({
            autoplay: true,
            slidesPerRow: 1,
            slidesToShow: 1,
            swipeToSlide: true,
            adaptiveHeight: true,
            arrows: false,
        });

        $('.large-slick').slick({
            autoplay: true,
            slidesPerRow: 4,
            slidesToShow: 4,
            swipeToSlide: true,
            arrows: false,
        });

        $('.slick').slick({
            autoplay: true,
            slidesPerRow: 3,
            slidesToShow: 3,
            swipeToSlide: true,
            arrows: false,
        });

        $('.mobile-slick').slick({
            autoplay: true,
            slidesPerRow: 2,
            slidesToShow: 2,
            swipeToSlide: true,
            arrows: false,
        });

        Collapsible.init(document.querySelectorAll('.collapsible'), {});

        // Sidenav.init(document.querySelectorAll('.sidenav'), {});

        if (document.querySelectorAll(".carousel.carousel-slider").length) {

            Carousel.init(document.querySelectorAll(".carousel.carousel-slider"), {
                fullWidth: true,
                indicators: true,
                duration: 300,
                onCycleTo: function (hero) {

                    // hide hero text
                    $(".hero-text").addClass("hide");

                    const $heroText = $(hero).find(".hero-text");

                    setTimeout(function () {
                        $heroText.removeClass("hide").addClass("animated fadeIn");
                    }, 1300);

                }
            });

            const instance = Carousel.getInstance(document.getElementById("hero"));

            setInterval(function () {
                if (!instance.pressed) {
                    instance.next();
                }
            }, 7000);
        }
    },
});
