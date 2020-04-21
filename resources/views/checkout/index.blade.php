@extends("layouts.app")

@section('pageTitle', 'Checkout with PayPal Visa MasterCard American Express')

@section('content')

    @include("partials.nav")

    <main class="white" style="">


        <break></break>
        <break></break>
        <break></break>

        <div class="container">

            <div class="row">

                <div class="col m6 l7 black-text hide-on-small-only">
                    <div class="no-pad">
                        <basket></basket>
                    </div>
                </div>

                <div class="col s12 m6 l5">

                    <div class="light-grey">

                        @include("partials.linebreak")

                        <paypal :shipping-options="{{ json_encode($shippingOptions) }}"></paypal>

                        @include("partials.linebreak")
                    </div>

                </div>

                <div class="col s12 m6 l7 black-text hide-on-med-and-up">
                    <div class="bordered no-pad">
                        <basket></basket>
                    </div>
                </div>

            </div>
        </div>

        @include("partials.linebreak")
        @include("partials.linebreak")

    </main>

    @include("partials.footer")
@endsection
