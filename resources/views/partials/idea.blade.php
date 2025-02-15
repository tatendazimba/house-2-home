<div class="full-width center-align">
    <div class="bottom-margin">
        <div class="with-small-padding">

            @include("partials.linebreak")

            <h5>
                <strong>{{ $post->title }}</strong>
            </h5>

        </div>

        <div class="">
            <div class="row">
                <div class="col s12 offset-m1 m10 offset-l2 l8 ">
                    <idea-view-component :post="{{ json_encode($post) }}"></idea-view-component>
                </div>
            </div>
        </div>

        <div class="">
            <div class="row container">

                <div class="col s12 offset-m1 m10 offset-l2 l8 ">
                    <p class="truncate">{{ $post->content }}</p>
                </div>

                <div class="col s12 offset-m1 m10 offset-l2 l8 ">
                    @if(isset($post->images[0]))
                        @foreach($post->images[0]->prices as $i => $price)
                            <div class="container center-align">
                                <strong class="">{{ $i + 1 }}.</strong>
                                <span>{{ $price->name }}</span> <strong class="">${{ $price->amount }}</strong>
    {{--                            <span class="right">--}}
    {{--                                <svg width="16" height="16" viewBox="0 0 16 16" class="icon">--}}
    {{--                                    <path id="defs-cart" d="M13.958 9.317l2-6a.971.971 0 0 0-.95-1.306V2H2.433L1.925.644a1 1 0 0 0-1.876.7l3.005 8.008a1 1 0 0 0 .938.648h9.016a1 1 0 0 0 .95-.683zM4.686 8l-1.5-4h10.436l-1.336 4h-7.6zm.308 6a2 2 0 1 1-2-2 2 2 0 0 1 2 2zm9.016 0a2 2 0 1 1-2-2 2 2 0 0 1 2 2z"></path>--}}
    {{--                                </svg>--}}
    {{--                            </span>--}}
                            </div>
                        @endforeach
                    @endif
                </div>

                <div class="col s12">

                    <br>

                    <a href="{{ route('story', $post) }}" class="black-text">
                        <u>
                            <strong class="">
                                Read & Shop
                                <i class="material-icons">arrow_right</i>
                            </strong>
                        </u>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
