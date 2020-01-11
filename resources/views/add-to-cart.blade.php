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
                    @foreach($post->images as $i => $image)
                        <idea-view-component :post="{{ json_encode($post) }}" :post_image="{{ json_encode($image) }}"></idea-view-component>
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
