@extends('layouts.app')

@section('pageTitle', "Contact" )

@section('content')
    @include("partials.nav")

    <main class="">

        <div class="container">
            <contact-component></contact-component>
        </div>

        @include("partials.linebreak")

    </main>

    @include("partials.footer")

@endsection
