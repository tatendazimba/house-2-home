<template>
    <div class="container">
        <div class="black-text">
            <h4 class="no-margin">
                <span class="leaf"><strong class="primary-text">£ </strong><span>{{ payload.price }}</span></span>
            </h4>

            <br>

            <div class="divide"></div>

            <break></break>

            <div class="justified">
                {{ post.content }}
            </div>

            <break></break>

        </div>

    </div>
</template>

<script>
    export default {
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
