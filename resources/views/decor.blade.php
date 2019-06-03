@extends("layouts.app")

@section('content')
    @include("partials.nav")

    <main class="container">

        @include("partials.linebreak")

        <div class="row">
            @foreach($featured as $post)
                <a href="{{ route('story', $post) }}" class="col s6 m3 bottom-padding black-text">
                    <div class="white full-height">
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
            @endforeach
        </div>

        @include("partials.linebreak")

    </main>

    @include("partials.footer")
@endsection
