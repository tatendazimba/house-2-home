@extends("layouts.app")

@section('content')
    @include("partials.nav")

    <main class="container no-pad">
        <div class="" style="">
            <div id="hero" class="carousel carousel-slider rectangle no-margin" style="">
                @foreach($heroes as $hero)
                    <div class="carousel-item">
                        <div class="ignore valign-wrapper {{ $hero->text_colour }} rectangle no-margin" style="background: url('uploads/{{ $hero->images[0]->url }}') no-repeat bottom right; background-size: cover;">
                            <div class="container inside">
                                <div class="flexbox-centering">
                                    <div class="viewport-sizing container">
                                        <h1 class=" {{ $hero->text_colour }}">{{ $hero->title }}</h1>
                                        <h5 class="truncate {{ $hero->text_colour }}">{{ $hero->content }}</h5>

                                        <a  href="{{ route('story', $hero) }}" class="btn primary">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        @include("partials.linebreak")

        <div class="center-align">
            <h2>Be Inspired</h2>

            <p class="container">
                For the modern home. Bring fashion and function into every room with unique furniture pieces from House2Home. Our furniture designs feature high-quality materials and a meticulous attention to detail, all at an affordable price-point. Whether you're furnishing a modest apartment or spacious house, discover essential pieces in modern designs that will help you create a space that you'll love to live in.
            </p>

            <p>&nbsp;</p>

            <div class="flex row left-align">
                <div class="col s12 m8 l7" style="height: 500px;">
                    <div class="full-height white-text with-small-padding">
                        <div class="full-height ignore" style="background: url('/uploads/{{ $featured[0]->images[0]->url }}') no-repeat bottom right; background-size: cover;">
                            <div class="bottom container">
                                <div class="">
                                    <h3 class=" {{ $featured[0]->text_colour }}">{{ $featured[0]->title }}</h3>

                                    <p class=" {{ $featured[0]->text_colour }} truncate">{{ $featured[0]->content }}</p>

                                    <a class="btn primary">View more &raquo;</a>

                                    <p>&nbsp;</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s12 m4 l5" style="height: 500px;">
                    @foreach($featured->slice(1, 3) as $post)
                        <div class="third-height full-width with-small-padding">
                            <div class="full-height ignore" style="background: linear-gradient(to bottom, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0)), url('/uploads/{{ $post->images[0]->url }}') no-repeat bottom right; background-size: cover;">
                                <div class="bottom container">
                                    <div class="">
                                        <a href="{{ route('story', $post) }}">
                                            <h4 class=" {{ $post->text_colour }}">
                                                <span class="truncate left">
                                                    {{ $post->title }}
                                                    &nbsp;
                                                    <i class="material-icons">arrow_forward</i>
                                                </span>
                                            </h4>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        @include("partials.linebreak")

        @foreach($sale as $tag)
            <div class="">
                <div class="row">
                    <div class="col s12">
                        <h2 class="capitalise">{{ $tag->name }}</h2>
                        <p>{{ $tag->description }}</p>
                    </div>
                </div>
                <div class="card-slider row no-pad">
                    @foreach($tag->posts()->orderBy("id", "desc")->get()->slice(0, 8) as $post)
                        @if(substr( $post->images[0]->url, 0, 4 ) === "http")
                            <div class="col s12 m3 no-pad">
                                <div class="img-background square" style="background-image: url({{ $post->images[0]->url }});"></div>
                            </div>
                        @else
                            <div class="col s12 m3 no-pad">
                                <div class="img-background square" style="background-image: url('uploads/{{ $post->images[0]->url }}');"></div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endforeach

        @foreach($new as $tag)
            <div class="">
                <div class="row">
                    <div class="col s12">
                        <h2 class="capitalise">{{ $tag->name }}</h2>
                        <p>{{ $tag->description }}</p>
                    </div>
                </div>
                <div class="card-slider row no-pad">
                    @foreach($tag->posts()->orderBy("id", "desc")->get()->slice(0, 8) as $post)
                        @if(substr( $post->images[0]->url, 0, 4 ) === "http")
                            <div class="col s12 m3 no-pad">
                                <div class="img-background square" style="background-image: url({{ $post->images[0]->url }});"></div>
                            </div>
                        @else
                            <div class="col s12 m3 no-pad">
                                <div class="img-background square" style="background-image: url('uploads/{{ $post->images[0]->url }}');"></div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endforeach

        <div class="center-align">

            <h2>Shop By Category</h2>

            <p class="container">
                House2Home offers a host of custom products and services including headboards, centre tables, decor consultancy, console tables, throw pillows, decor accessories, bedding,  kitchenware and makeovers.
            </p>

            <p>&nbsp;</p>

        </div>

        @foreach($categories->slice(0, 4) as $tag)
            <div class="">
                <div class="row">
                    <div class="col s12">
                        <h4 class="capitalise">{{ $tag->name }}</h4>
                        <p>{{ $tag->description }}</p>
                        <a href="{{ route('shop', $tag->name) }}">
                            <span class="big-text underline"><u>SHOP NOW<i class="material-icons">arrow_forward</i></u></span>
                        </a>
                    </div>
                </div>
                <div class="card-slider row no-pad">
                    @foreach($tag->posts()->orderBy("id", "desc")->get()->slice(0, 4) as $post)
                        @if(substr( $post->images[0]->url, 0, 4 ) === "http")
                            <div class="col s12 m3 no-pad">
                                <div class="img-background square" style="background-image: url({{ $post->images[0]->url }});"></div>
                            </div>
                        @else
                            <div class="col s12 m3 no-pad">
                                <div class="img-background square" style="background-image: url('uploads/{{ $post->images[0]->url }}');"></div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endforeach

        @include("partials.linebreak")
        @include("partials.linebreak")

    </main>

    @include("partials.footer")
@endsection
