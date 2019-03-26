@extends("layouts.app")

@section('content')
    @include("partials.nav")

    <main class="container">

        @include("partials.linebreak")

        @foreach($featured as $post)
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

                <p class="container center-align truncate">{{ $post->content }}</p>
                <p class="container center-align">
                    <a href="{{ route('story', $post) }}"><u>Read more...</u></a>
                </p>
            </div>

            @include("partials.linebreak")
            @include("partials.linebreak")

            <div class="rule"></div>

            @include("partials.linebreak")
            @include("partials.linebreak")

        @endforeach

        @include("partials.linebreak")

    </main>

    @include("partials.footer")
@endsection
