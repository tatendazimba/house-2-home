<template>
    <div class="flex row overflow-visible">
        <div class="col s3">
            <img @click="selectImage(image)" v-for="image in post.images" class="full-width image-preview bottom-small-margin" :class="(selectedImage.id === image.id) ? 'active' : '' " :src="'/uploads/' + image.url">
        </div>
        <div class="col s9 overflow-visible">
            <div ref="imageView" id="image-view" class="full-width; overflow-visible" style="position: relative;">
                <zoom-on-hover :img-normal="'/uploads/' + selectedImage.url" :scale="2"></zoom-on-hover>
            </div>

            <div class="black">
                <i class="white-text small-text">Use mouse to zoom.</i>
            </div>

<!--            <div class="black with-padding" style="position:relative;">-->
<!--                <div class="price-pin">-->
<!--                    <div class="icon"></div>-->
<!--                    <div class="text">-->
<!--                            USD 79.99-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
        </div>


    </div>
</template>

<script>
    export default {
        components: { },
        data: function() {
            return {
                selectedImage: {},
                imageStyle: ""
            }
        },
        props: {
            post: {
                type: Object,
                required: true
            },
        },
        created() {
            this.selectImage(this.post.images[0]);
        },
        mounted() {
            this.selectImage(this.post.images[0]);
        },
        methods: {
            pin: function(event) {

                const $imageViewer = $('#image-view');


                // get coordinates
                const x = event.pageX - $imageViewer.offset().left;
                const y = event.pageY - $imageViewer.offset().top;

                // create price pin
                const pricePinDiv = document.createElement("div");
                const pricePinIconDiv = document.createElement("div");
                const pricePinTextDiv = document.createElement("div");

                const priceText = document.createTextNode("USD79.99");

                pricePinDiv.style.position = "absolute";
                pricePinDiv.style.top = y + "px";
                pricePinDiv.style.left = x + "px";

                pricePinDiv.setAttribute("class", "price-pin");

                pricePinIconDiv.setAttribute("class", "icon");

                pricePinTextDiv.setAttribute("class", "text");

                pricePinTextDiv.appendChild(priceText);

                pricePinDiv.appendChild(pricePinIconDiv);
                pricePinDiv.appendChild(pricePinTextDiv);

                $imageViewer.append(pricePinDiv);

                console.log("pin x: ", x);
                console.log("pin y: ", y);
                console.log("this.$refs.imageView: ", document.getElementById("image-view"));

            },
            selectImage(image) {
                this.imageStyle = "width: 100%; height: auto !important;";
                this.selectedImage = image;

                this.zoom(image);

            },
            zoom(image) {

            }
        }
    }
</script>

<style scoped>

</style>
