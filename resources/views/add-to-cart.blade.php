@extends("layouts.app")

@section('content')
    @include("partials.nav")

    <main class="fade">

        <span class="hide-on-small-and-down">
            <br>
            <br>
            <br>
            <br>
            <br>
        </span>

        <div class="white container hide-on-med-and-up">

            @include("partials.linebreak")

            <div class="row">
                <div class="col s12">
                    <div class="">

                        <h3 class="">
                            <strong>{{ $post->title }}</strong>
                        </h3>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col s12">
                    <a id="previous-mobile" class="small-text black-text left" href="#">
                        <i class="material-icons grey-text">arrow_back</i>
                        <strong>Previous</strong>
                    </a>
                    <a id="next-mobile" class="right small-text black-text" href="#">
                        <strong>Next</strong>
                        <i class="material-icons grey-text">arrow_forward</i>
                    </a>
                </div>
            </div>

            <div class="row mobile-idea-view-slick">
                @foreach($post->images as $i => $image)
                    <div class="col s12 ">
                        <idea-view-component :post="{{ json_encode($post) }}" :post_image="{{ json_encode($image) }}"></idea-view-component>

                        <div class="">
                            <p class="">{{ $post->content }}</p>
                        </div>

                        <div class="grey">
                            <div class="container">

                                <div class="row no-margin">
                                    <div class="col s12 no-pad">

                                        @if(count($image->prices))
                                            <div class="right-padding left-padding">
                                                @include("partials.linebreak")

                                                <h5>
                                                    <strong>Items in the picture</strong>
                                                </h5>

                                                <hr>
                                                <br>
                                            </div>
                                        @endif

                                        <div class="">
                                            @foreach($image->prices as $i => $price)
                                                <div class="right-padding left-padding left-align">
                                                    <strong class="">{{ $i + 1 }}.</strong>
                                                    <span>{{ $price->name }}</span> <strong class="">${{ $price->amount }}</strong>
                                                </div>
                                            @endforeach
                                        </div>

                                        @if(count($image->prices))
                                            <div>
                                                @include("partials.linebreak")
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col s12">
                    <div class="">

                        <div class="variables center-align">
                            @foreach($post->tags as $tag)
                                <a href="{{ route("shop", $tag->name) }}" class="cursor-click inline-block black-text" style="border: 1px solid #cacbcd; padding: 3px 12px; margin: 2px 0px;">{{ $tag->name }}</a>
                            @endforeach
                        </div>

                        @include("partials.linebreak")

                        <div class="grey">
                            <div class="container">
                                @include("partials.linebreak")

                                <h5>
                                    <strong>You Can Pay Online</strong>
                                </h5>

                                <br>

                                <payment-options-component></payment-options-component>

                                <br>

                                <p>
                                    <strong>
                                        <i class="material-icons">local_shipping</i>
                                    </strong>
                                    And have your products delivered to you in Harare.
                                </p>

                                <strong class="small-text">
                                    <u>
                                        <a class="primary-text" href="">Delivery Options & Prices</a>
                                    </u>
                                </strong>

                                <br>
                                <br>

                                <p>
                                    <strong>
                                        <i class="material-icons">near_me</i>
                                    </strong>
                                    Or, Pickup your order for <strong>FREE</strong> from our Harare shop.
                                </p>

                                <strong class="small-text">
                                    <u>
                                        <a class="primary-text" href="">Our Location</a>
                                    </u>
                                </strong>

                                @include("partials.linebreak")
                            </div>
                        </div>

                        @include("partials.linebreak")

                        <div class="grey">
                            <div class="container">

                                @include("partials.linebreak")

                                <h5>
                                    <strong>Or Pay On Delivery</strong>
                                </h5>

                                <br>

                                <p>And have your products delivered to you in Harare.</p>

                                <strong class="small-text">
                                    <a class="primary-text" href="">Delivery Options</a>
                                </strong>

                                @include("partials.linebreak")

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="white container hide-on-small-and-down">

            @include("partials.linebreak")

            <div class="flex row">
                <div class="col s12 m10 l8 ">
                    @foreach($post->images as $i => $image)
                        <idea-view-component :post="{{ json_encode($post) }}" :post_image="{{ json_encode($image) }}"></idea-view-component>

                        @include("partials.linebreak")

                    @endforeach
                </div>
                <div class="col m4">
                    <div class="">

                        <h2 class="flow-text">
                            <strong>{{ $post->title }}</strong>
                        </h2>

                        <div class="">
                            <p class="">{{ $post->content }}</p>
                        </div>

                        @include("partials.linebreak")

                        <div class="grey">
                            <div class="container">

                                @include("partials.linebreak")

                                <h5>
                                    <strong>Items in the picture</strong>
                                </h5>

                                <hr>
                                <br>

                                <div class="">
                                    @foreach($post->images[0]->prices as $i => $price)
                                        <div class="left-align">
                                            <strong class="">{{ $i + 1 }}.</strong>
                                            <span>{{ $price->name }}</span> <strong class="">${{ $price->amount }}</strong>
                                        </div>
                                    @endforeach
                                </div>

                                @include("partials.linebreak")

                            </div>
                        </div>

                        @include("partials.linebreak")

                        <div class="grey">
                            <div class="container">
                                @include("partials.linebreak")

                                <h5>
                                    <strong>You Can Pay Online</strong>
                                </h5>

                                <br>

                                <payment-options-component></payment-options-component>

                                <br>

                                <p>
                                    <strong>
                                        <i class="material-icons">local_shipping</i>
                                    </strong>
                                    And have your products delivered to you in Harare.
                                </p>

                                <strong class="small-text">
                                    <u>
                                        <a class="primary-text" href="">Delivery Options & Prices</a>
                                    </u>
                                </strong>

                                <br>
                                <br>

                                <p>
                                    <strong>
                                        <i class="material-icons">near_me</i>
                                    </strong>
                                    Or, Pickup your order for <strong>FREE</strong> from our Harare shop.
                                </p>

                                <strong class="small-text">
                                    <u>
                                        <a class="primary-text" href="">Our Location</a>
                                    </u>
                                </strong>

                                @include("partials.linebreak")
                            </div>
                        </div>

                        @include("partials.linebreak")

                        <div class="grey">
                            <div class="container">

                                @include("partials.linebreak")

                                <h5>
                                    <strong>Or Pay On Delivery</strong>
                                </h5>

                                <br>

                                <p>And have your products delivered to you in Harare.</p>

                                <strong class="small-text">
                                    <a class="primary-text" href="">Delivery Options</a>
                                </strong>

                                @include("partials.linebreak")

                            </div>
                        </div>

                        @include("partials.linebreak")

                        <div class="variables center-align">
                            @foreach($post->tags as $tag)
                                <a href="{{ route("shop", $tag->name) }}" class="cursor-click inline-block black-text" style="border: 1px solid #cacbcd; padding: 3px 12px; margin: 2px 0px;">{{ $tag->name }}</a>
                            @endforeach
                        </div>

                        @include("partials.linebreak")

                    </div>
                </div>
            </div>
        </div>

        @include("partials.linebreak")
        @include("partials.linebreak")
        @include("partials.linebreak")

    </main>

    @include("partials.footer")
@endsection
