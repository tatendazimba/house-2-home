@extends("layouts.app")

@section('content')
    @include("partials.nav")

    <main class="">

        @include("partials.linebreak")

        <div class="container">
            <div class="row">
                <div class="col s12">
                    <strong>House2Home</strong>
                    <h3 class="no-margin">{{ $tagParameter }}</h3>
                    <strong class="primary-text small-text">
                        Read<strong> & Shop</strong>
                    </strong>
                </div>
            </div>
        </div>

        <div class="container bottom-small-margin hide-on-small-and-down" style="position: relative;">

            <div class="mobile-flex flex row">
                <div class="col s3">
                    <div class="square no-margin ignore"
                         style="background: linear-gradient(to bottom, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0)), url('/uploads/{{ $tag->image }}') no-repeat top left; background-size: cover;">
                    </div>
                </div>
                <div class="col s3">
                    <div class="square no-margin ignore"
                         style="background: linear-gradient(to bottom, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0)), url('/uploads/{{ $tag->image }}') no-repeat top left; background-size: cover;">
                    </div>
                </div>
                <div class="col s3">
                    <div class="square no-margin ignore"
                         style="background: linear-gradient(to bottom, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0)), url('/uploads/{{ $tag->image }}') no-repeat top left; background-size: cover;">
                    </div>
                </div>
                <div class="col s3">
                    <div class="square no-margin ignore"
                         style="background: linear-gradient(to bottom, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0)), url('/uploads/{{ $tag->image }}') no-repeat top left; background-size: cover;">
                    </div>
                </div>
            </div>

        </div>

        @include("partials.linebreak")

        <div class="container row">
            <div class="col s12 m3 hide-on-small-and-down">
                <div class="sidebar">
                    <ul class="">
                        <li>
                            <div class="transparent small-text">
                                @if($tagParameter === 'ALL')
                                    <strong>
                                        <i class="material-icons primary-text">arrow_right</i>
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
                        @foreach($shop as $i => $post)
                            <div class="col s12 m6 hide-on-small-and-down">
                                @include("partials.landscape")
                            </div>
                            <div class="col s12 hide-on-med-and-up">
                                @include("partials.idea")
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
