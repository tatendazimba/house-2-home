<template>
    <div class="transparent">

        <BreakComponent></BreakComponent>
        <BreakComponent></BreakComponent>
        <BreakComponent></BreakComponent>

        <div class="flex row">
            <div class="col s12 m8 valign-wrapper">
                <form v-on:submit.prevent="sendEmail()" action="" method="" class="container" style="position: relative;">

                    <div class="secondary-text">
                        <h3 class=" no-margin primary-font">
                            <strong>Send Us A Message.</strong>
                        </h3>
                    </div>

                    <p>&nbsp;</p>

                    <div class="row">
                        <div class="input-field col s6">
                            <input class="no-margin" type="text" v-model="name" placeholder="NAME" required>
                        </div>
                        <div class="input-field col s6">
                            <input class="" type="email" v-model="email" placeholder="EMAIL" required>
                        </div>
                    </div>

                    <div class="flex row">
                        <div class="col s12">
                            <textarea class="full-width" type="text" v-model="message" placeholder="MESSAGE" style="height: 200px !important;" required></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <div>
                                <strong>
                                    <span v-show="error">ERROR: </span> {{ response }}
                                </strong>
                            </div>
                            <button class="secondary btn-large full-width" type="submit" :disabled="loading">
                                {{ loading ? 'Sending...' : 'Send Message' }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col s12 m4">
                <h5 class="primary-font">
                    <strong>Location</strong>
                </h5>

                <p>6 Cumberland Court</p>
                <p>Corner 3rd Street & Baines Avenue</p>
                <p>Harare, Zimbabwe</p>

                <p>&nbsp;</p>

                <h5 class="primary-font">
                    <strong>Telephone</strong>
                </h5>

                <p>
                    <img class="ignore" src="/images/icons/social/whatsapp-colour.svg" style="height: 16px !important;"> &nbsp;&nbsp;
                    <span>+263 733 636 940</span>
                </p>

                <p>&nbsp;</p>

                <h5 class="primary-font">
                    <strong>Social Media</strong>
                </h5>

                <p>
                    <a target="_blank" href="https://www.facebook.com/House2HomeZ/" class="">
                        <img class="ignore right-margin" src="/images/icons/social/facebook-colour.svg" style="height: 16px !important;">
                    </a>
                    <a target="_blank" href="https://www.instagram.com/house2home.zw/" class="">
                        <img class="ignore right-margin" src="/images/icons/social/instagram-colour.svg" style="height: 16px !important;">
                    </a>
                </p>
            </div>

        </div>

        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>

    </div>
</template>

<script>
    import {BASE_URL} from "../config";

    export default {
        name: "ContactComponent",
        data() {
            return {
                name: "",
                email: "",
                message: "",
                response: "",
                loading: false,
                error: false,
            }
        },
        methods: {
            sendEmail: function() {
                this.loading = true;
                this.error = false;
                this.response = "";

                const self = this;

                axios.post(BASE_URL + "email", {
                        name: this.name,
                        email: this.email,
                        message: this.message,
                    })
                    .then((response) => {

                        if (response.data.code === "00") {
                            this.response = response.data.description;
                            this.name = "";
                            this.email = "";
                            this.message = "";
                        } else {
                            this.error = false;
                            this.response = response.data.description;
                        }
                    })
                    .catch((error) => {
                        this.error = error.response.data.message;
                    })
                    .finally((_) => {
                        this.loading = false;
                    });
            }
        }
    }
</script>

<style scoped>
    .dark {
        background: #171745 !important;
    }

    .darker {
        background: #1e183f !important;
    }

    .menu-column {
        border-radius: 30px;
        width: 60px;
        max-width: 100%;
        margin: 20px auto;
    }
</style>
