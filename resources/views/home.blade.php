@extends("layouts.app")

@section('content')
    @include("partials.nav")

    <main class="container">
        <div class="flex row overflow-visible">
            <div class="col s12 m8 l9 overflow-visible" style="">
                <div class="rounded shadow rectangle no-margin hide-on-small-only">
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
                <div class="rounded shadow square no-margin hide-on-med-and-up">
                    <div id="hero" class="carousel carousel-slider no-margin square" style="">
                        @foreach($heroes as $hero)
                            <div class="carousel-item">
                                <div class="" style="position: relative;">
                                    <div class="ignore square no-margin"
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
            <div class="col s12 m4 l3 overflow-visible hide-on-small-only">
                @foreach($decorTips->slice(10, 1) as $post)
                    <div class="white-text shadow no-margin rounded full-height valign-wrapper" style="background: linear-gradient(rgba(0, 0, 0, .7), rgba(0, 0, 0, .7)), url('uploads/{{ $post->images[0]->url }}') no-repeat bottom right; background-size: cover;">

                        @include("partials.linebreak")

                        <div class="container center-align white-text">

                            <img class="quarter-width" src="{{ asset("images/icons/stage.svg") }}">

                            <br>
                            <br>

                            <h5 class="no-margin uppercase">
                                We do
                            </h5>
                            <h2 class="no-margin">
                                <span class="script primary-text">Home & Office</span><br>
                            </h2>
                            <h5 class="no-margin uppercase">
                                Make-overs
                            </h5>

                            <br>

                            <a class="label white-text white">
                                <span class="black-text">Contact Us</span>
                            </a>

                            <br>
                            <br>
                        </div>

                        @include("partials.linebreak")
                    </div>
                @endforeach
            </div>
        </div>

        @include("partials.linebreak")

        <div class="center-align">
            <div class="flex row">
                <div class="col s12 m9 l8">

                    <div class="with-small-padding wrapper">
                        <span class="uppercase center-align line-underline">
                            <span>
                                Be Inspired
                            </span>
                        </span>
                    </div>

                    <div class="flex row left-align bottom-padding">
                        @foreach($decorTips->slice(1, 3) as $post)
                            <a href="{{ route('story', $post) }}" class="col s12 m4 default-text">
                                <div class="white rounded shadow full-height">
                                    <div class="square no-margin ignore"
                                         style="background: linear-gradient(to bottom, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0)), url('/uploads/{{ $post->images[0]->url }}') no-repeat bottom right; background-size: cover;">
                                    </div>
                                    <h6 class="with-medium-padding">
                                        <span class="">
                                            {{ $post->title }}
                                        </span>
                                    </h6>
                                </div>
                            </a>
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

                    @foreach($categories->slice(0, 4) as $tag)
                        <div class="left-align">
                            <div class="row">
                                @foreach($tag->posts()->orderBy("id", "desc")->get()->slice(0, 4) as $post)
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
                    @endforeach

                </div>
                <div class="col s12 m3 l4 no-pad">
                    <div class="bottom-small-padding top-small-padding wrapper">
                        <strong class="uppercase center-align line-underline">
                            <span>
                                Instagram
                            </span>
                        </strong>
                    </div>

                    <div class="">
                        <div class="row">
                            @foreach($instagramImages as $post)
                                <div class="col s6 no-pad left-small-padding right-small-padding bottom-small-padding">
                                    <div class="shadow rounded transparent">
                                        <div class="no-margin square" style="background: url('{{ str_replace("http://", "https://", $post->images->standard_resolution->url) }}') no-repeat bottom right; background-size: cover;"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col s12 m8 l9 justified">
                <div class="with-padding wrapper center-align">
                    <strong class="uppercase center-align script line-underline">
                        <span>
                            Start Shopping
                        </span>
                    </strong>
                </div>

                <p class="hide">
                    House2Home offers a host of custom products and services including headboards, centre tables, decor
                    consultancy, console tables, throw pillows, decor accessories, bedding, kitchenware and makeovers.
                </p>

                @foreach($categories->slice(0, 4) as $tag)
                    <div class="">
                        <div class="hide row">
                            <div class="col s12">
                                <strong class="uppercase">{{ $tag->name }}</strong>
                            </div>
                        </div>
                        <div class="card-slider row no-pad">
                            @foreach($tag->posts()->orderBy("id", "desc")->get()->slice(0, 4) as $post)
                                <a href="{{ route("story", $post) }}"  class="col s12 m3 no-pad right-small-padding">
                                    <div class="img-background square no-margin ignore"
                                         style="background-image: url('uploads/{{ $post->images[0]->url }}');"></div>
                                </a>
                            @endforeach
                        </div>
                        <p class="hide">{{ $tag->description }}</p>
                    </div>
                @endforeach
            </div>

            <div class="col s12 m4 l3">
                <div class="with-padding wrapper center-align">
                    <strong class="uppercase center-align script line-underline">
                        <span>
                            SERVICES
                        </span>
                    </strong>
                </div>

                <div class="">
                    <div class="no-margin pinkish">

                        @include("partials.linebreak")
                        @include("partials.linebreak")
                        @include("partials.linebreak")

                        <div class="container center-align white-text">

                            <img class="quarter-width" src="{{ asset("images/icons/stage.svg") }}">

                            <br>
                            <br>

                            <h5 class="no-margin uppercase">
                                We do
                            </h5>
                            <h3 class="no-margin">
                                <span class="script">Home & Office</span><br>
                            </h3>
                            <h5 class="no-margin uppercase">
                                Make-overs
                            </h5>

                            <br>

                            <a class="label white-text white">
                                <span class="black-text">Contact Us</span>
                            </a>

                            <br>
                            <br>
                        </div>

                        @include("partials.linebreak")
                        @include("partials.linebreak")
                        @include("partials.linebreak")

                    </div>
                </div>

                @include("partials.linebreak")
                    
            </div>
        </div>

        @include("partials.linebreak")
        @include("partials.linebreak")

    </main>

    @include("partials.footer")
@endsection
