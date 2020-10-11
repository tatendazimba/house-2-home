@extends("layouts.app")

@section('pageTitle', "$tagParameter")

@section('content')
    @include("partials.nav")

    <main class="">

        @include("partials.linebreak")

        <div class="container">
            <div class="row">
                <div class="col s12 no-pad">
                    <strong>House2Home</strong>
                    <h5 class="no-margin">
                        <strong>Inspiration & Shopping</strong>
                    </h5>
                </div>
            </div>
        </div>

        <div style="position: relative;">
            <div class="container bottom-small-margin" style="position: relative;">
                @if($tagParameter === "ALL")
                    <div class="row no-margin" style="background: linear-gradient(to bottom, rgba(0, 0, 0, .579), rgba(0, 0, 0, .479)), url('/images/inspiration.jpg') no-repeat center center; background-size: cover;">
                        <div class="col s3 no-pad">
                            <div class="left rectangle-portrait no-margin transparent">
                            </div>
                        </div>
                        @foreach($shop->slice(0, 3) as $i => $post)
                            <div class="col s3 no-pad">
                                <div class="left rectangle-portrait no-margin transparent">
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="row no-margin" style="background: linear-gradient(to bottom, rgba(0, 0, 0, .579), rgba(0, 0, 0, .479)), url('/uploads/{{ $tag->wide_image }}') no-repeat center center; background-size: cover;">
                        <div class="col s3 no-pad">
                            <div class="left rectangle-portrait no-margin transparent">
                            </div>
                        </div>
                        @foreach($shop->slice(0, 3) as $i => $post)
                            <div class="col s3 no-pad">
                                <div class="left rectangle-portrait no-margin transparent">
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="transparent valign-wrapper" style="position: absolute; top: 0; bottom: 0; left: 0; right: 0;">
                @if($tagParameter === "ALL")
                    <div class="container center-align">
                        <h5>
                            <strong class="white-text">
                                Inspiration & Shopping
                            </strong>
                        </h5>
                        <p class="no-margin white-text container">
                            Fresh Decorating <br><span>Ideas</span> for Your <span>Home</span>
                        </p>
                    </div>
                @else
                    <div class="container center-align">
                        <h5>
                            <strong class="white-text">
                                {{ $tagParameter }}
                            </strong>
                        </h5>
                        <p class="no-margin white-text container">
                            {{ $tag->description }}
                        </p>
                    </div>
                @endif
            </div>
        </div>

        @include("partials.linebreak")

        <div class="container row">
            <div class="col s12 m3 hide-on-small-and-down">
                <div class="sidebar">

                    <h5>
                        <strong>Categories</strong>
                    </h5>

                    <hr>

                    <br>

                    <ul class="">
                        <li>
                            <div class="transparent small-text">
                                @if($tagParameter === 'ALL')
                                    <strong>
                                        <i class="material-icons primary-text">arrow_right</i>
                                    </strong>
                                @else
                                    <strong>
                                        <i class="material-icons grey-text text-lighten-2">arrow_right</i>
                                    </strong>
                                @endif
                                <a href="{{ route('shop', 'ALL') }}" class="black-text">
                                    <strong>ALL PRODUCTS</strong>
                                </a>
                            </div>
                        </li>
                        @foreach($shopTags as $tag)
                            @if(!in_array($tag->name, ["Hero", "Inspiration", "New", "Sales & Offers", "Shop"]))
                                <li>
                                    <div class="transparent small-text">
                                        @if($tagParameter === $tag->name)
                                            <strong>
                                                <i class="material-icons primary-text">arrow_right</i>
                                            </strong>
                                        @else
                                            <strong>
                                                <i class="material-icons grey-text text-lighten-2">arrow_right</i>
                                            </strong>
                                        @endif
                                        <a href="{{ route('shop', $tag->name) }}" class="black-text">
                                            <strong>{{ $tag->name }}</strong>
                                        </a>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col s12 m9">
                <div class="">
                    <div class="row">
                        <div class="col s12">
                            <h5 class="">
                                <strong>Read & Shop</strong>
                            </h5>

                            <hr>

                            <h5 class="no-margin small-text">
                                <span>
                                    <strong>Find ideas you like</strong>
                                </span>
                                <span class="right grey-text">
                                    <strong>Ideas on this page:</strong> <u class="black-text">{{ count($shop) }}</u>
                                </span>
                            </h5>
                        </div>

                        @include("partials.linebreak")

                        @foreach($shop as $i => $post)
                            <div class="col s12 m6 hide-on-small-and-down">
                                @include("partials.post")
                            </div>
                            <div class="col s12 hide-on-med-and-up">
                                <div class="bottom-margin fade">
                                    @include("partials.idea")
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col s12 m3 hide-on-med-and-up">
                <div class="sidebar">
                    <ul class="">
                        <li>
                            <div class="transparent small-text">
                                @if($tagParameter === 'ALL')
                                    <strong>
                                        <i class="material-icons primary-text">arrow_right</i>
                                    </strong>
                                @else
                                    <strong>
                                        <i class="material-icons grey-text text-lighten-2">arrow_right</i>
                                    </strong>
                                @endif
                                <a href="{{ route('shop', 'ALL') }}" class="black-text">
                                    <strong>ALL PRODUCTS</strong>
                                </a>
                            </div>
                        </li>
                        @foreach($shopTags as $i => $tag)
                            @if(!in_array($tag->name, ["Hero", "Inspiration", "New", "Sales & Offers", "Shop"]))
                                <li>
                                    <div class="transparent small-text">
                                        @if($tagParameter === $tag->name)
                                            <strong>
                                                <i class="material-icons primary-text">arrow_right</i>
                                            </strong>
                                        @else
                                            <strong>
                                                <i class="material-icons grey-text text-lighten-2">arrow_right</i>
                                            </strong>
                                        @endif
                                        <a href="{{ route('shop', $tag->name) }}" class="black-text">
                                            <strong>{{ $tag->name }}</strong>
                                        </a>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        @include("partials.linebreak")
        @include("partials.linebreak")

    </main>

    @include("partials.footer")
@endsection