<template>
    <div class="container">
        <div class="full-width row no-margin">
            <div class="col s12 no-pad">
                <div :id="salt + '-image-' + image.id" class="col s12 no-pad no-margin" style="position: relative;">
                    <img alt="" class="full-width" :src="'/uploads/' + image.url">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "IdeaViewComponent",
        props: {
            post: {
                type: Object,
                required: true,
            },
            postImage: {
                type: Object,
                required: true,
            },
        },
        data() {
            return {
                salt: Math.random().toString(36).substring(7),
                prices: [],
            }
        },
        created() {
            this.prices = this.image.prices ? this.image.prices : [];
        },
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
                return this.postImage ? this.postImage : this.post.images[0];
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
