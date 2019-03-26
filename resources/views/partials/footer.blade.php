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
                                    <div class="square no-margin ignore" style="background-image: url('/uploads/{{ $post->images[0]->url }}'); -webkit-background-size: cover;background-size: cover;">

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

                    <img src="{{ asset('images/logo/h2h.svg') }}" style="height: 40px;">
                </div>
            </div>

            <div class="col s12 m4">
                <div class="black-text">
                    <h5 class="uppercase">
                        <strong>About Us</strong>
                    </h5>

                    <p class="justified">
                        <b>Finest Bespoke Interiors</b>

                        <br>
                        <br>

                        House2home brings classic, glamorous and  exquisite designs into homes and offices. We style spaces from formation to finish,  introducing new life into existing spaces with thoughtful, liveable, enjoyable and beautiful results that are comfortable to our client’s home lifestyle or business setting. Whether you own your space and have lived there for several years, or you are in a rental for a short time, we believe that it is important to personalize your space and make it feel like home.
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

@section("scripts")
    <script>

        $(document).ready(function () {
            const instance = M.Modal.init(
                document.getElementById("image-modal")
            );

            M.Sidenav.init(document.querySelectorAll('.sidenav'), {});

            $("img").click(function () {

                if ($(this).attr("class")) {
                    if (!$(this).attr("class").includes("ignore")) {
                        const image = $(this.cloneNode(true));

                        image.removeClass("full-width").addClass("full-height");

                        $("#image-modal #content").html(image);

                        instance.open();
                    }
                }
            });

            $("div").click(function () {

                if ($(this).attr("class")) {
                    if (!$(this).attr("class").includes("ignore")) {
                        if ($(this).css('background')) {

                            const background = $(this).css('background');

                            // check if there's a url
                            if (background.indexOf("url(\"") !== -1) {

                                // get data between url ()
                                const url = background.substring(
                                    background.lastIndexOf('url("') + 5,
                                    background.lastIndexOf("\")")
                                );

                                // create image element
                                const img = document.createElement("img");

                                img.setAttribute("src", url);

                                // make full height
                                img.setAttribute("class", "full-height");

                                // append to modal
                                $("#image-modal #content").html(img);

                                // instance open
                                instance.open();

                            }
                        }
                    }
                }
            });
        });

        M.Carousel.init(document.querySelectorAll(".carousel.carousel-slider"), {
            fullWidth: true,
            indicators: true,
            duration: 200
        });

        const instance = M.Carousel.getInstance(document.getElementById("hero"));

        setInterval(function () {
            if (!instance.pressed) {
                instance.next();
            }
        }, 7000);

        M.Collapsible.init(document.querySelectorAll('.collapsible'), {});

        M.Sidenav.init(document.querySelectorAll('.mobile-menu'), {});

    </script>
@endsection
