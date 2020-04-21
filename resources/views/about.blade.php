@extends("layouts.app")

@section('pageTitle', "About Us")

@section('content')
    @include("partials.nav")

    <main class="">

        @include("partials.linebreak")

        <div class="container">

            <div class="row">
                <div class="col s12 m8 no-pad">
                    <h2 class="no-margin">
                        <span>Personalising Your Space Made Easier With</span> <strong>Free Delivery.</strong>
                    </h2>
                </div>
            </div>

            @include("partials.linebreak")

            <div class="row">
                <div class="col s12">
                    <div class="rectangle no-margin" style="background: url('/images/glass.jpg') center; background-size: cover;"></div>
                </div>
            </div>

            @include("partials.linebreak")

            <div class="row">
                <div class="col s12 no-pad">
                    <strong>FIND OUT</strong>
                    <h1 class="no-margin">
                        <strong>How It Works.</strong>
                    </h1>
                    <p>

                    </p>
                </div>
            </div>

            @include("partials.linebreak")

            <div class="row">
                <div class="col s12 m4 no-pad">

                    <div>
                        <img src="/images/icons/search.svg" style="height: 50px">
                    </div>

                    <h5 class="no-margin">
                        <strong>Find Inspiration & Ideas.</strong>
                    </h5>
                    <p class="justified right-padding">
                        Go through the House2Home catalogue to find design ideas to personalise your space and to find unique furniture accessories.
                    </p>

                    @include("partials.linebreak")

                </div>

                <div class="col s12 m4 no-pad">

                    <div>
                        <img src="/images/icons/add-to-cart.svg" style="height: 50px">
                    </div>

                    <h5 class="inline-block no-margin">
                        <strong>Add To Cart.</strong>
                    </h5>

                    <p class="justified right-padding">
                        Find looks you want to steal? Or accessories you want to own? Simply add individual items or whole looks to your <strong>Shopping Cart</strong>.
                    </p>

                    @include("partials.linebreak")

                </div>

                <div class="col s12 m4 no-pad">

                    <div>
                        <img src="/images/icons/gift.svg" style="height: 50px">
                    </div>

                    <h5 class="no-margin">
                        <strong>Checkout!</strong>
                    </h5>
                    <p class="justified right-padding">
                        Easily pay for your cart using various payments options inclusing VISA, MasterCard & EcoCash. Purchases of <strong>$100 or more</strong> are eligible for free delivery (Harare only).
                    </p>

                    @include("partials.linebreak")

                </div>
            </div>
        </div>

        @include("partials.linebreak")
        @include("partials.linebreak")

    </main>

    @include("partials.footer")
@endsection
