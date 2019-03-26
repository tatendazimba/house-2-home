@extends("layouts.app")

@section('content')
    @include("partials.nav")

    <main class="">

        <div class="center-align">
            <div class="flex row left-align">
                <div class="col s12 m8 l7" style="height: 500px;">
                    <div class="full-height white-text with-small-padding">
                        <div class="ignore full-height" style="background: url('/uploads/{{ $featured[0]->images[0]->url }}') no-repeat bottom right; background-size: cover;">
                            <div class="bottom container">
                                <div class="">
                                    <h3 class=" {{ $featured[0]->text_colour }}">{{ $featured[0]->title }}</h3>

                                    <p class=" {{ $featured[0]->text_colour }} truncate">{{ $featured[0]->content }}</p>

                                    <a href="{{ route('story', $featured[0]) }}" class="btn primary">View more &raquo;</a>

                                    <p>&nbsp;</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s12 m4 l5" style="height: 500px;">
                    @foreach($featured->slice(1, 3) as $post)
                        <div class="third-height full-width with-small-padding">
                            <div class="full-height" style="background: linear-gradient(to bottom, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0)), url('/uploads/{{ $post->images[0]->url }}') no-repeat bottom right; background-size: cover;">
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

        <div class="container row">
            <div class="col s12">
                <h2 class="capitalise">Shop</h2>
                <p>
                    <strong>PRODUCTS</strong> <i class="material-icons">keyboard_arrow_right</i> <span class="active-link capitalise"> {{ $tagParameter }}</span>
                </p>
            </div>
        </div>

        <div class="container row">
            <div class="col s12 m3 hide-on-small-and-down">
                <div class="sidebar">
                    <ul class="collapsible">
                        <li>
                            <div class="collapsible-header capitalise">
                                @if($tagParameter === 'ALL')
                                    <i class="material-icons primary-text">keyboard_arrow_right</i>
                                @endif
                                <a href="{{ route('shop', 'ALL') }}" class="black-text">
                                    <span>ALL PRODUCTS</span>
                                </a>
                            </div>
                        </li>
                        @foreach($shopTags as $tag)
                            @if(!in_array($tag->name, ["Hero", "Inspiration", "New", "Sales & Offers", "Shop"]))
                                <li>
                                    <div class="collapsible-header capitalise">
                                        @if($tagParameter === $tag->name)
                                            <i class="material-icons primary-text">keyboard_arrow_right</i>
                                        @endif
                                        <a href="{{ route('shop', $tag->name) }}" class="black-text">
                                            <span>{{ $tag->name }}</span>
                                        </a>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col s12 m9">
                <div class="">
                    <div class="flex row no-pad">
                        @foreach($shop as $i => $post)
                            <div class="black white-text col s12 m4 no-pad with-small-margin">
                                <div class="img-background square no-margin" style="background-image: url('/uploads/{{ $post->images[0]->url }}'); -webkit-background-size: cover; background-size: cover;"></div>
                                <div class="with-small-padding" style="">
                                    <a class="white-text whatsapp-link" target="_blank" href="https://wa.me/263733636940?text={{ urlencode("Hi, I am interested in REF# " . $post->id . ". \n\n" . $post->title . " " . $post->content) }}">
                                        <u>BUY# {{ $post->id }}</u>
                                    </a>
                                    <div class="">{{ $post->title }}</div>
                                    <strong class="">
                                        {!! nl2br(e($post->content, 1)) !!}
                                    </strong>
                                </div>
                            </div>

                            @if((($i+1) % 3) === 0 )
                                </div>
                                <div class="flex row no-pad">
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col s12 m3 hide-on-med-and-up">
                <div class="sidebar">
                    <ul class="collapsible">
                        <li>
                            <div class="collapsible-header capitalise">
                                @if($tagParameter === 'ALL')
                                    <i class="material-icons primary-text">keyboard_arrow_right</i>
                                @endif
                                <a href="{{ route('shop', 'ALL') }}" class="black-text">
                                    <span>ALL PRODUCTS</span>
                                </a>
                            </div>
                        </li>
                        @foreach($shopTags as $tag)
                            @if(!in_array($tag->name, ["Hero", "Inspiration", "New", "Sales & Offers", "Shop"]))
                                <li>
                                    <div class="collapsible-header capitalise">
                                        @if($tagParameter === $tag->name)
                                            <i class="material-icons primary-text">keyboard_arrow_right</i>
                                        @endif
                                        <a href="{{ route('shop', $tag->name) }}" class="black-text">
                                            <span>{{ $tag->name }}</span>
                                        </a>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        @include("partials.linebreak")
        @include("partials.linebreak")

    </main>

    @include("partials.footer")
@endsection
