<div class="black white-text">
    <p>&nbsp;</p>
    <p>&nbsp;</p>

    <div class="container">

        @include("partials.linebreak")

        <div class="divide"></div>

        @include("partials.linebreak")

        <div class="flex row">
            <div class="col s12 m2">
                <div class="">
                    <h5>&nbsp;</h5>

                    <img src="{{ asset('images/logo/h2h.svg') }}" style="height: 40px;">
                </div>
            </div>

            <div class="col s12 m5">
                <div class="">
                    <h5 class="uppercase">
                        <strong>About Us</strong>
                    </h5>

                    <p class="justified">
                        <strong>Finest Bespoke Interiors</strong>

                        <br>
                        <br>

                        House2Home brings classic, glamorous and  exquisite designs into homes and offices. We style spaces from formation to finish,  introducing new life into existing spaces with thoughtful, liveable, enjoyable and beautiful results that are comfortable to our client’s home lifestyle or business setting. Whether you own your space and have lived there for several years, or you are in a rental for a short time, we believe that it is important to personalize your space and make it feel like home.
                    </p>

                    @include("partials.linebreak")

                </div>
            </div>

            <div class="col s12 m5">
                <div class="container">

                    <h5 class="uppercase">
                        <strong>Location</strong>
                    </h5>

                    <p>6 Cumberland Court</p>
                    <p>Avenues</p>
                    <p>Harare, Zimbabwe</p>

                    <p>&nbsp;</p>

                    <h5 class="uppercase">
                        <strong>Contact Us</strong>
                    </h5>

{{--                    <p><strong>Email</strong>: info@house2home.co.zw </p>--}}
                    <p><strong>Whatsapp</strong>: +263 733 636 940</p>

                    <p>&nbsp;</p>

                    <h5 class="uppercase">
                        <strong>Social Media</strong>
                    </h5>

                    <p>
                        <strong>Follow us:</strong>

                        <br>
                        <br>

                        <a target="_blank" href="https://www.facebook.com/House2HomeZ/" class="">
                            <img class="ignore right-margin" src="{{ asset('images/icons/social/facebook-colour.svg') }}" style="height: 32px !important;">
                        </a>
                        <a target="_blank" href="https://www.instagram.com/house2home.zw/" class="">
                            <img class="ignore right-margin" src="{{ asset('images/icons/social/instagram-colour.svg') }}" style="height: 32px !important;">
                        </a>
                        <a target="_blank" href="https://wa.me/263733636940?text={{ urlencode("Hi, I just visited your website.") }}" class="">
                            <img class="ignore right-margin" src="{{ asset('images/icons/social/whatsapp-colour.svg') }}" style="height: 32px !important;">
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="black white-text">
    <div class="container with-small-padding small-text">
        House2Home 2020.
    </div>
</div>

<div class="full-width center-align no-pad">
    <div id="image-modal" class="modal no-pad">
        <div id="content" class="modal-content no-pad full-height">

        </div>
    </div>
</div>
