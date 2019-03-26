@extends("layouts.app")

@section('content')
    @include("partials.nav")

    <main class="">

        @include("partials.linebreak")

        <div class="container">
            <div class="row">
                <div class="col s12 center-align">
                    <h1>Room Inspirations</h1>
                    <h5>Love a look? Make it yours.</h5>
                </div>
            </div>

            @include("partials.linebreak")

            <div class="masonry-with-columns">
                @foreach($featured as $post)
                    <a  href="{{ route('story', $post) }}" class="full-width">
                        <img class="ignore full-width" src="/uploads/{{ $post->images[0]->url }}">
                    </a>
                @endforeach
            </div>
        </div>

        @include("partials.linebreak")

    </main>

    @include("partials.footer")
@endsection
