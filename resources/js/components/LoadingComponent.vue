<template>
    <span class="small-text">
        <i v-for="dot of dots" class="animated zoomIn material-icons">fiber_manual_record</i>
    </span>
</template>

<script>
    export default {
        name: "LoadingComponent",
        data() {
            return {
                dots: []
            }
        },
        methods: {
            newDot() {
                setTimeout(_ => {
                    this.dots.push("Another one!");
                }, this.dots.length * 0);
            }
        },
        mounted() {

            setTimeout(_ => {
                this.newDot();
            }, 1250);

            setTimeout(_ => {
                this.newDot();
            }, 750);

            setTimeout(_ => {
                this.newDot();
            }, 250);

        }
    }
</script>

<style scoped>
    i {
        vertical-align: unset !important;
        font-size: 14px !important;
    }
</style>
