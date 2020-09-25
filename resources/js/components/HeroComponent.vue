<template>
    <div>
        <div class="" :style="{ background: 'url(/uploads/' + post.images[0].url + ') no-repeat center center', backgroundSize: 'cover' }">
           <div class="container">
               <div class="hide-on-med-and-down">
                   <spacer :height="300"></spacer>

                   <h1 :class="post.text_colour">{{ post.title }}</h1>

                   <spacer :height="50"></spacer>
                   <a class="white btn-large black-text" href="">
                       Start Shopping
                   </a>

                   <spacer :height="100"></spacer>
               </div>

               <div class="hide-on-large-only with-small-padding">

                   <spacer :height="200"></spacer>

                   <h1 :class="post.text_colour">{{ post.title }}</h1>
                   <p :class="post.text_colour" class="">{{ post.content }}</p>

                   <spacer :height="50"></spacer>
                   <a class="white btn-large black-text" href="">
                       Start Shopping
                   </a>

                   <spacer :height="100"></spacer>
               </div>
           </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "HeroComponent",
        props: {
            post: {
                type: Object,
                required: true,
            },
        },
        data() {
            return {
                salt: Math.random().toString(36).substring(7),
            }
        },
        created() {},
        mounted() {

            window.addEventListener("load", (event) => {
                this.dropPins();
            });

            window.addEventListener("resize", (_) => {
                this.dropPins();
            });
        },
        methods: {
            toggleAvailability: function(index) {

                const price = this.image.prices[index];

                if (this.image.prices[index].status === "AVAILABLE")
                    price.status = "OUT OF STOCK";
                else
                    price.status = "AVAILABLE";

                this.updatePrice(price);
            },
            dropPins: function() {
                // remove all existing pins
                // $(".numbered-pin").remove();

                this.prices.forEach((pricePin, index) => {
                    this.dropPin(pricePin, index);
                });
            },
            dropPin: function(pricePin, index) {

                console.log("pricePin: ", pricePin);

                const $imageViewer = $("#" + this.salt + '-image-' + this.image.id);

                // create price pin
                const pricePinDiv = document.createElement("div");
                const pricePinIconDiv = document.createElement("div");
                const pricePinTextDiv = document.createElement("div");

                const priceText = document.createTextNode("$" + pricePin.amount.toFixed(2));

                pricePinDiv.style.position = "absolute";
                pricePinDiv.style.top = (pricePin.y * $imageViewer.height()) + "px";
                pricePinDiv.style.left = (pricePin.x * $imageViewer.width()) + "px";

                // pricePinDiv.setAttribute("id", "price-" + pricePin.id);
                pricePinDiv.setAttribute("class", "numbered-pin");

                pricePinIconDiv.setAttribute("class", "icon");

                pricePinTextDiv.setAttribute("class", "text");

                pricePinTextDiv.appendChild(priceText);

                pricePinDiv.appendChild(pricePinIconDiv);
                pricePinDiv.appendChild(pricePinTextDiv);

                $imageViewer.append(pricePinDiv);
            },
        },
        computed: {
            image() {
                return this.post_image ? this.post_image : this.post.images[0];
            },
            prices() {
                return this.image.prices ? this.image.prices : [];
            }
        }
    }
</script>

<style scoped>
    td, input {
        margin: 0 !important;
        padding: 0;
    }

    select {
        color: black !important;
    }
</style>
