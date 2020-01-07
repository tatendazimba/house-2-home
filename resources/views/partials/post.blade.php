{{--<div class="left-align full-width default-text" style="position: relative;">--}}
{{--    <div class="white bordered bottom-margin">--}}
{{--        <a href="{{ route('story', $post) }}" style="position:relative;">--}}
{{--            <div class="square no-margin ignore"--}}
{{--                 style="background: linear-gradient(to bottom, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0)), url('/uploads/{{ isset($post->images[0]) ? $post->images[0]->url : 'icons.svg' }}') no-repeat center center; background-size: contain;">--}}
{{--            </div>--}}
{{--        </a>--}}
{{--        <div class="with-small-padding">--}}
{{--            <a href="{{ route('story', $post) }}" class="">--}}
{{--                <h1 class="black-text truncate small-text normal-text no-margin">--}}
{{--                    {{ $post->title }} &nbsp;<span class="right white-text">{{ "diaspora groceries to zimbabwe city rural area growth point" }}</span>--}}
{{--                </h1>--}}
{{--            </a>--}}

{{--            <a href="{{ route('story', $post) }}" class="">--}}
{{--                <h1 class="truncate small-text no-margin">--}}
{{--                    {{ $post->content }} &nbsp;--}}
{{--                </h1>--}}
{{--            </a>--}}

{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

<div class="full-width left-align">
    <div class="white bottom-margin">
        <div class="white with-small-padding">
            <strong>{{ $post->tags[0]->name }}</strong>
        </div>
        <div class="ignore square no-margin" style="background: url('uploads/{{ $post->images[0]->url }}') no-repeat center center; background-size: cover;"></div>

        <div class="">
            <div class="with-small-padding">

                <div class="mobile-flex flex">
                    <div class="">
                        <h1 class="flow-text no-margin primary-font truncate">{{ $post->title }}</h1>
                    </div>
                </div>

                <h1 class="truncate small-text grey-text no-margin top-small-margin bottom-small-margin">{{ $post->content }}</h1>

                <div class="">
                    <strong class="small-text">
                        BROWSE
                        <i class="material-icons">arrow_right</i>
                    </strong>
                </div>

            </div>
        </div>
    </div>
</div>
