<template>
    <div>
        <form :action="url" v-on:submit.prevent="submitPost()" enctype="multipart/form-data" method="POST">
            <div class="row">
                <div class="col s12">
                    <h4>Set Prices</h4>

                    <div class="">
                        <ul>
                            <li v-for="error in errors">
                                <i class="material-icons red-text">error</i>
                                {{ error }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col s12">
                    <div id="image" class="col s12 no-pad no-margin" style="position: relative;">
                        <img class="full-width" :src="'/uploads/' + image.url"
                             @click="pin($event)">
                    </div>
                </div>

                <p>&nbsp;</p>

                <div class="col s12">
                    <table>
                        <thead>
                            <tr>
                                <th></th>
                                <th>NAME</th>
                                <th>PRICE</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(price, index) in prices">
                                <td>
                                    <span v-if="price.id">
                                        <strong>
                                            REF {{ price.id }}
                                            <a class="small-text tooltip" data-tooltip="Remove price" @click="deletePrice(price)">
                                                <i class="material-icons small-text">delete</i>
                                            </a>
                                        </strong> <br>
                                        <a href="#" :class="price.status === 'AVAILABLE' ? 'hide' : ''" v-on:click.prevent="toggleAvailability(index)">AVAILABLE</a>
                                        <a href="#" :class="price.status === 'AVAILABLE' ? '' : 'hide'" v-on:click.prevent="toggleAvailability(index)">UNAVAILABLE</a>
                                    </span>
                                </td>
                                <td>
                                    <input type="text" placeholder="Name" name="name" v-model="price.name">
                                </td>
                                <td>
                                    <input type="text"  placeholder="Price" name="amount" v-model="price.amount" required>
                                </td>
                                <td>
                                    <a class="black btn" @click="updatePrice(price)">
                                        <i class="material-icons">keyboard_arrow_right</i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        props: {
            story: {
                type: Object,
                required: true,
            },
            image: {
                type: Object,
                required: true,
            },
            url: {
                type: String,
                required: true,
            },
            csrf: {
                type: String,
                required: true,
            },
            method: {
                type: String,
                required: true
            },
            errors: {
                type: Object,
                required: true
            },
            code: {
                type: String,
                required: true
            },
            description: {
                type: String,
                required: true
            },
            allTags: {
                type: Array,
                required: true
            }
        },
        data() {
            return {
                prices: []
            }
        },
        created() {},
        mounted() {

            this.prices = this.image.prices;

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
            pin: function(event){

                const $imageViewer = $('#image');

                // get coordinates
                const x = event.pageX - $imageViewer.offset().left;
                const y = event.pageY - $imageViewer.offset().top;

                // get image dimensions
                const imageWidth = $imageViewer.width();
                const imageHeight = $imageViewer.height();

                this.prices.push({
                    name: "",
                    description: "",
                    amount: 0,
                    status: "",
                    x: (x / imageWidth),
                    y: y / imageHeight,
                    image_id: this.image.id,
                });

                this.dropPins();

            },
            updatePrice: function(price) {
                axios.post("/prices/set/" + this.image.id, price)
                    .then(response => {
                    })
                    .catch(error => {

                    })
                    .finally(_ => {
                        location.reload();
                    });
            },
            deletePrice: function(price) {
                axios.delete("/prices/" + price.id, price)
                    .then(response => {
                    })
                    .catch(error => {

                    })
                    .finally(_ => {
                        location.reload();
                    });
            },
            dropPins: function() {
                // remove all existing pins
                $(".price-pin").remove();

                this.prices.forEach(pricePin => {
                    this.dropPin(pricePin);
                });
            },
            dropPin: function(pricePin) {

                const $imageViewer = $('#image');

                // create price pin
                const pricePinDiv = document.createElement("div");
                const pricePinIconDiv = document.createElement("div");
                const pricePinTextDiv = document.createElement("div");

                const priceText = document.createTextNode("USD " + pricePin.amount);

                pricePinDiv.style.position = "absolute";
                pricePinDiv.style.top = (pricePin.y * $imageViewer.height()) + "px";
                pricePinDiv.style.left = (pricePin.x * $imageViewer.width()) + "px";

                pricePinDiv.setAttribute("class", "price-pin");

                pricePinIconDiv.setAttribute("class", "icon");

                pricePinTextDiv.setAttribute("class", "text");

                pricePinTextDiv.appendChild(priceText);

                pricePinDiv.appendChild(pricePinIconDiv);
                pricePinDiv.appendChild(pricePinTextDiv);

                $imageViewer.append(pricePinDiv);

            },
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
