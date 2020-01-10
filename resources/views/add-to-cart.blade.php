@extends("layouts.app")

@section('content')
    @include("partials.nav")

    <main class="fade">

        <br>
        <br>
        <br>
        <br>
        <br>

        <div class="white container">

            @include("partials.linebreak")

            <div class="flex row">
                <div class="col s12 m10 l8 ">
                    <idea-view-component :post="{{ json_encode($post) }}"></idea-view-component>
                </div>
                <div class="col m4">
                    <div class="">

                        <div class="grey">
                            <div class="container">
                                @include("partials.linebreak")

                                <h5>
                                    <strong>Items in the picture</strong>
                                </h5>

                                <br>

                                <div>
                                    <div class="white circle info-circle valign-wrapper">
                                        <strong>
                                            <i class="material-icons">add</i>
                                        </strong>
                                    </div>
                                </div>

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

                        <h2 class="flow-text">
                            <strong>{{ $post->title }}</strong>
                        </h2>

                        <div class="">
                            <p class="">{{ $post->content }}</p>
                        </div>

                        @include("partials.linebreak")

                        <div class="">
                            @foreach($post->images[0]->prices as $i => $price)
                                <div class="left-align">
                                    <strong class="">{{ $i + 1 }}.</strong>
                                    <span>{{ $price->name }}</span> <strong class="">${{ $price->amount }}</strong>
                                    {{--                            <span class="right">--}}
                                    {{--                                <svg width="16" height="16" viewBox="0 0 16 16" class="icon">--}}
                                    {{--                                    <path id="defs-cart" d="M13.958 9.317l2-6a.971.971 0 0 0-.95-1.306V2H2.433L1.925.644a1 1 0 0 0-1.876.7l3.005 8.008a1 1 0 0 0 .938.648h9.016a1 1 0 0 0 .95-.683zM4.686 8l-1.5-4h10.436l-1.336 4h-7.6zm.308 6a2 2 0 1 1-2-2 2 2 0 0 1 2 2zm9.016 0a2 2 0 1 1-2-2 2 2 0 0 1 2 2z"></path>--}}
                                    {{--                                </svg>--}}
                                    {{--                            </span>--}}
                                </div>
                            @endforeach
                        </div>

                        @include("partials.linebreak")

                        <div class="variables center-align">
                            @foreach($post->tags as $tag)
                                <a href="{{ route("shop", $tag->name) }}" class="cursor-click inline-block black-text" style="border: 1px solid #cacbcd; padding: 3px 12px; margin: 2px 0px;">{{ $tag->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="white flex row top-padding">
                <div class="col s12 m6">
                    <image-view-component :post="{{ json_encode($post) }}"></image-view-component>
                </div>
                <div class="col s12 m6">
                    <div class="container">
                        <div class="">
                            <h3 class="no-margin">{{ $post->title }}</h3>
                            <h5>{{ $post->price }}</h5>

                            <br>

                            <div class="divide"></div>

                            <br>

                            <div class="justified">
                                {!! nl2br(e($post->content)) !!}
                            </div>

                            @include("partials.linebreak")

                            <div class="variables">
                                @foreach($post->tags as $tag)
                                    <a class="cursor-click inline-block black-text" style="border: 1px solid #cacbcd; padding: 3px 12px; margin: 2px 0px;">{{ $tag->name }}</a>
                                @endforeach
                            </div>

                            @include("partials.linebreak")

                            <a id="add-to-cart" class="btn-large primary outline" style="box-shadow: none !important;" href="https://wa.me/263733636940?text={{ urlencode("Hi, I am interested in REF# " . $post->id . ". \n\n" . $post->title . " ") }}" >
                                <span class="">Contact Sales</span>
                            </a>

                            @include("partials.linebreak")

                        </div>
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
