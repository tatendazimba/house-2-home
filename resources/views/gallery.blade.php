@extends("layouts.app")

@section('content')
    @include("partials.nav")

    <main class="">

        @include("partials.linebreak")

        <div class="container">
            <div class="row">
                <div class="col s12 center-align">
                    <h1>{{ $tagParameter }} Collections</h1>
                    <h5 class="container">
                        @if($tagParameter === "ALL")
                            Check out House2Home items with a creative spin. See any idea you like? Get in touch & make it yours.
                        @else
                            @foreach($allTags as $tag)
                                @if($tag === $tagParameter)
                                    {{ $tag->description }}
                                @endif
                            @endforeach
                        @endif
                    </h5>

                    @include("partials.linebreak")

                    <p class="container center-align">
                        <a class="grey-text" href="{{ route('gallery', "ALL") }}">
                            <u>ALL</u>
                        </a>
                        @foreach($galleryTags as $tag)
                            <a class="grey-text" href="{{ route('gallery', $tag->name) }}">
                                <u>{{ $tag->name }}</u>
                            </a>

                            &nbsp;

                        @endforeach
                    </p>
                </div>
            </div>

            <div class="masonry-with-columns">
                @foreach($featured as $post)
                    <a href="{{ route('story', $post) }}" class="full-width">
                        <img class="ignore full-width" src="/uploads/{{ $post->images[0]->url }}">
                    </a>
                @endforeach
            </div>
        </div>

        @include("partials.linebreak")

    </main>

    @include("partials.footer")
@endsection
