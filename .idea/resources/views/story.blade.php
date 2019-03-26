@extends("layouts.app")

@section('content')
    @include("partials.nav")

    <main class="container">

        @include("partials.linebreak")

        <div class="center-align">

            <h3 class="no-margin">{{ $post->title }}</h3>

            <p class="container center-align">
                @foreach($post->tags as $tag)
                    <a class="grey-text" href="{{ route('decor', $tag->name) }}">
                        <u>{{ $tag->name }}</u>
                    </a>

                    &nbsp;

                @endforeach
            </p>

            <p class="container center-align bottom-padding black-text">
                <i>
                    {{ date('l d, Y', strtotime($post->updated_at)) }}
                </i>
            </p>

            <div>
                @if($post->images->count() === 1)
                    <div class="flex row left-align">
                        <div class="col s12 m6 offset-m3">
                            <div class="full-height white-text center-align">
                                <div class="square no-margin" style="background: url('/uploads/{{ $post->images[0]->url }}') no-repeat bottom right; background-size: cover;">
                                    <div class="bottom container">
                                        <div class="">
                                            <h3 class="white-text">&nbsp;</h3>

                                            <p class="truncate">&nbsp;</p>

                                            <p>&nbsp;</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif($post->images->count() === 2)
                    <div class="flex row left-align">
                        <div class="col s6">
                            <div class="full-height white-text">
                                <div class="square no-margin" style="background: url('/uploads/{{ $post->images[0]->url }}') no-repeat bottom right; background-size: cover;">
                                    <div class="bottom container">
                                        <div class="">
                                            <h3 class="white-text">&nbsp;</h3>

                                            <p class="truncate">&nbsp;</p>

                                            <p>&nbsp;</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col s6">
                            <div class="full-height white-text">
                                <div class="square no-margin" style="background: url('/uploads/{{ $post->images[1]->url }}') no-repeat bottom right; background-size: cover;">
                                    <div class="bottom container">
                                        <div class="">
                                            <h3 class="white-text">&nbsp;</h3>

                                            <p class="truncate">&nbsp;</p>

                                            <p>&nbsp;</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif($post->images->count() === 3)
                    <div class="row left-align">
                        <div class="col s12">
                            <div class="full-height white-text">
                                <div class="rectangle no-margin" style="background: url('/uploads/{{ $post->images[0]->url }}') no-repeat bottom right; background-size: cover;">
                                    <div class="bottom container">
                                        <div class="">
                                            <h3 class="white-text">&nbsp;</h3>

                                            <p class="truncate">&nbsp;</p>

                                            <p>&nbsp;</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col s6">
                            <div class="full-height white-text">
                                <div class="square no-margin" style="background: url('/uploads/{{ $post->images[1]->url }}') no-repeat bottom right; background-size: cover;">
                                    <div class="bottom container">
                                        <div class="">
                                            <h3 class="white-text">&nbsp;</h3>

                                            <p class="truncate">&nbsp;</p>

                                            <p>&nbsp;</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col s6">
                            <div class="full-height white-text">
                                <div class="square no-margin" style="background: url('/uploads/{{ $post->images[2]->url }}') no-repeat bottom right; background-size: cover;">
                                    <div class="bottom container">
                                        <div class="">
                                            <h3 class="white-text">&nbsp;</h3>

                                            <p class="truncate">&nbsp;</p>

                                            <p>&nbsp;</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="row left-align">
                        <div class="col s12">
                            <div class="full-height white-text">
                                <div class="rectangle no-margin" style="background: url('/uploads/{{ $post->images[0]->url }}') no-repeat bottom right; background-size: cover;">
                                    <div class="bottom container">
                                        <div class="">
                                            <h3 class="white-text">&nbsp;</h3>

                                            <p class="truncate">&nbsp;</p>

                                            <p>&nbsp;</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col s4">
                            <div class="full-height white-text">
                                <div class="square no-margin" style="background: url('/uploads/{{ $post->images[1]->url }}') no-repeat bottom right; background-size: cover;">
                                    <div class="bottom container">
                                        <div class="">
                                            <h3 class="white-text">&nbsp;</h3>

                                            <p class="truncate">&nbsp;</p>

                                            <p>&nbsp;</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col s4">
                            <div class="full-height white-text">
                                <div class="square no-margin" style="background: url('/uploads/{{ $post->images[2]->url }}') no-repeat bottom right; background-size: cover;">
                                    <div class="bottom container">
                                        <div class="">
                                            <h3 class="white-text">&nbsp;</h3>

                                            <p class="truncate">&nbsp;</p>

                                            <p>&nbsp;</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col s4">
                            <div class="full-height white-text">
                                <div class="square no-margin" style="background: url('/uploads/{{ $post->images[3]->url }}') no-repeat bottom right; background-size: cover;">
                                    <div class="bottom container">
                                        <div class="">
                                            <h3 class="white-text">&nbsp;</h3>

                                            <p class="truncate">&nbsp;</p>

                                            <p>&nbsp;</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            @include("partials.linebreak")

            <div class="container justified inline-block">
                <h2 class="inline-block no-margin">{!! nl2br(e($post->content[0])) !!}</h2>
                {!! nl2br(e(substr($post->content, 1))) !!}
            </div>
        </div>

        @include("partials.linebreak")
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
