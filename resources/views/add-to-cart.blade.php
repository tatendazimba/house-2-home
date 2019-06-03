@extends("layouts.app")

@section('content')
    @include("partials.nav")

    <main class="container">

        @include("partials.linebreak")
        @include("partials.linebreak")
        @include("partials.linebreak")

        <div class="flex row">
            <div class="col s12 m6">
                <div class="flex row">
                    <div class="col s3">
                        @foreach($post->images as $image)
                            <img class="full-width" src="/uploads/{{ $image->url }}">
                        @endforeach
                    </div>
                    <div id="image-view" class="col s9">
                        <img class="full-width" src="/uploads/{{ $post->images[0]->url }}">
                    </div>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="container">
                    <div class="">
                        <h3 class="no-margin">{{ $post->title }}</h3>
                        <h5>{{ $post->price }}</h5>

                        <br>

                        <div class="divide"></div>

                        <br>

                        <div class="justified">
                            {!! nl2br(e($post->content)) !!}
                        </div>

                        @include("partials.linebreak")

                        <div class="variables">
                            @foreach($post->tags as $tag)
                                <a class="cursor-click inline-block black-text" style="border: 1px solid #cacbcd; padding: 3px 12px; margin: 2px 0px;">{{ $tag->name }}</a>
                            @endforeach
                        </div>

                        @include("partials.linebreak")

                        <a id="add-to-cart" href="https://wa.me/263733636940?text={{ urlencode("Hi, I am interested in REF# " . $post->id . ". \n\n" . $post->title . " " . $post->content) }}" class="btn full-width primary outline">Contact Sales</a>

                        @include("partials.linebreak")

                    </div>
                </div>
            </div>
        </div>

        @include("partials.linebreak")
        @include("partials.linebreak")
        @include("partials.linebreak")

        <div class="divide with-small-margin">
            FEATURED
        </div>

        @include("partials.linebreak")

        <div class="flex row no-pad">
            @foreach($featured->slice(0, 4) as $post)
                <div class="col s12 m3 with-small-margin no-pad black">
                    <div class="img-background square no-margin" style="background-image: url('/uploads/{{ $post->images[0]->url }}'); background-size: cover;"></div>
                    <div class="black white-text with-padding" style="">

                        <a class="uppercase small-text white-text" href="{{ route('story', $post) }}">
                            <strong><u>{{ $post->tags[0]->name }}</u></strong>
                        </a>

                        <h5>
                            <a class="thin white-text" href="{{ route('story', $post) }}">
                                <span>{{ $post->title }}</span>
                            </a>
                        </h5>
                    </div>
                </div>
            @endforeach
        </div>

        @include("partials.linebreak")
        @include("partials.linebreak")

    </main>

    @include("partials.footer")
@endsection
