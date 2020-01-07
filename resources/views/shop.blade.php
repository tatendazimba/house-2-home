@extends("layouts.app")

@section('content')
    @include("partials.nav")

    <main class="">

        <div class="grey lighten-4 bottom-small-margin" style="position: relative;">
            
            <div class="full-width no-margin ignore"
                 style="height: 500px; background: linear-gradient(to bottom, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0)), url('/uploads/{{ $tag->image }}') no-repeat center center; background-size: cover;">
            </div>

            <div class="full-height full-width valign-wrapper" style="position: absolute; top: 0;">
                <div class="full-height full-width valign-wrapper">
                    <div class=" container uppercase center-align primary-font" style="">
                        <div class="black white-text inline-block with-small-padding">
                            <h5 class="white-text">{{ $tag->name }}</h5>
                            <strong class="small-text">
                                BROWSE
                                <i class="material-icons">arrow_right</i>
                            </strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include("partials.linebreak")

        <div class="container row">
            <div class="col s12">
                <h2 class="capitalise">Buy Homeware</h2>
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
                            <div class="collapsible-header capitalise transparent">
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
                                    <div class="collapsible-header capitalise transparent small-text">
                                        @if($tagParameter === $tag->name)
                                            <strong>
                                                <i class="material-icons small-text primary-text">add</i>
                                            </strong>
                                        @endif
                                        <a href="{{ route('shop', $tag->name) }}" class="black-text">
                                            <strong>{{ $tag->name }}</strong>
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
                    <div class="row">
                        @foreach($shop as $i => $post)
                            <div class="col s12">
                                @include("partials.landscape")
                            </div>
                        @endforeach
                    </div>
                    <div class="flex row no-pad overflow-visible">

                        @foreach($shop as $i => $post)
                            <a href="{{ route('story', $post) }}" class="col s12 m4 default-text">
                                <div class="white rounded shadow full-height">
                                    <div class="square no-margin ignore"
                                         style="background: linear-gradient(to bottom, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0)), url('/uploads/{{ $post->images[0]->url }}') no-repeat bottom right; background-size: cover;">
                                    </div>
                                    <h5 class="with-medium-padding no-margin">
                                        <span class="">
                                            {{ $post->title }}
                                        </span>

                                        <br>

                                        <p class="truncate small-text grey-text">{{ $post->content }}</p>
                                        <p class="truncate small-text black-text">
                                            @foreach($post->tags->slice(0, 2) as $tag)
                                                <u>{{ $tag->name }}</u> &nbsp;
                                            @endforeach
                                        </p>
                                    </h5>
                                </div>
                            </a>

                            @if((($i+1) % 3) === 0 )
                                </div>
                                <div class="flex row no-pad overflow-visible">
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
