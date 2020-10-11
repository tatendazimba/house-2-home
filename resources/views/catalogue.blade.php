@extends("layouts.catalogue")

@section('pageTitle', "$tagParameter")

@section('content')
    <main class="">

        @include("partials.linebreak")

        <div class="container page">
            <div class="row">
                <div class="col s12 no-pad center-align">
                    <div class="text-center title-box" style="display: inline-block; background: #000031 !important;">
                        <div>
                            <h2 class="white-text no-margin">House2Home</h2>
                            <h1 class="white-text no-margin with-margin">Catalogue</h1>
                            <h5 class="no-margin white-text">
                                <strong>Creating a Lifestyle</strong>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include("partials.linebreak")

        <div class="container row">
            <div class="col s12">
                <div class="">
                    <div class="row">
                        @include("partials.linebreak")

                        @foreach($shop as $i => $post)
                            <div class="col s12">
                                <div class="{{ $i % 2 === 0 ? 'even' : 'odd' }}">
                                    @include("partials.catalogue.default")
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        @include("partials.linebreak")
        @include("partials.linebreak")

    </main>
@endsection
