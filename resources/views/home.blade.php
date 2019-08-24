@extends("layouts.app")

@section('content')

    @include("partials.nav")

    <main class="container">
        <div class="flex row overflow-visible">
            <div class="col s12 overflow-visible" style="">
                <div class="shadow rectangle no-margin " style="-webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px;">
                    <div id="hero" class="carousel carousel-slider no-margin rectangle" style="">
                        @foreach($heroes as $hero)
                            <div class="carousel-item">
                                <div class="" style="position: relative;">
                                    <div class="ignore rectangle no-margin"
                                         style="background: url('uploads/{{ $hero->images[0]->url }}') no-repeat bottom right; background-size: cover;"></div>
                                    <div class="transparent {{ $hero->text_colour }} no-margin full-height"
                                         style="position: absolute; top: 0; right: 0; left: 0; vertical-align: bottom;">
                                        <div class="container hero-text hide" style="position: absolute; right: 0; left: 0; bottom: 20px;">
                                            <h1 class=" {{ $hero->text_colour }}">{{ $hero->title }}</h1>
                                            <h5 class="truncate {{ $hero->text_colour }}">{{ $hero->content }}</h5>

                                            <a href="{{ route('story', $hero) }}" class="btn primary">Read more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        @include("partials.linebreak")

        <div class="center-align overflow-visible container">
            <div class="flex row container">
                <div class="col s12">
                    <h2><strong>Be Inspired</strong></h2>
                    <p class="thin container">
                        For the modern home. Bring fashion and function into every room with unique furniture pieces from House2Home. Our furniture designs feature high-quality materials and a meticulous attention to detail, all at an affordable price-point. Whether you're furnishing a modest apartment or spacious house, discover essential pieces in modern designs that will help you create a space that you'll love to live in.
                    </p>
                </div>
            </div>
        </div>

        @include("partials.linebreak")

        <div class="center-align overflow-visible">
            <div class="flex row overflow-visible">
                <div class="col s12 m9 l8">

                    <div class="with-small-padding wrapper">
                        <span class="uppercase center-align line-underline">
                            <span>
                                Must Reads
                            </span>
                        </span>
                    </div>

                    <div class="flex row left-align top-padding bottom-padding overflow-visible">
                        @foreach($decorTips->slice(0, 2) as $post)
                            <a href="{{ route('story', $post) }}" class="col s12 m6 black-text">
                                <div class="shadow flex mobile-flex row no-margin rounded full-height">
                                    <div class="col s6 with-small-padding no-margin">
                                        <div class="full-height full-width rounded ignore"
                                             style="background: linear-gradient(to bottom, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0)), url('/uploads/{{ isset($post->images[0]) ? $post->images[0]->url : '' }}') no-repeat bottom right; background-size: cover;">
                                        </div>
                                    </div>
                                    <div class="col s6 no-pad valign-wrapper">
                                        <div class="container">
                                            <div class="top-padding bottom-padding">

                                                @include("partials.linebreak")

                                                <h5 class="">
                                                    {{ $post->title }}
                                                    <br>
                                                </h5>

                                                <h1 class="truncate small-text black-text no-margin top-small-margin bottom-small-margin">{{ $post->content }}</h1>
                                                <h1 class="small-text grey-text no-margin bottom-small-margin">
                                                    @foreach($post->tags as $tag)
                                                        <u>{{ $tag->name }}</u> &nbsp;
                                                    @endforeach
                                                </h1>

                                                @include("partials.linebreak")

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
{{--                            <a href="{{ route('story', $post) }}" class="col s6 m4 default-text">--}}
{{--                                <div class="white rounded shadow full-height">--}}
{{--                                    <div class="square no-margin ignore"--}}
{{--                                         style="background: linear-gradient(to bottom, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0)), url('/uploads/{{ $post->images[0]->url }}') no-repeat bottom right; background-size: cover;">--}}
{{--                                    </div>--}}
{{--                                    <h6 class="with-medium-padding">--}}
{{--                                        <span class="">--}}
{{--                                            {{ $post->title }}--}}
{{--                                        </span>--}}
{{--                                    </h6>--}}
{{--                                </div>--}}
{{--                            </a>--}}
                        @endforeach
                    </div>

                    <div class="flex row left-align bottom-padding overflow-visible">
                        @foreach($decorTips->slice(2, 2) as $post)
                            <a href="{{ route('story', $post) }}" class="col s12 m6 black-text">
                                <div class="shadow flex mobile-flex row no-margin rounded full-height">
                                    <div class="col s6 with-small-padding no-margin">
                                        <div class="full-height full-width rounded ignore"
                                             style="background: linear-gradient(to bottom, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0)), url('/uploads/{{ isset($post->images[0]) ? $post->images[0]->url : '' }}') no-repeat bottom right; background-size: cover;">
                                        </div>
                                    </div>
                                    <div class="col s6 no-pad valign-wrapper">
                                        <div class="container">
                                            <div class="top-padding bottom-padding">

                                                @include("partials.linebreak")

                                                <h5 class="">
                                                    {{ $post->title }}
                                                    <br>
                                                </h5>

                                                <h1 class="truncate small-text black-text no-margin top-small-margin bottom-small-margin">{{ $post->content }}</h1>
                                                <h1 class="small-text grey-text no-margin bottom-small-margin">
                                                    @foreach($post->tags as $tag)
                                                        <u>{{ $tag->name }}</u> &nbsp;
                                                    @endforeach
                                                </h1>

                                                @include("partials.linebreak")

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
{{--                            <a href="{{ route('story', $post) }}" class="col s6 m4 default-text">--}}
{{--                                <div class="white rounded shadow full-height">--}}
{{--                                    <div class="square no-margin ignore"--}}
{{--                                         style="background: linear-gradient(to bottom, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0)), url('/uploads/{{ $post->images[0]->url }}') no-repeat bottom right; background-size: cover;">--}}
{{--                                    </div>--}}
{{--                                    <h6 class="with-medium-padding">--}}
{{--                                        <span class="">--}}
{{--                                            {{ $post->title }}--}}
{{--                                        </span>--}}
{{--                                    </h6>--}}
{{--                                </div>--}}
{{--                            </a>--}}
                        @endforeach
                    </div>

                    <div class="with-padding wrapper center-align">
                        <strong class="uppercase center-align line-underline">
                        <span>
                            Start Shopping
                        </span>
                        </strong>
                    </div>

                    <p class="hide">
                        House2Home offers a host of custom products and services including headboards, centre tables, decor
                        consultancy, console tables, throw pillows, decor accessories, bedding, kitchenware and makeovers.
                    </p>

                    <div class="left-align overflow-visible">
                        <div class="row overflow-visible">
                            @foreach($specials->slice(0, 9) as $post)
                                <a href="{{ route('story', $post) }}" class="col s6 m4 no-pad default-text overflow-visible">
                                    <div class="white rounded shadow full-height">
                                        <div class="square no-margin ignore"
                                             style="background: linear-gradient(to bottom, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0)), url('/uploads/{{ $post->images[0]->url }}') no-repeat bottom right; background-size: cover;">
                                        </div>
                                        <h6 class="with-small-padding">
                                    <span class="">
                                        {{ $post->title }}
                                    </span>
                                        </h6>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>

                </div>
                <div class="col s12 m3 l4 no-pad overflow-visible">

                    <div class="white-text container ignore top-medium-padding">

                        <div class="bordered container center-align">

                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>

                            <img class="quarter-width ignore" src="{{ asset("images/icons/stage.svg") }}">

                            <br>
                            <br>

                            <h5 class="no-margin uppercase black-text">
                                Experts In
                            </h5>
                            <h2 class="no-margin">
                                <span class="script primary-text">Home & Office</span><br>
                            </h2>
                            <h5 class="no-margin uppercase black-text">
                                Make-overs
                            </h5>

                            <br>

                            <a class="label white-text white outline" href="https://wa.me/263733636940?text={{ urlencode("Hi, I am interested in your make-over services.") }}" >
                                <span class="black-text">Contact Us</span>
                            </a>

                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                        </div>

                        @include("partials.linebreak")

                    </div>

                    <div class="container">
                        <div class="bottom-small-padding top-small-padding wrapper">
                            <strong class="uppercase center-align line-underline">
                                <span>
                                    Categories
                                </span>
                            </strong>
                        </div>

                        <ul>
                            @foreach($allTags as $tag)

                                <li>
                                    <a class="black-text" href="{{ route('search', $tag->name) }}">{{ $tag->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
        </div>

        @include("partials.linebreak")
        @include("partials.linebreak")

    </main>

    @include("partials.footer")

@endsection
