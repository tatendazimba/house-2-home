@extends("layouts.app")

@section('content')
    @include("partials.nav")

    <main class="container">

        @include("partials.linebreak")

        <div class="flex row overflow-visible">

            @foreach($featured->splice(0, 1) as $i => $post)
                <a href="{{ route('story', $post) }}" class="col s12 m6 black-text">
                    <div class="shadow mobile-flex flex row no-margin rounded full-height">
                        <div class="col s6 with-small-padding no-margin">
                            <div class="full-height full-width rounded ignore"
                                 style="background: linear-gradient(to bottom, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0)), url('/uploads/{{ isset($post->images[0]) ? $post->images[0]->url : '' }}') no-repeat bottom right; background-size: cover;">
                            </div>
                        </div>
                        <div class="col s6 no-pad valign-wrapper">
                            <div class="container">
                  `              <div class="">
                                        <h5 class="">
                                            {{ $post->title }}
                                            <br>
                                        </h5>

                                    <br>

                                    <h1 class="truncate small-text black-text no-margin top-small-margin bottom-small-margin">{{ $post->content }}</h1>
                                    <h1 class="small-text grey-text no-margin bottom-small-margin">
                                        @foreach($post->tags as $tag)
                                            <u>{{ $tag->name }}</u> &nbsp;
                                        @endforeach
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach

            @foreach($featured->splice(0, 2) as $i => $post)
                <a href="{{ route('story', $post) }}" class="col s6 m3 black-text">
                    @if(isset($post->images[0]))
                        <div class="white rounded shadow no-margin full-height">
                            <div class="square no-margin ignore"
                                 style="background: linear-gradient(to bottom, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0)), url('/uploads/{{ isset($post->images[0]) ? $post->images[0]->url : '' }}') no-repeat bottom right; background-size: cover;">
                            </div>
                            <div class="with-medium-padding no-margin">
                                <span class="">
                                    {{ $post->title }}
                                    <br>
                                </span>

                                <br>

                                <h1 class="truncate small-text grey-text no-margin top-small-margin bottom-small-margin">{{ $post->content }}</h1>
                                <h1 class="truncate small-text black-text no-margin bottom-small-margin">
                                    @foreach($post->tags->slice(0, 2) as $tag)
                                        <u>{{ $tag->name }}</u> &nbsp;
                                    @endforeach
                                </h1>
                            </div>
                        </div>
                    @endif
                </a>
            @endforeach
        </div>

        <div class="flex row no-pad overflow-visible">
            @foreach($featured as $i => $post)
                <a href="{{ route('story', $post) }}" class="col s6 m3 bottom-padding black-text">
                    @if(isset($post->images[0]))
                        <div class="white rounded shadow no-margin full-height">
                            <div class="square no-margin ignore"
                                 style="background: linear-gradient(to bottom, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0)), url('/uploads/{{ isset($post->images[0]) ? $post->images[0]->url : '' }}') no-repeat bottom right; background-size: cover;">
                            </div>
                            <div class="with-medium-padding no-margin">
                                <span class="">
                                    {{ $post->title }}
                                    <br>
                                </span>

                                <br>

                                <h1 class="truncate small-text grey-text no-margin top-small-margin bottom-small-margin">{{ $post->content }}</h1>
                                <h1 class="truncate small-text black-text no-margin bottom-small-margin">
                                    @foreach($post->tags->slice(0, 2) as $tag)
                                        <u>{{ $tag->name }}</u> &nbsp;
                                    @endforeach
                                </h1>
                            </div>
                        </div>
                    @endif
                </a>

                @if((($i+1) % 4) === 0 )
                    </div>

                    <div class="flex row no-pad overflow-visible">
                @endif
            @endforeach
        </div>

        @include("partials.linebreak")

    </main>

    @include("partials.footer")
@endsection
