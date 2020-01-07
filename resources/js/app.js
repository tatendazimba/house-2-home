
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import {Carousel, Collapsible, Sidenav} from "materialize-css";

require('./bootstrap');

window.Vue = require('vue');
window.$ = require('jquery')
window.JQuery = require('jquery')

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context('./', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// vue.component('image-viewer-component', require('./components/ImageViewComponent').default);

// vue.component('zoom-on-hover', require('./components/ZoomOnHover').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    mounted: function() {

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

        Sidenav.init(document.querySelectorAll('.sidenav'), {});

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
