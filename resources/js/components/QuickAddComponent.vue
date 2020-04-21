<template>
    <div class="overflow-visible" style="position: absolute; top: 0px; left: 0px;">
        <div class="black-text">
            <div id="add-to-cart" data-target="basket" class="sidenav-trigger price-pin">
                <div class="icon"></div>
                <div class="text">
                    <div class="full-height valign-wrapper primary-font uppercase">
                        Add to Trolley
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "QuickAddComponent",
        data: function() {
            return {
                payload: {
                    price: this.post.price,
                    post: this.post
                },
            }
        },
        methods: {
          addToBasket: function () {

          }
        },
        props: [
            'post'
        ],
        mounted() {},
        computed: {
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
