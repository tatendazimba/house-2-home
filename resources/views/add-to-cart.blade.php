@extends("layouts.app")

@section('content')
    @include("partials.nav")

    <main class="container">

        @include("partials.linebreak")

        <div class="white flex row top-padding">
            <div class="col s12 m6">
                <image-view-component :post="{{ json_encode($post) }}"></image-view-component>
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

                        <a id="add-to-cart" class="btn-large primary outline" style="box-shadow: none !important;" href="https://wa.me/263733636940?text={{ urlencode("Hi, I am interested in REF# " . $post->id . ". \n\n" . $post->title . " ") }}" >
                            <span class="">Contact Sales</span>
                        </a>

                        @include("partials.linebreak")

                    </div>
                </div>
            </div>
        </div>

        @include("partials.linebreak")
        @include("partials.linebreak")
        @include("partials.linebreak")

    </main>

    @include("partials.footer")
@endsection
<script>

</script>
