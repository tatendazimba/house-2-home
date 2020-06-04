@extends("layouts.app")

@section('content')

    @include("partials.nav")

    <main class="">
        <div class="hero-slick row no-margin">
            @foreach($heroes->slice(0, 3) as $hero)
                <div class="col s12 no-pad">
                    <div class="">
                        <hero-component :post="{{ json_encode($hero) }}"></hero-component>
                    </div>
                </div>
            @endforeach
        </div>

        <div style="background: linear-gradient(135deg, rgba(255, 255, 255, 1), rgba(255, 255, 255, 1), rgba(212, 200, 186, .5793)); background-size: cover;">
            <div class="">

                @include("partials.linebreak")
                @include("partials.linebreak")

                <div class="container center-align">
                    <div class="row container">
                        <div class="col s12 left-align">

                            <div>
                                <h3 class="">
                                    <strong class="left"><span class="hide-on-med-and-down">Find</span> Inspiration</strong>

                                    <a href="{{ route("shop", "ALL") }}">
                                        <strong class="black white-text right small-text" style="padding: 2px;">
                                            &nbsp;
                                            View All
                                            <i class="material-icons">arrow_right</i>
                                        </strong>
                                    </a>
                                </h3>
                            </div>

                            <div class="">
                                <p class="justified">
                                    House2Home offers a host of custom products and services including headboards, centre tables, decor
                                    consultancy, console tables, throw pillows, decor accessories, bedding, kitchenware and makeovers.
                                </p>
                            </div>

                            @include("partials.linebreak")

                        </div>
                        <div class="col s12">
                            <div class="hero-slick row hide-on-med-and-up">
                                @foreach($decorTips as $post)
                                    <div class="col s12 m4 fade">
                                        @include("partials.idea")
                                    </div>
                                @endforeach
                            </div>

                            <div class="mobile-slick row hide-on-small-and-down">
                                @foreach($decorTips as $post)
                                    <div class="col s12 m4">
                                        @include("partials.post")
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12">
                            <a href="{{ route('shop', "ALL") }}" class="">
                                <strong class="black-text small-text">
                                    Find More Inspiration
                                    <i class="material-icons">arrow_right</i>
                                </strong>
                            </a>
                        </div>
                    </div>

                </div>

                @include("partials.linebreak")

            </div>

            <div class="container" style="background: url('/images/background.jpeg'); background-size: cover;">

                @include("partials.linebreak")

                <div class="container center-align">
                    <div class="row">
                        <div class="col s12 white-text">
                            <div>
                                <h3 class="">
                                    <strong class="white-text">H2H Online Specials</strong>
                                </h3>
                            </div>

                            <div class="">
                                <p class="">
                                    Stay Up To Date With Seasonal Promotions & Clearance Discounts!
                                </p>
                            </div>

                            <spacer :height="30"></spacer>

                            <a href="{{ route('shop', "Sale") }}" class="white-text">
                                <u>
                                    <strong class="white-text">
                                        Check Out Our Shop
                                        <i class="material-icons">arrow_right</i>
                                    </strong>
                                </u>
                            </a>
                        </div>
                    </div>
                </div>

                @include("partials.linebreak")

            </div>

            @include("partials.linebreak")
            @include("partials.linebreak")
            @include("partials.linebreak")

            <div class="">
                <div class="container">
                    <div class="row">
                        <div class="col s12 m4 l3">
                            <h2 class="primary-font uppercase secondary-text">
                                <strong>Shop By Category</strong>
                            </h2>

                            <p>Choose from our wide selection of products.</p>
                            <a href="{{ route('shop', "ALL") }}" class="black-text small-text">
                                <strong class="">View Our Full Range</strong>
                                <i class="material-icons">arrow_right</i>
                            </a>

                            <p>&nbsp;</p>

                        </div>
                        <div class="col s12 m8 l9">
                            <div class="row">
                                @foreach($popularTags->slice(0, 12) as $tag)
                                    <a href="{{ route('shop', $tag->name) }}" class="col s6 m4 default-text overflow-visible">
                                        <div class="grey lighten-4 bottom-small-margin" style="position: relative;">
                                            <div class="full-width no-margin ignore"
                                                 style="height: 500px; background: linear-gradient(to bottom, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0)), url('/uploads/{{ $tag->image }}') no-repeat center center; background-size: cover;">
                                            </div>

                                            <div class="full-height full-width valign-wrapper" style="position: absolute; top: 0;">
                                                <div class="full-height full-width valign-wrapper">
                                                    <div class=" container uppercase center-align primary-font" style="">
                                                        <div class="black white-text inline-block with-small-padding">
                                                            <h5 class="white-text">{{ $tag->name }}</h5>
                                                            <strong class="small-text">
                                                                BROWSE
                                                                <i class="material-icons">arrow_right</i>
                                                            </strong>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <p>&nbsp;</p>

                </div>
            </div>

            @include("partials.linebreak")
        </div>

        <div class="grey lighten-3">

            @include("partials.linebreak")
            @include("partials.linebreak")

            <div class="flex row container">
                <div class="col s12 m9 l8">

                    <h2 class="no-margin"><strong>Decor Ideas</strong></h2>
                    <h4 class="no-margin">For Your Home! </h4>
                    <div class="row left-align top-padding bottom-padding overflow-visible">
                        @foreach($specials->slice(0, 4) as $post)
                            <div class="col s12 bottom-margin">
                                <div class="white container">
                                    @include("partials.idea")
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
                <div class="col s12 m3 l4 overflow-visible">

                    <div class="container">

                        <div class="amber container center-align">

                            <spacer :height="200"></spacer>

                            <h5 class="no-margin">
                                <strong class="white-text">COMING SOON</strong><br>
                            </h5>

                            <spacer :height="100"></spacer>

                            <h2 class="no-margin">
                                <span class="black-text">ONLINE</span><br>
                            </h2>
                            <h2 class="no-margin">
                                <span class="black-text">SHOPPING</span><br>
                            </h2>

                            <spacer :height="100"></spacer>

                            <h5 class="no-margin uppercase black-text">
                                <strong class="white-text">Next Day Delivery</strong>
                                    <br>
                                <strong class="">To Your Home!</strong>
                            </h5>

                            <spacer :height="200"></spacer>

                            <a href="{{ route('shop', "Sale") }}" class="black-text" >
                                <strong class="">
                                    Follow For Updates
                                </strong>
                            </a>

                            <spacer :height="20"></spacer>

                            <a target="_blank" href="https://www.instagram.com/house2home.zw/" class="">
                                <img class="ignore" src="{{ asset('images/icons/social/instagram-dark.svg') }}" style="height: 24px !important;">
                            </a>
                            <a target="_blank" href="https://www.facebook.com/House2HomeZ/" class="">
                                <img class="ignore" src="{{ asset('images/icons/social/facebook-dark.svg') }}" style="height: 24px !important;">
                            </a>
                            <a target="_blank" href="https://wa.me/263733636940?text={{ urlencode("Hi, I just visited your website.") }}" class="">
                                <img class="ignore" src="{{ asset('images/icons/social/whatsapp-dark.svg') }}" style="height: 24px !important;">
                            </a>

                            <spacer :height="100"></spacer>

                        </div>

                        @include("partials.linebreak")

                        <div class="container" style="background: url('/images/background.jpeg'); background-size: cover;">

                            @include("partials.linebreak")
                            @include("partials.linebreak")
                            @include("partials.linebreak")
                            @include("partials.linebreak")

                            <div class="container center-align">
                                <div class="container row">
                                    <div class="col s12 white-text">
                                        <div>
                                            <h3 class="">
                                                <span class="white-text">Sales <span class="">&</span> Offers</span>
                                            </h3>
                                        </div>

                                        <div class="">
                                            <p class="">
                                                Stay Up To Date With Seasonal Promotions & Clearance Discounts!
                                            </p>
                                        </div>

                                        @include("partials.linebreak")

                                        <a href="{{ route('shop', "ALL") }}" class="white-text">
                                            <u>
                                                <strong class="">
                                                    Check Out On Sale Items
                                                    <i class="material-icons">arrow_right</i>
                                                </strong>
                                            </u>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            @include("partials.linebreak")
                            @include("partials.linebreak")
                            @include("partials.linebreak")
                            @include("partials.linebreak")

                        </div>

                        @include("partials.linebreak")

                    </div>

                    <div class="container">
                        <div class="bottom-small-padding top-small-padding wrapper">
                            <strong class="uppercase center-align line-underline">
                                <span>
                                    Categories
                                </span>
                            </strong>
                        </div>

                        <div class="sidebar">
                            <ul class="">
                                @foreach($allTags as $tag)
                                    @if(!in_array($tag->name, ["Hero", "Inspiration", "New", "Sales & Offers", "Shop"]))
                                        <li>
                                            <div class="transparent small-text">
                                                <strong>
                                                    <i class="material-icons primary-text">arrow_right</i>
                                                </strong>
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
            </div>
        </div>

        <div class="hide" style="background: linear-gradient(rgba(255, 255, 255, .97), rgba(255, 255, 255, .93)), url('{{ asset("images/green-and-brown.jpeg") }}') no-repeat bottom right fixed; background-size: cover;">

            @include("partials.secondary-nav")

            @include("partials.linebreak")
            @include("partials.linebreak")

            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <h3>
                            <strong>Why House2Home</strong>
                        </h3>
                    </div>
                    <div class="col s12">
                        <div class="large-slick row hide-on-med-and-down">
                            @foreach($whyUsReasons as $reason)
                                <a href="" class="col s6 m4 l3 default-text overflow-visible">
                                    <div class="bordered bottom-small-margin" style="position: relative;">
                                        <div class="full-width with-padding valign-wrapper" style="height: 500px;">
                                            <div class="container">
                                                <img src="{{ $reason["image"] }}" style="height: 32px;">
                                                <h5 class="grey-text">
                                                    <strong>{{ $reason["title"] }}</strong>
                                                </h5>
                                                <p class="">{{ $reason["description"] }}</p>
                                                <p class="grey-text">
                                                    <i class="material-icons primary-text">arrow_forward</i>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>

                        <div class="slick row hide-on-small-only hide-on-large-only">
                            @foreach($whyUsReasons as $reason)
                                <a href="" class="col s6 m4 l3 default-text overflow-visible">
                                    <div class="bordered bottom-small-margin" style="position: relative;">
                                        <div class="full-width with-padding valign-wrapper" style="height: 500px;">
                                            <div class="container">
                                                <img src="{{ $reason["image"] }}" style="height: 32px;">
                                                <h5 class="grey-text">
                                                    <strong>{{ $reason["title"] }}</strong>
                                                </h5>
                                                <p class="">{{ $reason["description"] }}</p>
                                                <p class="grey-text">
                                                    <i class="material-icons primary-text">arrow_forward</i>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                        <div class="mobile-slick row hide-on-med-and-up">
                            @foreach($whyUsReasons as $reason)
                                <a href="" class="col s6 m4 l3 default-text overflow-visible">
                                    <div class="bordered bottom-small-margin" style="position: relative;">
                                        <div class="full-width with-medium-padding valign-wrapper" style="height: 500px;">
                                            <div class="container">
                                                <img src="{{ $reason["image"] }}" style="height: 32px;">
                                                <h5 class="grey-text">
                                                    <strong>{{ $reason["title"] }}</strong>
                                                </h5>
                                                <p class="">{{ $reason["description"] }}</p>
                                                <p class="grey-text">
                                                    <i class="material-icons primary-text">arrow_forward</i>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <p>&nbsp;</p>

            </div>

            @include("partials.linebreak")

        </div>

    </main>

    @include("partials.footer")

@endsection
