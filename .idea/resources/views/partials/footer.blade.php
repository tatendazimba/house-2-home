<div class="grey">
    <p>&nbsp;</p>
    <p>&nbsp;</p>

    <div class="container">
        <div class="flex row black-text">
            <div class="col s12 m4">
                <div class="">

                    <h5 class="uppercase">
                        <strong>Categories</strong>
                    </h5>

                    <ul>
                        @foreach($tags->slice(0, 5) as $tag)
                            <li>
                                <a class="capitalise black-text" href="{{ route('shop', $tag->name) }}">
                                    {{ $tag->name }}
                                </a>
                                <p class="truncate">{{ $tag->description }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="">

                    <h5 class="uppercase">
                        <strong>Inspiration</strong>
                    </h5>

                    <ul>
                        @foreach($inspiration->slice(0, 3) as $post)
                            <a href="{{ route('story', $post) }}" class="flex row">
                                <div class="col s3">
                                    <div class="square no-margin" style="background-image: url('/uploads/{{ $post->images[0]->url }}'); -webkit-background-size: cover;background-size: cover;">

                                    </div>
                                </div>
                                <div class="col s9">
                                    <strong class="capitalise black-text" href="">
                                        {{ $post->title }}
                                    </strong>
                                    <div class="truncate grey-text">{{ $post->content }}</div>
                                </div>
                            </a>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col s12 m4">
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

                    <p><strong>Email</strong>: info@house2home.co.zw </p>
                    <p><strong>Whatsapp</strong>: +263 733 636 940</p>

                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                </div>
            </div>
        </div>

        @include("partials.linebreak")

        <div class="divide"></div>

        @include("partials.linebreak")

        <div class="flex row">
            <div class="col s12 m4">
                <div class="">
                    <h5>&nbsp;</h5>

                    <img src="{{ asset('images/logo/h2h.svg') }}" style="height: 48px;">
                </div>
            </div>

            <div class="col s12 m4">
                <div class="black-text">
                    <h5 class="uppercase">
                        <strong>About Us</strong>
                    </h5>

                    <p class="justified">
                        House2Home brings classic, elegant, and glamorous design into homes around the world.

                        We style spaces from formation to finish. We also introduce new life into an existing space with beautiful results that are comfortable to our client’s home lifestyle or business setting. Whether you own your space and have lived there for several years, or you are in a rental for a short time, we believe that it is important to personalize your space and make it feel like home.
                    </p>

                    @include("partials.linebreak")

                </div>
            </div>

            <div class="col s12 m4">
                <div class="container black-text">
                    <h5 class="uppercase">
                        <strong>Social Media</strong>
                    </h5>

                    <p>
                        <a target="_blank" href="https://www.facebook.com/House2HomeZ/" class="">
                            <img class="ignore right-margin" src="{{ asset('images/icons/social/facebook-dark.svg') }}" style="height: 16px !important;">
                        </a>
                        <a target="_blank" href="https://www.instagram.com/house2home.zw/" class="">
                            <img class="ignore right-margin" src="{{ asset('images/icons/social/instagram-dark.svg') }}" style="height: 16px !important;">
                        </a>
                        <a target="_blank" href="https://wa.me/263733636940?text={{ urlencode("Hi, I just visited your website.") }}" class="">
                            <img class="ignore right-margin" src="{{ asset('images/icons/social/whatsapp-dark.svg') }}" style="height: 16px !important;">
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="black white-text">
    <div class="container with-small-padding small-text">
        House2Home 2019.
    </div>
</div>

<div class="full-width center-align no-pad">
    <div id="image-modal" class="modal no-pad">
        <div id="content" class="modal-content no-pad full-height">

        </div>
    </div>
</div>
