<template>
    <div :style="{height: height ? (height + 'px') : '100px', width: width ? (width + 'px') : '100%'}"></div>
</template>

<script>
    export default {
        name: "SpacerComponent",
        props: {
            height: {
                type: Number,
                default: 100
            },
            width: {
                type: Number,
                default: null
            },
        },
        mounted() {
        }
    }
</script>
